<?php

namespace Database\Seeders;

use App\Models\KategoriPengaduan;
use Illuminate\Database\Seeder;

class KategoriPengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds for real-world PTPN IV complaint categories.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'nama_kategori' => 'Infrastruktur & Akses Jalan Kebun (Pasar Rintis & Titi Panen)',
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Fasilitas Perumahan Karyawan (Air Bersih, Listrik & Pondok)',
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Peralatan Kerja & Perlengkapan K3 (Alat Pelindung Diri / APD)',
            ],
            [
                'id' => 4,
                'nama_kategori' => 'Operasional Panen, TPH & Angkutan TBS (Restan Buah Sawit)',
            ],
            [
                'id' => 5,
                'nama_kategori' => 'Pemeliharaan Tanaman, Pemupukan & Perlindungan Hayati',
            ],
            [
                'id' => 6,
                'nama_kategori' => 'Kesejahteraan Karyawan, Premi Kerja & BPJS Ketenagakerjaan',
            ],
            [
                'id' => 7,
                'nama_kategori' => 'Keamanan Kebun, Ternak Liar & Pencegahan Pencurian TBS',
            ],
            [
                'id' => 8,
                'nama_kategori' => 'Fasilitas Kantor Afdeling, Jaringan & Administrasi Kerja',
            ],
            [
                'id' => 9,
                'nama_kategori' => 'Aspirasi, Saran Perbaikan & Lainnya',
            ],
        ];

        foreach ($categories as $cat) {
            KategoriPengaduan::updateOrCreate(
                ['id' => $cat['id']],
                ['nama_kategori' => $cat['nama_kategori']]
            );
        }
    }
}

