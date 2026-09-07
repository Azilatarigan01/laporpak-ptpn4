@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Edit Akun Administrator</h3>
        <p class="text-muted mb-0">Perbarui data admin, email, dan kata sandi login.</p>
      </div>
      <a href="{{ route('admin.list') }}" class="btn btn-outline-secondary">
        <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Daftar
      </a>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white py-3 px-4">
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-edit me-2 text-success"></i>Edit Admin: {{ $getRecord->name }}</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('admin.update', $getRecord->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-bold text-dark">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name', $getRecord->name) }}" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Alamat Email Login <span class="text-danger">*</span></label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email', $getRecord->email) }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Ganti Password (Kosongkan jika tidak diubah)</label>
              <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password baru">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Foto Profil Baru (Opsional)</label>
              <input type="file" class="form-control form-control-lg @error('profil') is-invalid @enderror" name="profil" accept="image/*">
              @error('profil')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            @if($getRecord->profil && file_exists(public_path('uploads/profiles/' . $getRecord->profil)))
              <div class="col-12 text-center my-2">
                <small class="text-muted d-block mb-1">Foto Profil Saat Ini:</small>
                <img src="{{ asset('uploads/profiles/' . $getRecord->profil) }}" alt="{{ $getRecord->name }}" class="rounded-circle shadow-sm border" style="width: 80px; height: 80px; object-fit: cover;">
              </div>
            @endif

            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('admin.list') }}" class="btn btn-light border px-4">Batal</a>
              <button type="submit" class="btn btn-primary px-5">
                <i class="mdi mdi-check-circle me-1"></i> Simpan Perubahan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection