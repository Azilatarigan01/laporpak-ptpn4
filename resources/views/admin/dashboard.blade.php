@extends('layouts.app')

@section('container')
<!-- Top Welcome Greeting Box in Content Area -->
<div class="row mb-4">
  <div class="col-12">
    <div class="card border-0 shadow-sm p-4 text-white" style="background: linear-gradient(135deg, #071e13 0%, #0d2818 50%, #133c24 100%); border-radius: 20px; position: relative; overflow: hidden;">
      <div class="position-relative" style="z-index: 2;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
          <div>
            <div class="d-flex align-items-center gap-2 mb-2">
              <span class="badge bg-success bg-opacity-25 text-light border border-success border-opacity-50 px-3 py-1 rounded-pill fw-bold">
                <i class="bi bi-shield-check me-1"></i> Panel Administrator Sistem
              </span>
              <span class="badge bg-white bg-opacity-10 text-light px-3 py-1 rounded-pill small">
                <i class="bi bi-calendar3 me-1"></i> <span id="heroLiveDate">{{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('l, d F Y') }}</span>
              </span>
            </div>
            <h2 class="fw-bold text-white mb-1 font-display">Halo, {{ Auth::user()->name }} 👋</h2>
            <p class="text-white-50 mb-0" style="font-size: 0.95rem;">Selamat datang di Panel Utama Lapor Pak! — Pantau dan kelola aspirasi karyawan Kebun Dolok Sinumbah secara terpadu dan real-time.</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <a href="{{ route('pengaduan.add') }}" class="btn btn-outline-light px-3 py-2 rounded-pill fw-bold text-nowrap">
              <i class="bi bi-plus-circle me-1"></i> Tambah Pengaduan
            </a>
            <a href="{{ route('pengaduan.list') }}" class="btn btn-success shadow px-4 py-2 rounded-pill fw-bold text-nowrap">
              <i class="bi bi-file-earmark-text me-1"></i> Data Pengaduan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 4 Executive Stat Cards -->
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm h-100" style="background: #ffffff; border-radius: 20px; border-left: 5px solid #2d6a4f !important;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-muted small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Total Pengaduan</p>
            <h2 class="mb-1 fw-bold text-dark">{{ $totalPengaduan }}</h2>
            <small class="text-success fw-semibold"><i class="bi bi-arrow-up-right me-1"></i>Seluruh laporan masuk</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background: #f0fdf4; border: 1px solid #bbf7d0;">
            <i class="bi bi-inbox-fill fs-3 text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm h-100" style="background: #ffffff; border-radius: 20px; border-left: 5px solid #0284c7 !important;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-muted small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Pengaduan Selesai</p>
            <h2 class="mb-1 fw-bold text-dark">{{ $statusSelesai }}</h2>
            <small class="text-info fw-semibold"><i class="bi bi-check2-all me-1"></i>{{ $persenSelesai }}% tertangani tuntas</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background: #f0f9ff; border: 1px solid #bae6fd;">
            <i class="bi bi-check-circle-fill fs-3 text-info"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm h-100" style="background: #ffffff; border-radius: 20px; border-left: 5px solid #b45309 !important;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-muted small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Dalam Proses</p>
            <h2 class="mb-1 fw-bold text-dark">{{ $statusDalamProses }}</h2>
            <small class="text-warning fw-semibold"><i class="bi bi-hourglass-split me-1"></i>{{ $persenDalamProses }}% ditindaklanjuti</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background: #fffbeb; border: 1px solid #fde68a;">
            <i class="bi bi-hourglass-bottom fs-3 text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm h-100" style="background: #ffffff; border-radius: 20px; border-left: 5px solid #15803d !important;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-muted small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Total Karyawan</p>
            <h2 class="mb-1 fw-bold text-dark">{{ $totalKaryawan }}</h2>
            <small class="text-muted fw-semibold">&bull; {{ $totalPimpinan }} Pimpinan Aktif</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background: #f0fdf4; border: 1px solid #bbf7d0;">
            <i class="bi bi-people-fill fs-3 text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Progress Bar Distribusi Status -->
<div class="card shadow-sm border-0 mb-4" style="border-radius: 20px;">
  <div class="card-body p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h5 class="fw-bold text-dark mb-1"><i class="bi bi-bar-chart-fill text-success me-2"></i>Distribusi Rasio Penyelesaian Laporan</h5>
        <small class="text-muted">Persentase penanganan aspirasi karyawan kebun Dolok Sinumbah</small>
      </div>
      <span class="badge bg-light text-dark border px-3 py-2">Total: {{ $totalPengaduan }} Laporan</span>
    </div>
    <div class="progress mb-3" style="height: 14px; border-radius: 10px; background-color: #f1f5f9;">
      <div class="progress-bar bg-info" role="progressbar" style="width: {{ $persenSelesai }}%" title="Selesai: {{ $persenSelesai }}%"></div>
      <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $persenDalamProses }}%" title="Dalam Proses: {{ $persenDalamProses }}%"></div>
      <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persenDiterima }}%" title="Diterima: {{ $persenDiterima }}%"></div>
    </div>
    <div class="d-flex justify-content-between flex-wrap gap-2 small text-muted">
      <span><span class="badge bg-info text-white me-1">&bull;</span> Selesai Ditangani: <strong>{{ $statusSelesai }}</strong> ({{ $persenSelesai }}%)</span>
      <span><span class="badge bg-warning text-dark me-1">&bull;</span> Sedang Proses: <strong>{{ $statusDalamProses }}</strong> ({{ $persenDalamProses }}%)</span>
      <span><span class="badge bg-success me-1">&bull;</span> Baru Diterima: <strong>{{ $statusDiterima }}</strong> ({{ $persenDiterima }}%)</span>
    </div>
  </div>
</div>

<!-- Recent Complaints Table -->
<div class="card shadow-sm border-0" style="border-radius: 20px;">
  <div class="card-header bg-white py-4 px-4 d-flex justify-content-between align-items-center">
    <div>
      <h5 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history me-2 text-success"></i>Pengaduan Karyawan Terbaru</h5>
      <small class="text-muted">Daftar laporan aspirasi terbaru yang masuk ke sistem</small>
    </div>
    <a href="{{ route('pengaduan.list') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
      Lihat Semua Data <i class="bi bi-arrow-right ms-1"></i>
    </a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4">Pelapor & NIKSAP</th>
            <th>Nomor Tiket</th>
            <th>Posisi & Afdeling</th>
            <th>Waktu Laporan</th>
            <th class="text-center">Status</th>
            <th class="text-center pe-4">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pengaduan as $item)
          <tr>
            <td class="ps-4">
              <h6 class="mb-0 fw-bold text-dark">{{ $item->karyawan->nama_karyawan ?? 'Karyawan' }}</h6>
              <small class="text-muted">NIK: {{ $item->niksap }}</small>
            </td>
            <td>
              <span class="badge bg-light text-dark border font-monospace">{{ $item->kode_pengaduan }}</span>
            </td>
            <td>
              <div class="fw-semibold text-dark">{{ $item->posisi->nama_posisi ?? '-' }}</div>
              <small class="text-muted">{{ $item->realisasi->nama_realisasi ?? '-' }} &bull; {{ $item->area->nama_area ?? '-' }}</small>
            </td>
            <td>
              <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>{{ $item->tgl_pengaduan ? \Carbon\Carbon::parse($item->tgl_pengaduan)->isoFormat('D MMM Y, HH:mm') : '-' }}</small>
            </td>
            <td class="text-center">
              @if($item->status == 'Selesai')
                <span class="badge bg-info text-white"><i class="bi bi-check-circle me-1"></i>Selesai</span>
              @elseif($item->status == 'Sedang Proses')
                <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Dalam Proses</span>
              @else
                <span class="badge bg-success"><i class="bi bi-inbox me-1"></i>Diterima</span>
              @endif
            </td>
            <td class="text-center pe-4">
              <div class="btn-group">
                <a href="{{ route('pengaduan.cetakPDF', $item->id_pengaduan) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="Cetak PDF">
                  <i class="bi bi-printer"></i>
                </a>
                <a href="{{ route('pengaduan.list') }}" class="btn btn-sm btn-outline-success" title="Kelola Pengaduan">
                  <i class="bi bi-pencil-square"></i>
                </a>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">
              <i class="bi bi-inbox fs-1 text-secondary d-block mb-2"></i>
              Belum ada pengaduan terbaru yang masuk.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection