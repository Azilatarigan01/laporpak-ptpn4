@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Edit Data Pimpinan</h3>
        <p class="text-muted mb-0">Perbarui informasi pimpinan, jabatan, foto profil, dan urutan hierarki.</p>
      </div>
      <a href="{{ route('kepala.list') }}" class="btn btn-outline-secondary">
        <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Daftar
      </a>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-10">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white py-3 px-4">
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-edit me-2 text-success"></i>Edit Data: {{ $getRecord->name }}</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('kepala.update', $getRecord->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <!-- Nama Lengkap & Gelar -->
            <div class="col-md-7">
              <label class="form-label fw-bold text-dark">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name', $getRecord->name) }}" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Jabatan Struktural -->
            <div class="col-md-5">
              <label class="form-label fw-bold text-dark">Jabatan Struktural <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan', $getRecord->jabatan) }}" placeholder="Contoh: Manager Unit / Asisten Kepala" required>
              @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email & Password -->
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Alamat Email Login <span class="text-danger">*</span></label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email', $getRecord->email) }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Ganti Password (Kosongkan jika tidak diubah)</label>
              <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password baru jika ingin mengganti">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Urutan Hierarki -->
            <div class="col-md-4">
              <label class="form-label fw-bold text-dark">Tingkat Urutan Hierarki <span class="text-danger">*</span></label>
              <input type="number" class="form-control form-control-lg @error('urutan') is-invalid @enderror" name="urutan" value="{{ old('urutan', $getRecord->urutan ?? 1) }}" min="1" required>
              <small class="text-muted">Urutan 1 = Posisi Teratas</small>
              @error('urutan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Foto Profil -->
            <div class="col-md-8">
              <label class="form-label fw-bold text-dark">Ganti Foto Profil (JPG/PNG/WEBP, Maks 2MB)</label>
              <input type="file" class="form-control form-control-lg @error('profil') is-invalid @enderror" name="profil" id="profilInput" accept="image/*">
              @error('profil')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Deskripsi / Quote Pimpinan -->
            <div class="col-12">
              <label class="form-label fw-bold text-dark">Kutipan / Motto Kepemimpinan</label>
              <textarea class="form-control @error('deskripsi_jabatan') is-invalid @enderror" name="deskripsi_jabatan" rows="3" placeholder="Motto kepemimpinan...">{{ old('deskripsi_jabatan', $getRecord->deskripsi_jabatan) }}</textarea>
              @error('deskripsi_jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Foto Saat Ini & Preview -->
            <div class="col-12 text-center my-2">
              <p class="small text-muted mb-2">Foto Saat Ini / Pratinjau:</p>
              @if($getRecord->profil && file_exists(public_path('uploads/profiles/' . $getRecord->profil)))
                <img id="imgPreview" src="{{ asset('uploads/profiles/' . $getRecord->profil) }}" alt="{{ $getRecord->name }}" class="rounded-circle shadow-sm border" style="width: 90px; height: 90px; object-fit: cover;">
              @else
                <div id="imgPlaceholder" class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center shadow-sm mx-auto mb-2" style="width: 90px; height: 90px; font-size: 2rem; font-weight: 700;">
                  {{ strtoupper(substr($getRecord->name, 0, 1)) }}
                </div>
                <img id="imgPreview" src="#" alt="Preview" class="rounded-circle shadow-sm border d-none mx-auto" style="width: 90px; height: 90px; object-fit: cover;">
              @endif
            </div>

            <!-- Tombol Simpan -->
            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('kepala.list') }}" class="btn btn-light border px-4">Batal</a>
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

@section('scripts')
<script>
  document.getElementById('profilInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('imgPreview');
        const placeholder = document.getElementById('imgPlaceholder');
        preview.src = e.target.result;
        preview.classList.remove('d-none');
        if (placeholder) placeholder.classList.add('d-none');
      }
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection