<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;  /* Menurunkan ukuran logo */
        }
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="{{ $imageSrc }}" alt="Logo Perusahaan">
    </div>

    <!-- Tanggal -->
    <div class="date">
        Dolok Sinumbah, {{ $data['tanggal'] }}
    </div>

    <!-- Nomor dan Hal -->
    <div class="content">
        <strong>Nomor:</strong> {{ $data['niksap'] }}<br>
        <strong>Hal:</strong> Pengaduan Karyawan PTPN IV Reg II Dolok Sinumbah
    </div>
    <hr>

    <!-- Informasi Karyawan -->
    <div class="content">
        <strong>Nama Karyawan:</strong> {{ $data['nama_karyawan'] }}<br>
        <strong>NIKSAP:</strong> {{ $data['niksap'] }}<br>
        <strong>Jabatan:</strong> {{ $data['nama_posisi'] }}<br>
        <strong>No HP:</strong> {{ $data['no_hp'] }}<br>
    </div>

    <!-- Deskripsi Pengaduan -->
    <div class="content">
        <strong>Deskripsi Pengaduan:</strong><br>
        <p>{{ $data['deskripsi'] }}</p>
    </div>

    <!-- Lampiran Pendukung (Jika ada) -->
    @if (!empty($data['lampiran']))
        <div class="content">
            <strong>Lampiran Pendukung:</strong><br>
            <a href="{{ asset('storage/' . $data['lampiran']) }}" target="_blank">Lihat Lampiran</a>
        </div>
    @endif
</body>
</html>
