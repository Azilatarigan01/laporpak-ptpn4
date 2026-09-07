@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <h3 class="fw-bold text-dark mb-1">Profil Saya</h3>
    <p class="text-muted mb-0">Kelola informasi akun Administrator Anda, perbarui foto profil, dan ubah password login.</p>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white py-3 px-4">
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-cog me-2 text-success"></i>Pengaturan Akun Administrator</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('update_admin_account', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-12 text-center mb-3">
              @if($user->profil && file_exists(public_path('uploads/profiles/' . $user->profil)))
                <img id="myImgPreview" src="{{ asset('uploads/profiles/' . $user->profil) }}" alt="{{ $user->name }}" class="rounded-circle shadow-sm border mb-2" style="width: 100px; height: 100px; object-fit: cover;">
              @else
                <div id="myImgPlaceholder" class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center shadow-sm mx-auto mb-2 font-weight-bold" style="width: 100px; height: 100px; font-size: 2.2rem;">
                  {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <img id="myImgPreview" src="#" alt="Preview" class="rounded-circle shadow-sm border mb-2 d-none mx-auto" style="width: 100px; height: 100px; object-fit: cover;">
              @endif
              <h5 class="fw-bold text-dark mb-0">{{ $user->name }}</h5>
              <span class="badge bg-light text-success border border-success mt-1">Administrator</span>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Alamat Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Ganti Foto Profil (JPG/PNG/WEBP, Maks 2MB)</label>
              <input type="file" class="form-control form-control-lg @error('profil') is-invalid @enderror" name="profil" id="myProfilInput" accept="image/*">
              @error('profil')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Ganti Password (Opsional)</label>
              <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password baru">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Konfirmasi Password Baru</label>
              <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Ulangi password baru">
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <button type="submit" class="btn btn-primary px-5">
                <i class="mdi mdi-check-circle me-1"></i> Simpan Profil Saya
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.getElementById('myProfilInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('myImgPreview');
        const placeholder = document.getElementById('myImgPlaceholder');
        preview.src = e.target.result;
        preview.classList.remove('d-none');
        if (placeholder) placeholder.classList.add('d-none');
      }
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection