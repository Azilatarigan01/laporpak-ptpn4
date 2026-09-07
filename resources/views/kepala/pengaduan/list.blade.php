@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Laporan Pengaduan Karyawan</h3>
        <p class="text-muted mb-0">Tindak lanjuti aspirasi dan keluhan karyawan yang masuk ke unit kerja Anda.</p>
      </div>
      <div>
        <span class="badge bg-white border shadow-sm px-3 py-2 text-dark fs-6">
          <i class="mdi mdi-inbox-multiple me-1 text-success"></i> Total: <strong>{{ $pengaduan->total() }}</strong> Pengaduan
        </span>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-clipboard-text-outline me-2 text-success"></i>Daftar Pengaduan Masuk</h5>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4" style="width: 50px;">No</th>
            <th>Karyawan</th>
            <th>Kode Pengaduan</th>
            <th>Posisi</th>
            <th>Tanggal</th>
            <th class="text-center">Status</th>
            <th class="text-center pe-4" style="width: 200px;">Aksi & Respon</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pengaduan as $index => $item)
          <tr>
            <td class="ps-4 fw-bold text-muted">{{ $pengaduan->firstItem() + $index }}</td>
            <td>
              <h6 class="mb-0 fw-bold text-dark">{{ $item->karyawan->nama_karyawan ?? 'Karyawan' }}</h6>
              <small class="text-muted">NIK: {{ $item->niksap }} | HP: {{ $item->no_hp }}</small>
            </td>
            <td>
              <span class="badge bg-light text-dark font-monospace border fw-bold">{{ $item->kode_pengaduan }}</span>
            </td>
            <td>
              <span class="text-dark fw-semibold">{{ $item->posisi->nama_posisi ?? '-' }}</span>
              <br><small class="text-muted">{{ $item->posisi->realisasi->nama_realisasi ?? '-' }}</small>
            </td>
            <td>
              <span class="text-muted small">{{ $item->tgl_pengaduan ? $item->tgl_pengaduan->format('d M Y, H:i') : '-' }}</span>
            </td>
            <td class="text-center">
              @if($item->status == 'Diterima')
                <span class="badge" style="background-color: #dcfce7; color: #166534; border: 1px solid #86efac;">Diterima</span>
              @elseif($item->status == 'Dalam Proses')
                <span class="badge" style="background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a;">Dalam Proses</span>
              @elseif($item->status == 'Selesai')
                <span class="badge" style="background-color: #e0f2fe; color: #075985; border: 1px solid #bae6fd;">Selesai</span>
              @else
                <span class="badge bg-secondary">{{ $item->status }}</span>
              @endif
            </td>
            <td class="text-center pe-4">
              <div class="d-flex justify-content-center align-items-center gap-1">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kepalaModal{{ $item->id_pengaduan }}">
                  <i class="mdi mdi-reply me-1"></i> Tindak Lanjut
                </button>
                <a href="{{ route('pengaduan.cetakPDF', $item->id_pengaduan) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Cetak PDF">
                  <i class="mdi mdi-file-pdf-box"></i>
                </a>
              </div>
            </td>
          </tr>

          <!-- Modal Respon Kepala Bagian -->
          <div class="modal fade" id="kepalaModal{{ $item->id_pengaduan }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header bg-success text-white py-3 px-4">
                  <h5 class="modal-title fw-bold">
                    <i class="mdi mdi-file-document-outline me-2"></i>Tindak Lanjut: {{ $item->kode_pengaduan }}
                  </h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                  <div class="p-3 bg-light rounded-3 mb-3">
                    <h6 class="fw-bold text-dark mb-1">{{ $item->karyawan->nama_karyawan ?? 'Karyawan' }} - {{ $item->posisi->nama_posisi ?? '-' }}</h6>
                    <p class="mb-0 text-muted small">Waktu Masuk: {{ $item->tgl_pengaduan ? $item->tgl_pengaduan->format('d F Y, H:i') : '-' }} WIB</p>
                  </div>

                  <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Deskripsi Keluhan Karyawan:</label>
                    <div class="p-3 bg-light border rounded-3 text-dark" style="white-space: pre-line;">
                      {{ $item->deskripsi }}
                    </div>
                  </div>

                  <form action="{{ route('pengaduan.updateStatus', $item->id_pengaduan) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pengaduan" value="{{ $item->id_pengaduan }}">

                    <div class="mb-3">
                      <label class="form-label fw-bold text-dark">Status Tindak Lanjut <span class="text-danger">*</span></label>
                      <select name="status" class="form-select form-select-lg" required>
                        <option value="Diterima" {{ $item->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Dalam Proses" {{ $item->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                        <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold text-dark">Tanggapan / Arahan Pimpinan</label>
                      <textarea name="balasan" rows="3" class="form-control" placeholder="Tuliskan respon resmi Anda...">{{ $item->balasan }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                      <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary px-4">Simpan Respon</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">Belum ada pengaduan masuk.</td>
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