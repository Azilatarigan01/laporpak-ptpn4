<?php

namespace App\Models;

use App\Helpers\WorkdayHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    
    public $timestamps = false;

    protected $casts = [
        'tgl_pengaduan' => 'datetime',
        'tgl_tanggapan' => 'datetime',
        'is_anonim' => 'boolean',
        'rating' => 'integer',
    ];

    protected $fillable = [
        'id_area',
        'id_realisasi',
        'id_posisi',
        'id_karyawan',
        'niksap',
        'no_hp',
        'deskripsi',
        'lampiran',
        'foto',
        'tgl_pengaduan',
        'status',
        'balasan',
        'kode_pengaduan',
        'kategori_id',
        'is_anonim',
        'rating',
        'feedback_pelapor',
        'tgl_tanggapan',
        'petugas_nama',
    ];

    /**
     * Tampilan nama pelapor dengan proteksi kerahasiaan jika anonim
     */
    public function getNamaPelaporDisplayAttribute()
    {
        if ($this->is_anonim) {
            return 'Karyawan (Identitas Dirahasiakan / Anonim)';
        }
        return $this->karyawan->nama_karyawan ?? 'Karyawan';
    }

    /**
     * Tampilan NIKSAP pelapor dengan proteksi kerahasiaan jika anonim
     */
    public function getNiksapDisplayAttribute()
    {
        if ($this->is_anonim) {
            return 'DIRAHASIAKAN (WBS)';
        }
        return $this->niksap ?? '-';
    }

    /**
     * Indikator apakah aduan telah melewati target SLA respon (> 3 hari kerja).
     * Secara ketat mengecualikan:
     * - Akhir pekan (Sabtu & Minggu)
     * - Hari Libur Nasional & Cuti Bersama (berdasarkan SKB 3 Menteri di config/holidays.php)
     */
    public function isOverdue()
    {
        if ($this->status === 'Diterima' && $this->tgl_pengaduan) {
            return WorkdayHelper::isOverdue($this->tgl_pengaduan, 3);
        }
        return false;
    }

    /**
     * Tanggal jatuh tempo SLA respon (3 hari kerja sejak pengaduan efektif masuk)
     */
    public function getSlaDueDateAttribute()
    {
        if (!$this->tgl_pengaduan) {
            return null;
        }
        return WorkdayHelper::calculateDueDate($this->tgl_pengaduan, 3);
    }

    /**
     * Jumlah hari kerja yang telah terlewati sejak aduan diajukan
     */
    public function getHariKerjaBerlaluAttribute()
    {
        if (!$this->tgl_pengaduan) {
            return 0;
        }
        $endDate = ($this->status === 'Selesai' && $this->tgl_tanggapan) ? $this->tgl_tanggapan : now();
        return WorkdayHelper::countWorkdaysElapsed($this->tgl_pengaduan, $endDate);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function realisasi()
    {
        return $this->belongsTo(Realisasi::class, 'id_realisasi', 'id_realisasi');
    }

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi', 'id_posisi');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function kategori_pengaduan()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id', 'id');
    }
}
