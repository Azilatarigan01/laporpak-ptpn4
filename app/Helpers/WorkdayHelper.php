<?php

namespace App\Helpers;

use Carbon\Carbon;

class WorkdayHelper
{
    /**
     * Cache daftar hari libur dalam memory selama siklus request
     */
    protected static ?array $cachedHolidays = null;

    /**
     * Mengambil seluruh daftar hari libur nasional dan cuti bersama dari config.
     * Mengembalikan array flattened dengan format ['YYYY-MM-DD' => 'Keterangan Libur'].
     */
    public static function getAllHolidays(): array
    {
        if (self::$cachedHolidays !== null) {
            return self::$cachedHolidays;
        }

        $allConfig = config('holidays', []);
        $flattened = [];

        foreach ($allConfig as $year => $dates) {
            if (is_array($dates)) {
                foreach ($dates as $date => $description) {
                    $flattened[$date] = $description;
                }
            }
        }

        self::$cachedHolidays = $flattened;
        return self::$cachedHolidays;
    }

    /**
     * Memeriksa apakah tanggal yang diberikan merupakan hari libur nasional atau cuti bersama.
     */
    public static function isHoliday(Carbon $date): bool
    {
        $holidays = self::getAllHolidays();
        return isset($holidays[$date->format('Y-m-d')]);
    }

    /**
     * Mendapatkan deskripsi libur jika tanggal tersebut libur/cuti bersama.
     */
    public static function getHolidayDescription(Carbon $date): ?string
    {
        $holidays = self::getAllHolidays();
        return $holidays[$date->format('Y-m-d')] ?? null;
    }

    /**
     * Memeriksa apakah tanggal yang diberikan merupakan hari kerja aktif.
     * Mengembalikan false jika:
     * 1. Akhir pekan (Sabtu atau Minggu)
     * 2. Hari Libur Nasional atau Cuti Bersama
     */
    public static function isWorkday(Carbon $date): bool
    {
        if ($date->isWeekend()) {
            return false;
        }

        return !self::isHoliday($date);
    }

    /**
     * Mendapatkan tanggal awal efektif perhitungan SLA.
     * Jika aduan masuk pada hari libur / akhir pekan, perhitungan jam SLA
     * baru dimulai pada hari kerja pertama berikutnya pada awal jam kerja (pukul 08:00).
     */
    public static function getEffectiveStartDate(Carbon $date): Carbon
    {
        $effective = $date->copy();

        while (!self::isWorkday($effective)) {
            $effective->addDay()->setTime(8, 0, 0);
        }

        return $effective;
    }

    /**
     * Menghitung tanggal jatuh tempo (due date) target SLA hari kerja.
     * Menambahkan sejumlah $targetDays hari kerja efektif (mengecualikan Sabtu, Minggu, libur, dan cuti bersama).
     *
     * @param Carbon $startDate Tanggal pengaduan diajukan
     * @param int $targetDays Jumlah hari kerja SLA (default 3)
     * @return Carbon Tanggal & waktu jatuh tempo SLA
     */
    public static function calculateDueDate(Carbon $startDate, int $targetDays = 3): Carbon
    {
        $current = self::getEffectiveStartDate($startDate);
        $daysAdded = 0;

        while ($daysAdded < $targetDays) {
            $current->addDay();
            if (self::isWorkday($current)) {
                $daysAdded++;
            }
        }

        return $current;
    }

    /**
     * Memeriksa apakah pengaduan telah melewati batas waktu SLA (> 3 hari kerja).
     * Strictly greater than (melebihi batas due date).
     *
     * @param Carbon $startDate Tanggal pengaduan
     * @param int $targetDays Target hari kerja (default 3)
     * @param Carbon|null $endDate Tanggal pembanding (default sekarang)
     * @return bool True jika sudah melebihi target SLA
     */
    public static function isOverdue(Carbon $startDate, int $targetDays = 3, ?Carbon $endDate = null): bool
    {
        $endDate = $endDate ? $endDate->copy() : Carbon::now();
        $dueDate = self::calculateDueDate($startDate, $targetDays);

        return $endDate->gt($dueDate);
    }

    /**
     * Menghitung jumlah hari kerja penuh yang telah terlampaui sejak tanggal awal.
     * Mengecualikan Sabtu, Minggu, hari libur nasional, dan cuti bersama.
     *
     * @param Carbon $startDate Tanggal awal
     * @param Carbon|null $endDate Tanggal akhir (default sekarang)
     * @return int Jumlah hari kerja
     */
    public static function countWorkdaysElapsed(Carbon $startDate, ?Carbon $endDate = null): int
    {
        $endDate = $endDate ? $endDate->copy() : Carbon::now();
        $start = self::getEffectiveStartDate($startDate);

        if ($start >= $endDate) {
            return 0;
        }

        $workdays = 0;
        $current = $start->copy();

        while (true) {
            $next = $current->copy()->addDay();
            if ($next->gt($endDate)) {
                break;
            }
            if (self::isWorkday($next)) {
                $workdays++;
            }
            $current = $next;
        }

        return $workdays;
    }
}
