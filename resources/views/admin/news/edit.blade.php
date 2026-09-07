@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Edit Artikel Berita</h3>
        <p class="text-muted mb-0">Perbarui judul, isi, atau foto artikel berita.</p>
      </div>
      <a href="{{ route('news.list') }}" class="btn btn-outline-secondary">
        <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Daftar
      </a>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-10">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white py-3 px-4">
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-pencil-outline me-2 text-success"></i>Edit Berita: {{ $news->title }}</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('news.update', $news->id_berita) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-bold text-dark">Judul Berita <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" value="{{ old('title', $news->title) }}" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Nama Penulis / Humas <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('author') is-invalid @enderror" name="author" value="{{ old('author', $news->author) }}" required>
              @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Ganti Foto Berita (Opsional, JPG/PNG/WEBP, Maks 2MB)</label>
              <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror" name="image" accept="image/*">
              @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            @if($news->image && (file_exists(public_path($news->image)) || file_exists(public_path('storage/' . $news->image))))
              <div class="col-12 my-2">
                <small class="text-muted d-block mb-1">Foto Berita Saat Ini:</small>
                <img src="{{ asset(file_exists(public_path($news->image)) ? $news->image : 'storage/' . $news->image) }}" alt="{{ $news->title }}" class="rounded shadow-sm border" style="max-height: 140px; object-fit: cover;">
              </div>
            @endif

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Ringkasan / Paragraf Pembuka (Intro)</label>
              <textarea class="form-control" name="intro" rows="2">{{ old('intro', $news->intro) }}</textarea>
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Isi Berita Utama <span class="text-danger">*</span></label>
              <textarea class="form-control @error('main') is-invalid @enderror" name="main" rows="8" required>{{ old('main', $news->main) }}</textarea>
              @error('main')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Kutipan Pernyataan (Quote)</label>
              <textarea class="form-control" name="quote" rows="2">{{ old('quote', $news->quote) }}</textarea>
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Kesimpulan / Penutup</label>
              <textarea class="form-control" name="conclusion" rows="2">{{ old('conclusion', $news->conclusion) }}</textarea>
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('news.list') }}" class="btn btn-light border px-4">Batal</a>
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