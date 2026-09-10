<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Berita & Kabar Terkini | PTPN IV Kebun Dolok Sinumbah</title>
  <meta name="description" content="Kumpulan berita, pengumuman, dan artikel kegiatan PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah" />

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
      position: relative;
      background: linear-gradient(135deg, rgba(6, 26, 16, 0.90) 0%, rgba(11, 35, 21, 0.85) 50%, rgba(17, 53, 32, 0.92) 100%), url("{{ asset('assets/img/hero-carousel/hero-carousel-1.jpg') }}") center/cover no-repeat;
      padding: 175px 0 105px 0;
      color: #ffffff;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    /* News Cards */
    .eco-news-card {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid #e9ecef;
      overflow: hidden;
      box-shadow: 0 4px 18px rgba(0,0,0,0.04);
      transition: all 0.35s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .eco-news-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 30px -10px rgba(0,0,0,0.12);
      border-color: var(--eco-lime);
    }
    .eco-news-img-wrap {
      position: relative;
      height: 220px;
      overflow: hidden;
      background: #f1f5f9;
    }
    .eco-news-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    .eco-news-card:hover .eco-news-img {
      transform: scale(1.08);
    }
    .eco-news-tag {
      position: absolute;
      top: 14px;
      left: 14px;
      background: rgba(7, 30, 19, 0.88);
      color: #ffffff;
      font-size: 0.72rem;
      font-weight: 700;
      padding: 5px 12px;
      border-radius: 20px;
      backdrop-filter: blur(6px);
      border: 1px solid rgba(255,255,255,0.2);
    }
    .eco-news-body {
      padding: 24px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .eco-news-title {
      font-size: 1.15rem;
      font-weight: 800;
      line-height: 1.4;
      color: var(--slate-900);
      margin-bottom: 12px;
    }
    .eco-news-meta {
      font-size: 0.8rem;
      color: var(--slate-500);
      display: flex;
      justify-content: space-between;
      margin-bottom: 12px;
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
        <img src="{{ asset('assets/img/logo1.png') }}" alt="PTPN IV Logo" style="height: 44px; width: auto;" class="me-3">
        <div class="d-flex flex-column">
          <div class="eco-brand-title text-uppercase" style="font-size: 1.15rem; font-weight: 800; letter-spacing: 0.04em; color: #ffffff;">PTPN IV REGIONAL II</div>
          <span class="eco-brand-sub" style="font-size: 0.72rem; color: #74c69d; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">Kebun Dolok Sinumbah</span>
        </div>
      </a>

      <nav class="d-none d-xl-flex align-items-center gap-1">
        <a href="{{ url('/') }}" class="eco-nav-link">Beranda</a>
        <a href="{{ url('about') }}" class="eco-nav-link">Tentang Kami</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link active">Berita Kebun</a>
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
    <div class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <span class="badge bg-success bg-opacity-25 text-white border border-white border-opacity-25 px-3 py-2 rounded-pill mb-3">
          <i class="bi bi-newspaper me-1"></i> Publikasi & Transformasi
        </span>
        <h1 class="fw-bold mb-2 font-display text-white" style="font-size: 2.8rem;">Kabar & Informasi Kebun</h1>
        <p class="text-white-50 mx-auto" style="max-width: 600px; font-size: 1.1rem;">Berita terkini, agenda operasional, dan inovasi keberlanjutan PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah.</p>
      </div>
    </div>

    <div class="container py-5" style="margin-top: -30px;">
      <div class="row g-4">
        @forelse ($news as $item)
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="eco-news-card">
              <div class="eco-news-img-wrap">
                <span class="eco-news-tag">
                  <i class="bi bi-tag-fill me-1"></i> Berita Kebun
                </span>
                @php
                  $newsImg = null;
                  if ($item->image && file_exists(public_path($item->image))) {
                    $newsImg = asset($item->image);
                  } elseif ($item->image && file_exists(public_path('storage/' . $item->image))) {
                    $newsImg = asset('storage/' . $item->image);
                  } else {
                    $newsImg = asset('assets/img/sawit.jpg');
                  }
                @endphp
                <img src="{{ $newsImg }}" class="eco-news-img" alt="{{ $item->title }}">
              </div>
              <div class="eco-news-body">
                <div>
                  <div class="eco-news-meta">
                    <span><i class="bi bi-person me-1 text-success"></i>{{ $item->author }}</span>
                    <span><i class="bi bi-calendar3 me-1 text-success"></i>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                  </div>
                  <h5 class="eco-news-title">{{ $item->title }}</h5>
                  <p class="text-muted small mb-4">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->intro ?: $item->main), 120) }}
                  </p>
                </div>
                <a href="{{ route('news.detail', $item->id_berita) }}" class="text-success fw-bold text-decoration-none d-flex align-items-center gap-1">
                  <span>Baca Selengkapnya</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center py-5 text-muted">
            <i class="bi bi-newspaper fs-1 mb-2 d-block"></i>
            Belum ada artikel berita yang dipublikasikan.
          </div>
        @endforelse
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
