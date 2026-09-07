@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Berita & Informasi Perusahaan</h3>
        <p class="text-muted mb-0">Kelola artikel publikasi, rilis pers, dan kegiatan PTPN IV Kebun Dolok Sinumbah.</p>
      </div>
      <div>
        <a class="btn btn-primary" href="{{ route('news.add') }}">
          <i class="mdi mdi-plus-circle me-1"></i> Tulis Berita Baru
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-newspaper-variant-outline me-2 text-success"></i>Daftar Berita Terpublikasi</h5>
    <span class="badge bg-light text-dark border">Total: {{ $news->total() }} Berita</span>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4" style="width: 60px;">No</th>
            <th>Gambar</th>
            <th>Judul Berita</th>
            <th>Penulis</th>
            <th>Tanggal Publikasi</th>
            <th class="text-center pe-4" style="width: 140px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($news as $index => $item)
          <tr>
            <td class="ps-4 fw-bold text-muted">{{ $news->firstItem() + $index }}</td>
            <td style="width: 90px;">
              @if($item->image && file_exists(public_path($item->image)))
                <img src="{{ asset($item->image) }}" class="rounded shadow-sm border" style="width: 70px; height: 50px; object-fit: cover;">
              @elseif($item->image && file_exists(public_path('storage/' . $item->image)))
                <img src="{{ asset('storage/' . $item->image) }}" class="rounded shadow-sm border" style="width: 70px; height: 50px; object-fit: cover;">
              @else
                <div class="bg-light text-muted rounded border d-flex align-items-center justify-content-center" style="width: 70px; height: 50px; font-size: 0.75rem;">
                  <i class="mdi mdi-image-off"></i>
                </div>
              @endif
            </td>
            <td>
              <h6 class="mb-1 fw-bold text-dark">{{ $item->title }}</h6>
              <p class="text-muted small mb-0 text-truncate" style="max-width: 450px;">{{ \Illuminate\Support\Str::limit(strip_tags($item->intro ?: $item->main), 100) }}</p>
            </td>
            <td>
              <span class="badge bg-light text-dark border">{{ $item->author }}</span>
            </td>
            <td>
              <span class="text-muted small">{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</span>
            </td>
            <td class="text-center pe-4">
              <div class="d-flex justify-content-center gap-1">
                <a href="{{ route('news.edit', $item->id_berita) }}" class="btn btn-sm btn-outline-warning" title="Edit Berita">
                  <i class="mdi mdi-pencil"></i>
                </a>
                <form action="{{ route('news.destroy', $item->id_berita) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Berita">
                    <i class="mdi mdi-trash-can-outline"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">Belum ada berita terpublikasi.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($news->hasPages())
      <div class="p-3 border-top d-flex justify-content-center">
        {{ $news->links() }}
      </div>
    @endif
  </div>
</div>
@endsection
