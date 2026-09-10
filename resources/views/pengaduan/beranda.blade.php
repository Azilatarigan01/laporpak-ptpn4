<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Formulir Pengaduan Karyawan | Lapor Pak! PTPN IV Kebun Dolok Sinumbah</title>
  <meta name="description" content="Formulir Resmi Aspirasi & Pengaduan Karyawan PTPN IV Regional II Kebun Dolok Sinumbah" />

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logoo.png') }}" rel="icon" />
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 & Icons -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
  
  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    :root {
      --eco-dark: #071e13;
      --eco-forest: #0d2818;
      --eco-deep: #133c24;
      --eco-green: #2d6a4f;
      --eco-vibrant: #52b788;
      --eco-lime: #74c69d;
      --eco-light: #d8f3dc;
      --eco-bg: #f4f7f4;
      --slate-900: #0f172a;
      --slate-800: #1e293b;
      --slate-700: #334155;
      --slate-600: #475569;
      --slate-300: #cbd5e1;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      color: var(--slate-700);
      background-color: var(--eco-bg);
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Top Navbar */
    .eco-header {
      background: #071e13;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      padding: 14px 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
    .eco-brand-title {
      font-size: 1.25rem;
      font-weight: 800;
      color: #ffffff;
      margin: 0;
      line-height: 1.15;
    }
    .eco-brand-sub {
      font-size: 0.68rem;
      color: var(--eco-lime);
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
    }
    .eco-nav-link {
      color: #e2e8f0 !important;
      font-weight: 600;
      font-size: 0.92rem;
      padding: 8px 14px !important;
      border-radius: 20px;
      transition: all 0.25s ease;
      text-decoration: none;
    }
    .eco-nav-link:hover, .eco-nav-link.active {
      color: #ffffff !important;
      background: rgba(82, 183, 136, 0.15);
    }
    .btn-eco-pill {
      background: linear-gradient(135deg, #52b788 0%, #2d6a4f 100%);
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.88rem;
      padding: 10px 22px;
      border-radius: 30px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 15px rgba(82, 183, 136, 0.35);
      transition: all 0.3s ease;
      text-decoration: none;
    }
    .btn-eco-pill:hover {
      background: linear-gradient(135deg, #74c69d 0%, #40916c 100%);
      transform: translateY(-2px);
      color: #ffffff !important;
    }

    /* Page Hero Banner */
    .page-hero {
      position: relative;
      background: linear-gradient(180deg, rgba(7, 30, 19, 0.94) 0%, rgba(13, 40, 24, 0.90) 60%, rgba(19, 60, 36, 0.95) 100%), url('{{ asset('assets/img/sawit.jpg') }}') center/cover no-repeat;
      padding: 60px 0 90px 0;
      color: #ffffff;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(82, 183, 136, 0.18);
      border: 1px solid rgba(116, 198, 157, 0.4);
      padding: 6px 18px;
      border-radius: 30px;
      font-size: 0.85rem;
      font-weight: 700;
      color: var(--eco-lime);
      margin-bottom: 16px;
    }

    /* Main Form Card */
    .form-container-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 24px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
      padding: 40px;
      margin-top: -50px;
      position: relative;
      z-index: 10;
    }
    @media (max-width: 768px) {
      .form-container-card {
        padding: 24px 18px;
        margin-top: -30px;
      }
    }
    .step-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, #2d6a4f 0%, #0d2818 100%);
      color: #ffffff;
      border-radius: 50%;
      font-weight: 800;
      font-size: 1rem;
      margin-right: 14px;
      box-shadow: 0 4px 12px rgba(45, 106, 79, 0.25);
    }
    .form-label {
      font-weight: 700;
      color: var(--slate-900);
      font-size: 0.92rem;
      margin-bottom: 7px;
    }
    .form-control, .form-select {
      border: 1.5px solid #cbd5e1;
      border-radius: 12px;
      padding: 11px 16px;
      font-size: 0.95rem;
      color: #1e293b;
      transition: all 0.2s ease;
    }
    .form-control:focus, .form-select:focus {
      border-color: var(--eco-vibrant);
      box-shadow: 0 0 0 4px rgba(82, 183, 136, 0.18);
    }

    /* Select2 */
    .select2-container .select2-selection--single {
      height: 48px !important;
      border: 1.5px solid #cbd5e1 !important;
      border-radius: 12px !important;
      padding: 8px 14px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 30px !important;
      color: #1e293b !important;
      font-weight: 600;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 46px !important;
    }
    .select2-dropdown {
      border: 1.5px solid #cbd5e1 !important;
      border-radius: 12px !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }

    .btn-submit-pengaduan {
      background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #ffffff;
      font-weight: 800;
      font-size: 1.1rem;
      padding: 16px 48px;
      border-radius: 30px;
      box-shadow: 0 10px 25px rgba(45, 106, 79, 0.35);
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-submit-pengaduan:hover {
      background: linear-gradient(135deg, #40916c 0%, #1b4332 100%);
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(45, 106, 79, 0.45);
    }

    /* Footer */
    .eco-footer {
      background: #071e13;
      color: #cbd5e1;
      padding: 50px 0 25px 0;
      border-top: 1px solid rgba(255,255,255,0.08);
      margin-top: 60px;
    }
  </style>
</head>

<body>
  <!-- Top Corporate Announcement Bar -->
  <div class="d-none d-md-block" style="background: #041a10; color: #94a3b8; font-size: 0.78rem; padding: 7px 0; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-2">
        <span style="background: rgba(245, 158, 11, 0.15); border: 1px solid rgba(245, 158, 11, 0.3); color: #fbbf24; font-weight: 700; padding: 2px 8px; border-radius: 6px; font-size: 0.7rem;">BUMN UNTUK INDONESIA</span>
        <span>PT Perkebunan Nusantara IV (Persero) Regional II • Kebun Dolok Sinumbah</span>
      </div>
      <div class="d-flex align-items-center gap-4 text-white-50">
        <span><i class="bi bi-shield-lock-fill text-success me-1"></i>Kerahasiaan 100% Terlindungi</span>
        <span><i class="bi bi-clock-history text-warning me-1"></i>Layanan Aspirasi 24/7</span>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="eco-header">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logoo.png') }}" alt="PTPN IV Logo" style="height: 42px;" class="me-2">
        <div>
          <h1 class="eco-brand-title">Dolok Sinumbah</h1>
          <span class="eco-brand-sub">PTPN IV Regional II</span>
        </div>
      </a>

      <nav class="d-none d-xl-flex align-items-center gap-1">
        <a href="{{ url('/') }}" class="eco-nav-link">Beranda</a>
        <a href="{{ url('about') }}" class="eco-nav-link">Tentang Kami</a>
        <a href="{{ url('panduan') }}" class="eco-nav-link">Panduan Alur</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link active">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Struktur Organisasi</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="eco-nav-link">Cek Status</a>
        <a href="{{ url('login') }}" class="btn-eco-pill ms-2">
          <i class="bi bi-shield-lock-fill"></i> Login Petugas
        </a>
      </nav>

      <div class="d-flex align-items-center gap-2 d-xl-none">
        <a href="{{ url('login') }}" class="btn btn-sm btn-success px-3 rounded-pill fw-bold">Login</a>
        <button class="btn btn-dark text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
          <i class="bi bi-list fs-3"></i>
        </button>
      </div>
    </div>

    <div class="collapse d-xl-none bg-dark border-top border-secondary p-3 mt-2" id="mobileNav">
      <div class="d-flex flex-column gap-2">
        <a href="{{ url('/') }}" class="text-white text-decoration-none py-1"><i class="bi bi-house me-2"></i>Beranda</a>
        <a href="{{ url('about') }}" class="text-white text-decoration-none py-1"><i class="bi bi-info-circle me-2"></i>Tentang Kami</a>
        <a href="{{ url('panduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-journal-text me-2"></i>Panduan Alur</a>
        <a href="{{ url('pengaduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-megaphone me-2"></i>Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="text-white text-decoration-none py-1"><i class="bi bi-newspaper me-2"></i>Berita Kebun</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="text-white text-decoration-none py-1"><i class="bi bi-search me-2"></i>Cek Status Laporan</a>
        <a href="{{ url('login') }}" class="btn btn-success mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login Petugas</a>
      </div>
    </div>
  </header>


  <main>
    <!-- Page Hero Title -->
    <div class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <div class="hero-badge">
          <i class="bi bi-shield-lock-fill"></i> Layanan Whistleblowing & Aspirasi Karyawan
        </div>
        <h1 class="fw-bold mb-3 font-display text-white" style="font-size: 2.5rem;">
          Formulir Pengaduan & Aspirasi Karyawan
        </h1>
        <p class="text-white-50 mx-auto mb-0" style="max-width: 680px; font-size: 1.05rem; line-height: 1.7;">
          Sampaikan keluhan operasional, fasilitas, atau aspirasi Anda langsung kepada manajemen Kebun Dolok Sinumbah. Identitas Anda dijamin aman dan terverifikasi secara terpadu.
        </p>
      </div>
    </div>

    <!-- Main Form Container -->
    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          @if(session('success'))
            <div class="alert alert-success shadow-sm border-0 d-flex align-items-start p-4 mb-4" style="border-radius: 18px; background-color: #dcfce7; color: #166534;">
              <i class="bi bi-check-circle-fill fs-3 me-3 mt-1 text-success"></i>
              <div>
                <h5 class="fw-bold mb-1">Pengaduan Berhasil Terkirim!</h5>
                <p class="mb-0">{{ session('success') }}</p>
                <div class="mt-3">
                  <a href="{{ route('pengaduan.cek-status') }}" class="btn btn-sm btn-success fw-bold px-3 py-2 rounded-pill">
                    <i class="bi bi-search me-1"></i> Lacak Status Sekarang
                  </a>
                </div>
              </div>
            </div>
          @endif

          @if(isset($errors) && $errors->any())
            <div class="alert alert-danger shadow-sm border-0 d-flex align-items-start p-4 mb-4" style="border-radius: 18px; background-color: #fee2e2; color: #991b1b;">
              <i class="bi bi-exclamation-triangle-fill fs-3 me-3 mt-1 text-danger"></i>
              <div>
                <h6 class="fw-bold mb-1">Mohon Lengkapi Formulir dengan Benar:</h6>
                <ul class="mb-0 ps-3 small">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endif

          <div class="form-container-card">
            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <!-- Step 1: Penempatan & Identitas -->
              <div class="mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                  <span class="step-badge">1</span>
                  <div>
                    <h4 class="fw-bold text-dark mb-0">Identitas & Penempatan Kerja</h4>
                    <small class="text-muted">Pilih hierarki area kerja hingga nama karyawan Anda terpilih secara otomatis.</small>
                  </div>
                </div>
              </div>

              <div class="row g-4 mb-5">
                <!-- 1. Area -->
                <div class="col-md-6">
                  <label class="form-label">Area Kerja <span class="text-danger">*</span></label>
                  <select id="selectArea" name="nama_area" class="form-select" required>
                    <option value="">-- Pilih Area Kerja --</option>
                  </select>
                </div>

                <!-- 2. Realisasi -->
                <div class="col-md-6">
                  <label class="form-label">Bagian Realisasi <span class="text-danger">*</span></label>
                  <select id="selectRealisasi" name="nama_realisasi" class="form-select" disabled required>
                    <option value="">-- Pilih Bagian Realisasi --</option>
                  </select>
                </div>

                <!-- 3. Posisi -->
                <div class="col-md-6">
                  <label class="form-label">Posisi / Jabatan <span class="text-danger">*</span></label>
                  <select id="selectPosisi" name="nama_posisi" class="form-select" disabled required>
                    <option value="">-- Pilih Posisi / Jabatan --</option>
                  </select>
                </div>

                <!-- 4. Karyawan -->
                <div class="col-md-6">
                  <label class="form-label">Nama Karyawan (Pelapor) <span class="text-danger">*</span></label>
                  <select id="selectKaryawan" name="nama_karyawan" class="form-select" disabled required>
                    <option value="">-- Pilih Nama Karyawan --</option>
                  </select>
                </div>

                <!-- 5. NIKSAP -->
                <div class="col-md-6">
                  <label class="form-label">NIKSAP (Nomor Induk Karyawan) <span class="text-danger">*</span></label>
                  <input type="text" id="inputNiksap" name="niksap" class="form-control bg-light" placeholder="Terisi otomatis setelah memilih nama karyawan" readonly required value="{{ old('niksap') }}">
                </div>

                <!-- 6. Nomor HP / WA -->
                <div class="col-md-6">
                  <label class="form-label">Nomor WhatsApp / HP Aktif <span class="text-danger">*</span></label>
                  <input type="tel" name="no_hp" class="form-control" placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}" required>
                  <small class="text-muted">Untuk menerima update respon dari personalia/pimpinan.</small>
                </div>
              </div>

              <!-- Step 2: Uraian Pengaduan -->
              <div class="mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                  <span class="step-badge">2</span>
                  <div>
                    <h4 class="fw-bold text-dark mb-0">Rincian Pengaduan / Aspirasi</h4>
                    <small class="text-muted">Tuliskan kendala, fasilitas, atau saran perbaikan yang ingin disampaikan.</small>
                  </div>
                </div>
              </div>

              <div class="row g-4 mb-4">
                <!-- Kategori Pengaduan -->
                <div class="col-md-12">
                  <label class="form-label">Kategori Pengaduan <span class="text-danger">*</span></label>
                  <select name="kategori_id" class="form-select" required>
                    <option value="">-- Pilih Kategori Permasalahan --</option>
                    @if(isset($kategori))
                      @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                          {{ $kat->nama_kategori }}
                        </option>
                      @endforeach
                    @endif
                  </select>
                </div>

                <!-- Deskripsi Laporan -->
                <div class="col-12">
                  <label class="form-label">Deskripsi / Kronologi Masalah <span class="text-danger">*</span></label>
                  <textarea name="deskripsi" rows="6" class="form-control" placeholder="Jelaskan secara rinci permasalahan yang terjadi di kantor/lapangan, lokasi afdeling, kendala fasilitas, serta permohonan solusi yang diharapkan..." required>{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Lampiran File & Foto Bukti -->
                <div class="col-md-6">
                  <label class="form-label">Foto Bukti (JPG, PNG, Maks 2MB)</label>
                  <input type="file" name="foto" class="form-control form-control-lg" accept="image/*">
                  <small class="text-muted">Opsional: Foto kondisi di lapangan / sarana kerja.</small>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Lampiran Dokumen (PDF, JPG, PNG, Maks 2MB)</label>
                  <input type="file" name="lampiran" class="form-control form-control-lg" accept=".pdf,.jpg,.jpeg,.png">
                  <small class="text-muted">Opsional: Berkas pendukung lainnya.</small>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="text-center pt-4">
                <button type="submit" class="btn-submit-pengaduan">
                  <i class="bi bi-send-check-fill fs-5"></i>
                  <span>Kirim Laporan Pengaduan</span>
                </button>
                <p class="small text-muted mt-3 mb-0">
                  <i class="bi bi-shield-check text-success me-1"></i> Setelah terkirim, Anda akan mendapatkan <strong>Nomor Tiket Pengaduan</strong> untuk melacak proses tindak lanjut dari personalia/pimpinan.
                </p>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="eco-footer">
    <div class="container text-center">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-2">
        <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo" style="height: 32px;">
        <span class="text-white fw-bold">PTPN IV Regional II Kebun Dolok Sinumbah</span>
      </div>
      <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} PT Perkebunan Nusantara IV (Persero). Seluruh Hak Cipta Dilindungi.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
</body>
</html>