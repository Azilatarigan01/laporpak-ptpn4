@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Edit Data Karyawan</h3>
        <p class="text-muted mb-0">Perbarui data karyawan, NIK, dan penempatan posisi/bagian kerja.</p>
      </div>
      <a href="{{ route('karyawan.list') }}" class="btn btn-outline-secondary">
        <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Daftar
      </a>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-9">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white py-3 px-4">
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-edit me-2 text-success"></i>Edit Data: {{ $item->nama_karyawan }}</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('karyawan.update', $item->id_karyawan) }}" method="POST">
          @csrf

          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label fw-bold text-dark">Nama Lengkap Karyawan <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('nama_karyawan') is-invalid @enderror" name="nama_karyawan" value="{{ old('nama_karyawan', $item->nama_karyawan) }}" required>
              @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-5">
              <label class="form-label fw-bold text-dark">NIKSAP / NIK Karyawan <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('niksap') is-invalid @enderror" name="niksap" value="{{ old('niksap', $item->niksap) }}" required>
              @error('niksap')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <div class="p-3 bg-light rounded-3 mb-2">
                <small class="text-muted fw-bold text-uppercase">Posisi Saat Ini:</small>
                <div class="fw-bold text-dark mt-1">
                  {{ $item->posisi->nama_posisi ?? '-' }}
                </div>
                <small class="text-muted">
                  {{ $item->posisi->realisasi->area->nama_area ?? '' }} &bull; {{ $item->posisi->realisasi->nama_realisasi ?? '' }}
                </small>
              </div>
            </div>

            <!-- Optional Cascading Dropdown to change position -->
            <div class="col-md-12">
              <label class="form-label fw-bold text-dark">Ubah Area Kerja (Pilih jika ingin mengganti)</label>
              <select id="edit-area-select" class="form-select form-select-lg">
                <option value="">-- Tetap Gunakan Area Saat Ini --</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label fw-bold text-dark">Ubah Bagian Realisasi</label>
              <select id="edit-realisasi-select" class="form-select form-select-lg" disabled>
                <option value="">-- Pilih Bagian Realisasi Baru --</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label fw-bold text-dark">Ubah Posisi / Jabatan</label>
              <select id="edit-posisi-select" name="id_posisi" class="form-select form-select-lg" disabled>
                <option value="{{ $item->id_posisi }}">-- Tetap Gunakan: {{ $item->posisi->nama_posisi ?? 'Saat Ini' }} --</option>
              </select>
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('karyawan.list') }}" class="btn btn-light border px-4">Batal</a>
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
  $(document).ready(function() {
    $('#edit-area-select').select2({
      placeholder: 'Ganti Area Kerja...',
      ajax: {
        url: "{{ route('dropdown.area') }}",
        dataType: 'json',
        delay: 200,
        processResults: function(data) {
          return { results: data.results || data.data };
        }
      }
    });

    $('#edit-area-select').on('change', function() {
      let areaId = $(this).val();
      $('#edit-realisasi-select').empty().append('<option value="">-- Pilih Bagian Realisasi --</option>').prop('disabled', !areaId);
      $('#edit-posisi-select').empty().append('<option value="{{ $item->id_posisi }}">-- Pilih Posisi Baru --</option>').prop('disabled', true);

      if (areaId) {
        $('#edit-realisasi-select').select2({
          placeholder: 'Pilih Bagian Realisasi...',
          ajax: {
            url: "{{ url('/selectRealisasi') }}/" + areaId,
            dataType: 'json',
            delay: 200,
            processResults: function(data) {
              return { results: data.results || data.data };
            }
          }
        });
      }
    });

    $('#edit-realisasi-select').on('change', function() {
      let realisasiId = $(this).val();
      $('#edit-posisi-select').empty().append('<option value="">-- Pilih Posisi Baru --</option>').prop('disabled', !realisasiId);

      if (realisasiId) {
        $('#edit-posisi-select').select2({
          placeholder: 'Pilih Posisi...',
          ajax: {
            url: "{{ url('/selectPosisi') }}/" + realisasiId,
            dataType: 'json',
            delay: 200,
            processResults: function(data) {
              return { results: data.results || data.data };
            }
          }
        });
      }
    });
  });
</script>
@endsection