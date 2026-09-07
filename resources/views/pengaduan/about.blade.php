<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Tentang Layanan Lapor Pak! | PTPN IV Dolok Sinumbah</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logoo.png') }}" rel="icon" />
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

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
      --slate-700: #334155;
      --slate-600: #475569;
    }

    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      color: var(--slate-700);
      background-color: var(--eco-bg);
      overflow-x: hidden;
    }

    /* Top Navbar EcoBuild Style */
    .eco-header {
      background: rgba(7, 30, 19, 0.95);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 14px 0;
      z-index: 1000;
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

    /* Page Hero */
    .page-hero {
      background: linear-gradient(180deg, #071e13 0%, #0d2818 60%, #133c24 100%);
      padding: 160px 0 90px 0;
      color: #ffffff;
      text-align: center;
      position: relative;
    }

    /* Card Box */
    .card-box {
      background: #ffffff;
      border: 1px solid #e9ecef;
      border-radius: 22px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.04);
      padding: 40px;
      height: 100%;
      transition: all 0.3s ease;
    }
    .card-box:hover {
      box-shadow: 0 16px 30px rgba(0,0,0,0.08);
      border-color: var(--eco-lime);
    }

    /* Footer */
    .eco-footer {
      background: #071e13;
      color: #cbd5e1;
      padding: 60px 0 30px 0;
      border-top: 1px solid rgba(255,255,255,0.08);
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="eco-header fixed-top">
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
        <a href="{{ url('about') }}" class="eco-nav-link active">Tentang Kami</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Pimpinan</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="eco-nav-link">Cek Status</a>
        <a href="{{ url('login') }}" class="btn-eco-pill ms-2">
          <i class="bi bi-person-fill"></i> Portal Login
        </a>
      </nav>
    </div>
  </header>

  <main>
    <div class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <span class="badge bg-success bg-opacity-25 text-white border border-white border-opacity-25 px-3 py-2 rounded-pill mb-3">
          <i class="bi bi-shield-check me-1"></i> Prinsip Good Corporate Governance (GCG)
        </span>
        <h1 class="fw-bold mb-2 font-display text-white" style="font-size: 2.8rem;">Mengenal Sistem "Lapor Pak!"</h1>
        <p class="text-white-50 mx-auto" style="max-width: 600px; font-size: 1.1rem;">Saluran aspirasi dan pengaduan terintegrasi untuk menjamin keadilan, keterbukaan, dan profesionalisme kerja.</p>
      </div>
    </div>

    <div class="container py-5" style="margin-top: -30px;">
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card-box">
            <h4 class="fw-bold text-dark mb-3"><i class="bi bi-bullseye text-success me-2"></i>Tujuan Sistem</h4>
            <p style="line-height: 1.8; color: #475569;">
              Sistem <strong>Lapor Pak!</strong> dirancang untuk mempermudah seluruh karyawan PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah dalam menyampaikan aspirasi, keluhan operasional, dan saran perbaikan fasilitas kerja langsung kepada jajaran pimpinan tanpa perantara.
            </p>
            <ul class="list-unstyled mt-3 mb-0">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Perlindungan hak & kenyamanan kerja karyawan</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Peningkatan efisiensi & respon pimpinan afdeling</li>
              <li class="mb-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Penegakan integritas bebas pungli & gratifikasi</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card-box">
            <h4 class="fw-bold text-dark mb-3"><i class="bi bi-shield-lock-fill text-success me-2"></i>Jaminan Kerahasiaan</h4>
            <p style="line-height: 1.8; color: #475569;">
              Setiap laporan yang masuk dilindungi dengan protokol kerahasiaan ketat. Pimpinan yang berwenang menindaklanjuti secara objektif sesuai SOP resmi BUMN dan standar keberlanjutan RSPO/ISPO.
            </p>
            <div class="mt-4">
              <a href="{{ url('pengaduan') }}" class="btn btn-success fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="bi bi-pencil-square me-1"></i> Mulai Buat Pengaduan
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
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 800, once: true });
    }
  </script>
</body>
</html>
