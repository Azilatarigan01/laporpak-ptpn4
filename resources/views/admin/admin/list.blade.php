@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Daftar Administrator Sistem</h3>
        <p class="text-muted mb-0">Kelola akun administrator dengan hak akses penuh ke seluruh modul sistem pengaduan.</p>
      </div>
      <div>
        <a class="btn btn-primary" href="{{ route('admin.add') }}">
          <i class="mdi mdi-account-plus me-1"></i> Tambah Admin Baru
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-shield-account-outline me-2 text-success"></i>Daftar Akun Admin</h5>
    <span class="badge bg-light text-dark border">Total: {{ $getRecord->total() }} Admin</span>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4" style="width: 60px;">No</th>
            <th>Administrator</th>
            <th>Email</th>
            <th>Tanggal Terdaftar</th>
            <th class="text-center pe-4" style="width: 140px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($getRecord as $index => $value)
          <tr>
            <td class="ps-4 fw-bold text-muted">{{ $getRecord->firstItem() + $index }}</td>
            <td>
              <div class="d-flex align-items-center">
                @if($value->profil && file_exists(public_path('uploads/profiles/' . $value->profil)))
                  <img src="{{ asset('uploads/profiles/' . $value->profil) }}" alt="{{ $value->name }}" class="rounded-circle me-3 shadow-sm border" style="width: 44px; height: 44px; object-fit: cover;">
                @else
                  <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-3 shadow-sm fw-bold" style="width: 44px; height: 44px; font-size: 1.1rem;">
                    {{ strtoupper(substr($value->name, 0, 1)) }}
                  </div>
                @endif
                <div>
                  <h6 class="mb-0 fw-bold text-dark">{{ $value->name }}</h6>
                  @if($value->id == Auth::id())
                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25" style="font-size: 0.72rem;">Akun Anda</span>
                  @else
                    <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">Admin</span>
                  @endif
                </div>
              </div>
            </td>
            <td class="text-muted">{{ $value->email }}</td>
            <td class="text-muted small">{{ $value->created_at ? $value->created_at->format('d M Y') : '-' }}</td>
            <td class="text-center pe-4">
              <div class="d-flex justify-content-center gap-1">
                <a href="{{ route('admin.edit', $value->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Admin">
                  <i class="mdi mdi-pencil"></i>
                </a>
                @if($value->id != Auth::id())
                <form action="{{ route('admin.delete', $value->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun admin {{ $value->name }}?')" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Admin">
                    <i class="mdi mdi-trash-can-outline"></i>
                  </button>
                </form>
                @endif
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center py-5 text-muted">Belum ada akun admin.</td>
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
