@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Daftar Karyawan</h3>
        <p class="text-muted mb-0">Data induk seluruh staf & karyawan unit kerja PTPN IV Dolok Sinumbah.</p>
      </div>
      <div class="mt-3 mt-md-0 d-flex align-items-center gap-2">
        <span class="badge bg-white border shadow-sm px-3 py-2 text-dark">
          <i class="mdi mdi-account-group me-1 text-success"></i> Total: <strong>{{ $karyawan->total() }}</strong> Karyawan
        </span>
      </div>
    </div>
  </div>
</div>

<div class="card card-custom border-0 shadow-sm">
  <div class="card-header bg-white border-bottom py-3 px-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div class="d-flex align-items-center gap-2">
      <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-box-multiple-outline me-2 text-success"></i>Data Personalia</h5>
    </div>

    <!-- Search -->
    <form method="GET" action="{{ route('karyawan.search') }}" class="d-flex align-items-center" style="max-width: 380px; width: 100%;">
      <div class="input-group">
        <span class="input-group-text bg-light border-end-0 text-muted"><i class="mdi mdi-magnify"></i></span>
        <input type="text" name="q" class="form-control border-start-0 ps-0 bg-light" 
               placeholder="Cari nama, NIK, atau posisi..." 
               value="{{ request('q') }}">
        @if(request('q'))
          <a href="{{ route('kepala.karyawan.list') }}" class="btn btn-light border border-start-0 text-muted">
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
            <th class="ps-4" style="width: 50px;">No</th>
            <th>Nama Karyawan</th>
            <th>NIKSAP</th>
            <th>Area & Realisasi</th>
            <th>Posisi / Jabatan</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($karyawan as $index => $item)
          <tr>
            <td class="ps-4 fw-medium text-muted">{{ $karyawan->firstItem() + $index }}</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center me-3 fw-bold border border-success border-opacity-25" style="width: 40px; height: 40px;">
                  {{ strtoupper(substr($item->nama_karyawan, 0, 1)) }}
                </div>
                <div>
                  <h6 class="mb-0 fw-semibold text-dark">{{ $item->nama_karyawan }}</h6>
                </div>
              </div>
            </td>
            <td>
              <span class="badge bg-light text-dark font-monospace border px-2 py-1">{{ $item->niksap ?? '-' }}</span>
            </td>
            <td>
              <span class="fw-medium text-dark">{{ $item->posisi->realisasi->area->nama_area ?? '-' }}</span>
              <br><small class="text-muted">{{ $item->posisi->realisasi->nama_realisasi ?? '-' }}</small>
            </td>
            <td>
              <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-1 rounded-pill fw-medium">
                {{ $item->posisi->nama_posisi ?? '-' }}
              </span>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center py-5 text-muted">
              <i class="mdi mdi-account-search-outline fs-1 d-block mb-2 text-secondary opacity-50"></i>
              @if(request('q'))
                Tidak ada data karyawan yang sesuai dengan kata kunci "<strong>{{ request('q') }}</strong>".
              @else
                Belum ada data karyawan terdaftar.
              @endif
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($karyawan->hasPages())
    <div class="d-flex justify-content-center p-3 border-top">
      {{ $karyawan->links() }}
    </div>
    @endif
  </div>
</div>
@endsection
