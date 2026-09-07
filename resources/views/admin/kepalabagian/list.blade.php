@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1">Manajemen Pimpinan & Hierarki Jabatan</h3>
        <p class="text-muted mb-0">Kelola akun pimpinan, kepala bagian, dan sesuaikan urutan hierarki tampilan secara dinamis (Total: {{ $getRecord->total() }} Pimpinan)</p>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a class="btn btn-primary" href="{{ route('kepala.add') }}">
          <i class="mdi mdi-account-plus me-1"></i> Tambah Pimpinan Baru
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Alert Info Urutan Dinamis -->
<div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-4" style="background-color: #f0fdf4; border-left: 4px solid #16a34a !important; color: #166534; border-radius: 10px;">
  <i class="mdi mdi-information-outline fs-4 me-3"></i>
  <div>
    <strong>Pengaturan Urutan Hierarki Dinamis:</strong>
    <p class="mb-0 small">Anda dapat mengatur ulang urutan/tingkatan pimpinan dengan menarik (drag-and-drop) baris tabel menggunakan ikon <i class="mdi mdi-drag text-dark"></i>, atau klik tombol <strong>Naik/Turun</strong>. Urutan ini otomatis diterapkan pada seluruh sistem dan profil pimpinan di halaman utama.</p>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-format-list-numbered me-2 text-success"></i>Daftar Susunan Hierarki Pimpinan</h5>
    <span id="reorder-status" class="badge bg-light text-muted border d-none">
      <i class="mdi mdi-loading mdi-spin me-1"></i> Menyimpan urutan...
    </span>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="pimpinan-table">
        <thead class="bg-light">
          <tr>
            <th style="width: 50px;" class="text-center">Geser</th>
            <th style="width: 80px;" class="text-center">Urutan</th>
            <th>Pimpinan / Kepala Bagian</th>
            <th>Jabatan / Posisi Struktural</th>
            <th>Email Akun</th>
            <th class="text-center" style="width: 140px;">Pindah Posisi</th>
            <th class="text-center" style="width: 130px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="sortable-pimpinan">
          @forelse ($getRecord as $index => $value)
            <tr data-id="{{ $value->id }}" class="align-middle">
              <td class="text-center">
                <span class="drag-handle fs-4" title="Klik dan geser untuk ubah urutan"><i class="mdi mdi-drag"></i></span>
              </td>
              <td class="text-center">
                <span class="badge-rank">
                  #{{ $value->urutan ?: ($getRecord->firstItem() + $index) }}
                </span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  @if($value->profil && file_exists(public_path('uploads/profiles/' . $value->profil)))
                    <img src="{{ asset('uploads/profiles/' . $value->profil) }}" alt="{{ $value->name }}" class="rounded-circle me-3 shadow-sm border" style="width: 46px; height: 46px; object-fit: cover;">
                  @else
                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-3 shadow-sm font-weight-bold" style="width: 46px; height: 46px; font-size: 1.15rem;">
                      {{ strtoupper(substr($value->name, 0, 1)) }}
                    </div>
                  @endif
                  <div>
                    <h6 class="mb-0 fw-bold text-dark">{{ $value->name }}</h6>
                    <small class="text-muted"><i class="mdi mdi-shield-check text-success me-1"></i>Kepala Bagian PTPN IV</small>
                  </div>
                </div>
              </td>
              <td>
                <span class="badge bg-light text-dark border fw-bold px-2 py-1">
                  {{ $value->jabatan ?: 'Kepala Bagian' }}
                </span>
                @if($value->deskripsi_jabatan)
                  <div class="text-muted small mt-1 text-truncate" style="max-width: 250px;">
                    "{{ $value->deskripsi_jabatan }}"
                  </div>
                @endif
              </td>
              <td class="text-muted">{{ $value->email }}</td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <a href="{{ route('kepala.move', ['id' => $value->id, 'direction' => 'up']) }}" class="btn btn-outline-secondary px-2 py-1" title="Naikkan Tingkat Urutan">
                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                  </a>
                  <a href="{{ route('kepala.move', ['id' => $value->id, 'direction' => 'down']) }}" class="btn btn-outline-secondary px-2 py-1" title="Turunkan Tingkat Urutan">
                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                  </a>
                </div>
              </td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-1">
                  <a href="{{ route('kepala.edit', $value->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Data Pimpinan">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  <form action="{{ route('kepala.delete', $value->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pimpinan {{ $value->name }}?')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Pimpinan">
                      <i class="mdi mdi-trash-can-outline"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center py-5 text-muted">
                <i class="mdi mdi-account-off-outline mb-2" style="font-size: 3rem;"></i>
                <p class="mb-0 fw-semibold">Belum ada data pimpinan.</p>
                <a href="{{ route('kepala.add') }}" class="btn btn-sm btn-primary mt-2">Tambah Pimpinan Pertama</a>
              </td>
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

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('sortable-pimpinan');
    const statusBadge = document.getElementById('reorder-status');

    if (el) {
      new Sortable(el, {
        handle: '.drag-handle',
        animation: 150,
        ghostClass: 'sortable-ghost',
        onEnd: function () {
          const rows = el.querySelectorAll('tr[data-id]');
          const orders = [];

          rows.forEach((row, index) => {
            const id = row.getAttribute('data-id');
            orders.push({
              id: id,
              urutan: index + 1
            });
            // Update the badge on UI immediately
            const rankBadge = row.querySelector('.badge-rank');
            if (rankBadge) {
              rankBadge.textContent = '#' + (index + 1);
            }
          });

          // Send AJAX reorder request
          if (statusBadge) {
            statusBadge.classList.remove('d-none');
            statusBadge.className = 'badge bg-warning text-dark border';
            statusBadge.innerHTML = '<i class="mdi mdi-loading mdi-spin me-1"></i> Menyimpan urutan...';
          }

          fetch("{{ route('kepala.reorder') }}", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ orders: orders })
          })
          .then(res => res.json())
          .then(data => {
            if (statusBadge) {
              if (data.success) {
                statusBadge.className = 'badge bg-success text-white border-0';
                statusBadge.innerHTML = '<i class="mdi mdi-check-circle me-1"></i> Urutan Berhasil Disimpan';
                setTimeout(() => statusBadge.classList.add('d-none'), 3000);
              } else {
                statusBadge.className = 'badge bg-danger text-white border-0';
                statusBadge.innerHTML = '<i class="mdi mdi-alert-circle me-1"></i> Gagal Menyimpan';
              }
            }
          })
          .catch(err => {
            if (statusBadge) {
              statusBadge.className = 'badge bg-danger text-white border-0';
              statusBadge.innerHTML = '<i class="mdi mdi-alert-circle me-1"></i> Kesalahan Jaringan';
            }
          });
        }
      });
    }
  });
</script>
@endsection
