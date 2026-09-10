<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Disposisi - {{ $pengaduan->kode_pengaduan }} - PTPN IV</title>
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
            margin: 12mm 15mm 12mm 15mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', Times, serif, Arial, sans-serif;
            color: #111827;
            font-size: 10pt;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
            background-color: #f1f5f9;
        }

        .sheet-container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            padding: 25px 30px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        /* Top Action Bar for Browser View */
        .print-control-bar {
            max-width: 800px;
            margin: 0 auto 15px auto;
            background: #0f5132;
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
        }
        .btn-print {
            background: #ffffff;
            color: #0f5132;
            font-weight: bold;
            border: none;
            padding: 6px 18px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 9.5pt;
            text-decoration: none;
        }
        .btn-print:hover {
            background: #d8f3dc;
        }

        /* Kop Surat Resmi */
        .kop-surat {
            width: 100%;
            border-bottom: 2.5px solid #000000;
            padding-bottom: 8px;
            margin-bottom: 14px;
        }
        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }
        .kop-logo {
            width: 80px;
            vertical-align: middle;
            text-align: left;
            padding-right: 12px;
        }
        .kop-logo img {
            max-height: 70px;
            max-width: 75px;
            object-fit: contain;
            display: block;
        }
        .kop-text {
            text-align: center;
            vertical-align: middle;
        }
        .corp-title {
            font-size: 13.5pt;
            font-weight: bold;
            color: #0f5132;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }
        .unit-title {
            font-size: 11.5pt;
            font-weight: bold;
            color: #1e293b;
            text-transform: uppercase;
            margin: 2px 0;
        }
        .address-text {
            font-size: 8.5pt;
            color: #475569;
            margin: 0;
            line-height: 1.3;
        }

        /* Judul Dokumen */
        .doc-header-box {
            text-align: center;
            margin-bottom: 14px;
        }
        .doc-title-main {
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            margin: 0 0 2px 0;
            color: #0f172a;
        }
        .doc-reg-number {
            font-size: 9pt;
            color: #334155;
            font-weight: 600;
        }

        /* Formal Tables */
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            table-layout: fixed;
        }
        .table-data th, .table-data td {
            border: 1px solid #334155;
            padding: 5px 8px;
            font-size: 9pt;
            vertical-align: top;
            word-wrap: break-word;
        }
        .bg-head {
            background-color: #f1f5f9;
            font-weight: bold;
            color: #0f172a;
        }

        .check-box-item {
            margin: 3px 0;
            display: block;
            line-height: 1.5;
        }
        .sq-box {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1.5px solid #000;
            margin-right: 5px;
            vertical-align: middle;
        }

        /* Signature Table */
        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .ttd-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            font-size: 9.5pt;
            padding: 4px;
        }
        .ttd-space {
            height: 55px;
        }

        .official-footer {
            margin-top: 12px;
            border-top: 1px solid #cbd5e1;
            padding-top: 5px;
            font-size: 7.5pt;
            color: #64748b;
            text-align: center;
        }

        @media print {
            .print-control-bar {
                display: none !important;
            }
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }
            .sheet-container {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body>

    <!-- Print Control Bar -->
    <div class="print-control-bar">
        <span><strong>LEMBAR DISPOSISI TINDAK LANJUT</strong> | No. Tiket: {{ $pengaduan->kode_pengaduan }}</span>
        <div>
            <button onclick="window.print()" class="btn-print">&#128438; Cetak Disposisi</button>
            <a href="javascript:window.close()" class="btn-print" style="margin-left: 6px; background: #e2e8f0; color: #334155;">Tutup</a>
        </div>
    </div>

    <div class="sheet-container">
        <!-- Kop Surat Resmi PTPN IV -->
        <div class="kop-surat">
            <table class="kop-table">
                <tr>
                    <td class="kop-logo">
                        <img src="{{ $logoBase64 }}" alt="Logo PTPN IV">
                    </td>
                    <td class="kop-text">
                        <div class="corp-title">PT PERKEBUNAN NUSANTARA IV (PERSERO)</div>
                        <div class="unit-title">REGIONAL II &mdash; UNIT KEBUN DOLOK SINUMBAH</div>
                        <div class="address-text">
                            Kecamatan Huta Bayu Raja, Kabupaten Simalungun, Sumatera Utara 21182<br>
                            Email: doloksinumbah@ptpn4.co.id &bull; Portal Layanan Aspirasi: Lapor Pak!
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Judul Dokumen -->
        <div class="doc-header-box">
            <div class="doc-title-main">LEMBAR DISPOSISI TINDAK LANJUT & PERINTAH KERJA</div>
            <div class="doc-reg-number">Nomor Register Tiket: <strong>{{ $pengaduan->kode_pengaduan }}</strong></div>
        </div>

        <!-- I. Informasi Pengaduan -->
        <table class="table-data">
            <tr>
                <td class="bg-head" style="width: 22%;">Tanggal Diterima</td>
                <td style="width: 28%;">{{ $pengaduan->tgl_pengaduan ? \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->translatedFormat('d F Y, H:i') : now()->translatedFormat('d F Y') }} WIB</td>
                <td class="bg-head" style="width: 22%;">Kategori Masalah</td>
                <td style="width: 28%;">{{ $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum / Fasilitas' }}</td>
            </tr>
            <tr>
                <td class="bg-head">Nama Pelapor</td>
                <td><strong>{{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan' }}</strong></td>
                <td class="bg-head">NIKSAP / No. HP</td>
                <td>{{ $pengaduan->niksap ?? '-' }} / {{ $pengaduan->no_hp ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bg-head">Afdeling / Lokasi</td>
                <td>{{ $pengaduan->realisasi->nama_realisasi ?? ($pengaduan->area->nama_area ?? '-') }}</td>
                <td class="bg-head">Posisi / Jabatan</td>
                <td>{{ $pengaduan->posisi->nama_posisi ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bg-head">Pokok Permasalahan</td>
                <td colspan="3" style="line-height: 1.45; text-align: justify; min-height: 45px;">
                    {{ $pengaduan->deskripsi }}
                </td>
            </tr>
        </table>

        <!-- II. Instruksi Pimpinan / Disposisi -->
        <table class="table-data" style="margin-top: 6px;">
            <tr>
                <th class="bg-head" style="text-align: left; width: 48%;">DITERUSKAN KEPADA (PELAKSANA):</th>
                <th class="bg-head" style="text-align: left; width: 52%;">PETUNJUK / INSTRUKSI TINDAK LANJUT:</th>
            </tr>
            <tr>
                <td style="height: 120px;">
                    <div class="check-box-item"><span class="sq-box"></span> Asisten SDM & Umum (Personalia)</div>
                    <div class="check-box-item"><span class="sq-box"></span> Asisten Afdeling I / II / III / IV / V / VI / VII / VIII / IX</div>
                    <div class="check-box-item"><span class="sq-box"></span> Asisten Kepala (Askep) / Teknik</div>
                    <div class="check-box-item"><span class="sq-box"></span> Mandor I / Mandor Pemeliharaan / Sarpras</div>
                    <div class="check-box-item"><span class="sq-box"></span> Lainnya: ....................................................</div>
                </td>
                <td style="height: 120px;">
                    <div class="check-box-item"><span class="sq-box"></span> Cek & tinjau fisik langsung ke lokasi</div>
                    <div class="check-box-item"><span class="sq-box"></span> Lakukan tindakan perbaikan / penanganan segera</div>
                    <div class="check-box-item"><span class="sq-box"></span> Koordinasikan dengan bagian terkait</div>
                    <div class="check-box-item"><span class="sq-box"></span> Klarifikasi / Mediasi bersama pelapor</div>
                    <div class="check-box-item"><span class="sq-box"></span> Target Penyelesaian: .......... Hari Kerja</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Catatan Khusus Pimpinan / Bagian Personalia:</strong>
                    <div style="min-height: 38px; color: #334155; padding-top: 3px; font-style: italic;">
                        {{ $pengaduan->balasan ?: 'Silakan lakukan penanganan lapangan sesuai dengan SOP dan laporkan hasilnya setelah selesai.' }}
                    </div>
                </td>
            </tr>
        </table>

        <!-- III. Catatan Hasil Lapangan Pelaksana -->
        <table class="table-data" style="margin-top: 6px;">
            <tr>
                <th class="bg-head" style="text-align: left;">LAPORAN HASIL PENYELESAIAN LAPANGAN (Diisi Oleh Petugas/Asisten Terkait):</th>
            </tr>
            <tr>
                <td style="height: 60px; vertical-align: top; color: #475569; font-style: italic;">
                    Tanggal Selesai: ........................................ &nbsp;&nbsp;|&nbsp;&nbsp; Status: [ &nbsp; ] Tuntas 100% &nbsp;&nbsp;&nbsp; [ &nbsp; ] Kendala/Tertunda<br>
                    Uraian Hasil Pekerjaan: ....................................................................................................................................................
                </td>
            </tr>
        </table>

        <!-- Lembar Pengesahan Tanda Tangan -->
        <table class="ttd-table">
            <tr>
                <td>
                    Dolok Sinumbah, {{ now()->translatedFormat('d F Y') }}<br>
                    <strong>Penerima Disposisi / Pelaksana,</strong>
                    <div class="ttd-space"></div>
                    <u><strong>( .................................................... )</strong></u><br>
                    Jabatan: .............................................
                </td>
                <td>
                    Dolok Sinumbah, {{ now()->translatedFormat('d F Y') }}<br>
                    <strong>Pemberi Disposisi (Pimpinan / APK),</strong>
                    <div class="ttd-space"></div>
                    <u><strong>( .................................................... )</strong></u><br>
                    PTPN IV Regional II Kebun Dolok Sinumbah
                </td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="official-footer">
            Dokumen Disposisi Resmi diterbitkan melalui <strong>Sistem Informasi Aspirasi & Pengaduan (Lapor Pak!) PTPN IV Kebun Dolok Sinumbah</strong> pada {{ now()->translatedFormat('d F Y H:i') }} WIB.
        </div>
    </div>

</body>
</html>
