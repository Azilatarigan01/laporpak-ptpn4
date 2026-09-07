<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Lembar Pengaduan - {{ $pengaduan->kode_pengaduan }}</title>
    <style>
        @page {
            margin: 20mm 15mm 20mm 15mm;
            size: a4 portrait;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #1e293b;
            font-size: 11pt;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        .header-table {
            width: 100%;
            border-bottom: 3px double #15803d;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .header-logo {
            width: 80px;
            text-align: left;
            vertical-align: middle;
        }
        .header-title {
            text-align: center;
            vertical-align: middle;
        }
        .header-title h2 {
            margin: 0;
            font-size: 15pt;
            color: #15803d;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .header-title h3 {
            margin: 3px 0;
            font-size: 12pt;
            color: #334155;
            font-weight: 600;
        }
        .header-title p {
            margin: 0;
            font-size: 8.5pt;
            color: #64748b;
        }
        .doc-title {
            text-align: center;
            margin: 15px 0 20px 0;
        }
        .doc-title h4 {
            margin: 0;
            font-size: 13pt;
            text-decoration: underline;
            color: #0f172a;
            font-weight: bold;
        }
        .doc-title span {
            font-size: 10pt;
            color: #475569;
            font-family: monospace;
            font-weight: bold;
        }
        .section-title {
            background-color: #f1f5f9;
            color: #15803d;
            padding: 6px 10px;
            font-size: 10.5pt;
            font-weight: bold;
            border-left: 4px solid #15803d;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table.data-table th, table.data-table td {
            padding: 7px 10px;
            vertical-align: top;
            font-size: 10pt;
        }
        table.data-table td.label {
            width: 28%;
            font-weight: bold;
            color: #475569;
            border-bottom: 1px solid #f1f5f9;
        }
        table.data-table td.separator {
            width: 3%;
            text-align: center;
            border-bottom: 1px solid #f1f5f9;
        }
        table.data-table td.value {
            width: 69%;
            color: #0f172a;
            border-bottom: 1px solid #f1f5f9;
        }
        .box-content {
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            border-radius: 4px;
            padding: 12px;
            font-size: 10pt;
            min-height: 60px;
            white-space: pre-line;
            color: #1e293b;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            font-size: 9pt;
            font-weight: bold;
            border-radius: 12px;
        }
        .badge-diterima { background-color: #dcfce7; color: #166534; border: 1px solid #86efac; }
        .badge-proses { background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .badge-selesai { background-color: #e0f2fe; color: #075985; border: 1px solid #bae6fd; }
        
        .signature-table {
            width: 100%;
            margin-top: 35px;
            page-break-inside: avoid;
        }
        .signature-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            font-size: 10pt;
        }
        .signature-space {
            height: 65px;
        }
        .footer-note {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 8pt;
            color: #94a3b8;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            padding-top: 5px;
        }
    </style>
</head>
<body>

    <!-- Header Kop Surat -->
    <table class="header-table">
        <tr>
            <td class="header-logo">
                <img src="{{ public_path('assets/img/logoo.png') }}" alt="Logo" style="height: 65px;">
            </td>
            <td class="header-title">
                <h2>PT Perkebunan Nusantara IV (Persero)</h2>
                <h3>Regional II Kebun Dolok Sinumbah</h3>
                <p>Kecamatan Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara 21182 | Telp: (061) 4154666</p>
            </td>
        </tr>
    </table>

    <div class="doc-title">
        <h4>LEMBAR ASPIRASI & PENGADUAN KARYAWAN</h4>
        <span>KODE REGISTER: {{ $pengaduan->kode_pengaduan }}</span>
    </div>

    <!-- Informasi Pelapor -->
    <div class="section-title">I. IDENTITAS KARYAWAN (PELAPOR)</div>
    <table class="data-table">
        <tr>
            <td class="label">Nama Lengkap</td>
            <td class="separator">:</td>
            <td class="value"><strong>{{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan PTPN IV' }}</strong></td>
        </tr>
        <tr>
            <td class="label">NIKSAP / NIK</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->niksap ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Area Kerja</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->posisi->realisasi->area->nama_area ?? ($pengaduan->area->nama_area ?? '-') }}</td>
        </tr>
        <tr>
            <td class="label">Bagian Realisasi</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->posisi->realisasi->nama_realisasi ?? ($pengaduan->realisasi->nama_realisasi ?? '-') }}</td>
        </tr>
        <tr>
            <td class="label">Posisi / Jabatan</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->posisi->nama_posisi ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Nomor Kontak (HP/WA)</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->no_hp ?? '-' }}</td>
        </tr>
    </table>

    <!-- Rincian Pengaduan -->
    <div class="section-title">II. RINCIAN PENGADUAN / ASPIRASI</div>
    <table class="data-table">
        <tr>
            <td class="label">Tanggal Pengaduan</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->tgl_pengaduan ? $pengaduan->tgl_pengaduan->translatedFormat('d F Y - H:i') : '-' }} WIB</td>
        </tr>
        <tr>
            <td class="label">Kategori Pengaduan</td>
            <td class="separator">:</td>
            <td class="value">{{ $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum / Operasional' }}</td>
        </tr>
        <tr>
            <td class="label">Status Saat Ini</td>
            <td class="separator">:</td>
            <td class="value">
                @if($pengaduan->status == 'Diterima')
                    <span class="badge badge-diterima">DITERIMA</span>
                @elseif($pengaduan->status == 'Dalam Proses')
                    <span class="badge badge-proses">DALAM PROSES TINDAK LANJUT</span>
                @elseif($pengaduan->status == 'Selesai')
                    <span class="badge badge-selesai">SELESAI DITANGANI</span>
                @else
                    <span class="badge">{{ $pengaduan->status }}</span>
                @endif
            </td>
        </tr>
    </table>

    <div style="margin-bottom: 6px; font-weight: bold; font-size: 10pt; color: #475569;">Isi Deskripsi / Keluhan:</div>
    <div class="box-content">{{ $pengaduan->deskripsi }}</div>

    <!-- Tanggapan Pimpinan -->
    <div class="section-title">III. RESPON & TINDAK LANJUT PIMPINAN / KEPALA BAGIAN</div>
    <div class="box-content">
        @if(!empty($pengaduan->balasan))
            {{ $pengaduan->balasan }}
        @else
            <em>Belum ada catatan tanggapan resmi yang dimasukkan.</em>
        @endif
    </div>

    <!-- Lembar Tanda Tangan -->
    <table class="signature-table">
        <tr>
            <td>
                Dolok Sinumbah, {{ now()->translatedFormat('d F Y') }}<br>
                <strong>Karyawan Pelapor,</strong>
                <div class="signature-space"></div>
                <u><strong>{{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan' }}</strong></u><br>
                NIKSAP: {{ $pengaduan->niksap ?? '.......................' }}
            </td>
            <td>
                Mengetahui / Memverifikasi,<br>
                <strong>Kepala Bagian / Pimpinan Berwenang,</strong>
                <div class="signature-space"></div>
                <u><strong>(...................................................)</strong></u><br>
                PTPN IV Regional II Dolok Sinumbah
            </td>
        </tr>
    </table>

    <div class="footer-note">
        Dokumen ini dicetak secara otomatis dari Sistem Informasi Aspirasi & Pengaduan Karyawan (Lapor Pak!) PTPN IV Dolok Sinumbah pada {{ now()->format('d/m/Y H:i:s') }}.
    </div>

</body>
</html>
