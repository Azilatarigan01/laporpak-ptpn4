@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Tambah Petugas / Bagian Personalia</h3>
        <p class="text-muted mb-0">Buat akun petugas baru untuk tim personalia atau administrator pengelola sistem pengaduan.</p>
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
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-plus me-2 text-success"></i>Formulir Akun Petugas / Personalia</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('admin.insert') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label fw-bold text-dark">Nama Lengkap Petugas <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Contoh: Budi Santoso / Tim Personalia" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-5">
              <label class="form-label fw-bold text-dark">Peran / Bagian</label>
              <select name="jabatan" class="form-select form-select-lg">
                <option value="Bagian Personalia & SDM">Bagian Personalia & SDM</option>
                <option value="Asisten SDM & Umum (APK)">Asisten SDM & Umum (APK)</option>
                <option value="Staf Personalia & Tata Usaha">Staf Personalia & Tata Usaha</option>
                <option value="Administrator Sistem">Administrator Sistem</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Alamat Email Login <span class="text-danger">*</span></label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="personalia@ptpn4.co.id" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Password Akun <span class="text-danger">*</span></label>
              <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Minimal 6 karakter" required>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Foto Profil (Opsional)</label>
              <input type="file" class="form-control form-control-lg @error('profil') is-invalid @enderror" name="profil" accept="image/*">
              @error('profil')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('admin.list') }}" class="btn btn-light border px-4">Batal</a>
              <button type="submit" class="btn btn-primary px-5">
                <i class="mdi mdi-check-circle me-1"></i> Simpan Akun Petugas
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection