@extends('layouts.app')

@section('container')
<div class="row mb-4">
  <div class="col-12">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Rekapitulasi & Laporan Pengaduan</h3>
        <p class="text-muted mb-0">Laporan eksekutif berkala, analisis distribusi keluhan per unit afdeling, dan ekspor data resmi.</p>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <a href="{{ route((Auth::check() && Auth::user()->user_type == 2) ? 'kepala.pengaduan.exportExcel' : 'admin.pengaduan.exportExcel', request()->all()) }}" class="btn btn-success fw-bold shadow-sm">
          <i class="mdi mdi-file-excel me-1"></i> Export Excel (.xlsx/.csv)
        </a>
        <a href="{{ route((Auth::check() && Auth::user()->user_type == 2) ? 'kepala.pengaduan.exportPdf' : 'admin.pengaduan.exportPdf', request()->all()) }}" target="_blank" class="btn btn-danger fw-bold shadow-sm">
          <i class="mdi mdi-file-pdf-box me-1"></i> Cetak Laporan PDF Direksi
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Summary Mini KPI Cards -->
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm p-3 bg-white" style="border-radius: 16px; border-left: 4px solid #16a34a !important;">
      <small class="text-muted fw-bold text-uppercase">Total Terfilter</small>
      <h3 class="fw-bold text-dark mb-0 mt-1">{{ $stats['total'] }}</h3>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm p-3 bg-white" style="border-radius: 16px; border-left: 4px solid #0284c7 !important;">
      <small class="text-muted fw-bold text-uppercase">Selesai Ditangani</small>
      <h3 class="fw-bold text-info mb-0 mt-1">{{ $stats['selesai'] }}</h3>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm p-3 bg-white" style="border-radius: 16px; border-left: 4px solid #f59e0b !important;">
      <small class="text-muted fw-bold text-uppercase">Dalam Proses</small>
      <h3 class="fw-bold text-warning mb-0 mt-1">{{ $stats['proses'] }}</h3>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm p-3 bg-white" style="border-radius: 16px; border-left: 4px solid #64748b !important;">
      <small class="text-muted fw-bold text-uppercase">Antrean Diterima</small>
      <h3 class="fw-bold text-secondary mb-0 mt-1">{{ $stats['diterima'] }}</h3>
    </div>
  </div>
</div>

<!-- Filter Box -->
<div class="card shadow-sm border-0 mb-4" style="border-radius: 20px;">
  <div class="card-header bg-white py-3 px-4">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-filter-variant me-2 text-success"></i>Filter Periode & Kriteria Laporan</h5>
  </div>
  <div class="card-body p-4">
    <form action="{{ route((Auth::check() && Auth::user()->user_type == 2) ? 'kepala.pengaduan.rekap' : 'admin.pengaduan.rekap') }}" method="GET">
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label small fw-bold text-dark">Dari Tanggal</label>
          <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label small fw-bold text-dark">Sampai Tanggal</label>
          <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-2">
          <label class="form-label small fw-bold text-dark">Bagian / Afdeling</label>
          <select name="id_realisasi" class="form-select">
            <option value="">Semua Afdeling</option>
            @foreach($realisasiList as $r)
              <option value="{{ $r->id_realisasi }}" {{ request('id_realisasi') == $r->id_realisasi ? 'selected' : '' }}>
                {{ $r->nama_realisasi }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label small fw-bold text-dark">Kategori</label>
          <select name="kategori_id" class="form-select">
            <option value="">Semua Kategori</option>
            @foreach($kategoriList as $k)
              <option value="{{ $k->id }}" {{ request('kategori_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kategori }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label small fw-bold text-dark">Status</label>
          <select name="status" class="form-select">
            <option value="">Semua Status</option>
            <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="Dalam Proses" {{ request('status') == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
          </select>
        </div>
        <div class="col-12 d-flex justify-content-end gap-2 pt-2">
          <a href="{{ route((Auth::check() && Auth::user()->user_type == 2) ? 'kepala.pengaduan.rekap' : 'admin.pengaduan.rekap') }}" class="btn btn-light border px-3">
            <i class="mdi mdi-refresh me-1"></i> Reset
          </a>
          <button type="submit" class="btn btn-primary px-4 fw-bold">
            <i class="mdi mdi-magnify me-1"></i> Terapkan Filter
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Table Rekap -->
<div class="card shadow-sm border-0" style="border-radius: 20px;">
  <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-table me-2 text-success"></i>Hasil Rekapitulasi Data Pengaduan</h5>
    <span class="badge bg-light text-dark border">Menampilkan: {{ $pengaduan->total() }} Data</span>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4" style="width: 50px;">No</th>
            <th>Kode Tiket</th>
            <th>Pelapor & NIKSAP</th>
            <th>Afdeling / Bagian</th>
            <th>Kategori</th>
            <th>Waktu Masuk</th>
            <th>Status</th>
            <th class="pe-4 text-center">Aksi / WA</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pengaduan as $index => $item)
          @php
            $rawPhone = preg_replace('/[^0-9]/', '', $item->no_hp ?? '');
            if (str_starts_with($rawPhone, '0')) {
                $waPhone = '62' . substr($rawPhone, 1);
            } elseif (str_starts_with($rawPhone, '62')) {
                $waPhone = $rawPhone;
            } else {
                $waPhone = '62' . $rawPhone;
            }
            $waMsg = urlencode("Halo Bapak/Ibu " . ($item->karyawan->nama_karyawan ?? 'Karyawan') . ",\n\nKami menginformasikan terkait pengaduan Anda pada sistem Lapor Pak! PTPN IV Dolok Sinumbah:\n- Kode Tiket: " . $item->kode_pengaduan . "\n- Status: " . $item->status . "\n- Tanggapan: " . ($item->balasan ?: 'Laporan sedang dalam penanganan.') . "\n\nCek detail: " . route('pengaduan.cek-status'));
          @endphp
          <tr>
            <td class="ps-4 text-muted">{{ $pengaduan->firstItem() + $index }}</td>
            <td>
              <span class="badge bg-light text-dark border font-monospace">{{ $item->kode_pengaduan }}</span>
            </td>
            <td>
              <h6 class="mb-0 fw-bold text-dark">{{ $item->karyawan->nama_karyawan ?? 'Karyawan' }}</h6>
              <small class="text-muted">NIKSAP: {{ $item->niksap }}</small>
            </td>
            <td>
              <div class="fw-semibold text-dark">{{ $item->realisasi->nama_realisasi ?? '-' }}</div>
              <small class="text-muted">{{ $item->posisi->nama_posisi ?? '-' }}</small>
            </td>
            <td>
              <span class="badge bg-light text-success border">
                {{ $item->kategori_pengaduan->nama_kategori ?? 'Umum' }}
              </span>
            </td>
            <td>
              <small class="text-muted">{{ $item->tgl_pengaduan ? \Carbon\Carbon::parse($item->tgl_pengaduan)->isoFormat('D MMM Y, HH:mm') : '-' }}</small>
            </td>
            <td>
              @if($item->status == 'Selesai')
                <span class="badge bg-info text-white"><i class="mdi mdi-check-circle me-1"></i>Selesai</span>
              @elseif($item->status == 'Dalam Proses')
                <span class="badge bg-warning text-dark"><i class="mdi mdi-progress-clock me-1"></i>Dalam Proses</span>
              @else
                <span class="badge bg-success"><i class="mdi mdi-inbox me-1"></i>Diterima</span>
              @endif
            </td>
            <td class="pe-4 text-center">
              <div class="d-flex justify-content-center gap-1">
                @if(!empty($rawPhone))
                  <a href="https://wa.me/{{ $waPhone }}?text={{ $waMsg }}" target="_blank" class="btn btn-sm btn-outline-success" title="Kirim Notifikasi WhatsApp">
                    <i class="mdi mdi-whatsapp"></i>
                  </a>
                @endif
                <a href="{{ route('pengaduan.cetakPDF', $item->id_pengaduan) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Cetak Dokumen Resmi">
                  <i class="mdi mdi-file-pdf-box"></i>
                </a>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-center py-5 text-muted">
              <i class="mdi mdi-file-document-outline fs-1 d-block mb-2"></i>
              Tidak ada data pengaduan yang sesuai dengan kriteria filter.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($pengaduan->hasPages())
      <div class="p-3 border-top d-flex justify-content-center">
        {{ $pengaduan->withQueryString()->links() }}
      </div>
    @endif
  </div>
</div>
@endsection
