@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Struktur Manajemen & Profil Pimpinan</h3>
        <p class="text-muted mb-0">Kelola profil pimpinan dan struktural organisasi yang ditampilkan pada profil website resmi PTPN IV Kebun Dolok Sinumbah (Total: {{ $getRecord->total() }} Pimpinan)</p>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a class="btn btn-primary" href="{{ route('kepala.add') }}">
          <i class="mdi mdi-account-plus me-1"></i> Tambah Profil Pimpinan
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-tie me-2 text-success"></i>Daftar Pimpinan & Manajemen Unit</h5>
    <a href="{{ url('/#leadership') }}" target="_blank" class="btn btn-sm btn-outline-success">
      <i class="mdi mdi-open-in-new me-1"></i> Lihat Tampilan di Website
    </a>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th style="width: 60px;" class="text-center">No</th>
            <th>Pimpinan / Pejabat</th>
            <th>Jabatan / Posisi Struktural</th>
            <th>Motto / Keterangan</th>
            <th>Email</th>
            <th class="text-center" style="width: 130px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($getRecord as $index => $value)
            <tr class="align-middle">
              <td class="text-center text-muted fw-bold">
                {{ $getRecord->firstItem() + $index }}
              </td>
              <td>
                <div class="d-flex align-items-center">
                  @if($value->profil && file_exists(public_path('uploads/profiles/' . $value->profil)))
                    <img src="{{ asset('uploads/profiles/' . $value->profil) }}" alt="{{ $value->name }}" class="rounded-circle me-3 shadow-sm border" style="width: 48px; height: 48px; object-fit: cover;">
                  @else
                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-3 shadow-sm font-weight-bold" style="width: 48px; height: 48px; font-size: 1.15rem;">
                      {{ strtoupper(substr($value->name, 0, 1)) }}
                    </div>
                  @endif
                  <div>
                    <h6 class="mb-0 fw-bold text-dark">{{ $value->name }}</h6>
                    <small class="text-muted"><i class="mdi mdi-office-building text-success me-1"></i>PTPN IV Kebun Dolok Sinumbah</small>
                  </div>
                </div>
              </td>
              <td>
                <span class="badge bg-light text-success border border-success border-opacity-25 fw-bold px-3 py-1">
                  {{ $value->jabatan ?: 'Kepala Bagian / Pimpinan' }}
                </span>
              </td>
              <td>
                @if($value->deskripsi_jabatan)
                  <div class="text-muted small" style="max-width: 280px; font-style: italic;">
                    "{{ $value->deskripsi_jabatan }}"
                  </div>
                @else
                  <span class="text-muted small">-</span>
                @endif
              </td>
              <td class="text-muted">{{ $value->email }}</td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-1">
                  <a href="{{ route('kepala.edit', $value->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Profil Pimpinan">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  <form action="{{ route('kepala.delete', $value->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data profil {{ $value->name }}?')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Profil">
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
                <p class="mb-0 fw-semibold">Belum ada data pimpinan.</p>
                <a href="{{ route('kepala.add') }}" class="btn btn-sm btn-primary mt-2">Tambah Profil Pertama</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($getRecord->hasPages())
      <div class="p-3 border-top d-flex justify-content-center">
        {{ $getRecord->links() }}
      </div>
    @endif
  </div>
</div>
@endsection
