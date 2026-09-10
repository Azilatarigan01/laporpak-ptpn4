<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>PTPN IV Regional II Kebun Dolok Sinumbah | Sistem Pengaduan & Layanan Aspirasi</title>
  <meta name="description" content="Portal Resmi PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah - Layanan Aspirasi & Pengaduan Karyawan Lapor Pak!" />

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logoo.png') }}" rel="icon" />
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

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
      --eco-deep: #133c24;
      --eco-green: #2d6a4f;
      --eco-emerald: #40916c;
      --eco-vibrant: #52b788;
      --eco-lime: #74c69d;
      --eco-light: #d8f3dc;
      --eco-bg: #f4f7f4;
      --eco-gold: #e5a93b;
      --slate-900: #0f172a;
      --slate-800: #1e293b;
      --slate-700: #334155;
      --slate-600: #475569;
      --slate-500: #64748b;
      --slate-200: #e2e8f0;
    }

    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      color: var(--slate-700);
      background-color: #ffffff;
      overflow-x: hidden;
    }

    h1, h2, h3, h4, .font-display {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800;
      color: var(--slate-900);
      letter-spacing: -0.03em;
    }

    .font-serif-accent {
      font-family: 'Playfair Display', serif;
      font-style: italic;
    }

    /* Top Navbar EcoBuild Style */
    .eco-header {
      background: rgba(7, 30, 19, 0.95);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 14px 0;
      transition: all 0.3s ease;
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
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .btn-eco-pill:hover {
      background: linear-gradient(135deg, #74c69d 0%, #40916c 100%);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(82, 183, 136, 0.5);
      color: #ffffff !important;
    }
    .btn-eco-white-pill {
      background: #ffffff;
      color: var(--eco-forest) !important;
      font-weight: 700;
      font-size: 0.95rem;
      padding: 13px 28px;
      border-radius: 30px;
      border: none;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-eco-white-pill:hover {
      background: var(--eco-light);
      color: var(--eco-forest) !important;
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.25);
    }
    .btn-eco-outline-pill {
      background: rgba(255, 255, 255, 0.1);
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.95rem;
      padding: 13px 28px;
      border-radius: 30px;
      border: 1.5px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(8px);
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-eco-outline-pill:hover {
      background: #ffffff;
      color: var(--eco-forest) !important;
      border-color: #ffffff;
      transform: translateY(-2px);
    }

    /* Hero Section (Clean Eco-Corporate Atmosphere) */
    .eco-hero {
      position: relative;
      background: linear-gradient(180deg, #071e13 0%, #0d2818 55%, #133c24 100%);
      color: #ffffff;
      padding: 155px 0 95px 0;
      overflow: hidden;
    }
    .eco-hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: 
        radial-gradient(circle at 85% 20%, rgba(82, 183, 136, 0.18) 0%, transparent 45%),
        radial-gradient(circle at 10% 80%, rgba(45, 106, 79, 0.25) 0%, transparent 50%);
      opacity: 0.9;
      pointer-events: none;
    }
    .hero-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(82, 183, 136, 0.18);
      border: 1px solid rgba(116, 198, 157, 0.4);
      padding: 8px 18px;
      border-radius: 30px;
      font-size: 0.85rem;
      font-weight: 700;
      color: var(--eco-lime);
      margin-bottom: 24px;
      backdrop-filter: blur(6px);
    }
    .hero-title-main {
      font-size: 3.2rem;
      font-weight: 800;
      line-height: 1.15;
      letter-spacing: -0.04em;
      color: #ffffff;
    }
    .text-emerald-glow {
      color: #52b788;
      text-shadow: 0 0 35px rgba(82, 183, 136, 0.45);
    }
    .hero-desc-text {
      font-size: 1.1rem;
      line-height: 1.7;
      color: #cbd5e1;
      max-width: 620px;
      font-weight: 400;
    }

    /* Floating Feature Glass Badges in Hero */
    .hero-glass-pill {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 16px;
      padding: 12px 18px;
      backdrop-filter: blur(12px);
      display: inline-flex;
      align-items: center;
      gap: 12px;
      color: #ffffff;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }
    .hero-glass-pill:hover {
      background: rgba(255, 255, 255, 0.14);
      transform: translateY(-3px);
    }
    .hero-glass-pill i {
      font-size: 1.6rem;
      color: var(--eco-lime);
    }

    /* Hero Right Visual Card */
    .hero-estate-card {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 24px;
      padding: 24px;
      backdrop-filter: blur(16px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
      position: relative;
    }
    .hero-estate-card img {
      border-radius: 16px;
      width: 100%;
      height: 260px;
      object-fit: cover;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    /* Section Subheadings */
    .section-eyebrow {
      font-size: 0.8rem;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--eco-green);
      display: inline-block;
      margin-bottom: 8px;
    }
    .section-heading-dark {
      font-size: 2.35rem;
      font-weight: 800;
      color: var(--slate-900);
      line-height: 1.25;
      letter-spacing: -0.03em;
    }

    /* 5 Clean Value Cards (Thoughtful Solutions in Ref Image) */
    .solution-card {
      background: #ffffff;
      border: 1px solid #e9ecef;
      border-radius: 20px;
      padding: 30px 24px;
      text-align: center;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.03);
      position: relative;
    }
    .solution-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 35px -8px rgba(45, 106, 79, 0.16);
      border-color: var(--eco-lime);
    }
    .solution-icon-wrap {
      width: 68px;
      height: 68px;
      border-radius: 50%;
      background: #f0fdf4;
      border: 1px solid #dcfce7;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.75rem;
      color: var(--eco-forest);
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }
    .solution-card:hover .solution-icon-wrap {
      background: var(--eco-forest);
      color: #ffffff;
      transform: scale(1.08);
    }
    .solution-title {
      font-size: 1.05rem;
      font-weight: 800;
      color: var(--slate-900);
      margin-bottom: 10px;
    }
    .solution-desc {
      font-size: 0.88rem;
      color: var(--slate-600);
      line-height: 1.6;
      margin: 0;
    }

    /* Certification Seals (LEED Badges Style in Ref Image) */
    .cert-section {
      background: #ffffff;
      border-top: 1px solid #f1f5f9;
      border-bottom: 1px solid #f1f5f9;
      padding: 90px 0;
    }
    .cert-seal-card {
      text-align: center;
      transition: all 0.3s ease;
      padding: 15px;
    }
    .cert-seal-card:hover {
      transform: translateY(-4px);
    }
    .cert-circle {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      margin: 0 auto 16px auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      box-shadow: 0 8px 20px rgba(0,0,0,0.06);
      border: 2px solid;
    }
    .cert-green {
      background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
      border-color: #52b788;
      color: #ffffff;
    }
    .cert-silver {
      background: linear-gradient(135deg, #64748b 0%, #334155 100%);
      border-color: #cbd5e1;
      color: #ffffff;
    }
    .cert-gold {
      background: linear-gradient(135deg, #b45309 0%, #78350f 100%);
      border-color: #fbbf24;
      color: #ffffff;
    }
    .cert-platinum {
      background: linear-gradient(135deg, #475569 0%, #0f172a 100%);
      border-color: #94a3b8;
      color: #ffffff;
    }
    .cert-circle .cert-icon {
      font-size: 1.6rem;
      margin-bottom: 2px;
    }
    .cert-circle .cert-text {
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    .cert-seal-name {
      font-size: 0.95rem;
      font-weight: 800;
      color: var(--slate-900);
      margin-bottom: 3px;
    }
    .cert-seal-sub {
      font-size: 0.8rem;
      color: var(--slate-500);
    }

    /* Stat Counter Banner (Dark Green Luxury Banner in Ref Image) */
    .eco-stat-banner {
      background: linear-gradient(135deg, #071e13 0%, #0d2818 50%, #133c24 100%);
      color: #ffffff;
      padding: 70px 0;
      position: relative;
      border-top: 1px solid rgba(255,255,255,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .stat-item-box {
      text-align: center;
      padding: 10px;
    }
    .stat-icon-glow {
      font-size: 2rem;
      color: var(--eco-lime);
      margin-bottom: 12px;
    }
    .stat-num-val {
      font-size: 2.75rem;
      font-weight: 800;
      color: #ffffff;
      line-height: 1;
      margin-bottom: 8px;
      letter-spacing: -0.03em;
    }
    .stat-lbl-txt {
      font-size: 0.88rem;
      color: #cbd5e1;
      font-weight: 500;
      margin: 0;
    }

    /* News Grid Section ("Green Projects. Real Results.") */
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

    /* Pimpinan Kebun Section (Dynamic Hierarchy) */
    .pimpinan-eco-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .pimpinan-eco-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 24px 45px -10px rgba(45, 106, 79, 0.22);
      border-color: #52b788;
    }
    .pimpinan-card-header {
      background: linear-gradient(135deg, #071e13 0%, #133c24 100%);
      padding: 16px 20px 50px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
    }
    .pimpinan-badge-unit {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.25);
      color: #74c69d;
      font-size: 0.72rem;
      font-weight: 700;
      padding: 4px 12px;
      border-radius: 20px;
      letter-spacing: 0.05em;
    }
    .pimpinan-avatar-wrap {
      margin-top: -45px;
      text-align: center;
      position: relative;
      z-index: 2;
    }
    .pimpinan-avatar-frame {
      width: 130px;
      height: 130px;
      margin: 0 auto;
      border-radius: 50%;
      border: 4px solid #ffffff;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      overflow: hidden;
      background: #e2e8f0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .pimpinan-avatar-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      transition: transform 0.4s ease;
    }
    .pimpinan-eco-card:hover .pimpinan-avatar-img {
      transform: scale(1.08);
    }
    .pimpinan-info-box {
      padding: 16px 22px 24px 22px;
      text-align: center;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .pimpinan-name-txt {
      font-size: 1.15rem;
      font-weight: 800;
      color: #0f172a;
      margin-bottom: 4px;
      line-height: 1.3;
    }
    .pimpinan-position-pill {
      font-size: 0.82rem;
      font-weight: 700;
      color: #1b4332;
      background: #e8f5e9;
      border: 1px solid #c8e6c9;
      padding: 4px 14px;
      border-radius: 20px;
      display: inline-block;
      margin-bottom: 12px;
    }
    .pimpinan-quote-wrap {
      background: #f8fafc;
      border-radius: 12px;
      padding: 10px 14px;
      border-left: 3px solid #52b788;
      text-align: left;
    }
    .pimpinan-quote-txt {
      font-size: 0.82rem;
      color: #475569;
      font-style: italic;
      line-height: 1.5;
      margin: 0;
    }

    /* Testimonial / Management Quote */
    .mgmt-quote-section {
      background: #ffffff;
      padding: 80px 0;
      border-top: 1px solid #f1f5f9;
    }
    .mgmt-quote-card {
      max-width: 820px;
      margin: 0 auto;
      text-align: center;
      padding: 20px;
    }
    .quote-icon-leaf {
      font-size: 2.5rem;
      color: var(--eco-lime);
      margin-bottom: 18px;
    }
    .quote-text-main {
      font-size: 1.45rem;
      font-weight: 600;
      line-height: 1.6;
      color: var(--slate-900);
      margin-bottom: 24px;
    }

    /* Dark EcoBuild Footer with Contact Form */
    .eco-footer {
      background: #071e13;
      color: #cbd5e1;
      padding: 90px 0 35px 0;
      position: relative;
      overflow: hidden;
    }
    .eco-footer::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: radial-gradient(circle at 90% 90%, rgba(82, 183, 136, 0.12) 0%, transparent 50%);
      pointer-events: none;
    }
    .footer-heading {
      font-size: 2.2rem;
      font-weight: 800;
      color: #ffffff;
      line-height: 1.25;
      letter-spacing: -0.03em;
    }
    .footer-contact-item {
      display: flex;
      align-items: flex-start;
      gap: 16px;
      margin-bottom: 20px;
    }
    .footer-contact-icon {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: rgba(82, 183, 136, 0.15);
      border: 1px solid rgba(82, 183, 136, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--eco-lime);
      font-size: 1.2rem;
      flex-shrink: 0;
    }
    .footer-form-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 35px;
      box-shadow: 0 20px 45px rgba(0,0,0,0.3);
      color: var(--slate-800);
    }
    .footer-form-card h4 {
      font-weight: 800;
      color: var(--slate-900);
      margin-bottom: 18px;
    }
    .footer-link-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .footer-link-list li {
      margin-bottom: 10px;
    }
    .footer-link-list a {
      color: #94a3b8;
      text-decoration: none;
      font-size: 0.9rem;
      transition: color 0.25s ease;
    }
    .footer-link-list a:hover {
      color: #ffffff;
      padding-left: 4px;
    }
  </style>
</head>

<body>
  <!-- Header / Navigation Bar (EcoBuild Clean Style) -->
  <header class="eco-header fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none gap-2">
        <img src="{{ asset('assets/img/logoo.png') }}" alt="PTPN IV Logo" style="height: 42px; width: auto;">
        <div class="d-flex flex-column">
          <span class="fw-bold text-white fs-5 lh-1" style="letter-spacing: -0.01em;">PTPN IV <span class="fw-bold" style="color: #74c69d; font-size: 0.95rem;">REGIONAL II</span></span>
          <span class="text-white-50" style="font-size: 0.72rem; letter-spacing: 0.05em; text-transform: uppercase;">Kebun Dolok Sinumbah &bull; Lapor Pak!</span>
        </div>
      </a>

      <!-- Desktop Navmenu -->
      <nav id="navmenu" class="navmenu d-none d-xl-flex align-items-center gap-1">
        <a href="{{ url('/') }}" class="eco-nav-link active">Beranda</a>
        <a href="{{ url('about') }}" class="eco-nav-link">Tentang Kami</a>
        <a href="{{ url('panduan') }}" class="eco-nav-link">Panduan Alur</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="#leadership" class="eco-nav-link">Struktur Organisasi</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="eco-nav-link">Cek Status</a>
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
        <a href="{{ url('panduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-journal-text me-2"></i>Panduan Alur</a>
        <a href="{{ url('pengaduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-megaphone me-2"></i>Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="text-white text-decoration-none py-1"><i class="bi bi-newspaper me-2"></i>Berita Kebun</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="text-white text-decoration-none py-1"><i class="bi bi-search me-2"></i>Cek Status Laporan</a>
        <a href="{{ url('login') }}" class="btn btn-success mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login Portal</a>
      </div>
    </div>
  </header>

  <main>
    <!-- HERO SECTION (Building Better. Harvesting Greener.) -->
    <section class="eco-hero">
      <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center gy-5">
          <!-- Hero Left Content -->
          <div class="col-lg-7" data-aos="fade-up" data-aos-duration="900">
            <div class="hero-badge-pill">
              <i class="bi bi-shield-fill-check"></i> Sistem Layanan Aspirasi & Pengaduan Karyawan Resmi
            </div>
            
            <h1 class="hero-title-main mb-3">
              Membangun Negeri.<br>
              Melayani dengan <span class="text-emerald-glow">Integritas.</span>
            </h1>

            <p class="hero-desc-text mb-4">
              PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah berkomitmen menciptakan tata kelola perkebunan kelapa sawit unggul, harmonis, dan transparan melalui keterbukaan komunikasi dan perlindungan aspirasi insan perkebunan.
            </p>

            <div class="d-flex flex-wrap gap-3 mb-5">
              <a href="{{ url('pengaduan') }}" class="btn-eco-white-pill">
                <i class="bi bi-megaphone-fill text-success"></i> Buat Pengaduan Cepat
              </a>
              <a href="{{ route('pengaduan.cek-status') }}" class="btn-eco-outline-pill">
                <span>Cek Status Laporan</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <!-- Floating Glass Badges below buttons -->
            <div class="d-flex flex-wrap gap-3">
              <div class="hero-glass-pill">
                <i class="bi bi-shield-lock-fill"></i>
                <div>
                  <div class="fw-bold small">Kerahasiaan Terjamin</div>
                  <div class="text-white-50" style="font-size: 0.75rem;">Whistleblowing aman & terlindungi</div>
                </div>
              </div>
              <div class="hero-glass-pill">
                <i class="bi bi-award-fill"></i>
                <div>
                  <div class="fw-bold small">Standar Mutu Berkelanjutan</div>
                  <div class="text-white-50" style="font-size: 0.75rem;">Mengawal ISPO, RSPO & K3</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Hero Right Visual Card -->
          <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="900">
            <div class="hero-estate-card">
              <img src="{{ asset('assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="Kebun Sawit Dolok Sinumbah">
              <div class="mt-3 text-white">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <span class="badge bg-success bg-opacity-25 text-light border border-success border-opacity-50 px-3 py-1 rounded-pill">
                    <i class="bi bi-geo-alt-fill me-1"></i> Kebun Dolok Sinumbah
                  </span>
                  <small class="text-white-50"><i class="bi bi-patch-check-fill text-warning me-1"></i>Verified Unit</small>
                </div>
                <h5 class="fw-bold mb-0">PTPN IV Regional II</h5>
                <p class="text-white-50 small mb-0">Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- INTERACTIVE HUB: LACAK STATUS & FORMULIR PENGADUAN -->
    <section class="py-5" style="margin-top: -60px; position: relative; z-index: 20;">
      <div class="container">
        <div class="row g-4 justify-content-center">
          <!-- Card 1: Lacak Status Pengaduan Cepat -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 shadow-lg p-4 p-md-5 h-100" style="border-radius: 26px; background: #ffffff; border-top: 6px solid #2d6a4f !important;">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background: #f0fdf4; border: 1px solid #bbf7d0;">
                  <i class="bi bi-search fs-4 text-success"></i>
                </div>
                <div>
                  <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1 rounded-pill mb-1">Pencarian Cepat</span>
                  <h4 class="fw-bold text-dark mb-0">Lacak Status Pengaduan</h4>
                </div>
              </div>
              <p class="text-muted small mb-4">
                Masukkan <strong>Nomor Tiket</strong> pengaduan atau <strong>NIKSAP Karyawan</strong> untuk memantau status verifikasi dan tindak lanjut laporan secara real-time.
              </p>

              <form action="{{ route('cekStatusPengaduan') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                  <span class="input-group-text bg-light border-end-0" style="border-radius: 14px 0 0 14px; border-color: #cbd5e1;">
                    <i class="bi bi-ticket-detailed text-muted fs-5"></i>
                  </span>
                  <input type="text" name="kode" class="form-control border-start-0 py-3 ps-2" placeholder="Contoh: PD240901-1234 atau NIKSAP" required style="border-color: #cbd5e1; font-size: 0.95rem;">
                  <button type="submit" class="btn btn-success px-4 fw-bold" style="border-radius: 0 14px 14px 0;">
                    <i class="bi bi-search me-1"></i> Lacak
                  </button>
                </div>
              </form>

              <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top text-muted small">
                <span class="fw-semibold text-dark"><i class="bi bi-info-circle text-success me-1"></i>Tips:</span>
                <span>Simpan kode tiket saat mengisi formulir untuk pelacakan.</span>
              </div>
            </div>
          </div>

          <!-- Card 2: Formulir Pengaduan Cepat -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 shadow-lg p-4 p-md-5 h-100 text-white" style="border-radius: 26px; background: linear-gradient(135deg, #071e13 0%, #0d2818 50%, #133c24 100%); position: relative; overflow: hidden;">
              <div class="position-relative" style="z-index: 2;">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background: rgba(82, 183, 136, 0.2); border: 1px solid rgba(116, 198, 157, 0.4);">
                    <i class="bi bi-megaphone-fill fs-4 text-emerald-glow"></i>
                  </div>
                  <div>
                    <span class="badge bg-success bg-opacity-25 text-light border border-success border-opacity-50 fw-bold px-3 py-1 rounded-pill mb-1">Layanan Aspirasi</span>
                    <h4 class="fw-bold text-white mb-0">Formulir Pengaduan Karyawan</h4>
                  </div>
                </div>
                <p class="text-white-50 small mb-4">
                  Sampaikan laporan kendala kerja, fasilitas, atau saran perbaikan langsung ke manajemen unit Dolok Sinumbah. <strong>100% Rahasia & Terlindungi.</strong>
                </p>

                <div class="d-flex flex-wrap gap-3 align-items-center">
                  <a href="{{ url('pengaduan') }}" class="btn btn-light fw-bold px-4 py-3 rounded-pill text-success shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="bi bi-pencil-square"></i>
                    <span>Isi Formulir Pengaduan</span>
                    <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                  <a href="{{ route('panduan') }}" class="btn btn-outline-light px-3 py-3 rounded-pill small fw-semibold">
                    Panduan Alur <i class="bi bi-question-circle ms-1"></i>
                  </a>
                </div>

                <div class="d-flex flex-wrap gap-3 mt-4 pt-3 border-top border-secondary text-white-50 small">
                  <span><i class="bi bi-shield-check text-success me-1"></i>Kerahasiaan Aman</span>
                  <span><i class="bi bi-lightning-charge text-warning me-1"></i>Respons Terukur</span>
                  <span><i class="bi bi-check-all text-info me-1"></i>Tembusan Pimpinan</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 5 VALUE / SOLUTION CARDS ("Thoughtful Solutions. Lasting Impact.") -->
    <section class="py-5" style="background-color: var(--eco-bg);">
      <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
          <span class="section-eyebrow">TATA KELOLA & LAYANAN TERPADU</span>
          <h2 class="section-heading-dark">Solusi Berkelanjutan. Dampak Nyata.</h2>
          <p class="text-muted mx-auto" style="max-width: 650px;">
            Inovasi pelayanan aspirasi dan penanganan pengaduan demi menciptakan lingkungan kerja perkebunan yang sehat, produktif, dan beretika.
          </p>
        </div>

        <div class="row g-4">
          <!-- Card 1 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-shield-shaded"></i>
              </div>
              <h5 class="solution-title">Kerahasiaan Identitas</h5>
              <p class="solution-desc">Data dan identitas pelapor dijamin aman serta dilindungi penuh oleh manajemen.</p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-lightning-charge-fill"></i>
              </div>
              <h5 class="solution-title">Respons Cepat</h5>
              <p class="solution-desc">Verifikasi dan tindak lanjut langsung dari pimpinan unit dalam waktu terukur.</p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <h5 class="solution-title">Transparansi Real-Time</h5>
              <p class="solution-desc">Pantau status laporan dan riwayat tanggapan pimpinan kapan saja melalui tiket.</p>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-tree-fill"></i>
              </div>
              <h5 class="solution-title">K3 & Lingkungan</h5>
              <p class="solution-desc">Mengawal keselamatan kerja dan kepatuhan standar RSPO & ISPO di setiap afdeling.</p>
            </div>
          </div>

          <!-- Card 5 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-heart-fill"></i>
              </div>
              <h5 class="solution-title">Nilai Utama AKHLAK</h5>
              <p class="solution-desc">Menjunjung tinggi integritas BUMN: Amanah, Kompeten, Harmonis, Loyal, Adaptif, Kolaboratif.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CERTIFICATIONS & STANDARDS SECTION (LEED Style in Ref Image) -->
    <section class="cert-section">
      <div class="container">
        <div class="row align-items-center gy-5">
          <div class="col-lg-5" data-aos="fade-right">
            <span class="section-eyebrow">STANDAR & SERTIFIKASI UNGGUL</span>
            <h2 class="section-heading-dark mb-3">Tata Kelola Unggul yang Dapat Anda Percaya.</h2>
            <p class="text-muted mb-4" style="line-height: 1.7;">
              Kebun Dolok Sinumbah beroperasi dengan kepatuhan penuh terhadap standar mutu nasional dan internasional guna menjamin keberlanjutan hasil panen, keselamatan pekerja, dan kelestarian ekosistem.
            </p>
            <a href="{{ url('about') }}" class="btn btn-outline-success fw-bold px-4 py-2 rounded-pill">
              Pelajari Standar Mutu <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>

          <div class="col-lg-7" data-aos="fade-left">
            <div class="row g-4 justify-content-center">
              <!-- Seal 1: RSPO -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-green">
                    <i class="bi bi-patch-check-fill cert-icon text-warning"></i>
                    <span class="cert-text">RSPO</span>
                  </div>
                  <h6 class="cert-seal-name">RSPO Certified</h6>
                  <span class="cert-seal-sub">Sustainable Palm Oil</span>
                </div>
              </div>

              <!-- Seal 2: ISPO -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-silver">
                    <i class="bi bi-award-fill cert-icon"></i>
                    <span class="cert-text">ISPO</span>
                  </div>
                  <h6 class="cert-seal-name">ISPO Certified</h6>
                  <span class="cert-seal-sub">Indonesian Standard</span>
                </div>
              </div>

              <!-- Seal 3: ISO 9001 -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-gold">
                    <i class="bi bi-star-fill cert-icon text-warning"></i>
                    <span class="cert-text">ISO 9001</span>
                  </div>
                  <h6 class="cert-seal-name">ISO 9001:2015</h6>
                  <span class="cert-seal-sub">Quality Management</span>
                </div>
              </div>

              <!-- Seal 4: SMK3 & ISO 14001 -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-platinum">
                    <i class="bi bi-shield-check cert-icon text-info"></i>
                    <span class="cert-text">SMK3</span>
                  </div>
                  <h6 class="cert-seal-name">SMK3 / ISO 14001</h6>
                  <span class="cert-seal-sub">Safety & Environment</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- METRICS & IMPACT BANNER (Dark Emerald Banner in Ref Image) -->
    <section class="eco-stat-banner">
      <div class="container">
        <div class="row g-4 justify-content-center">
          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="stat-item-box">
              <div class="stat-icon-glow"><i class="bi bi-check2-circle"></i></div>
              <div class="stat-num-val">100%</div>
              <p class="stat-lbl-txt">Tindak Lanjut Laporan</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="stat-item-box">
              <div class="stat-icon-glow"><i class="bi bi-grid-3x3-gap-fill"></i></div>
              <div class="stat-num-val">5+</div>
              <p class="stat-lbl-txt">Afdeling & Wilayah Kebun</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="stat-item-box">
              <div class="stat-icon-glow"><i class="bi bi-stopwatch-fill"></i></div>
              <div class="stat-num-val">&lt; 24 Jam</div>
              <p class="stat-lbl-txt">Verifikasi Awal Pimpinan</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="stat-item-box">
              <div class="stat-icon-glow"><i class="bi bi-people-fill"></i></div>
              <div class="stat-num-val">1,200+</div>
              <p class="stat-lbl-txt">Insan Perkebunan Terlindungi</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="500">
            <div class="stat-item-box">
              <div class="stat-icon-glow"><i class="bi bi-shield-fill-check"></i></div>
              <div class="stat-num-val">0</div>
              <p class="stat-lbl-txt">Toleransi Pungli & Gratifikasi</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- BERITA & AGENDA TERKINI SECTION ("Green Projects. Real Results.") -->
    <section class="py-5" style="background-color: #ffffff;">
      <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3" data-aos="fade-up">
          <div>
            <span class="section-eyebrow">SEPUTAR KEBUN & INFORMASI</span>
            <h2 class="section-heading-dark mb-0">Kabar Kebun. Transformasi Nyata.</h2>
          </div>
          <a href="{{ route('detail') }}" class="btn btn-outline-success fw-bold px-4 py-2 rounded-pill">
            Lihat Semua Berita <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

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
                      $newsImg = asset('assets/img/hero-carousel/hero-carousel-1.jpg');
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
                      {{ \Illuminate\Support\Str::limit(strip_tags($item->intro ?: $item->main), 105) }}
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
              <i class="bi bi-newspaper fs-1 mb-2"></i>
              <p class="mb-0">Belum ada artikel berita yang dipublikasikan.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <!-- JAJARAN MANAJEMEN & PROFIL PIMPINAN (STRUKTUR ORGANISASI RESMI) -->
    <section id="leadership" class="py-5" style="background-color: var(--eco-bg);">
      <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
          <span class="section-eyebrow">STRUKTUR ORGANISASI & MANAJEMEN</span>
          <h2 class="section-heading-dark">Jajaran Pimpinan Unit Kebun</h2>
          <p class="text-muted mx-auto" style="max-width: 680px;">
            Mengenal jajaran pimpinan dan manajemen strategis PT Perkebunan Nusantara IV (Persero) Regional II Unit Kebun Dolok Sinumbah yang berkomitmen mewujudkan tata kelola perkebunan yang unggul, bersih, dan berintegritas.
          </p>
        </div>

        <div class="row g-4 justify-content-center">
          @if(isset($pimpinan) && count($pimpinan) > 0)
            @foreach ($pimpinan as $index => $leader)
              @php
                $leaderPhoto = null;
                if ($leader->profil) {
                    if (file_exists(public_path('uploads/profiles/' . $leader->profil))) {
                        $leaderPhoto = asset('uploads/profiles/' . $leader->profil);
                    } elseif (file_exists(public_path('uploads/profil/' . $leader->profil))) {
                        $leaderPhoto = asset('uploads/profil/' . $leader->profil);
                    } elseif (file_exists(public_path('uploads/' . $leader->profil))) {
                        $leaderPhoto = asset('uploads/' . $leader->profil);
                    } elseif (file_exists(public_path($leader->profil))) {
                        $leaderPhoto = asset($leader->profil);
                    }
                }
              @endphp
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                <div class="pimpinan-eco-card">
                  <!-- Header Card with Official Unit Badge -->
                  <div class="pimpinan-card-header">
                    <span class="pimpinan-badge-unit">
                      <i class="bi bi-building me-1"></i> PTPN IV REGIONAL II
                    </span>
                    <span class="text-white-50 small"><i class="bi bi-shield-fill-check text-success me-1"></i>Pejabat Unit</span>
                  </div>

                  <!-- Executive Avatar Frame (No overlapping badges) -->
                  <div class="pimpinan-avatar-wrap">
                    <div class="pimpinan-avatar-frame">
                      @if($leaderPhoto)
                        <img src="{{ $leaderPhoto }}" class="pimpinan-avatar-img" alt="{{ $leader->name }}">
                      @else
                        <div class="d-flex flex-column align-items-center justify-content-center h-100 w-100" style="background: linear-gradient(135deg, #133c24 0%, #2d6a4f 100%); color: #ffffff;">
                          <i class="bi bi-person-fill fs-1"></i>
                        </div>
                      @endif
                    </div>
                  </div>

                  <!-- Information Box -->
                  <div class="pimpinan-info-box">
                    <div>
                      <h4 class="pimpinan-name-txt">{{ $leader->name }}</h4>
                      <span class="pimpinan-position-pill">{{ $leader->jabatan ?: 'Kepala Bagian / Pimpinan' }}</span>
                    </div>

                    @if($leader->deskripsi_jabatan)
                    <div class="pimpinan-quote-wrap mt-2">
                      <i class="bi bi-quote text-success me-1"></i>
                      <p class="pimpinan-quote-txt d-inline">
                        {{ $leader->deskripsi_jabatan }}
                      </p>
                    </div>
                    @else
                    <div class="pimpinan-quote-wrap mt-2">
                      <p class="pimpinan-quote-txt">
                        "Berkomitmen mengedepankan integritas, produktivitas, dan tata kelola prima insan perkebunan."
                      </p>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <!-- Fallback Mockup Pimpinan -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
              <div class="pimpinan-eco-card">
                <div class="pimpinan-card-header">
                  <span class="pimpinan-badge-unit">
                    <i class="bi bi-building me-1"></i> PTPN IV REGIONAL II
                  </span>
                  <span class="text-white-50 small"><i class="bi bi-shield-fill-check text-success me-1"></i>Pejabat Unit</span>
                </div>
                <div class="pimpinan-avatar-wrap">
                  <div class="pimpinan-avatar-frame">
                    <img src="{{ asset('assets/img/team/team-1.jpg') }}" class="pimpinan-avatar-img" alt="Manajer Kebun">
                  </div>
                </div>
                <div class="pimpinan-info-box">
                  <div>
                    <h4 class="pimpinan-name-txt">TRI MANGKURAT, SP</h4>
                    <span class="pimpinan-position-pill">Manajer Kebun Dolok Sinumbah</span>
                  </div>
                  <div class="pimpinan-quote-wrap mt-2">
                    <p class="pimpinan-quote-txt">"Memimpin dengan keteladanan dan integritas untuk kemajuan bersama insan perkebunan."</p>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

    <!-- MANAGEMENT COMMITMENT / TESTIMONIAL QUOTE SECTION -->
    <section class="mgmt-quote-section">
      <div class="container">
        <div class="mgmt-quote-card" data-aos="fade-up">
          <div class="quote-icon-leaf">
            <i class="bi bi-quote"></i>
          </div>
          <p class="quote-text-main">
            "Mendengar setiap aspirasi karyawan adalah fondasi utama kami dalam membangun operasional kebun kelapa sawit yang tangguh, adil, dan berdaya saing tinggi. Melalui sistem Lapor Pak!, tidak ada laporan yang terabaikan."
          </p>
          <h6 class="fw-bold text-dark mb-1">Manajemen Unit Dolok Sinumbah</h6>
          <small class="text-success fw-bold text-uppercase" style="letter-spacing: 0.08em;">PT Perkebunan Nusantara IV (Persero)</small>
        </div>
      </div>
    </section>
  </main>

  <!-- DARK LUXURY ECOBUILD FOOTER WITH CONTACT FORM -->
  <footer class="eco-footer">
    <div class="container position-relative" style="z-index: 2;">
      <div class="row gy-5 justify-content-between mb-5">
        <!-- Footer Left Contact Info -->
        <div class="col-lg-6">
          <h2 class="footer-heading mb-4">
            Membangun Masa Depan<br>Perkebunan Berkelanjutan.
          </h2>
          <p class="text-white-50 mb-4" style="max-width: 480px; font-size: 1.05rem;">
            Bersinergi bersama seluruh karyawan dan masyarakat menciptakan perkebunan kelapa sawit yang hijau, sejahtera, dan penuh integritas.
          </p>

          <div class="footer-contact-item">
            <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
            <div>
              <div class="small text-white-50">Kontak Telepon</div>
              <div class="text-white fw-bold">(0622) 123456 / +62 811-622-4040</div>
            </div>
          </div>

          <div class="footer-contact-item">
            <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
            <div>
              <div class="small text-white-50">Email Resmi Unit</div>
              <div class="text-white fw-bold">kebun.doloksinumbah@ptpn4.co.id</div>
            </div>
          </div>

          <div class="footer-contact-item">
            <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <div>
              <div class="small text-white-50">Alamat Kantor Kebun</div>
              <div class="text-white fw-bold">Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara 21182</div>
            </div>
          </div>
        </div>

        <!-- Footer Right: Quick Form Card -->
        <div class="col-lg-5">
          <div class="footer-form-card" data-aos="fade-left">
            <h4>Layanan Cepat Aspirasi</h4>
            <p class="text-muted small mb-4">Punya pertanyaan atau keluhan operasional? Anda dapat langsung menuju formulir pengaduan resmi.</p>
            <div class="d-grid gap-3">
              <a href="{{ url('pengaduan') }}" class="btn btn-success fw-bold py-3 rounded-pill text-white shadow">
                <i class="bi bi-pencil-square me-2"></i> Isi Formulir Pengaduan (Lapor Pak!)
              </a>
              <a href="{{ route('pengaduan.cek-status') }}" class="btn btn-outline-dark fw-bold py-2 rounded-pill">
                <i class="bi bi-search me-2"></i> Cek Status Pengaduan Anda
              </a>
              <a href="{{ url('login') }}" class="btn btn-light border fw-bold py-2 rounded-pill text-muted">
                <i class="bi bi-lock-fill me-2"></i> Login Khusus Petugas / Personalia
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Links Row -->
      <div class="row pt-4 border-top border-secondary border-opacity-25 small text-muted justify-content-between align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo" style="height: 32px;">
            <span class="text-white fw-bold">PTPN IV Regional II Kebun Dolok Sinumbah</span>
          </div>
          <div class="text-white-50 mt-1">
            &copy; {{ date('Y') }} PT Perkebunan Nusantara IV (Persero). All Rights Reserved.
          </div>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="{{ url('/') }}" class="text-muted text-decoration-none me-3 hover-white">Beranda</a>
          <a href="{{ url('about') }}" class="text-muted text-decoration-none me-3 hover-white">Tentang Kami</a>
          <a href="{{ url('pengaduan') }}" class="text-muted text-decoration-none me-3 hover-white">Lapor Aspirasi</a>
          <a href="{{ url('login') }}" class="text-success fw-bold text-decoration-none">Portal Admin</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
      });
    }
  </script>
</body>
</html>
