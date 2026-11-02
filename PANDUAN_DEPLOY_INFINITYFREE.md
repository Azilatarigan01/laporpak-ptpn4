# 🚀 Panduan Lengkap Deploy Aplikasi Lapor Pak PTPN IV ke InfinityFree

Panduan ini disusun untuk mempermudah upload dan konfigurasi sistem **Lapor Pak! Kebun Dolok Sinumbah** ke hosting gratis **InfinityFree**.

---

## 📌 Ringkasan Status Proyek Saat Ini
1. **Fitur & Kode Aplikasi:** **100% Selesai & Lulus Pengujian**
   - Formulir pengaduan publik + upload foto bukti & dokumen PDF.
   - Fitur anonim/whistleblower.
   - Tracking tiket real-time dengan status stepper.
   - Survei kepuasan layanan pelapor (CSAT 1-5 bintang).
   - Panel pimpinan/personalia (disposisi, filter SLA, cetak Berita Acara & Lembar Disposisi Lapangan PDF).
2. **Kesiapan InfinityFree:**
   - File [`.htaccess`](file:///c:/Users/Nur%20Azila%20Tarigan/Documents/KP/WEB%20PTVN%204/app-ptpn4dos/.htaccess) root telah dibuat agar pengunjung otomatis diarahkan ke folder `public/` dengan aman.
   - File database [`database/lapor_cloud_ready.sql`](file:///c:/Users/Nur%20Azila%20Tarigan/Documents/KP/WEB%20PTVN%204/app-ptpn4dos/database/lapor_cloud_ready.sql) telah dibersihkan sehingga langsung kompatibel dengan phpMyAdmin InfinityFree tanpa error.
   - Template konfigurasi [`.env.infinityfree`](file:///c:/Users/Nur%20Azila%20Tarigan/Documents/KP/WEB%20PTVN%204/app-ptpn4dos/.env.infinityfree) sudah siap pakai.
   - Route helper `https://domain-anda/hosting-setup` telah ditambahkan untuk membersihkan cache Laravel di hosting tanpa perlu terminal SSH.

---

## 🛠️ Langkah Demi Langkah Deploy ke InfinityFree

### 1. Buat Akun & Domain Gratis di InfinityFree
1. Buka [https://www.infinityfree.com](https://www.infinityfree.com) dan login/daftar.
2. Di Dashboard, klik **Create Account**.
3. Pilih **Free Subdomain** (contoh nama: `laporpak-ptpn4.infinityfreeapp.com` atau `lapor-doloksinumbah.epizy.com`).
4. Klik **Create Account** dan tunggu beberapa detik sampai akun aktif.

---

### 2. Buat Database MySQL & Dapatkan Kredensial
1. Di halaman akun InfinityFree Anda, klik **Control Panel** (akan masuk ke VistaPanel).
2. Cari dan klik menu **MySQL Databases**.
3. Di bagian *Create New Database*, masukkan nama database (misal: `lapor`) lalu klik **Create Database**.
4. Di bagian atas halaman MySQL Databases, catat 4 informasi penting berikut:
   - **MySQL Hostname:** (contoh: `sql123.infinityfree.com` atau `sql123.epizy.com`)
   - **MySQL Database Name:** (contoh: `epiz_38123456_lapor`)
   - **MySQL Username:** (contoh: `epiz_38123456`)
   - **MySQL Password:** (Password akun hosting InfinityFree Anda)

---

### 3. Import File Database ke phpMyAdmin
1. Kembali ke Control Panel InfinityFree, klik **phpMyAdmin**.
2. Klik tombol **Connect** di sebelah nama database Anda (`epiz_38123456_lapor`).
3. Di dalam phpMyAdmin, klik tab **Import** pada menu atas.
4. Klik tombol **Choose File / Browse**, lalu pilih file:
   ```text
   database/lapor_cloud_ready.sql
   ```
5. Gulir ke bawah dan klik tombol **Go / Kirim**.
6. Tunggu hingga muncul notifikasi hijau tanda semua tabel (area, realisasi, posisi, karyawan, users, pengaduan, news, csat) berhasil diimpor.

---

### 4. Upload File Aplikasi ke Folder `htdocs`
Anda dapat mengunggah file menggunakan **FileZilla (FTP)** atau **Online File Manager**:

#### Opsi Rekomendasi (FileZilla FTP):
1. Download dan buka aplikasi **FileZilla Client**.
2. Masukkan kredensial FTP InfinityFree (bisa dilihat di dashboard akun):
   - **Host:** `ftpupload.net`
   - **Username:** `epiz_38123456`
   - **Password:** Password akun hosting
   - **Port:** `21`
3. Klik **Quickconnect**.
4. Di panel kanan (Remote site), buka folder **`htdocs/`** (jika ada file bawaan seperti `index2.html`, hapus saja).
5. Di panel kiri (Local site), buka folder `app-ptpn4dos/`.
6. Upload seluruh file dan folder proyek ke dalam `htdocs/`. Pastikan folder `vendor/`, `app/`, `public/`, `resources/`, dan file `.htaccess` terunggah.

---

### 5. Atur File `.env` di Hosting
1. Di dalam folder `htdocs/`, cari file `.env.infinityfree`.
2. Ubah namanya menjadi **`.env`** (atau edit file `.env` yang ada).
3. Sesuaikan baris database dengan data yang dicatat pada Langkah 2:
   ```env
   APP_NAME="LaporPak PTPN IV"
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://nama-subdomain-anda.infinityfreeapp.com

   DB_CONNECTION=mysql
   DB_HOST=sql123.infinityfree.com
   DB_PORT=3306
   DB_DATABASE=epiz_38123456_lapor
   DB_USERNAME=epiz_38123456
   DB_PASSWORD=password_akun_anda
   ```
4. Simpan file `.env`.

---

### 6. Cek Versi PHP & Aktivasi
1. Di Control Panel InfinityFree, cari menu **Select PHP Version** (jika tersedia) dan pastikan memilih **PHP 8.2**.
2. Buka URL domain Anda di browser:
   ```text
   https://nama-subdomain-anda.infinityfreeapp.com/hosting-setup
   ```
   Halaman ini akan otomatis me-refresh cache Laravel.
3. Setelah itu, buka alamat utama web Anda:
   ```text
   https://nama-subdomain-anda.infinityfreeapp.com/
   ```
4. Aplikasi **Lapor Pak! PTPN IV** sudah aktif live dan siap digunakan! 🎉

---

### 🔑 Kredensial Login Bawaan di Database
- **Super Admin:** Email: `admin@gmail.com` | Password: `admin` (atau password default sistem)
- **Kepala Bagian / Personalia:** Email: `kepala@gmail.com` | Password: `password`
