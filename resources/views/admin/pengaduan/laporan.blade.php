<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
        .kop-surat {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .kop-surat h2, .kop-surat p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <h2>KOP SURAT PENGADUAN</h2>
        <p>Perusahaan XYZ</p>
        <hr>
    </div>

    <h3>Detail Pengaduan</h3>
    <table>
        <tr>
            <th>Nama Karyawan</th>
            <td>{{ $pengaduan->karyawan->nama_karyawan ?? '-' }}</td>
        </tr>
        <tr>
            <th>NIKSAP</th>
            <td>{{ $pengaduan->karyawan->niksap ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $pengaduan->posisi->nama_posisi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Area</th>
            <td>{{ $pengaduan->posisi->realisasi->area->nama_area ?? '-' }}</td>
        </tr>
        <tr>
            <th>Bagian Realisasi</th>
            <td>{{ $pengaduan->posisi->realisasi->nama_realisasi ?? '-' }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $pengaduan->no_hp ?? '-' }}</td>
        </tr>
        <tr>
            <th>Deskripsi Pengaduan</th>
            <td>{{ $pengaduan->deskripsi ?? 'Tidak ada deskripsi' }}</td>
        </tr>
    </table>

    @if($pengaduan->lampiran)
        <h3>Lampiran</h3>
        <p><a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank">Download Lampiran</a></p>
    @endif
</body>
</html>
