@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Tambah Profil Pimpinan Unit</h3>
        <p class="text-muted mb-0">Tambahkan data profil pimpinan/pejabat untuk ditampilkan pada struktur organisasi website resmi PTPN IV.</p>
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
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-plus me-2 text-success"></i>Formulir Profil Pimpinan</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('kepala.insert') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="urutan" value="{{ old('urutan', $suggested_order ?? 1) }}">

          <div class="row g-3">
            <!-- Nama Lengkap & Gelar -->
            <div class="col-md-7">
              <label class="form-label fw-bold text-dark">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Contoh: TRI MANGKURAT, SP" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Jabatan Struktural -->
            <div class="col-md-5">
              <label class="form-label fw-bold text-dark">Jabatan Struktural / Posisi <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" placeholder="Contoh: Manajer Unit / Asisten SDM & Umum" required>
              @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email & Password Akun -->
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Alamat Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="nama@ptpn4.co.id" required>
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

            <!-- Foto Profil -->
            <div class="col-12">
              <label class="form-label fw-bold text-dark">Foto Profil Pimpinan (JPG/PNG/WEBP, Maks 2MB)</label>
              <input type="file" class="form-control form-control-lg @error('profil') is-invalid @enderror" name="profil" id="profilInput" accept="image/*">
              <small class="text-muted">Disarankan menggunakan foto formal jas/seragam dinas BUMN dengan rasio persegi/potret.</small>
              @error('profil')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Deskripsi / Quote Pimpinan -->
            <div class="col-12">
              <label class="form-label fw-bold text-dark">Motto / Pesan Kepemimpinan</label>
              <textarea class="form-control @error('deskripsi_jabatan') is-invalid @enderror" name="deskripsi_jabatan" rows="3" placeholder="Contoh: Mengedepankan integritas, produktivitas, dan pelayanan prima bagi kemakmuran insan perkebunan PTPN IV.">{{ old('deskripsi_jabatan') }}</textarea>
              @error('deskripsi_jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Preview Foto -->
            <div class="col-12 text-center my-2 d-none" id="previewContainer">
              <p class="small text-muted mb-1">Pratinjau Foto:</p>
              <img id="imgPreview" src="#" alt="Preview" class="rounded-circle shadow-sm border" style="width: 100px; height: 100px; object-fit: cover;">
            </div>

            <!-- Tombol Simpan -->
            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('kepala.list') }}" class="btn btn-light border px-4">Batal</a>
              <button type="submit" class="btn btn-primary px-5">
                <i class="mdi mdi-content-save me-1"></i> Simpan Profil Pimpinan
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
  document.getElementById('profilInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById('imgPreview').src = event.target.result;
        document.getElementById('previewContainer').classList.remove('d-none');
      }
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection