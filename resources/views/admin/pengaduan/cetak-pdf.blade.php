<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Lembar Pengaduan Resmi - {{ $pengaduan->kode_pengaduan }}</title>
    @php
        $logoJpg = public_path('assets/img/logoo.jpg');
        $logoPng = public_path('assets/img/logoo.png');
        $logoSrc = '';
        if (file_exists($logoJpg)) {
            $logoSrc = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoJpg));
        } elseif (extension_loaded('gd') && file_exists($logoPng)) {
            $logoSrc = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPng));
        } elseif (file_exists($logoPng)) {
            $logoSrc = $logoPng;
        }
    @endphp
    <style>
        @page {
            size: a4 portrait;
            margin: 12mm 15mm 10mm 15mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #111827;
            font-size: 10pt;
            line-height: 1.35;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        
        /* Kop Surat Resmi PTPN IV */
        .header-table {
            width: 100%;
            border-bottom: 2.5px solid #0f5132;
            padding-bottom: 6px;
            margin-bottom: 10px;
            border-collapse: collapse;
        }
        .header-logo {
            width: 75px;
            text-align: left;
            vertical-align: middle;
            padding-right: 10px;
        }
        .header-logo img {
            max-height: 60px;
            max-width: 70px;
            object-fit: contain;
            display: block;
        }
        .header-text {
            text-align: center;
            vertical-align: middle;
        }
        .header-text .corp-name {
            font-size: 13pt;
            font-weight: bold;
            color: #0f5132;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }
        .header-text .unit-name {
            font-size: 11pt;
            font-weight: bold;
            color: #1e293b;
            text-transform: uppercase;
            margin: 2px 0;
        }
        .header-text .address {
            font-size: 8pt;
            color: #475569;
            margin: 0;
            line-height: 1.25;
        }

        /* Judul Dokumen & Nomor Registrasi */
        .doc-header {
            text-align: center;
            margin-bottom: 8px;
        }
        .doc-title {
            font-size: 11.5pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            color: #0f172a;
            margin-bottom: 2px;
        }
        .doc-reg {
            font-size: 9pt;
            color: #334155;
            font-weight: 600;
        }

        /* Metadata Baris Surat */
        .meta-table {
            width: 100%;
            margin-bottom: 8px;
            font-size: 9pt;
            border-collapse: collapse;
        }
        .meta-table td {
            padding: 1px 0;
            vertical-align: top;
        }

        /* Section Header */
        .section-header {
            background-color: #f1f5f9;
            color: #0f5132;
            padding: 4px 8px;
            font-size: 9.5pt;
            font-weight: bold;
            border-left: 3.5px solid #0f5132;
            margin-top: 8px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        /* Content Table */
        table.formal-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 4px;
        }
        table.formal-table td {
            padding: 3px 6px;
            vertical-align: top;
            font-size: 9.5pt;
        }
        table.formal-table td.col-label {
            width: 28%;
            font-weight: 600;
            color: #334155;
            border-bottom: 1px dashed #e2e8f0;
        }
        table.formal-table td.col-colon {
            width: 2%;
            text-align: center;
            border-bottom: 1px dashed #e2e8f0;
        }
        table.formal-table td.col-val {
            width: 70%;
            color: #0f172a;
            border-bottom: 1px dashed #e2e8f0;
        }

        /* Box Isi Pernyataan */
        .content-box {
            border: 1px solid #cbd5e1;
            background-color: #fafafa;
            border-radius: 3px;
            padding: 6px 10px;
            font-size: 9.5pt;
            line-height: 1.45;
            min-height: 42px;
            color: #1e293b;
            margin-bottom: 6px;
            text-align: justify;
        }

        /* Status Badge */
        .badge {
            display: inline-block;
            padding: 1px 8px;
            font-size: 8pt;
            font-weight: bold;
            border-radius: 3px;
            text-transform: uppercase;
        }
        .badge-diterima { background-color: #dcfce7; color: #166534; border: 1px solid #86efac; }
        .badge-proses { background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .badge-selesai { background-color: #e0f2fe; color: #075985; border: 1px solid #bae6fd; }

        /* Tanda Tangan */
        .signature-table {
            width: 100%;
            margin-top: 14px;
            page-break-inside: avoid;
            border-collapse: collapse;
        }
        .signature-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            font-size: 9.5pt;
        }
        .signature-space {
            height: 48px;
        }

        /* Footer */
        .footer-note {
            margin-top: 10px;
            border-top: 1px solid #e2e8f0;
            padding-top: 4px;
            font-size: 7.5pt;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- KOP SURAT RESMI PTPN IV -->
    <table class="header-table">
        <tr>
            <td class="header-logo">
                @if(!empty($logoSrc))
                    <img src="{{ $logoSrc }}" alt="Logo PTPN IV">
                @else
                    <div style="font-weight: bold; font-size: 14pt; color: #0f5132;">PTPN IV</div>
                @endif
            </td>
            <td class="header-text">
                <div class="corp-name">PT PERKEBUNAN NUSANTARA IV (PERSERO)</div>
                <div class="unit-name">REGIONAL II &bull; KEBUN DOLOK SINUMBAH</div>
                <div class="address">
                    Kecamatan Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara 21182<br>
                    Telepon: (061) 4154666 &bull; Email: kebun.doloksinumbah@ptpn4.co.id
                </div>
            </td>
        </tr>
    </table>

    <!-- JUDUL & NOMOR REGISTER -->
    <div class="doc-header">
        <div class="doc-title">LEMBAR ASPIRASI & BERITA ACARA PENGADUAN KARYAWAN</div>
        <div class="doc-reg">Nomor Registrasi: <strong>{{ $pengaduan->kode_pengaduan }}</strong></div>
    </div>

    <!-- METADATA TANGGAL & SIFAT -->
    <table class="meta-table">
        <tr>
            <td style="width: 15%;"><strong>Tanggal Terbit</strong></td>
            <td style="width: 2%;">:</td>
            <td style="width: 48%;">{{ $pengaduan->tgl_pengaduan ? \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->translatedFormat('d F Y - H:i') : now()->translatedFormat('d F Y - H:i') }} WIB</td>
            <td style="width: 10%;"><strong>Sifat</strong></td>
            <td style="width: 2%;">:</td>
            <td style="width: 23%;">Penting / Internal</td>
        </tr>
        <tr>
            <td><strong>Perihal</strong></td>
            <td>:</td>
            <td colspan="4">Laporan Penanganan Keluhan Fasilitas & Operasional Kerja Lapangan</td>
        </tr>
    </table>

    <!-- I. IDENTITAS KARYAWAN PELAPOR -->
    <div class="section-header">I. IDENTITAS KARYAWAN PELAPOR</div>
    <table class="formal-table">
        <tr>
            <td class="col-label">Nama Lengkap Karyawan</td>
            <td class="col-colon">:</td>
            <td class="col-val"><strong>{{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan PTPN IV' }}</strong></td>
        </tr>
        <tr>
            <td class="col-label">NIKSAP Karyawan</td>
            <td class="col-colon">:</td>
            <td class="col-val">{{ $pengaduan->niksap ?? ($pengaduan->karyawan->niksap ?? '-') }}</td>
        </tr>
        <tr>
            <td class="col-label">Unit & Area Penugasan</td>
            <td class="col-colon">:</td>
            <td class="col-val">{{ $pengaduan->posisi->realisasi->area->nama_area ?? ($pengaduan->area->nama_area ?? 'Kebun Dolok Sinumbah') }}</td>
        </tr>
        <tr>
            <td class="col-label">Bagian Realisasi / Afdeling</td>
            <td class="col-colon">:</td>
            <td class="col-val">{{ $pengaduan->posisi->realisasi->nama_realisasi ?? ($pengaduan->realisasi->nama_realisasi ?? '-') }}</td>
        </tr>
        <tr>
            <td class="col-label">Posisi / Jabatan</td>
            <td class="col-colon">:</td>
            <td class="col-val">{{ $pengaduan->posisi->nama_posisi ?? '-' }}</td>
        </tr>
        <tr>
            <td class="col-label">Nomor Kontak (HP/WA)</td>
            <td class="col-colon">:</td>
            <td class="col-val">{{ $pengaduan->no_hp ?? '-' }}</td>
        </tr>
    </table>

    <!-- II. RINCIAN PENGADUAN / ASPIRASI -->
    <div class="section-header">II. RINCIAN PENGADUAN / ASPIRASI KARYAWAN</div>
    <table class="formal-table">
        <tr>
            <td class="col-label">Kategori Laporan</td>
            <td class="col-colon">:</td>
            <td class="col-val"><strong>{{ $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum / Fasilitas Operasional' }}</strong></td>
        </tr>
        <tr>
            <td class="col-label">Status Penanganan</td>
            <td class="col-colon">:</td>
            <td class="col-val">
                @if($pengaduan->status == 'Diterima')
                    <span class="badge badge-diterima">DITERIMA SISTEM</span>
                @elseif($pengaduan->status == 'Dalam Proses')
                    <span class="badge badge-proses">DALAM PROSES TINDAK LANJUT</span>
                @elseif($pengaduan->status == 'Selesai')
                    <span class="badge badge-selesai">SELESAI DITANGANI</span>
                @else
                    <span class="badge">{{ strtoupper($pengaduan->status) }}</span>
                @endif
            </td>
        </tr>
    </table>

    <div style="font-weight: 600; font-size: 9pt; color: #334155; margin-top: 4px; margin-bottom: 2px;">Uraian Kronologis & Pokok Masalah:</div>
    <div class="content-box">
        {!! nl2br(e($pengaduan->deskripsi)) !!}
    </div>

    <!-- III. CATATAN TINDAK LANJUT -->
    <div class="section-header">III. RESPON & CATATAN TINDAK LANJUT MANAJEMEN</div>
    <div class="content-box">
        @if(!empty($pengaduan->balasan))
            {!! nl2br(e($pengaduan->balasan)) !!}
        @else
            <em>Laporan pengaduan telah terverifikasi secara resmi dalam sistem Lapor Pak! dan dalam proses koordinasi penanganan lapangan oleh Kepala Bagian terkait.</em>
        @endif
    </div>

    <!-- LEMBAR PENGESAHAN & TANDA TANGAN -->
    <table class="signature-table">
        <tr>
            <td>
                Dolok Sinumbah, {{ $pengaduan->tgl_pengaduan ? \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}<br>
                <strong>Karyawan Pelapor,</strong>
                <div class="signature-space"></div>
                <u><strong>{{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan Pelapor' }}</strong></u><br>
                NIKSAP: {{ $pengaduan->niksap ?? ($pengaduan->karyawan->niksap ?? '-') }}
            </td>
            <td>
                Mengetahui / Memverifikasi,<br>
                <strong>Kepala Bagian / Pimpinan Unit Terkait,</strong>
                <div class="signature-space"></div>
                <u><strong>( .................................................... )</strong></u><br>
                PTPN IV Regional II Dolok Sinumbah
            </td>
        </tr>
    </table>

    <!-- CATATAN RESMI SISTEM -->
    <div class="footer-note">
        Dokumen ini diterbitkan secara sah melalui <strong>Sistem Informasi Aspirasi & Pengaduan Karyawan (Lapor Pak!) PTPN IV Kebun Dolok Sinumbah</strong>.<br>
        Kode Registrasi: <strong>{{ $pengaduan->kode_pengaduan }}</strong> &bull; Dicetak pada: {{ now()->translatedFormat('d F Y H:i:s') }} WIB
    </div>

</body>
</html>
