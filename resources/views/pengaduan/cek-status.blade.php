<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Cek Status Pengaduan | Lapor Pak! PTPN IV Kebun Dolok Sinumbah</title>
  <meta name="description" content="Lacak status tindak lanjut pengaduan dan aspirasi karyawan PTPN IV Kebun Dolok Sinumbah" />

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

  <style>
    :root {
      --eco-dark: #071e13;
      --eco-forest: #0d2818;
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
      background: linear-gradient(180deg, rgba(7, 30, 19, 0.94) 0%, rgba(13, 40, 24, 0.90) 60%, rgba(19, 60, 36, 0.95) 100%), url('{{ asset('assets/img/2sawit.jpg') }}') center/cover no-repeat;
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

    /* Tracker Card */
    .tracker-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 24px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
      padding: 45px;
      margin-top: -50px;
      position: relative;
      z-index: 10;
    }
    @media (max-width: 768px) {
      .tracker-card {
        padding: 26px 20px;
        margin-top: -30px;
      }
    }
    .btn-check-status {
      background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #ffffff;
      font-weight: 800;
      font-size: 1.05rem;
      padding: 14px 36px;
      border-radius: 30px;
      box-shadow: 0 8px 20px rgba(45, 106, 79, 0.35);
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-check-status:hover {
      background: linear-gradient(135deg, #40916c 0%, #1b4332 100%);
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(45, 106, 79, 0.45);
    }

    /* Status Feature Cards */
    .status-feature-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 24px;
      height: 100%;
      transition: all 0.3s ease;
    }
    .status-feature-box:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.05);
      border-color: var(--eco-lime);
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
        <img src="{{ asset('assets/img/logoo.png') }}" alt="PTPN IV Logo" style="height: 42px;" class="me-2">
        <div>
          <h1 class="eco-brand-title">Dolok Sinumbah</h1>
          <span class="eco-brand-sub">PTPN IV Regional II</span>
        </div>
      </a>

      <nav class="d-none d-xl-flex align-items-center gap-1">
        <a href="{{ url('/') }}" class="eco-nav-link">Beranda</a>
        <a href="{{ url('about') }}" class="eco-nav-link">Tentang Kami</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Pimpinan</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="eco-nav-link active">Cek Status</a>
        <a href="{{ url('login') }}" class="btn-eco-pill ms-2">
          <i class="bi bi-person-fill"></i> Portal Login
        </a>
      </nav>

      <div class="d-flex align-items-center gap-2 d-xl-none">
        <a href="{{ url('login') }}" class="btn btn-sm btn-success px-3 rounded-pill">Login</a>
        <button class="btn btn-dark text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
          <i class="bi bi-list fs-3"></i>
        </button>
      </div>
    </div>

    <div class="collapse d-xl-none bg-dark border-top border-secondary p-3 mt-2" id="mobileNav">
      <div class="d-flex flex-column gap-2">
        <a href="{{ url('/') }}" class="text-white text-decoration-none py-1"><i class="bi bi-house me-2"></i>Beranda</a>
        <a href="{{ url('about') }}" class="text-white text-decoration-none py-1"><i class="bi bi-info-circle me-2"></i>Tentang Kami</a>
        <a href="{{ url('pengaduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-megaphone me-2"></i>Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="text-white text-decoration-none py-1"><i class="bi bi-newspaper me-2"></i>Berita Kebun</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="text-white text-decoration-none py-1"><i class="bi bi-search me-2"></i>Cek Status Laporan</a>
        <a href="{{ url('login') }}" class="btn btn-success mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login Portal</a>
      </div>
    </div>
  </header>

  <main>
    <!-- Page Hero Banner -->
    <div class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <div class="hero-badge">
          <i class="bi bi-search"></i> Pelacakan Pengaduan Real-Time
        </div>
        <h1 class="fw-bold mb-3 font-display text-white" style="font-size: 2.5rem;">
          Lacak Status Pengaduan & Aspirasi
        </h1>
        <p class="text-white-50 mx-auto mb-0" style="max-width: 680px; font-size: 1.05rem; line-height: 1.7;">
          Pantau sejauh mana proses peninjauan dan tindak lanjut laporan pengaduan Anda oleh Pimpinan Unit dan Bagian Personalia Kantor.
        </p>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-9">

          @if(session('error'))
            <div class="alert alert-danger shadow-sm border-0 d-flex align-items-center p-4 mb-4" style="border-radius: 18px; background-color: #fee2e2; color: #991b1b;">
              <i class="bi bi-exclamation-circle-fill fs-3 me-3 text-danger"></i>
              <div class="flex-grow-1 fw-semibold">{{ session('error') }}</div>
            </div>
          @endif

          <!-- Tracker Card -->
          <div class="tracker-card text-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px; background: #f0fdf4; border: 1.5px solid #bbf7d0;">
              <i class="bi bi-ticket-detailed-fill fs-2 text-success"></i>
            </div>
            <h3 class="fw-bold text-dark mb-2">Masukkan Nomor Tiket atau NIKSAP</h3>
            <p class="text-muted mb-4 mx-auto" style="max-width: 580px;">
              Gunakan <strong>Kode Pengaduan</strong> yang Anda terima saat mengirim laporan (contoh: <code>PD260908-1234</code>) atau masukkan <strong>NIKSAP Karyawan</strong> Anda.
            </p>

            <form action="{{ route('cekStatusPengaduan') }}" method="POST" class="mb-4">
              @csrf
              <div class="row g-2 justify-content-center">
                <div class="col-md-8">
                  <div class="input-group input-group-lg">
                    <span class="input-group-text bg-light border-end-0" style="border-radius: 16px 0 0 16px; border-color: #cbd5e1;">
                      <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="kode" class="form-control border-start-0 py-3" placeholder="Contoh: PD260908-1234 atau NIKSAP" required value="{{ old('kode') }}" style="border-color: #cbd5e1; font-size: 1rem;">
                  </div>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-check-status w-100 h-100 py-3 justify-content-center">
                    <i class="bi bi-search"></i>
                    <span>Cari Pengaduan</span>
                  </button>
                </div>
              </div>
            </form>

            <div class="p-3 bg-light rounded-4 text-start border d-flex align-items-start gap-3">
              <i class="bi bi-info-circle-fill fs-4 text-success flex-shrink-0 mt-1"></i>
              <div class="small text-muted">
                <strong class="text-dark d-block mb-1">Panduan Pelacakan Status Pengaduan:</strong>
                <ul class="mb-0 ps-3">
                  <li><strong>Status Diterima:</strong> Laporan telah tercatat dalam sistem dan masuk ke antrean verifikasi unit.</li>
                  <li><strong>Status Dalam Proses:</strong> Laporan sedang ditinjau di lapangan atau dalam proses penanganan oleh personalia/pimpinan.</li>
                  <li><strong>Status Selesai:</strong> Permasalahan telah ditangani tuntas disertai tanggapan resmi dari manajemen.</li>
                </ul>
              </div>
            </div>

            <div class="mt-4 pt-3 border-top">
              <span class="text-muted small">Belum mengajukan pengaduan?</span>
              <a href="{{ url('pengaduan') }}" class="btn btn-sm btn-outline-success fw-bold px-3 py-1 rounded-pill ms-2">
                <i class="bi bi-pencil-square me-1"></i> Buat Pengaduan Baru
              </a>
            </div>
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

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>