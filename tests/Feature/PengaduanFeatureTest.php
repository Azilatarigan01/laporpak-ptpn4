<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Area;
use App\Models\Realisasi;
use App\Models\Posisi;
use App\Models\Karyawan;
use Tests\TestCase;

class PengaduanFeatureTest extends TestCase
{
    /**
     * ==========================================
     * 1. PENGUJIAN HALAMAN PUBLIK (PUBLIC PAGES)
     * ==========================================
     */

    public function test_halaman_beranda_dapat_diakses()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PTPN IV');
    }

    public function test_halaman_tentang_kami_dapat_diakses()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_halaman_panduan_alur_dapat_diakses()
    {
        $response = $this->get('/panduan');
        $response->assertStatus(200);
        $response->assertSee('Panduan Alur');
    }

    public function test_halaman_berita_kebun_dapat_diakses()
    {
        $response = $this->get('/detailblog');
        $response->assertStatus(200);
    }

    public function test_halaman_formulir_pengaduan_dapat_diakses()
    {
        $response = $this->get('/pengaduan');
        $response->assertStatus(200);
        $response->assertSee('Formulir Pengaduan');
        $response->assertSee('Whistleblower Protection');
    }

    public function test_halaman_cek_status_dapat_diakses()
    {
        $response = $this->get('/pengaduan/cek-status');
        $response->assertStatus(200);
        $response->assertSee('Cek Status');
    }

    public function test_halaman_login_petugas_dapat_diakses()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_halaman_lupa_password_dapat_diakses()
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }

    /**
     * ==============================================
     * 2. PENGUJIAN AJAX DROPDOWN HIERARKI KARYAWAN
     * ==============================================
     */

    public function test_ajax_select_area_berfungsi()
    {
        $response = $this->get('/selectArea');
        $response->assertStatus(200);
    }

    public function test_ajax_select_realisasi_berfungsi()
    {
        $response = $this->get('/selectRealisasi/1');
        $response->assertStatus(200);
    }

    public function test_ajax_select_posisi_berfungsi()
    {
        $response = $this->get('/selectPosisi/1');
        $response->assertStatus(200);
    }

    public function test_ajax_select_karyawan_berfungsi()
    {
        $response = $this->get('/selectKaryawan/1');
        $response->assertStatus(200);
    }

    public function test_ajax_select_niksap_berfungsi()
    {
        $response = $this->get('/selectNiksap/1');
        $response->assertStatus(200);
    }

    /**
     * ==============================================
     * 3. PENGUJIAN ALUR PENGADUAN (SUBMIT & TRACKING)
     * ==============================================
     */

    public function test_alur_pengiriman_pengaduan_reguler()
    {
        $response = $this->post('/pengaduan/add', [
            'nama_area' => 1,
            'nama_realisasi' => 1,
            'nama_posisi' => 1,
            'nama_karyawan' => 1,
            'niksap' => '1002345',
            'no_hp' => '081234567890',
            'deskripsi' => 'Pengujian otomatis alur pengaduan reguler fasilitas kebun.',
            'is_anonim' => 0,
        ]);

        $response->assertRedirect('/pengaduan');
        $response->assertSessionHas('success');

        // Pastikan tersimpan di DB
        $this->assertDatabaseHas('pengaduan', [
            'niksap' => '1002345',
            'is_anonim' => 0,
            'status' => 'Diterima'
        ]);
    }

    public function test_alur_pengiriman_pengaduan_anonim_whistleblower()
    {
        $response = $this->post('/pengaduan/add', [
            'nama_area' => 1,
            'nama_realisasi' => 1,
            'nama_posisi' => 1,
            'nama_karyawan' => 1,
            'niksap' => '1009999',
            'no_hp' => '081299998888',
            'deskripsi' => 'Pengujian otomatis alur pengaduan rahasia (whistleblowing).',
            'is_anonim' => 1,
        ]);

        $response->assertRedirect('/pengaduan');
        $response->assertSessionHas('success');

        // Pastikan tersimpan di DB dengan status anonim aktif
        $this->assertDatabaseHas('pengaduan', [
            'niksap' => '1009999',
            'is_anonim' => 1,
        ]);
    }

    public function test_alur_pelacakan_status_pengaduan_ditemukan()
    {
        $pengaduan = Pengaduan::latest('id_pengaduan')->first();
        $this->assertNotNull($pengaduan);

        $response = $this->get('/pengaduan/cek-status?kode=' . $pengaduan->kode_pengaduan);
        $response->assertStatus(200);
        $response->assertSee($pengaduan->kode_pengaduan);
    }

    public function test_alur_penilaian_kepuasan_csat_oleh_pelapor()
    {
        $pengaduan = Pengaduan::where('status', 'Selesai')->first();
        if (!$pengaduan) {
            $pengaduan = Pengaduan::latest('id_pengaduan')->first();
            $pengaduan->status = 'Selesai';
            $pengaduan->save();
        }

        $response = $this->post("/pengaduan/{$pengaduan->id_pengaduan}/rating", [
            'rating' => 5,
            'feedback_pelapor' => 'Sangat cepat dan tuntas ditangani.'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('pengaduan', [
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'rating' => 5,
            'feedback_pelapor' => 'Sangat cepat dan tuntas ditangani.'
        ]);
    }

    public function test_alur_cetak_pdf_lembar_pengaduan_resmi()
    {
        $pengaduan = Pengaduan::latest('id_pengaduan')->first();
        $response = $this->get("/pengaduan/{$pengaduan->id_pengaduan}/cetak-pdf");
        $response->assertStatus(200);
    }

    /**
     * ==============================================
     * 4. PENGUJIAN HAK AKSES & KEAMANAN (SECURITY)
     * ==============================================
     */

    public function test_keamanan_guest_ditolak_mengakses_admin_dashboard()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/');
    }

    public function test_keamanan_guest_ditolak_mengakses_kepala_dashboard()
    {
        $response = $this->get('/kepala/dashboard');
        $response->assertRedirect('/');
    }

    public function test_keamanan_guest_ditolak_update_status_tanpa_login()
    {
        $pengaduan = Pengaduan::first();
        $response = $this->post("/pengaduan/update-status/{$pengaduan->id_pengaduan}", [
            'status' => 'Selesai',
            'balasan' => 'Serangan Tamu'
        ]);
        $response->assertRedirect('/login');
    }

    public function test_keamanan_guest_ditolak_cetak_disposisi_tanpa_login()
    {
        $pengaduan = Pengaduan::first();
        $response = $this->get("/pengaduan/{$pengaduan->id_pengaduan}/cetak-disposisi");
        $response->assertRedirect('/login');
    }

    /**
     * ==============================================
     * 5. PENGUJIAN ALUR ROLE ADMIN (AUTHENTICATED)
     * ==============================================
     */

    public function test_alur_admin_dashboard_dan_kelola_pengaduan()
    {
        $admin = User::where('user_type', 1)->first();
        $this->assertNotNull($admin);

        // Akses Dashboard Admin
        $response = $this->actingAs($admin)->get('/admin/dashboard');
        $response->assertStatus(200);

        // Akses Daftar Pengaduan
        $response = $this->actingAs($admin)->get('/admin/pengaduan/list');
        $response->assertStatus(200);

        // Admin Update Status Pengaduan
        $pengaduan = Pengaduan::first();
        $response = $this->actingAs($admin)->post("/pengaduan/update-status/{$pengaduan->id_pengaduan}", [
            'status' => 'Dalam Proses',
            'balasan' => 'Petugas sedang melakukan peninjauan lapangan.'
        ]);
        $response->assertStatus(302);

        $this->assertDatabaseHas('pengaduan', [
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'status' => 'Dalam Proses',
            'petugas_nama' => $admin->name
        ]);

        // Admin Cetak Lembar Disposisi Lapangan
        $response = $this->actingAs($admin)->get("/pengaduan/{$pengaduan->id_pengaduan}/cetak-disposisi");
        $response->assertStatus(200);

        // Admin Rekapitulasi Laporan
        $response = $this->actingAs($admin)->get('/admin/laporan/rekap');
        $response->assertStatus(200);

        // Admin Export Excel Rekap Laporan
        $response = $this->actingAs($admin)->get('/admin/laporan/export-excel');
        $response->assertStatus(200);

        // Admin Export PDF Rekap Laporan
        $response = $this->actingAs($admin)->get('/admin/laporan/export-pdf');
        $response->assertStatus(200);

        // Admin Daftar Karyawan
        $response = $this->actingAs($admin)->get('/admin/karyawan/list');
        $response->assertStatus(200);

        // Admin Daftar Kepala Bagian
        $response = $this->actingAs($admin)->get('/admin/kepala/list');
        $response->assertStatus(200);

        // Admin Daftar News
        $response = $this->actingAs($admin)->get('/admin/news');
        $response->assertStatus(200);
    }

    /**
     * ==============================================
     * 6. PENGUJIAN ALUR ROLE KEPALA BAGIAN
     * ==============================================
     */

    public function test_alur_kepala_bagian_dashboard_dan_monitoring()
    {
        $kepala = User::where('user_type', 2)->first();
        $this->assertNotNull($kepala);

        // Kepala Dashboard
        $response = $this->actingAs($kepala)->get('/kepala/dashboard');
        $response->assertStatus(200);

        // Kepala Daftar Pengaduan
        $response = $this->actingAs($kepala)->get('/kepala/pengaduan/list');
        $response->assertStatus(200);

        // Kepala Rekap Laporan
        $response = $this->actingAs($kepala)->get('/kepala/laporan/rekap');
        $response->assertStatus(200);

        // Kepala Export Excel
        $response = $this->actingAs($kepala)->get('/kepala/laporan/export-excel');
        $response->assertStatus(200);

        // Kepala Export PDF
        $response = $this->actingAs($kepala)->get('/kepala/laporan/export-pdf');
        $response->assertStatus(200);
    }
}
