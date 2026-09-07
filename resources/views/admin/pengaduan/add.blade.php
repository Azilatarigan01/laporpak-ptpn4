@extends('layouts.app')

@section('container')
<div class="row">
  <div class="col-12 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h3 class="fw-bold text-dark mb-1 font-display">Input Pengaduan Baru (Manual)</h3>
        <p class="text-muted mb-0">Formulir pencatatan aspirasi dan keluhan karyawan secara manual oleh Administrator.</p>
      </div>
      <div>
        <a href="{{ route('pengaduan.list') }}" class="btn btn-outline-secondary rounded-pill px-3">
          <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Pengaduan
        </a>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-lg-10">
    <div class="card shadow-sm border-0" style="border-radius: 20px;">
      <div class="card-header bg-white py-3 px-4 border-bottom">
        <h5 class="fw-bold text-dark mb-0"><i class="bi bi-pencil-square text-success me-2"></i>Formulir Data Pengaduan</h5>
      </div>
      <div class="card-body p-4 p-md-5">
        <form action="{{ route('pengaduan.insert') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- Bagian 1: Identitas Karyawan & Penempatan -->
          <div class="mb-4 pb-2 border-bottom">
            <h6 class="fw-bold text-success mb-1"><i class="bi bi-geo-alt-fill me-1"></i>1. Penempatan & Identitas Karyawan</h6>
            <small class="text-muted">Pilih hierarki area kerja hingga nama karyawan yang bersangkutan.</small>
          </div>

          <div class="row g-4 mb-4">
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Area Kerja <span class="text-danger">*</span></label>
              <select id="selectArea" name="nama_area" class="form-select" required>
                <option value="">-- Pilih Area Kerja --</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Bagian Realisasi <span class="text-danger">*</span></label>
              <select id="selectRealisasi" name="nama_realisasi" class="form-select" disabled required>
                <option value="">-- Pilih Bagian Realisasi --</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Posisi / Jabatan <span class="text-danger">*</span></label>
              <select id="selectPosisi" name="nama_posisi" class="form-select" disabled required>
                <option value="">-- Pilih Posisi / Jabatan --</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Nama Karyawan (Pelapor) <span class="text-danger">*</span></label>
              <select id="selectKaryawan" name="nama_karyawan" class="form-select" disabled required>
                <option value="">-- Pilih Nama Karyawan --</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">NIKSAP (Nomor Induk Karyawan) <span class="text-danger">*</span></label>
              <input type="text" id="inputNiksap" name="niksap" class="form-control bg-light" placeholder="Terisi otomatis setelah memilih nama karyawan" readonly required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
              <input type="tel" name="no_hp" class="form-control" placeholder="Contoh: 081234567890" required>
            </div>
          </div>

          <!-- Bagian 2: Detail Masalah -->
          <div class="mb-4 pb-2 border-bottom pt-3">
            <h6 class="fw-bold text-success mb-1"><i class="bi bi-file-text-fill me-1"></i>2. Rincian Laporan Pengaduan</h6>
            <small class="text-muted">Masukkan kategori dan kronologi permasalahan secara lengkap.</small>
          </div>

          <div class="row g-4 mb-4">
            <div class="col-12">
              <label class="form-label fw-bold text-dark">Kategori Pengaduan <span class="text-danger">*</span></label>
              <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @if(isset($kategori))
                  @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                  @endforeach
                @endif
              </select>
            </div>

            <div class="col-12">
              <label class="form-label fw-bold text-dark">Uraian / Kronologi Masalah <span class="text-danger">*</span></label>
              <textarea name="deskripsi" rows="5" class="form-control" placeholder="Tuliskan detail permasalahan, lokasi kerja, serta harapan tindak lanjut..." required></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Foto Bukti Lapangan (Opsional)</label>
              <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">Lampiran Dokumen PDF (Opsional)</label>
              <input type="file" name="lampiran" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            </div>
          </div>

          <div class="d-flex justify-content-end gap-3 pt-3 border-top">
            <a href="{{ route('pengaduan.list') }}" class="btn btn-light border px-4">Batal</a>
            <button type="submit" class="btn btn-success px-5 fw-bold">
              <i class="bi bi-check-circle me-1"></i> Simpan Pengaduan
            </button>
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
    // 1. Initialize Area Select2
    $("#selectArea").select2({
      placeholder: 'Pilih Area Kerja...',
      allowClear: true,
      ajax: {
        url: "{{ route('area.index') }}",
        dataType: 'json',
        delay: 200,
        data: function(params) {
          return { q: params.term };
        },
        processResults: function(data) {
          return { results: data.results || data.data };
        }
      }
    });

    // 2. Area Change -> Realisasi
    $("#selectArea").on("change", function () {
      let areaId = $(this).val();
      $("#selectRealisasi").empty().append('<option value="">-- Pilih Bagian Realisasi --</option>').prop('disabled', !areaId);
      $("#selectPosisi").empty().append('<option value="">-- Pilih Posisi / Jabatan --</option>').prop('disabled', true);
      $("#selectKaryawan").empty().append('<option value="">-- Pilih Nama Karyawan --</option>').prop('disabled', true);
      $("#inputNiksap").val('');

      if (areaId) {
        $("#selectRealisasi").select2({
          placeholder: "Pilih Bagian Realisasi...",
          allowClear: true,
          ajax: {
            url: "{{ url('/selectRealisasi') }}/" + areaId,
            dataType: "json",
            delay: 200,
            data: function (params) {
              return { q: params.term };
            },
            processResults: function (data) {
              return { results: data.results || data.data };
            }
          }
        });
      }
    });

    // 3. Realisasi Change -> Posisi
    $("#selectRealisasi").on("change", function () {
      let realisasiId = $(this).val();
      $("#selectPosisi").empty().append('<option value="">-- Pilih Posisi / Jabatan --</option>').prop('disabled', !realisasiId);
      $("#selectKaryawan").empty().append('<option value="">-- Pilih Nama Karyawan --</option>').prop('disabled', true);
      $("#inputNiksap").val('');

      if (realisasiId) {
        $("#selectPosisi").select2({
          placeholder: "Pilih Posisi / Jabatan...",
          allowClear: true,
          ajax: {
            url: "{{ url('/selectPosisi') }}/" + realisasiId,
            dataType: "json",
            delay: 200,
            data: function (params) {
              return { q: params.term };
            },
            processResults: function (data) {
              return { results: data.results || data.data };
            }
          }
        });
      }
    });

    // 4. Posisi Change -> Karyawan
    $("#selectPosisi").on("change", function () {
      let posisiId = $(this).val();
      $("#selectKaryawan").empty().append('<option value="">-- Pilih Nama Karyawan --</option>').prop('disabled', !posisiId);
      $("#inputNiksap").val('');

      if (posisiId) {
        $("#selectKaryawan").select2({
          placeholder: "Pilih Nama Karyawan...",
          allowClear: true,
          ajax: {
            url: "{{ url('/selectKaryawan') }}/" + posisiId,
            dataType: "json",
            delay: 200,
            data: function (params) {
              return { q: params.term };
            },
            processResults: function (data) {
              return { results: data.results || data.data };
            }
          }
        });
      }
    });

    // 5. Karyawan Change -> Auto-fill NIKSAP
    $("#selectKaryawan").on("change", function () {
      let karyawanId = $(this).val();
      if (karyawanId) {
        $.ajax({
          url: "{{ url('/selectNiksap') }}/" + karyawanId,
          dataType: 'json',
          success: function(data) {
            if (data && data.text) {
              $("#inputNiksap").val(data.text);
            }
          }
        });
      } else {
        $("#inputNiksap").val('');
      }
    });
  });
</script>
@endsection