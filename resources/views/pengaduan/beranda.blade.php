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

  <!-- Bootstrap 5 & Icons (High-Speed Cloud CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  
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
      background: linear-gradient(135deg, rgba(6, 26, 16, 0.90) 0%, rgba(11, 35, 21, 0.85) 50%, rgba(17, 53, 32, 0.92) 100%), url("{{ asset('assets/img/hero-carousel/hero-carousel-1.jpg') }}") center/cover no-repeat;
      padding: 60px 0 90px 0;
      color: #ffffff;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(82, 183, 136, 0.2);
      border: 1px solid rgba(116, 198, 157, 0.45);
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
  <!-- Header -->
  <header class="eco-header">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logo1.png') }}" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Logo_PTPN_IV.png/640px-Logo_PTPN_IV.png';" alt="PTPN IV Logo" style="height: 44px; width: auto;" class="me-3">
        <div class="d-flex flex-column">
          <div class="eco-brand-title text-uppercase" style="font-size: 1.15rem; font-weight: 800; letter-spacing: 0.04em; color: #ffffff;">PTPN IV REGIONAL II</div>
          <span class="eco-brand-sub" style="font-size: 0.72rem; color: #74c69d; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">Kebun Dolok Sinumbah</span>
        </div>
      </a>

      <!-- Desktop Navmenu -->
      <nav id="navmenu" class="navmenu d-none d-xl-flex align-items-center gap-1">
        <a href="{{ url('/') }}" class="eco-nav-link">Beranda</a>
        <a href="{{ url('about') }}" class="eco-nav-link">Tentang Kami</a>

        <!-- Dropdown: Layanan Pengaduan -->
        <div class="dropdown">
          <a href="#" class="eco-nav-link dropdown-toggle active" id="layananDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="user-select:none;">
            Layanan Pengaduan
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow-lg border-0" style="border-radius:14px; min-width:200px; background:#071e13; padding:8px;" aria-labelledby="layananDropdown">
            <li>
              <a class="dropdown-item rounded-3 py-2 active" href="{{ url('pengaduan') }}" style="color:#ffffff; background:rgba(82,183,136,0.25); font-weight:600; font-size:0.9rem;">
                <i class="bi bi-megaphone-fill me-2 text-success"></i>Buat Pengaduan
              </a>
            </li>
            <li>
              <a class="dropdown-item rounded-3 py-2" href="{{ url('panduan') }}" style="color:#d1fae5; font-weight:600; font-size:0.9rem;">
                <i class="bi bi-journal-text me-2 text-success"></i>Panduan Alur
              </a>
            </li>
            <li>
              <a class="dropdown-item rounded-3 py-2" href="{{ route('pengaduan.cek-status') }}" style="color:#d1fae5; font-weight:600; font-size:0.9rem;">
                <i class="bi bi-search me-2 text-success"></i>Cek Status Laporan
              </a>
            </li>
          </ul>
        </div>

        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Struktur Organisasi</a>

        <a href="{{ url('login') }}" class="btn-eco-pill ms-2">
          <i class="bi bi-shield-lock-fill"></i> Login Petugas
        </a>
      </nav>

      <!-- Mobile Button & Toggle -->
      <div class="d-flex align-items-center gap-2 d-xl-none">
        <a href="{{ url('login') }}" class="btn btn-sm btn-success px-3 rounded-pill">Login</a>
        <button class="btn btn-dark text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNavMenu">
          <i class="bi bi-list fs-3"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Nav Collapse -->
    <div class="collapse d-xl-none bg-dark border-top border-secondary p-3 mt-2" id="mobileNavMenu">
      <div class="d-flex flex-column gap-2">
        <a href="{{ url('/') }}" class="text-white text-decoration-none py-1"><i class="bi bi-house me-2"></i>Beranda</a>
        <a href="{{ url('about') }}" class="text-white text-decoration-none py-1"><i class="bi bi-info-circle me-2"></i>Tentang Kami</a>

        <!-- Layanan Pengaduan Group (Mobile) -->
        <div class="ps-0">
          <div class="text-success fw-bold small py-1" style="font-size:0.78rem; letter-spacing:0.08em; text-transform:uppercase;"><i class="bi bi-megaphone me-2"></i>Layanan Pengaduan</div>
          <div class="d-flex flex-column gap-1 ps-3">
            <a href="{{ url('pengaduan') }}" class="text-white text-decoration-none py-1 small fw-bold"><i class="bi bi-pencil-square me-2 text-success"></i>Buat Pengaduan</a>
            <a href="{{ url('panduan') }}" class="text-white-50 text-decoration-none py-1 small"><i class="bi bi-journal-text me-2"></i>Panduan Alur</a>
            <a href="{{ route('pengaduan.cek-status') }}" class="text-white-50 text-decoration-none py-1 small"><i class="bi bi-search me-2"></i>Cek Status Laporan</a>
          </div>
        </div>

        <a href="{{ route('detail') }}" class="text-white text-decoration-none py-1"><i class="bi bi-newspaper me-2"></i>Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="text-white text-decoration-none py-1"><i class="bi bi-people me-2"></i>Struktur Organisasi</a>
        <a href="{{ url('login') }}" class="btn btn-success mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login Portal</a>
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

              <!-- Step 1: Penempatan & Identitas Karyawan via NIKSAP -->
              <div class="mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                  <span class="step-badge">1</span>
                  <div>
                    <h4 class="fw-bold text-dark mb-0">Identitas Karyawan (Verifikasi NIKSAP)</h4>
                    <small class="text-muted">Masukkan Nomor Induk Karyawan SAP (NIKSAP) Anda untuk memverifikasi data pelapor secara akurat.</small>
                  </div>
                </div>
              </div>

              <!-- Hidden inputs required by database controller -->
              <input type="hidden" name="nama_area" id="hiddenAreaId" value="{{ old('nama_area') }}">
              <input type="hidden" name="nama_realisasi" id="hiddenRealisasiId" value="{{ old('nama_realisasi') }}">
              <input type="hidden" name="nama_posisi" id="hiddenPosisiId" value="{{ old('nama_posisi') }}">
              <input type="hidden" name="nama_karyawan" id="hiddenKaryawanId" value="{{ old('nama_karyawan') }}">

              <div class="row g-4 mb-4">
                <!-- 1. Input NIKSAP -->
                <div class="col-md-7">
                  <label class="form-label fw-bold text-dark">Nomor Induk Karyawan (NIKSAP) <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-success"><i class="bi bi-person-badge fs-5"></i></span>
                    <input type="text" id="inputNiksap" name="niksap" class="form-control form-control-lg border-start-0" placeholder="Ketik nomor NIKSAP Anda..." value="{{ old('niksap') }}" required autocomplete="off">
                    <button class="btn btn-success px-4 fw-bold" type="button" id="btnCekNiksap">
                      <span id="btnCekText"><i class="bi bi-search me-1"></i> Periksa</span>
                      <span id="btnCekSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                    </button>
                  </div>
                  <small class="text-muted">Tekan tombol <strong>Periksa</strong> atau tekan <strong>Enter</strong> pada keyboard untuk memuat data karyawan.</small>
                </div>

                <!-- 2. Nomor HP / WA -->
                <div class="col-md-5">
                  <label class="form-label fw-bold text-dark">Nomor WhatsApp / HP Aktif <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-success"><i class="bi bi-whatsapp fs-5"></i></span>
                    <input type="tel" id="inputNoHp" name="no_hp" class="form-control form-control-lg border-start-0" placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}" required>
                  </div>
                  <small class="text-muted">Untuk menerima update respon & tindak lanjut dari pimpinan.</small>
                </div>

                <!-- 3. Status Verifikasi Data Karyawan -->
                <div class="col-12">
                  <div id="niksapFeedbackAlert" class="alert d-none mb-0 p-3" style="border-radius: 14px;"></div>

                  <div id="verifiedEmployeeCard" class="p-3 p-md-4 rounded-4 border d-none" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border-color: #86efac !important;">
                    <div class="d-flex align-items-start gap-3">
                      <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm flex-shrink-0 mt-1" style="width: 52px; height: 52px;">
                        <i class="bi bi-person-check-fill fs-3"></i>
                      </div>
                      <div class="flex-grow-1">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                          <span class="badge bg-success text-white px-3 py-1 small fw-bold"><i class="bi bi-patch-check-fill me-1"></i>DATA TERVERIFIKASI</span>
                          <span class="badge bg-dark text-white px-3 py-1 small fw-bold" id="cardUnitBadge">KBN DOS (Kebun)</span>
                        </div>
                        <h4 class="fw-bold text-dark mb-2" id="cardNamaKaryawan">-</h4>
                        <div class="row g-2 text-dark pt-2 border-top border-success border-opacity-25 small">
                          <div class="col-sm-4">
                            <span class="text-muted d-block small">Unit Operasional:</span>
                            <strong class="text-success" id="cardArea">-</strong>
                          </div>
                          <div class="col-sm-4">
                            <span class="text-muted d-block small">Bagian / Afdeling:</span>
                            <strong class="text-dark" id="cardRealisasi">-</strong>
                          </div>
                          <div class="col-sm-4">
                            <span class="text-muted d-block small">Jabatan / Posisi:</span>
                            <strong class="text-dark" id="cardPosisi">-</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
              <div class="text-center pt-2">
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
        <img src="{{ asset('assets/img/logoo.png') }}" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Logo_PTPN_IV.png/640px-Logo_PTPN_IV.png';" alt="Logo" style="height: 32px;">
        <span class="text-white fw-bold">PTPN IV Regional II Kebun Dolok Sinumbah</span>
      </div>
      <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} PT Perkebunan Nusantara IV (Persero). Seluruh Hak Cipta Dilindungi.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      function verifikasiNiksap() {
        let niksap = $('#inputNiksap').val().trim();
        if (!niksap) {
          showFeedback('warning', '<i class="bi bi-exclamation-circle-fill me-2"></i> Silakan ketik nomor NIKSAP Anda terlebih dahulu.');
          $('#inputNiksap').focus();
          return;
        }

        // Tampilkan loading spinner
        $('#btnCekText').addClass('d-none');
        $('#btnCekSpinner').removeClass('d-none');
        $('#btnCekNiksap').prop('disabled', true);
        $('#niksapFeedbackAlert').addClass('d-none');
        $('#verifiedEmployeeCard').addClass('d-none');

        $.ajax({
          url: "{{ route('cekNiksapPelapor') }}",
          type: "GET",
          data: { niksap: niksap },
          dataType: "json",
          success: function(response) {
            if (response.success && response.data) {
              let emp = response.data;
              $('#hiddenAreaId').val(emp.id_area);
              $('#hiddenRealisasiId').val(emp.id_realisasi);
              $('#hiddenPosisiId').val(emp.id_posisi);
              $('#hiddenKaryawanId').val(emp.id_karyawan);

              // Auto-fill No HP jika tersedia di database dan belum diisi pengguna
              if (emp.no_hp && !$('#inputNoHp').val()) {
                $('#inputNoHp').val(emp.no_hp);
              }

              // Update tampilan kartu verifikasi
              $('#cardNamaKaryawan').text(emp.nama_karyawan);
              $('#cardUnitBadge').text(emp.unit_label || emp.nama_area);
              $('#cardArea').text(emp.nama_area);
              $('#cardRealisasi').text(emp.nama_realisasi);
              $('#cardPosisi').text(emp.nama_posisi);

              $('#verifiedEmployeeCard').removeClass('d-none');
              $('#niksapFeedbackAlert').addClass('d-none');
            }
          },
          error: function(xhr) {
            let msg = 'NIKSAP tidak ditemukan. Pastikan Anda memasukkan nomor NIKSAP yang valid sesuai kartu pengenal karyawan PTPN IV.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
              msg = xhr.responseJSON.message;
            }
            showFeedback('danger', '<i class="bi bi-x-circle-fill me-2"></i> ' + msg);
            $('#hiddenAreaId').val('');
            $('#hiddenRealisasiId').val('');
            $('#hiddenPosisiId').val('');
            $('#hiddenKaryawanId').val('');
            $('#verifiedEmployeeCard').addClass('d-none');
          },
          complete: function() {
            $('#btnCekText').removeClass('d-none');
            $('#btnCekSpinner').addClass('d-none');
            $('#btnCekNiksap').prop('disabled', false);
          }
        });
      }

      function showFeedback(type, message) {
        let alertBox = $('#niksapFeedbackAlert');
        alertBox.removeClass('d-none alert-success alert-warning alert-danger')
                .addClass('alert-' + type)
                .html(message);
      }

      // Trigger verifikasi saat tombol diklik
      $('#btnCekNiksap').on('click', function(e) {
        e.preventDefault();
        verifikasiNiksap();
      });

      // Trigger verifikasi saat tombol Enter ditekan pada input NIKSAP
      $('#inputNiksap').on('keypress', function(e) {
        if (e.which === 13) {
          e.preventDefault();
          verifikasiNiksap();
        }
      });

      // Validasi form sebelum submit
      $('form').on('submit', function(e) {
        if (!$('#hiddenKaryawanId').val()) {
          e.preventDefault();
          showFeedback('danger', '<i class="bi bi-exclamation-triangle-fill me-2"></i> Mohon klik tombol <strong>Periksa</strong> untuk memverifikasi NIKSAP Anda terlebih dahulu sebelum mengirim pengaduan.');
          $('#inputNiksap').focus();
          return false;
        }
      });
    });
  </script>
</body>
</html>