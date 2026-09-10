<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Lembar Pengaduan & Aspirasi - {{ $pengaduan->kode_pengaduan }}</title>
    @php
        $logoPath = public_path('assets/img/logoo.png');
        $logoBase64 = '';
        if (file_exists($logoPath)) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $logoBase64 = asset('assets/img/logoo.png');
        }
    @endphp
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm 15mm 15mm 15mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', Times, serif, 'Helvetica Neue', Arial, sans-serif;
            color: #111827;
            font-size: 11pt;
            line-height: 1.45;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        
        /* Kop Surat Resmi PTPN IV */
        .kop-surat {
            width: 100%;
            border-bottom: 3px double #0f5132;
            padding-bottom: 8px;
            margin-bottom: 16px;
        }
        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }
        .kop-logo {
            width: 90px;
            text-align: left;
            vertical-align: middle;
            padding-right: 12px;
        }
        .kop-logo img {
            max-height: 75px;
            max-width: 85px;
            object-fit: contain;
            display: block;
        }
        .kop-text {
            text-align: center;
            vertical-align: middle;
        }
        .kop-text .corp-title {
            font-size: 14pt;
            font-weight: bold;
            color: #0f5132;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .kop-text .unit-title {
            font-size: 12pt;
            font-weight: bold;
            color: #1e293b;
            margin: 2px 0;
            text-transform: uppercase;
        }
        .kop-text .address-text {
            font-size: 8.5pt;
            color: #475569;
            margin: 0;
            line-height: 1.3;
        }
        
        /* Nomor Dokumen & Judul Surat */
        .doc-header-box {
            text-align: center;
            margin-bottom: 18px;
        }
        .doc-title-main {
            font-size: 12.5pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            margin: 0 0 4px 0;
            color: #0f172a;
        }
        .doc-reg-number {
            font-size: 9.5pt;
            color: #334155;
            font-weight: 600;
        }

        /* Metadata Baris Surat */
        .meta-table {
            width: 100%;
            margin-bottom: 14px;
            font-size: 10pt;
            border-collapse: collapse;
        }
        .meta-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        /* Section Headings */
        .section-header {
            background-color: #f1f5f9;
            color: #0f5132;
            padding: 5px 10px;
            font-size: 10.5pt;
            font-weight: bold;
            border-left: 4px solid #0f5132;
            margin-top: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        /* Content Tables */
        table.formal-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table.formal-table td {
            padding: 5px 8px;
            vertical-align: top;
            font-size: 10pt;
        }
        table.formal-table td.col-label {
            width: 28%;
            font-weight: 600;
            color: #334155;
            border-bottom: 1px dashed #e2e8f0;
        }
        table.formal-table td.col-colon {
            width: 3%;
            text-align: center;
            border-bottom: 1px dashed #e2e8f0;
        }
        table.formal-table td.col-val {
            width: 69%;
            color: #0f172a;
            border-bottom: 1px dashed #e2e8f0;
        }

        /* Statement Box */
        .content-box {
            border: 1px solid #cbd5e1;
            background-color: #fafafa;
            border-radius: 4px;
            padding: 10px 14px;
            font-size: 10pt;
            line-height: 1.6;
            min-height: 55px;
            white-space: pre-line;
            color: #1e293b;
            margin-bottom: 10px;
            text-align: justify;
        }

        /* Status Badge */
        .status-pill {
            display: inline-block;
            padding: 2px 10px;
            font-size: 8.5pt;
            font-weight: bold;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .status-diterima { background-color: #dcfce7; color: #166534; border: 1px solid #86efac; }
        .status-proses { background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .status-selesai { background-color: #e0f2fe; color: #075985; border: 1px solid #bae6fd; }

        /* Signature Area */
        .ttd-container {
            width: 100%;
            margin-top: 25px;
            page-break-inside: avoid;
        }
        .ttd-table {
            width: 100%;
            border-collapse: collapse;
        }
        .ttd-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            font-size: 10pt;
            padding: 0 15px;
        }
        .ttd-space {
            height: 60px;
        }

        /* Footer Stamp Note */
        .official-footer {
            margin-top: 20px;
            border-top: 1px solid #e2e8f0;
            padding-top: 6px;
            font-size: 8pt;
            color: #64748b;
            text-align: center;
        }

        /* Print Controls for Browser View */
        .print-control-bar {
            background: #0f5132;
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .btn-print {
            background: #ffffff;
            color: #0f5132;
            font-weight: bold;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 10pt;
            text-decoration: none;
        }
        .btn-print:hover {
            background: #d8f3dc;
        }
        @media print {
            .print-control-bar {
                display: none !important;
            }
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }
            @page {
                margin: 12mm 12mm 12mm 12mm;
            }
        }
    </style>
</head>
<body>

    <!-- On-screen Print Toolbar (Hidden during actual print) -->
    <div class="print-control-bar">
        <div>
            <strong>Pratinjau Dokumen Resmi Pengaduan: #{{ $pengaduan->kode_pengaduan }}</strong>
            <span style="font-size: 8.5pt; opacity: 0.85; margin-left: 10px;">(PTPN IV Regional II Kebun Dolok Sinumbah)</span>
        </div>
        <div style="display: flex; gap: 10px;">
            <button onclick="window.print()" class="btn-print">
                &#128438; Cetak Dokumen / Simpan PDF
            </button>
        </div>
    </div>

    <!-- KOP SURAT RESMI PTPN IV -->
    <div class="kop-surat">
        <table class="kop-table">
            <tr>
                <td class="kop-logo">
                    <img src="{{ $logoBase64 }}" alt="Logo PTPN IV">
                </td>
                <td class="kop-text">
                    <div class="corp-title">PT PERKEBUNAN NUSANTARA IV (PERSERO)</div>
                    <div class="unit-title">REGIONAL II &bull; KEBUN DOLOK SINUMBAH</div>
                    <div class="address-text">
                        Kecamatan Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara 21182<br>
                        Telepon: (061) 4154666 / (0622) 123456 &bull; Email: kebun.doloksinumbah@ptpn4.co.id
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- JUDUL & NOMOR REGISTER SURAT RESMI -->
    <div class="doc-header-box">
        <div class="doc-title-main">LEMBAR ASPIRASI & BERITA ACARA PENGADUAN KARYAWAN</div>
        <div class="doc-reg-number">Nomor Registrasi Sistem: <strong>{{ $pengaduan->kode_pengaduan }}</strong></div>
    </div>

    <!-- METADATA TANGGAL & SIFAT -->
    <table class="meta-table">
        <tr>
            <td style="width: 15%;"><strong>Tanggal Terbit</strong></td>
            <td style="width: 3%;">:</td>
            <td style="width: 45%;">{{ $pengaduan->tgl_pengaduan ? \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->translatedFormat('d F Y - H:i') : now()->translatedFormat('d F Y') }} WIB</td>
            <td style="width: 12%;"><strong>Sifat</strong></td>
            <td style="width: 3%;">:</td>
            <td style="width: 22%;">Penting / Rahasia</td>
        </tr>
        <tr>
            <td><strong>Perihal</strong></td>
            <td>:</td>
            <td colspan="4">Laporan Aspirasi & Penanganan Keluhan Fasilitas/Operasional Kerja Karyawan</td>
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
            <td class="col-label">NIKSAP / NIK Karyawan</td>
            <td class="col-colon">:</td>
            <td class="col-val">{{ $pengaduan->niksap ?? '-' }}</td>
        </tr>
        <tr>
            <td class="col-label">Area Penugasan</td>
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
            <td class="col-val">{{ $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum / Fasilitas Operasional' }}</td>
        </tr>
        <tr>
            <td class="col-label">Status Penanganan Saat Ini</td>
            <td class="col-colon">:</td>
            <td class="col-val">
                @if($pengaduan->status == 'Diterima')
                    <span class="status-pill status-diterima">DITERIMA SISTEM (ANTREAN VERIFIKASI)</span>
                @elseif($pengaduan->status == 'Dalam Proses')
                    <span class="status-pill status-proses">DALAM PROSES TINDAK LANJUT</span>
                @elseif($pengaduan->status == 'Selesai')
                    <span class="status-pill status-selesai">SELESAI DITANGANI / TUNTAS</span>
                @else
                    <span class="status-pill">{{ strtoupper($pengaduan->status) }}</span>
                @endif
            </td>
        </tr>
    </table>

    <div style="font-weight: 600; font-size: 9.5pt; color: #334155; margin-bottom: 4px;">Uraian Kronologis & Pokok Permasalahan:</div>
    <div class="content-box">
        {{ $pengaduan->deskripsi }}
    </div>

    <!-- III. CATATAN TINDAK LANJUT PIMPINAN / KEPALA BAGIAN -->
    <div class="section-header">III. RESPON & CATATAN TINDAK LANJUT MANAJEMEN PIMPINAN</div>
    <div class="content-box">
        @if(!empty($pengaduan->balasan))
            {{ $pengaduan->balasan }}
        @else
            <em>Laporan pengaduan telah terdata secara resmi dan sedang dalam proses koordinasi penanganan lapangan oleh Kepala Bagian / Pimpinan Unit terkait.</em>
        @endif
    </div>

    <!-- LEMBAR PENGESAHAN & TANDA TANGAN RESMI -->
    <div class="ttd-container">
        <table class="ttd-table">
            <tr>
                <td style="width: 50%; vertical-align: bottom; text-align: center;">
                    Dolok Sinumbah, {{ $pengaduan->tgl_pengaduan ? \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}<br>
                    <strong>Karyawan Pelapor,</strong>
                    <div class="ttd-space"></div>
                    <u><strong>{{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan' }}</strong></u><br>
                    NIKSAP: {{ $pengaduan->niksap ?? '.......................' }}
                </td>
                <td style="width: 50%; vertical-align: bottom; text-align: center;">
                    Dolok Sinumbah, {{ now()->translatedFormat('d F Y') }}<br>
                    <strong>Mengetahui / Menyetujui,</strong><br>
                    <span style="font-size: 9pt; color: #334155;">Kepala Bagian / Asisten SDM & Umum</span>
                    <div class="ttd-space"></div>
                    <u><strong>( .................................................... )</strong></u><br>
                    NIKSAP / NIP: .......................................
                </td>
            </tr>
        </table>
    </div>

    <!-- CATATAN RESMI SISTEM -->
    <div class="official-footer">
        Dokumen ini diterbitkan secara sah melalui <strong>Sistem Informasi Aspirasi & Pengaduan Karyawan (Lapor Pak!) PTPN IV Regional II Kebun Dolok Sinumbah</strong>.<br>
        Kode Registrasi Laporan: <strong>{{ $pengaduan->kode_pengaduan }}</strong> | Dicetak pada: {{ now()->translatedFormat('d F Y H:i:s') }} WIB
    </div>

    <script>
        // Auto trigger print prompt on load if requested via print parameter or direct view
        window.addEventListener('load', function() {
            // Optional: un-comment if auto-prompt is desired
            // window.print();
        });
    </script>
</body>
</html>
