@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Manajemen Pengaduan & Aspirasi Karyawan</h3>
        <p class="text-muted mb-0">Kelola, verifikasi, dan tindak lanjuti laporan aspirasi karyawan PTPN IV Regional II Dolok Sinumbah.</p>
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="badge bg-white border shadow-sm px-3 py-2 text-dark fs-6">
          <i class="mdi mdi-inbox-multiple me-1 text-success"></i> Total: <strong>{{ $pengaduan->total() }}</strong> Pengaduan
        </span>
      </div>
    </div>
  </div>
</div>

<!-- Filter Tabs -->
<div class="d-flex flex-wrap gap-2 mb-3">
  <a href="{{ route('pengaduan.list') }}" class="btn btn-sm {{ !request('status') && !request('q') ? 'btn-success' : 'btn-light border text-dark' }}">
    Semua Pengaduan
  </a>
  <a href="{{ route('pengaduan.status', 'Diterima') }}" class="btn btn-sm {{ request('status') === 'Diterima' ? 'btn-success' : 'btn-light border text-dark' }}">
    <span class="badge bg-success rounded-circle me-1" style="width: 8px; height: 8px; padding: 0;"> </span> Diterima
  </a>
  <a href="{{ route('pengaduan.status', 'Dalam Proses') }}" class="btn btn-sm {{ request('status') === 'Dalam Proses' ? 'btn-warning text-dark' : 'btn-light border text-dark' }}">
    <span class="badge bg-warning rounded-circle me-1" style="width: 8px; height: 8px; padding: 0;"> </span> Dalam Proses
  </a>
  <a href="{{ route('pengaduan.status', 'Selesai') }}" class="btn btn-sm {{ request('status') === 'Selesai' ? 'btn-primary' : 'btn-light border text-dark' }}">
    <span class="badge bg-info rounded-circle me-1" style="width: 8px; height: 8px; padding: 0;"> </span> Selesai
  </a>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-clipboard-text-outline me-2 text-success"></i>Daftar Laporan Pengaduan</h5>

    <!-- Search Form -->
    <form method="GET" action="{{ route('pengaduan.search') }}" class="d-flex align-items-center" style="max-width: 400px; width: 100%;">
      <div class="input-group">
        <span class="input-group-text bg-light border-end-0 text-muted"><i class="mdi mdi-magnify"></i></span>
        <input type="text" name="q" class="form-control border-start-0 ps-0 bg-light" 
               placeholder="Cari kode, nama, atau jabatan..." 
               value="{{ request('q') ?? ($query ?? '') }}">
        @if(request('q') || !empty($query))
          <a href="{{ route('pengaduan.list') }}" class="btn btn-light border border-start-0 text-muted">
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
            <th>Karyawan (Pelapor)</th>
            <th>Kode Pengaduan</th>
            <th>Posisi / Bagian</th>
            <th>Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center pe-4" style="width: 220px;">Tindakan & Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pengaduan as $index => $item)
          <tr>
            <td class="ps-4 fw-bold text-muted">{{ $pengaduan->firstItem() + $index }}</td>
            <td>
              <div class="d-flex align-items-center">
                @php
                  $photoSrc = null;
                  if ($item->foto && file_exists(public_path($item->foto))) {
                    $photoSrc = asset($item->foto);
                  } elseif ($item->foto && file_exists(public_path('storage/' . $item->foto))) {
                    $photoSrc = asset('storage/' . $item->foto);
                  }
                @endphp
                @if($photoSrc)
                  <img src="{{ $photoSrc }}" class="rounded-circle me-3 border shadow-sm" style="width: 44px; height: 44px; object-fit: cover;">
                @else
                  <div class="rounded-circle bg-light text-success border d-flex align-items-center justify-content-center me-3 fw-bold shadow-sm" style="width: 44px; height: 44px; font-size: 1.1rem;">
                    {{ strtoupper(substr($item->karyawan->nama_karyawan ?? 'K', 0, 1)) }}
                  </div>
                @endif
                <div>
                  <h6 class="mb-0 fw-bold text-dark">{{ $item->karyawan->nama_karyawan ?? 'Karyawan' }}</h6>
                  <small class="text-muted"><i class="mdi mdi-card-account-details-outline me-1"></i>NIK: {{ $item->niksap ?? ($item->karyawan->niksap ?? '-') }} | HP: {{ $item->no_hp ?? '-' }}</small>
                </div>
              </div>
            </td>
            <td>
              <span class="badge bg-light text-dark font-monospace border px-2 py-1 fw-bold">{{ $item->kode_pengaduan }}</span>
              @if($item->kategori_pengaduan)
                <div class="mt-1"><span class="badge bg-secondary" style="font-size: 0.7rem;">{{ $item->kategori_pengaduan->nama_kategori }}</span></div>
              @endif
            </td>
            <td>
              <span class="text-dark fw-semibold">{{ $item->posisi->nama_posisi ?? '-' }}</span>
              <br><small class="text-muted">{{ $item->posisi->realisasi->area->nama_area ?? '' }} - {{ $item->posisi->realisasi->nama_realisasi ?? '' }}</small>
            </td>
            <td>
              <span class="text-muted small"><i class="mdi mdi-clock-outline me-1"></i>{{ $item->tgl_pengaduan ? $item->tgl_pengaduan->format('d M Y, H:i') : '-' }} WIB</span>
            </td>
            <td class="text-center">
              @if($item->status == 'Diterima')
                <span class="badge" style="background-color: #dcfce7; color: #166534; border: 1px solid #86efac;">
                  <i class="mdi mdi-check-circle-outline me-1"></i> Diterima
                </span>
              @elseif($item->status == 'Dalam Proses')
                <span class="badge" style="background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a;">
                  <i class="mdi mdi-progress-clock me-1"></i> Dalam Proses
                </span>
              @elseif($item->status == 'Selesai')
                <span class="badge" style="background-color: #e0f2fe; color: #075985; border: 1px solid #bae6fd;">
                  <i class="mdi mdi-check-all me-1"></i> Selesai
                </span>
              @else
                <span class="badge bg-secondary">{{ $item->status }}</span>
              @endif
            </td>
            <td class="text-center pe-4">
              <div class="d-flex justify-content-center align-items-center gap-1">
                <!-- Detail & Respon Modal Button -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id_pengaduan }}" title="Lihat Detail & Respon">
                  <i class="mdi mdi-eye-outline me-1"></i> Respon
                </button>

                <!-- Cetak PDF Button -->
                <a href="{{ route('pengaduan.cetakPDF', $item->id_pengaduan) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Cetak PDF Resmi">
                  <i class="mdi mdi-file-pdf-box"></i>
                </a>

                @if(Auth::user()->user_type == 1)
                <!-- Delete Form -->
                <form action="{{ route('pengaduan.destroy', $item->id_pengaduan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan {{ $item->kode_pengaduan }}?')" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-secondary text-danger" title="Hapus Pengaduan">
                    <i class="mdi mdi-trash-can-outline"></i>
                  </button>
                </form>
                @endif
              </div>
            </td>
          </tr>

          <!-- Modal Detail & Update Status -->
          <div class="modal fade" id="detailModal{{ $item->id_pengaduan }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id_pengaduan }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header bg-success text-white py-3 px-4">
                  <h5 class="modal-title fw-bold" id="modalLabel{{ $item->id_pengaduan }}">
                    <i class="mdi mdi-file-document-outline me-2"></i>Pengaduan: {{ $item->kode_pengaduan }}
                  </h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="p-3 bg-light rounded-3">
                        <small class="text-muted fw-bold text-uppercase">Informasi Pelapor</small>
                        <h6 class="fw-bold text-dark mt-1 mb-1">{{ $item->karyawan->nama_karyawan ?? 'Karyawan' }}</h6>
                        <p class="mb-1 small text-muted">NIKSAP: {{ $item->niksap }} | HP: {{ $item->no_hp }}</p>
                        <p class="mb-0 small text-muted">Area: {{ $item->posisi->realisasi->area->nama_area ?? '-' }} &bull; Posisi: {{ $item->posisi->nama_posisi ?? '-' }}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="p-3 bg-light rounded-3">
                        <small class="text-muted fw-bold text-uppercase">Waktu Pengaduan</small>
                        <p class="mb-1 text-dark fw-semibold mt-1">{{ $item->tgl_pengaduan ? $item->tgl_pengaduan->format('d F Y, H:i') : '-' }} WIB</p>
                        <small class="text-muted fw-bold text-uppercase">Kategori</small>
                        <p class="mb-0 text-dark fw-semibold">{{ $item->kategori_pengaduan->nama_kategori ?? 'Umum' }}</p>
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label fw-bold text-dark">Isi Keluhan / Aspirasi:</label>
                      <div class="p-3 bg-light border rounded-3 text-dark" style="white-space: pre-line; min-height: 80px;">
                        {{ $item->deskripsi }}
                      </div>
                    </div>

                    <!-- Lampiran / Foto jika ada -->
                    @if($item->foto || $item->lampiran)
                      <div class="col-12">
                        <label class="form-label fw-bold text-dark">Lampiran Dokumen / Bukti Foto:</label>
                        <div class="d-flex flex-wrap gap-2">
                          @if($item->foto)
                            <a href="{{ asset($item->foto) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                              <i class="mdi mdi-image me-1"></i> Buka Foto Bukti
                            </a>
                          @endif
                          @if($item->lampiran)
                            <a href="{{ asset($item->lampiran) }}" target="_blank" class="btn btn-sm btn-outline-info">
                              <i class="mdi mdi-paperclip me-1"></i> Unduh Lampiran File
                            </a>
                          @endif
                        </div>
                      </div>
                    @endif

                    <!-- Form Tindak Lanjut -->
                    <div class="col-12 border-top pt-3 mt-3">
                      <form action="{{ route('pengaduan.updateStatus', $item->id_pengaduan) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $item->id_pengaduan }}">

                        <div class="mb-3">
                          <label class="form-label fw-bold text-dark">Perbarui Status Penanganan <span class="text-danger">*</span></label>
                          <select name="status" class="form-select form-select-lg" required>
                            <option value="Diterima" {{ $item->status == 'Diterima' ? 'selected' : '' }}>Diterima (Menunggu Tindak Lanjut)</option>
                            <option value="Dalam Proses" {{ $item->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses (Sedang Ditangani Pimpinan)</option>
                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai (Sudah Selesai Ditindaklanjuti)</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label class="form-label fw-bold text-dark">Respon / Balasan Resmi Pimpinan</label>
                          <textarea name="balasan" rows="3" class="form-control" placeholder="Tuliskan catatan respon, hasil penanganan, atau tindak lanjut pimpinan...">{{ $item->balasan }}</textarea>
                          <small class="text-muted">Respon ini akan langsung dapat dibaca oleh karyawan saat memeriksa status pengaduan.</small>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary px-4">
                            <i class="mdi mdi-check-circle me-1"></i> Simpan Status & Balasan
                          </button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">
              <i class="mdi mdi-clipboard-text-off-outline mb-2" style="font-size: 3rem;"></i>
              <p class="mb-0 fw-semibold">Tidak ada data pengaduan yang sesuai.</p>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($pengaduan->hasPages())
      <div class="p-3 border-top d-flex justify-content-center">
        {{ $pengaduan->links() }}
      </div>
    @endif
  </div>
</div>
@endsection