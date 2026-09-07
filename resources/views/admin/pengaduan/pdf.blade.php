<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            margin: 20px;
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .header img {
            width: 80px;
        }
        .header .date {
            text-align: left;
            font-size: 12px;
            color: #555;
        }
        .content h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .info {
            margin-bottom: 10px;
            font-size: 14px;
        }
        .info p {
            margin: 5px 0;
        }
        .divider {
            border-top: 1px solid #000;
            margin: 10px 0;
        }
        .photo {
            text-align: center;
            margin-bottom: 10px;
        }
        .photo img {
            max-width: 80px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }
        .details {
            font-size: 13px;
        }
        .details p {
            margin: 5px 0;
        }
        .lampiran img {
            max-width: 200px;
            height: auto;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ddd;
            padding: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: right;
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="/assets/img/logoo.png" alt="Logo Perusahaan">
    </div>
    <div class="date">
        <p>Dolok Sinumbah, 15 Januari 2025</p>
        <p><strong>Nomor:</strong> {{ $pengaduan->id_pengaduan }}</p>
        <p><strong>Hal:</strong> Pengaduan Karyawan PTPN IV Dolok Sinumbah</p>
    </div>
</div>

<div class="divider"></div>

<div class="info">
    <p>Kepada Yth,</p>
    <p><strong>Kepala Bagian {{ $pengaduan->posisi->nama_posisi ?? 'Tidak Ditemukan' }}</strong></p>
    <p>di tempat</p>
</div>

<div class="info">
    <p><strong>Saya:</strong> {{ $pengaduan->karyawan->nama_karyawan ?? 'Tidak ditemukan' }}</p>
    <p><strong>Area:</strong> {{ $pengaduan->area->nama_area ?? '-' }}</p>
    <p><strong>Bagian Realisasi:</strong> {{ $pengaduan->realisasi->nama_realisasi ?? '-' }}</p>
    <p><strong>Posisi/Jabatan:</strong> {{ $pengaduan->posisi->nama_posisi ?? '-' }}</p>
    <p><strong>No HP:</strong> {{ $pengaduan->no_hp }}</p>
</div>

<div class="divider"></div>

<div class="content">
    <p>Dengan hormat,</p>
    <p>
        Bersama ini saya melaporkan terkait {{ strtolower($pengaduan->deskripsi ?? 'masalah tertentu') }} yang terjadi di lingkungan kerja kami. Saya berharap agar laporan ini dapat segera ditindaklanjuti demi menjaga kelancaran aktivitas kerja dan kepuasan karyawan di area {{ $pengaduan->area->nama_area ?? '-' }}.
    </p>
</div>

<div class="details">
    <h2>Lampiran Pendukung</h2>
    <div class="lampiran">
        <img src="{{ asset($pengaduan->lampiran) }}" alt="Lampiran Pendukung">
    </div>
</div>

<div class="footer">
    <p>*Dokumen ini dicetak secara otomatis melalui sistem.</p>
</div>

</body>
</html>
