<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Rekapitulasi Pengaduan Karyawan - PTPN IV Kebun Dolok Sinumbah</title>
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
            size: A4 landscape;
            margin: 12mm 12mm 12mm 12mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #1e293b;
            font-size: 8.5pt;
            line-height: 1.35;
            margin: 0;
            padding: 0;
        }
        
        /* Kop Surat */
        .kop-table {
            width: 100%;
            border-bottom: 2.5px solid #0f5132;
            padding-bottom: 6px;
            margin-bottom: 12px;
        }
        .kop-logo {
            width: 70px;
            vertical-align: middle;
        }
        .kop-logo img {
            max-height: 55px;
            max-width: 65px;
        }
        .kop-text {
            text-align: center;
            vertical-align: middle;
        }
        .kop-text .corp-title {
            font-size: 13pt;
            font-weight: bold;
            color: #0f5132;
            text-transform: uppercase;
        }
        .kop-text .unit-title {
            font-size: 10.5pt;
            font-weight: bold;
            color: #334155;
            text-transform: uppercase;
            margin: 2px 0;
        }
        .kop-text .address-text {
            font-size: 7.5pt;
            color: #64748b;
        }

        .report-title-box {
            text-align: center;
            margin-bottom: 12px;
        }
        .report-title-box h3 {
            margin: 0;
            font-size: 11pt;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: underline;
            color: #0f172a;
        }
        .report-title-box p {
            margin: 2px 0 0 0;
            font-size: 8pt;
            color: #475569;
        }

        /* Table Data */
        table.rekap-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table.rekap-table th, table.rekap-table td {
            border: 1px solid #cbd5e1;
            padding: 4px 6px;
            vertical-align: top;
            font-size: 8pt;
        }
        table.rekap-table th {
            background-color: #f1f5f9;
            color: #0f5132;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }
        
        .badge-status {
            font-size: 7.5pt;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 3px;
            display: inline-block;
        }
        .status-diterima { background-color: #dcfce7; color: #166534; }
        .status-proses { background-color: #fef3c7; color: #92400e; }
        .status-selesai { background-color: #e0f2fe; color: #075985; }

        /* Summary Stats & Signatures */
        .ttd-table {
            width: 100%;
            margin-top: 15px;
            page-break-inside: avoid;
        }
        .ttd-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            font-size: 8.5pt;
        }
        .ttd-space {
            height: 45px;
        }
        
        .footer-note {
            border-top: 1px solid #e2e8f0;
            padding-top: 4px;
            font-size: 7pt;
            color: #94a3b8;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- KOP SURAT -->
    <table class="kop-table">
        <tr>
            <td class="kop-logo">
                <img src="{{ $logoBase64 }}" alt="Logo PTPN IV">
            </td>
            <td class="kop-text">
                <div class="corp-title">PT PERKEBUNAN NUSANTARA IV (PERSERO)</div>
                <div class="unit-title">REGIONAL II &bull; KEBUN DOLOK SINUMBAH</div>
                <div class="address-text">
                    Kecamatan Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara 21182 &bull; Telp: (061) 4154666 &bull; Email: kebun.doloksinumbah@ptpn4.co.id
                </div>
            </td>
        </tr>
    </table>

    <!-- JUDUL LAPORAN -->
    <div class="report-title-box">
        <h3>LAPORAN EKSEKUTIF REKAPITULASI PENGADUAN & ASPIRASI KARYAWAN</h3>
        <p>
            Periode: 
            @if($startDate && $endDate)
                {{ \Carbon\Carbon::parse($startDate)->translatedFormat('d F Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->translatedFormat('d F Y') }}
            @elseif($startDate)
                Mulai {{ \Carbon\Carbon::parse($startDate)->translatedFormat('d F Y') }}
            @elseif($endDate)
                Sampai {{ \Carbon\Carbon::parse($endDate)->translatedFormat('d F Y') }}
            @else
                Seluruh Periode (Akumulatif)
            @endif
            &bull; Total Data: {{ $records->count() }} Laporan
        </p>
    </div>

    <!-- TABEL DATA -->
    <table class="rekap-table">
        <thead>
            <tr>
                <th style="width: 25px;">No</th>
                <th style="width: 75px;">Kode Tiket</th>
                <th style="width: 70px;">Tanggal</th>
                <th style="width: 120px;">Pelapor & NIKSAP</th>
                <th style="width: 100px;">Bagian / Afdeling</th>
                <th style="width: 90px;">Kategori</th>
                <th>Uraian Permasalahan / Aspirasi</th>
                <th style="width: 70px;">Status</th>
                <th>Respon & Tindak Lanjut Pimpinan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $index => $row)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td style="font-family: monospace; font-weight: bold; text-align: center;">{{ $row->kode_pengaduan }}</td>
                <td style="text-align: center;">{{ $row->tgl_pengaduan ? \Carbon\Carbon::parse($row->tgl_pengaduan)->format('d/m/Y H:i') : '-' }}</td>
                <td>
                    <strong>{{ $row->karyawan->nama_karyawan ?? 'Karyawan' }}</strong><br>
                    <span style="color: #64748b;">NIK: {{ $row->niksap }}</span>
                </td>
                <td>
                    {{ $row->realisasi->nama_realisasi ?? '-' }}<br>
                    <small style="color: #64748b;">{{ $row->posisi->nama_posisi ?? '-' }}</small>
                </td>
                <td>{{ $row->kategori_pengaduan->nama_kategori ?? 'Umum' }}</td>
                <td>{{ $row->deskripsi }}</td>
                <td style="text-align: center;">
                    @if($row->status == 'Selesai')
                        <span class="badge-status status-selesai">SELESAI</span>
                    @elseif($row->status == 'Dalam Proses')
                        <span class="badge-status status-proses">PROSES</span>
                    @else
                        <span class="badge-status status-diterima">DITERIMA</span>
                    @endif
                </td>
                <td>{{ $row->balasan ?: '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align: center; padding: 15px; color: #64748b;">
                    Tidak ada data pengaduan pada periode yang dipilih.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- TANDA TANGAN & PENGESAHAN DIREKSI/PIMPINAN -->
    <table class="ttd-table">
        <tr>
            <td>
                Mengetahui,<br>
                <strong>Asisten Personalia & Kebun (APK),</strong>
                <div class="ttd-space"></div>
                <u><strong>( .................................................... )</strong></u><br>
                PTPN IV Regional II Kebun Dolok Sinumbah
            </td>
            <td>
                Dolok Sinumbah, {{ now()->translatedFormat('d F Y') }}<br>
                <strong>Manajer Kebun Dolok Sinumbah,</strong>
                <div class="ttd-space"></div>
                <u><strong>( .................................................... )</strong></u><br>
                PTPN IV Regional II
            </td>
        </tr>
    </table>

    <div class="footer-note">
        Dokumen Laporan Resmi ini dicetak secara otomatis dari Sistem Lapor Pak! PTPN IV Dolok Sinumbah pada {{ now()->translatedFormat('d F Y H:i:s') }} WIB.
    </div>

</body>
</html>
