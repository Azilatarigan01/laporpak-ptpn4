<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Tentang Kami | PTPN IV Regional II Kebun Dolok Sinumbah</title>
  <meta name="description" content="Sejarah, Transformasi, dan Profil PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah" />

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
  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

  <style>
    [data-aos] {
      opacity: 1 !important;
      transform: none !important;
      visibility: visible !important;
    }
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
      background-color: #ffffff;
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
      position: relative;
      background: linear-gradient(135deg, rgba(6, 26, 16, 0.90) 0%, rgba(11, 35, 21, 0.85) 50%, rgba(17, 53, 32, 0.92) 100%), url("{{ asset('assets/img/hero-carousel/hero-carousel-1.jpg') }}") center/cover no-repeat;
      padding: 175px 0 105px 0;
      color: #ffffff;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .page-hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: radial-gradient(circle at 80% 20%, rgba(82, 183, 136, 0.25) 0%, transparent 50%);
      pointer-events: none;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(82, 183, 136, 0.2);
      border: 1px solid rgba(116, 198, 157, 0.45);
      padding: 8px 18px;
      border-radius: 30px;
      font-size: 0.84rem;
      font-weight: 700;
      color: #74c69d;
      margin-bottom: 18px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    /* Content Cards */
    .content-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      box-shadow: 0 6px 25px rgba(0,0,0,0.04);
      padding: 40px;
      transition: all 0.3s ease;
    }
    .content-card:hover {
      box-shadow: 0 16px 35px rgba(0,0,0,0.08);
      border-color: #52b788;
    }
    .timeline-item {
      border-left: 3px solid var(--eco-vibrant);
      padding-left: 22px;
      position: relative;
      margin-bottom: 24px;
    }
    .timeline-item::before {
      content: "";
      position: absolute;
      left: -9px;
      top: 2px;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: var(--eco-vibrant);
      border: 3px solid #ffffff;
      box-shadow: 0 0 0 2px var(--eco-vibrant);
    }

    /* Footer EcoBuild Style */
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
        <img src="{{ asset('assets/img/logo1.png') }}" alt="PTPN IV Logo" style="height: 44px; width: auto;" class="me-3">
        <div class="d-flex flex-column">
          <div class="eco-brand-title text-uppercase" style="font-size: 1.15rem; font-weight: 800; letter-spacing: 0.04em; color: #ffffff;">PTPN IV REGIONAL II</div>
          <span class="eco-brand-sub" style="font-size: 0.72rem; color: #74c69d; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">Kebun Dolok Sinumbah</span>
        </div>
      </a>

      <nav class="d-none d-xl-flex align-items-center gap-1">
        <a href="{{ url('/') }}" class="eco-nav-link">Beranda</a>
        <a href="{{ url('about') }}" class="eco-nav-link active">Tentang Kami</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Struktur Organisasi</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="eco-nav-link">Cek Status</a>
        <a href="{{ url('login') }}" class="btn-eco-pill ms-2">
          <i class="bi bi-shield-lock-fill"></i> Login Petugas
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
    <section class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <div class="hero-badge" data-aos="fade-down">
          <i class="bi bi-building-check"></i> Profil & Dedikasi Perusahaan
        </div>
        <h1 class="fw-bold mb-3 font-display text-white" style="font-size: 2.8rem;">
          PT Perkebunan Nusantara IV
        </h1>
        <p class="text-white-50 mx-auto mb-0" style="max-width: 640px; font-size: 1.1rem; line-height: 1.7;">
          Regional II Kebun & Pabrik Kelapa Sawit (PKS) Dolok Sinumbah — Mengawal Keberlanjutan dan Integritas Sejak 1928.
        </p>
      </div>
    </section>

    <!-- Main Content Section -->
    <div class="container py-5" style="margin-top: -30px;">
      <div class="row g-4">
        <!-- Sejarah & Linimasa -->
        <div class="col-lg-7" data-aos="fade-up">
          <div class="content-card h-100">
            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill mb-3">
              <i class="bi bi-clock-history me-1"></i> Sejarah & Transformasi
            </span>
            <h3 class="fw-bold text-dark mb-4">Perjalanan Kebun Dolok Sinumbah</h3>
            <p style="line-height: 1.8; color: #475569;">
              Kebun Dolok Sinumbah didirikan pertama kali pada tahun <strong>1928</strong> oleh <em>NV Handle Veronigging Amsterdam (NVHVA)</em> dengan fokus utama budidaya kelapa sawit berkualitas tinggi di tanah subur Simalungun.
            </p>
            <p style="line-height: 1.8; color: #475569;">
              Setelah masa kemerdekaan Indonesia, seluruh aset perkebunan dinasionalisasi dan diberi nama <strong>Perkebunan Negara Baru (PPN Baru) eks HVA</strong>. Pada tahun 1960, kebun bertransformasi menjadi bagian integral dari Perusahaan Perkebunan Persatuan Sumut III.
            </p>
            <p style="line-height: 1.8; color: #475569;">
              Berdasarkan <strong>Peraturan Pemerintah RI No. 9 Tahun 1996</strong>, entitas bisnis ini resmi menjadi <strong>PT Perkebunan Nusantara IV (Persero)</strong>, dan kini beroperasi sebagai unit strategis <strong>PTPN IV Regional II Kebun Dolok Sinumbah</strong> yang berstandar internasional (RSPO & ISPO).
            </p>

            <h5 class="fw-bold text-dark mt-4 mb-3">Tonggak Sejarah Utama:</h5>
            <div class="timeline-item">
              <h6 class="fw-bold text-success mb-1">Tahun 1973 - Pembagian Wilayah Rayon</h6>
              <p class="small text-muted mb-0">Masuk ke dalam struktur PNP VII dan dibagi menjadi dua rayon strategis (Afdeling I-VIII dan Afdeling IX-X eks Tonduhan).</p>
            </div>
            <div class="timeline-item">
              <h6 class="fw-bold text-success mb-1">Tahun 1981 s/d Sekarang - Modernisasi & Integrasi PKS</h6>
              <p class="small text-muted mb-0">Reorganisasi struktur kebun menjadi unit mandiri Dolok Sinumbah yang terintegrasi langsung dengan Pabrik Kelapa Sawit (PKS) berteknologi modern.</p>
            </div>
          </div>
        </div>

        <!-- Video Profil & Maps -->
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
          <div class="content-card mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold text-dark mb-0"><i class="bi bi-play-circle-fill text-danger me-2"></i>Video Profil Unit</h5>
              <a href="https://www.youtube.com/results?search_query=PTPN+IV+Kebun+Dolok+Sinumbah" target="_blank" class="badge bg-danger bg-opacity-10 text-danger text-decoration-none px-2 py-1 rounded-pill">
                <i class="bi bi-youtube me-1"></i> Buka YouTube
              </a>
            </div>
            <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm border mb-3">
              <iframe src="https://www.youtube.com/embed/videoseries?list=PL_ptpn4_corporate" title="PTPN IV Kebun Dolok Sinumbah" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p class="small text-muted mb-0">
              <i class="bi bi-info-circle me-1 text-success"></i> Dokumentasi operasional perkebunan, pemanenan kelapa sawit berstandar ISPO/RSPO, dan fasilitas Pabrik Kelapa Sawit (PKS) Dolok Sinumbah.
            </p>
          </div>

          <div class="content-card">
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-geo-alt-fill text-success me-2"></i>Lokasi Operasional</h5>
            <p class="small text-muted mb-2"><i class="bi bi-pin-map-fill text-danger me-1"></i> Dolok Sinumbah, Kec. Hutabayu Raja, Kab. Simalungun, Sumatera Utara 21182</p>
            <p class="small text-muted mb-3"><i class="bi bi-telephone-fill text-success me-1"></i> (061) 4154666 &nbsp;|&nbsp; <i class="bi bi-envelope-fill text-success me-1"></i> kebun.doloksinumbah@ptpn4.co.id</p>
            <div class="ratio ratio-4x3 rounded-4 overflow-hidden border">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.935796016821!2d99.329174!3d3.1116899000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3033d302d4a1a653%3A0xa9ec18d7b570b3f8!2sPKS%20DOLOK%20SINUMBAH%20PTPN%204%20REGIONAL%202!5e0!3m2!1sen!2sid!4v1736473653348" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
