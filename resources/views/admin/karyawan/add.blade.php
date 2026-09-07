@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold text-dark mb-1">Tambah Data Karyawan</h3>
        <p class="text-muted mb-0">Daftarkan karyawan baru dengan memilih area kerja, bagian realisasi, dan posisi jabatan.</p>
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
        <h5 class="fw-bold text-dark mb-0"><i class="mdi mdi-account-plus me-2 text-success"></i>Formulir Karyawan Baru</h5>
      </div>
      <div class="card-body p-4">
        <form action="{{ route('karyawan.insert') }}" method="POST">
          @csrf

          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label fw-bold text-dark">Nama Lengkap Karyawan <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('nama_karyawan') is-invalid @enderror" name="nama_karyawan" value="{{ old('nama_karyawan') }}" placeholder="Masukkan nama lengkap" required>
              @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-5">
              <label class="form-label fw-bold text-dark">NIKSAP / NIK Karyawan <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg @error('niksap') is-invalid @enderror" name="niksap" value="{{ old('niksap') }}" placeholder="Contoh: 4004155" required>
              @error('niksap')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Cascading Dropdown: Area -> Realisasi -> Posisi -->
            <div class="col-md-12 mt-3">
              <label class="form-label fw-bold text-dark">1. Pilih Area Kerja <span class="text-danger">*</span></label>
              <select id="admin-area-select" class="form-select form-select-lg" required>
                <option value="">-- Pilih Area Kerja --</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label fw-bold text-dark">2. Pilih Bagian Realisasi <span class="text-danger">*</span></label>
              <select id="admin-realisasi-select" class="form-select form-select-lg" disabled required>
                <option value="">-- Pilih Bagian Realisasi --</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label fw-bold text-dark">3. Pilih Posisi / Jabatan <span class="text-danger">*</span></label>
              <select id="admin-posisi-select" name="id_posisi" class="form-select form-select-lg" disabled required>
                <option value="">-- Pilih Posisi / Jabatan --</option>
              </select>
            </div>

            <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top mt-4">
              <a href="{{ route('karyawan.list') }}" class="btn btn-light border px-4">Batal</a>
              <button type="submit" class="btn btn-primary px-5">
                <i class="mdi mdi-check-circle me-1"></i> Simpan Karyawan
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
    // 1. Init Area Select2
    $('#admin-area-select').select2({
      placeholder: 'Pilih Area Kerja...',
      ajax: {
        url: "{{ route('dropdown.area') }}",
        dataType: 'json',
        delay: 200,
        processResults: function(data) {
          return { results: data.results || data.data };
        }
      }
    });

    // 2. On Area Change -> Init Realisasi
    $('#admin-area-select').on('change', function() {
      let areaId = $(this).val();
      $('#admin-realisasi-select').empty().append('<option value="">-- Pilih Bagian Realisasi --</option>').prop('disabled', !areaId);
      $('#admin-posisi-select').empty().append('<option value="">-- Pilih Posisi / Jabatan --</option>').prop('disabled', true);

      if (areaId) {
        $('#admin-realisasi-select').select2({
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

    // 3. On Realisasi Change -> Init Posisi
    $('#admin-realisasi-select').on('change', function() {
      let realisasiId = $(this).val();
      $('#admin-posisi-select').empty().append('<option value="">-- Pilih Posisi / Jabatan --</option>').prop('disabled', !realisasiId);

      if (realisasiId) {
        $('#admin-posisi-select').select2({
          placeholder: 'Pilih Posisi / Jabatan...',
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
