@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1 font-display">Dashboard Pimpinan / Kepala Bagian</h3>
        <p class="text-muted mb-0">Selamat datang di Panel Kepemimpinan. Pantau dan tindak lanjuti aspirasi karyawan di unit kerja Anda secara transparan.</p>
      </div>
      <div>
        <a href="{{ route('kepala.pengaduan.list') }}" class="btn btn-success shadow-sm rounded-pill px-4">
          <i class="bi bi-file-earmark-check me-1"></i> Tindak Lanjut Pengaduan
        </a>
      </div>
    </div>
  </div>
</div>

<!-- 3 Stat Cards -->
<div class="row g-4 mb-4">
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #071e13 0%, #0d2818 100%); color: #ffffff; border-radius: 20px;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-white-50 small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Total Pengaduan</p>
            <h2 class="mb-0 fw-bold text-white">{{ $totalPengaduan }}</h2>
            <small class="text-white-50">Laporan masuk unit</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: rgba(82, 183, 136, 0.2); border: 1px solid rgba(116, 198, 157, 0.4);">
            <i class="bi bi-inbox-fill fs-3 text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #b45309 0%, #78350f 100%); color: #ffffff; border-radius: 20px;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-white-50 small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Perlu Ditangani (Proses)</p>
            <h2 class="mb-0 fw-bold text-white">{{ $statusDalamProses + $statusDiterima }}</h2>
            <small class="text-white-50">Menunggu respon / tindak lanjut</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: rgba(255, 255, 255, 0.18);">
            <i class="bi bi-hourglass-split fs-3 text-white"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color: #ffffff; border-radius: 20px;">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p class="mb-1 text-white-50 small fw-bold text-uppercase" style="letter-spacing: 0.06em;">Tuntas (Selesai)</p>
            <h2 class="mb-0 fw-bold text-white">{{ $statusSelesai }}</h2>
            <small class="text-white-50">Telah diselesaikan</small>
          </div>
          <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: rgba(255, 255, 255, 0.18);">
            <i class="bi bi-check-circle-fill fs-3 text-white"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Complaints Table -->
<div class="card shadow-sm border-0" style="border-radius: 20px;">
  <div class="card-header bg-white py-4 px-4 d-flex justify-content-between align-items-center">
    <div>
      <h5 class="fw-bold text-dark mb-0"><i class="bi bi-clipboard-pulse me-2 text-success"></i>Pengaduan Terbaru untuk Ditindaklanjuti</h5>
      <small class="text-muted">Daftar aspirasi karyawan yang membutuhkan verifikasi atau tanggapan Anda</small>
    </div>
    <a href="{{ route('kepala.pengaduan.list') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
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
              <span class="badge bg-light text-dark font-monospace border fw-bold">{{ $item->kode_pengaduan }}</span>
            </td>
            <td>
              <div class="fw-semibold text-dark">{{ $item->posisi->nama_posisi ?? '-' }}</div>
              <small class="text-muted">{{ $item->posisi->realisasi->area->nama_area ?? '' }}</small>
            </td>
            <td class="text-muted small">{{ $item->tgl_pengaduan ? $item->tgl_pengaduan->format('d M Y, H:i') : '-' }}</td>
            <td class="text-center">
              @if($item->status == 'Diterima')
                <span class="badge" style="background-color: #dcfce7; color: #166534; border: 1px solid #86efac;">Diterima</span>
              @elseif($item->status == 'Dalam Proses')
                <span class="badge" style="background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a;">Dalam Proses</span>
              @elseif($item->status == 'Selesai')
                <span class="badge" style="background-color: #e0f2fe; color: #075985; border: 1px solid #bae6fd;">Selesai</span>
              @endif
            </td>
            <td class="text-center pe-4">
              <a href="{{ route('kepala.pengaduan.list') }}" class="btn btn-sm btn-success rounded-pill px-3">
                <i class="bi bi-pencil-square me-1"></i> Tanggapi
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">
              <i class="bi bi-clipboard-check fs-1 mb-2 d-block text-muted"></i>
              Belum ada data pengaduan yang masuk.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection