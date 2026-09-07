# 🌿 Lapor Pak! – Sistem Informasi Layanan Aspirasi & Pengaduan Karyawan
### PT Perkebunan Nusantara IV (Persero) Regional II Kebun Dolok Sinumbah

![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

---

## 📌 Tentang Proyek
**Lapor Pak!** adalah aplikasi web berbasis Laravel yang dirancang untuk mendukung tata kelola perusahaan yang baik (*Good Corporate Governance*) dan perlindungan saluran aspirasi (*Whistleblowing System*) bagi seluruh insan perkebunan di lingkungan **PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah**.

Sistem ini memfasilitasi karyawan untuk menyampaikan laporan kendala operasional, saran perbaikan fasilitas kerja, maupun keselamatan kerja (K3) dengan jaminan kerahasiaan identitas, pelacakan tiket digital real-time, serta tindak lanjut langsung dari jajaran Manajemen dan Kepala Bagian.

---

## ✨ Fitur Utama Sistem

### 1. 👥 Portal Publik & Karyawan
- **Formulir Pengaduan Multi-Tingkat (*Cascading AJAX Select2*):**
  - Pemilihan berjenjang: *Area Kerja &rarr; Bagian Realisasi &rarr; Posisi / Jabatan &rarr; Nama Karyawan*.
  - *Auto-fill* Nomor Induk Karyawan (NIKSAP) secara instan.
  - Upload berkas pendukung (*Foto Bukti Kejadian & Dokumen PDF*).
  - Pembuatan otomatis **Kode Tiket Pengaduan Unik** (contoh: `PD260908-1234`).
- **Pusat Pelacakan Real-Time (*Live Tracking*):**
  - Pelacakan status menggunakan **Nomor Tiket** atau **NIKSAP Karyawan**.
  - **Alur Progres 3 Tahap Visual:**
    1. `Diterima`: Laporan tercatat dalam antrean unit.
    2. `Sedang Diproses`: Ditinjau oleh Personalia / Manajemen Unit.
    3. `Selesai`: Ditangani tuntas disertai tanggapan resmi pimpinan.
- **Cetak Lembar Pengaduan PDF Resmi:**
  - Export lembar disposisi laporan berstandar korporat menggunakan *DomPDF*.
- **Portal Berita & Informasi Kebun:**
  - Artikel seputar panen, sertifikasi RSPO/ISPO, dan agenda perusahaan.

### 2. 🔐 Panel Administrator & Kepala Bagian
- **Dashboard Analitik Eksekutif:**
  - 4 Kartu Metrik Ringkasan (*Total Laporan, Selesai, Dalam Proses, Total Karyawan & Pimpinan*).
  - Bilah Distribusi Rasio Penyelesaian Aspirasi.
  - Jam Real-Time (*WIB - Asia/Jakarta*) dinamis.
- **Manajemen Pimpinan & Hierarki Jabatan:**
  - Fitur interaktif **Drag-and-Drop Reordering** & tombol geser naik/turun susunan hierarki pimpinan.
- **Manajemen Pengaduan Terpadu:**
  - Filter status laporan (*Semua, Diterima, Dalam Proses, Selesai*).
  - Modal verifikasi & formulir tanggapan/balasan resmi manajemen.
  - Pencarian cepat berbasis nama pelapor, tiket, atau afdeling.
- **Manajemen Data Karyawan & Berita:**
  - CRUD master data karyawan dan berita kebun terintegrasi.

---

## 🛠️ Tech Stack & Library
- **Backend Framework:** Laravel 9 (PHP 8.2)
- **Database:** MySQL
- **Frontend & Styling:** Bootstrap 5, Custom Agribusiness EcoBuild CSS, Google Fonts (Plus Jakarta Sans & Inter)
- **Library Pendukung:**
  - `Select2` (Cascading Dynamic AJAX Dropdowns)
  - `SortableJS` (Drag-and-drop Hierarchy Reordering)
  - `Barryvdh/DomPDF` (Export Lembar Laporan PDF)
  - `Bootstrap Icons` & `Material Design Icons`

---

## 🔑 Akun & Kredensial Uji Coba (Demo)
| Role Pengguna | Email Login | Password | Hak Akses |
|---|---|---|---|
| **Super Administrator** | `admin@gmail.com` | `123456` | Akses penuh dashboard, CRUD pengaduan, karyawan, hierarki pimpinan, berita, dan admin |
| **Kepala Bagian / Pimpinan** | `kepalabagian@gmail.com` | `123456` | Verifikasi laporan, tindak lanjut & respon resmi, data karyawan |
| **Asisten TU** | `asistentu@gmail.com` | `123456` | Panel pengawas operasional |

---

## 💻 Panduan Instalasi Lokal (Local Setup)

1. **Clone Repositori:**
   ```bash
   git clone https://github.com/Azilatarigan01/laporpak-ptpn4.git
   cd laporpak-ptpn4
   ```

2. **Install Dependensi Composer:**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment (`.env`):**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Sesuaikan konfigurasi database di `.env`:*
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lapor
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Import Database:**
   Import file SQL yang telah disediakan:
   ```bash
   database/database_laporpak.sql
   ```
   *(Bisa di-import via phpMyAdmin atau MySQL CLI: `mysql -u root lapor < database/database_laporpak.sql`)*

5. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Akses di browser: `http://127.0.0.1:8000`

---

## 👤 Pengembang
- **Nama:** Nur Azila Tarigan
- **GitHub:** [@Azilatarigan01](https://github.com/Azilatarigan01)
- **Institusi:** Kerja Praktik (KP) di PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah
