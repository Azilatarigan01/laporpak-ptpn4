@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Data Master Karyawan</h3>
        <p class="text-muted mb-0">Kelola basis data seluruh karyawan PTPN IV Kebun Dolok Sinumbah (Total: {{ $totalKaryawan }} Orang)</p>
      </div>
      <div>
        <a class="btn btn-primary" href="{{ route('karyawan.add') }}">
          <i class="mdi mdi-account-plus me-1"></i> Tambah Karyawan Baru
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-group-outline me-2 text-success"></i>Daftar Karyawan</h5>

    <!-- Search Form -->
    <form method="GET" action="{{ route('karyawan.search') }}" class="d-flex align-items-center" style="max-width: 380px; width: 100%;">
      <div class="input-group">
        <span class="input-group-text bg-light border-end-0 text-muted"><i class="mdi mdi-magnify"></i></span>
        <input type="text" name="q" class="form-control border-start-0 ps-0 bg-light" 
               placeholder="Cari nama, NIK, atau posisi..." 
               value="{{ request('q') ?? ($query ?? '') }}">
        @if(request('q') || !empty($query))
          <a href="{{ route('karyawan.list') }}" class="btn btn-light border border-start-0 text-muted">
            <i class="mdi mdi-close"></i>
          </a>
        @endif
        <button class="btn btn-success" type="submit">Cari</button>
      </div>
    </form>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4" style="width: 60px;">No</th>
            <th>Nama Karyawan</th>
            <th>NIKSAP / NIK</th>
            <th>Posisi / Jabatan</th>
            <th>Area Kerja & Realisasi</th>
            <th class="text-center pe-4" style="width: 140px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($karyawan as $index => $item)
          <tr>
            <td class="ps-4 fw-bold text-muted">{{ $karyawan->firstItem() + $index }}</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-light text-success border d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px;">
                  {{ strtoupper(substr($item->nama_karyawan, 0, 1)) }}
                </div>
                <div>
                  <h6 class="mb-0 fw-bold text-dark">{{ $item->nama_karyawan }}</h6>
                  <small class="text-muted">Karyawan Unit Dolok Sinumbah</small>
                </div>
              </div>
            </td>
            <td>
              <span class="badge bg-light text-dark font-monospace border fw-bold px-2 py-1">{{ $item->niksap }}</span>
            </td>
            <td>
              <span class="text-dark fw-semibold">{{ $item->posisi->nama_posisi ?? '-' }}</span>
            </td>
            <td>
              <span class="text-muted small">
                <i class="mdi mdi-map-marker me-1 text-success"></i>{{ $item->posisi->realisasi->area->nama_area ?? '-' }} &bull; {{ $item->posisi->realisasi->nama_realisasi ?? '-' }}
              </span>
            </td>
            <td class="text-center pe-4">
              <div class="d-flex justify-content-center gap-1">
                <a href="{{ route('karyawan.edit', $item->id_karyawan) }}" class="btn btn-sm btn-outline-warning" title="Edit Karyawan">
                  <i class="mdi mdi-pencil"></i>
                </a>
                <form action="{{ route('karyawan.delete', $item->id_karyawan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data karyawan {{ $item->nama_karyawan }}?')" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Karyawan">
                    <i class="mdi mdi-trash-can-outline"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">
              <i class="mdi mdi-account-off-outline mb-2" style="font-size: 3rem;"></i>
              <p class="mb-0 fw-semibold">Tidak ada data karyawan yang ditemukan.</p>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($karyawan->hasPages())
      <div class="p-3 border-top d-flex justify-content-center">
        {{ $karyawan->links() }}
      </div>
    @endif
  </div>
</div>
@endsection
