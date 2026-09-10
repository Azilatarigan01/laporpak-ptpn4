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
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

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
      --bumn-dark: #052114;
      --bumn-forest: #0a331f;
      --bumn-deep: #0f462c;
      --bumn-emerald: #10b981;
      --bumn-green: #2d6a4f;
      --bumn-vibrant: #34d399;
      --bumn-lime: #6ee7b7;
      --bumn-light: #ecfdf5;
      --bumn-gold: #f59e0b;
      --bumn-gold-light: #fef3c7;
      --slate-900: #0f172a;
      --slate-800: #1e293b;
      --slate-700: #334155;
      --slate-600: #475569;
      --slate-500: #64748b;
      --slate-200: #e2e8f0;
      --slate-100: #f1f5f9;
      --slate-50: #f8fafc;
    }

    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      color: var(--slate-700);
      background-color: #f8fafc;
      overflow-x: hidden;
      letter-spacing: -0.01em;
    }

    h1, h2, h3, h4, h5, .font-display {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800;
      color: var(--slate-900);
      letter-spacing: -0.03em;
    }

    .font-serif-accent {
      font-family: 'Playfair Display', serif;
      font-style: italic;
    }

    /* Top Corporate Announcement Bar */
    .bumn-top-bar {
      background: #041a10;
      color: #94a3b8;
      font-size: 0.78rem;
      padding: 7px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      position: relative;
      z-index: 1001;
    }
    .bumn-top-badge {
      background: rgba(245, 158, 11, 0.15);
      border: 1px solid rgba(245, 158, 11, 0.3);
      color: #fbbf24;
      font-weight: 700;
      padding: 2px 8px;
      border-radius: 6px;
      font-size: 0.7rem;
      letter-spacing: 0.05em;
    }

    /* Header & Navigation Bar */
    .eco-header {
      background: rgba(5, 33, 20, 0.94);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 12px 0;
      transition: all 0.3s ease;
      z-index: 1000;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.25);
    }
    .eco-brand-title {
      font-size: 1.28rem;
      font-weight: 800;
      color: #ffffff;
      margin: 0;
      line-height: 1.15;
      letter-spacing: -0.02em;
    }
    .eco-brand-sub {
      font-size: 0.68rem;
      color: var(--bumn-lime);
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }
    .eco-nav-link {
      color: #cbd5e1 !important;
      font-weight: 600;
      font-size: 0.9rem;
      padding: 8px 14px !important;
      border-radius: 20px;
      transition: all 0.25s ease;
      text-decoration: none;
    }
    .eco-nav-link:hover, .eco-nav-link.active {
      color: #ffffff !important;
      background: rgba(16, 185, 129, 0.15);
    }
    .btn-bumn-login {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.88rem;
      padding: 9px 20px;
      border-radius: 30px;
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.35);
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .btn-bumn-login:hover {
      background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5);
      color: #ffffff !important;
    }

    /* Hero Section */
    .eco-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.25) 0%, transparent 40%),
                  radial-gradient(circle at 15% 85%, rgba(5, 150, 105, 0.3) 0%, transparent 50%),
                  linear-gradient(180deg, #052114 0%, #0a331f 60%, #0f462c 100%);
      color: #ffffff;
      padding: 140px 0 110px 0;
      overflow: hidden;
    }
    .eco-hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
      background-size: 24px 24px;
      opacity: 0.6;
      pointer-events: none;
    }

    .hero-live-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(16, 185, 129, 0.15);
      border: 1px solid rgba(110, 231, 183, 0.35);
      padding: 7px 18px;
      border-radius: 30px;
      font-size: 0.82rem;
      font-weight: 700;
      color: var(--bumn-lime);
      margin-bottom: 22px;
      backdrop-filter: blur(8px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }
    .pulse-dot {
      width: 8px;
      height: 8px;
      background-color: #10b981;
      border-radius: 50%;
      box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
      animation: pulse-green 2s infinite;
    }
    @keyframes pulse-green {
      0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
      70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
      100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    .hero-title-main {
      font-size: 3.4rem;
      font-weight: 800;
      line-height: 1.15;
      letter-spacing: -0.04em;
      color: #ffffff;
    }
    .gradient-emerald-gold {
      background: linear-gradient(135deg, #6ee7b7 0%, #fef08a 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .hero-desc-text {
      font-size: 1.12rem;
      line-height: 1.75;
      color: #cbd5e1;
      max-width: 620px;
      font-weight: 400;
    }

    /* Hero Buttons */
    .btn-hero-primary {
      background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
      color: var(--bumn-forest) !important;
      font-weight: 800;
      font-size: 0.95rem;
      padding: 14px 28px;
      border-radius: 30px;
      border: none;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }
    .btn-hero-primary:hover {
      background: #ecfdf5;
      color: var(--bumn-forest) !important;
      transform: translateY(-3px);
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.35);
    }
    .btn-hero-secondary {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.95rem;
      padding: 14px 26px;
      border-radius: 30px;
      border: 1.5px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(8px);
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-hero-secondary:hover {
      background: rgba(255, 255, 255, 0.18);
      border-color: #ffffff;
      color: #ffffff !important;
      transform: translateY(-3px);
    }

    /* Hero Right Visual Card */
    .hero-estate-card {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 26px;
      padding: 24px;
      backdrop-filter: blur(16px);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
      position: relative;
    }
    .hero-estate-card img {
      border-radius: 18px;
      width: 100%;
      height: 270px;
      object-fit: cover;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    /* Floating Trust Badges in Hero */
    .hero-trust-badge {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.14);
      border-radius: 14px;
      padding: 12px 16px;
      backdrop-filter: blur(10px);
      display: inline-flex;
      align-items: center;
      gap: 12px;
      color: #ffffff;
      transition: all 0.3s ease;
    }
    .hero-trust-badge:hover {
      background: rgba(255, 255, 255, 0.14);
      transform: translateY(-2px);
    }

    /* Section Subheadings */
    .section-eyebrow {
      font-size: 0.8rem;
      font-weight: 800;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--bumn-green);
      display: inline-block;
      margin-bottom: 8px;
      background: rgba(16, 185, 129, 0.1);
      padding: 4px 14px;
      border-radius: 20px;
    }
    .section-heading-dark {
      font-size: 2.35rem;
      font-weight: 800;
      color: var(--slate-900);
      line-height: 1.25;
      letter-spacing: -0.03em;
    }

    /* Step-by-Step Flow Cards */
    .step-flow-card {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid #e2e8f0;
      padding: 28px 24px;
      height: 100%;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
      position: relative;
    }
    .step-flow-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 30px -8px rgba(16, 185, 129, 0.18);
      border-color: var(--bumn-emerald);
    }
    .step-number-badge {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: linear-gradient(135deg, #052114 0%, #0f462c 100%);
      color: #6ee7b7;
      font-weight: 800;
      font-size: 1.1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 18px;
      box-shadow: 0 4px 12px rgba(5, 33, 20, 0.2);
    }

    /* 5 Clean Value Cards */
    .solution-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      padding: 28px 20px;
      text-align: center;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
      position: relative;
    }
    .solution-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 35px -8px rgba(16, 185, 129, 0.2);
      border-color: var(--bumn-emerald);
    }
    .solution-icon-wrap {
      width: 64px;
      height: 64px;
      border-radius: 18px;
      background: #ecfdf5;
      border: 1px solid #d1fae5;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.65rem;
      color: var(--bumn-forest);
      margin-bottom: 18px;
      transition: all 0.3s ease;
    }
    .solution-card:hover .solution-icon-wrap {
      background: linear-gradient(135deg, #052114 0%, #10b981 100%);
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

    /* Certification Seals */
    .cert-section {
      background: #ffffff;
      border-top: 1px solid #e2e8f0;
      border-bottom: 1px solid #e2e8f0;
      padding: 85px 0;
    }
    .cert-seal-card {
      text-align: center;
      transition: all 0.3s ease;
      padding: 12px;
    }
    .cert-seal-card:hover {
      transform: translateY(-4px);
    }
    .cert-circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin: 0 auto 14px auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      box-shadow: 0 8px 20px rgba(0,0,0,0.06);
      border: 2px solid;
    }
    .cert-green {
      background: linear-gradient(135deg, #0f462c 0%, #052114 100%);
      border-color: #10b981;
      color: #ffffff;
    }
    .cert-silver {
      background: linear-gradient(135deg, #475569 0%, #1e293b 100%);
      border-color: #cbd5e1;
      color: #ffffff;
    }
    .cert-gold {
      background: linear-gradient(135deg, #b45309 0%, #78350f 100%);
      border-color: #fbbf24;
      color: #ffffff;
    }
    .cert-platinum {
      background: linear-gradient(135deg, #334155 0%, #0f172a 100%);
      border-color: #94a3b8;
      color: #ffffff;
    }
    .cert-seal-name {
      font-size: 0.95rem;
      font-weight: 800;
      color: var(--slate-900);
      margin-bottom: 2px;
    }
    .cert-seal-sub {
      font-size: 0.8rem;
      color: var(--slate-500);
    }

    /* Stat Counter Banner */
    .eco-stat-banner {
      background: linear-gradient(135deg, #052114 0%, #0a331f 50%, #0f462c 100%);
      color: #ffffff;
      padding: 65px 0;
      position: relative;
      border-top: 1px solid rgba(255,255,255,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .stat-item-box {
      text-align: center;
      padding: 10px;
    }
    .stat-icon-glow {
      font-size: 1.85rem;
      color: var(--bumn-lime);
      margin-bottom: 10px;
    }
    .stat-num-val {
      font-size: 2.6rem;
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

    /* News Grid Section */
    .eco-news-card {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid #e2e8f0;
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
      border-color: var(--bumn-emerald);
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
      background: rgba(5, 33, 20, 0.9);
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

    /* Pimpinan Kebun Section */
    .pimpinan-eco-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0,0,0,0.05);
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .pimpinan-eco-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 24px 45px -10px rgba(16, 185, 129, 0.25);
      border-color: var(--bumn-emerald);
    }
    .pimpinan-card-header {
      background: linear-gradient(135deg, #052114 0%, #0f462c 100%);
      padding: 16px 20px 50px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
    }
    .pimpinan-badge-unit {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.25);
      color: #6ee7b7;
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
      color: #065f46;
      background: #ecfdf5;
      border: 1px solid #a7f3d0;
      padding: 4px 14px;
      border-radius: 20px;
      display: inline-block;
      margin-bottom: 12px;
    }
    .pimpinan-quote-wrap {
      background: #f8fafc;
      border-radius: 12px;
      padding: 10px 14px;
      border-left: 3px solid var(--bumn-emerald);
      text-align: left;
    }
    .pimpinan-quote-txt {
      font-size: 0.82rem;
      color: #475569;
      font-style: italic;
      line-height: 1.5;
      margin: 0;
    }

    /* AKHLAK BUMN Quote Section */
    .akhlak-banner-section {
      background: linear-gradient(135deg, #052114 0%, #0a331f 100%);
      color: #ffffff;
      padding: 85px 0;
      position: relative;
      overflow: hidden;
      border-top: 1px solid rgba(255,255,255,0.08);
    }
    .akhlak-banner-section::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-image: radial-gradient(circle at 10% 50%, rgba(245, 158, 11, 0.12) 0%, transparent 45%);
      pointer-events: none;
    }
    .akhlak-pill {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 10px 20px;
      border-radius: 14px;
      text-align: center;
      backdrop-filter: blur(8px);
    }
    .akhlak-pill-title {
      color: #fbbf24;
      font-weight: 800;
      font-size: 1.1rem;
      margin-bottom: 2px;
    }
    .akhlak-pill-desc {
      color: #cbd5e1;
      font-size: 0.78rem;
    }

    /* Footer */
    .eco-footer {
      background: #041a10;
      color: #cbd5e1;
      padding: 85px 0 35px 0;
      position: relative;
      overflow: hidden;
      border-top: 1px solid rgba(255,255,255,0.06);
    }
    .footer-heading {
      font-size: 2.1rem;
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
      background: rgba(16, 185, 129, 0.15);
      border: 1px solid rgba(16, 185, 129, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--bumn-lime);
      font-size: 1.2rem;
      flex-shrink: 0;
    }
    .footer-form-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 35px;
      box-shadow: 0 20px 45px rgba(0,0,0,0.35);
      color: var(--slate-800);
    }
  </style>
</head>

<body>
  <!-- Top Corporate Announcement Bar -->
  <div class="bumn-top-bar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-2">
        <span class="bumn-top-badge">BUMN UNTUK INDONESIA</span>
        <span>PT Perkebunan Nusantara IV (Persero) Regional II • Kebun Dolok Sinumbah</span>
      </div>
      <div class="d-flex align-items-center gap-4 text-white-50">
        <span><i class="bi bi-shield-lock-fill text-success me-1"></i>Portal Whistleblowing Terpercaya</span>
        <span><i class="bi bi-clock-history text-warning me-1"></i>Layanan Aspirasi 24/7</span>
      </div>
    </div>
  </div>

  <!-- Header / Navigation Bar -->
  <header class="eco-header sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logoo.png') }}" alt="PTPN IV Logo" style="height: 42px;" class="me-2">
        <div>
          <h1 class="eco-brand-title">Dolok Sinumbah</h1>
          <span class="eco-brand-sub">PTPN IV Regional II</span>
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
        <a href="{{ url('login') }}" class="btn-bumn-login ms-2">
          <i class="bi bi-shield-lock-fill"></i> Login Petugas
        </a>
      </nav>

      <!-- Mobile Button & Toggle -->
      <div class="d-flex align-items-center gap-2 d-xl-none">
        <a href="{{ url('login') }}" class="btn btn-sm btn-success px-3 rounded-pill fw-bold">Login</a>
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
        <a href="{{ url('login') }}" class="btn btn-success mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login Petugas</a>
      </div>
    </div>
  </header>

  <main>
    <!-- HERO SECTION -->
    <section class="eco-hero">
      <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center gy-5">
          <!-- Hero Left Content -->
          <div class="col-lg-7" data-aos="fade-up" data-aos-duration="900">
            <div class="hero-live-badge">
              <span class="pulse-dot"></span>
              <span>SISTEM LAYANAN ASPIRASI & PENGADUAN RESMI</span>
            </div>
            
            <h1 class="hero-title-main mb-3">
              Membangun Negeri.<br>
              Melayani dengan <span class="gradient-emerald-gold">Integritas Prima.</span>
            </h1>

            <p class="hero-desc-text mb-4">
              PT Perkebunan Nusantara IV Regional II Kebun Dolok Sinumbah berkomitmen mewujudkan tata kelola perkebunan kelapa sawit yang unggul, harmonis, dan transparan melalui saluran aspirasi karyawan yang aman, terlindungi, dan terintegrasi notifikasi real-time.
            </p>

            <div class="d-flex flex-wrap gap-3 mb-5">
              <a href="{{ url('pengaduan') }}" class="btn-hero-primary">
                <i class="bi bi-megaphone-fill text-success fs-5"></i>
                <span>Buat Pengaduan Cepat</span>
              </a>
              <a href="{{ route('pengaduan.cek-status') }}" class="btn-hero-secondary">
                <i class="bi bi-search"></i>
                <span>Cek Status Laporan</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <!-- Floating Trust Badges -->
            <div class="d-flex flex-wrap gap-3">
              <div class="hero-trust-badge">
                <i class="bi bi-shield-check fs-4 text-success"></i>
                <div>
                  <div class="fw-bold small">100% Kerahasiaan Aman</div>
                  <div class="text-white-50" style="font-size: 0.72rem;">Whistleblowing terenkripsi & anonim</div>
                </div>
              </div>
              <div class="hero-trust-badge">
                <i class="bi bi-telegram fs-4 text-info"></i>
                <div>
                  <div class="fw-bold small">Notifikasi Real-Time Bot</div>
                  <div class="text-white-50" style="font-size: 0.72rem;">Terhubung langsung ke Personalia</div>
                </div>
              </div>
              <div class="hero-trust-badge">
                <i class="bi bi-award-fill fs-4 text-warning"></i>
                <div>
                  <div class="fw-bold small">Standar Mutu BUMN</div>
                  <div class="text-white-50" style="font-size: 0.72rem;">ISPO, RSPO & K3 Bersertifikasi</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Hero Right Visual Card -->
          <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="900">
            <div class="hero-estate-card">
              <img src="{{ asset('assets/img/1sawit.jpg') }}" alt="Kebun Sawit Dolok Sinumbah">
              <div class="mt-4 text-white">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="badge bg-success bg-opacity-25 text-light border border-success border-opacity-50 px-3 py-1 rounded-pill">
                    <i class="bi bi-geo-alt-fill me-1"></i> Kebun Dolok Sinumbah
                  </span>
                  <small class="text-white-50"><i class="bi bi-patch-check-fill text-warning me-1"></i>Unit Terverifikasi</small>
                </div>
                <h5 class="fw-bold mb-1">PTPN IV Regional II</h5>
                <p class="text-white-50 small mb-0">Hutabayu Raja, Kabupaten Simalungun, Sumatera Utara</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- INTERACTIVE ACTION HUB: LACAK STATUS & BUAT PENGADUAN -->
    <section class="py-5" style="margin-top: -55px; position: relative; z-index: 20;">
      <div class="container">
        <div class="row g-4 justify-content-center">
          <!-- Card 1: Lacak Status Pengaduan Cepat -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 shadow-lg p-4 p-md-5 h-100" style="border-radius: 24px; background: #ffffff; border-top: 5px solid #10b981 !important;">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background: #ecfdf5; border: 1px solid #a7f3d0;">
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
                <div class="input-group mb-3 shadow-sm" style="border-radius: 14px; overflow: hidden;">
                  <span class="input-group-text bg-light border-end-0 px-3">
                    <i class="bi bi-ticket-detailed text-muted fs-5"></i>
                  </span>
                  <input type="text" name="kode" class="form-control border-start-0 py-3 ps-2" placeholder="Contoh: PD260910-1234 atau NIKSAP" required style="font-size: 0.95rem;">
                  <button type="submit" class="btn btn-success px-4 fw-bold">
                    <i class="bi bi-search me-1"></i> Lacak
                  </button>
                </div>
              </form>

              <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top text-muted small">
                <span class="fw-semibold text-dark"><i class="bi bi-info-circle text-success me-1"></i>Tips:</span>
                <span>Simpan kode tiket saat mengisi formulir untuk kemudahan pelacakan berkala.</span>
              </div>
            </div>
          </div>

          <!-- Card 2: Formulir Pengaduan Cepat -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 shadow-lg p-4 p-md-5 h-100 text-white" style="border-radius: 24px; background: linear-gradient(135deg, #052114 0%, #0a331f 50%, #0f462c 100%); position: relative; overflow: hidden;">
              <div class="position-relative" style="z-index: 2;">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(110, 231, 183, 0.4);">
                    <i class="bi bi-megaphone-fill fs-4 text-success"></i>
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
                  <a href="{{ url('pengaduan') }}" class="btn btn-light fw-bold px-4 py-3 rounded-pill text-success shadow d-inline-flex align-items-center gap-2">
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

    <!-- ALUR PELAPORAN 4 LANGKAH MUDAH -->
    <section class="py-5" style="background-color: #ffffff;">
      <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
          <span class="section-eyebrow">PANDUAN TATA CARA</span>
          <h2 class="section-heading-dark">Alur Penanganan Pengaduan</h2>
          <p class="text-muted mx-auto" style="max-width: 650px;">
            Proses penanganan pengaduan karyawan dijalankan secara transparan, sistematis, dan bertanggung jawab melalui 4 tahapan resmi.
          </p>
        </div>

        <div class="row g-4">
          <!-- Step 1 -->
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="step-flow-card">
              <div class="step-number-badge">01</div>
              <h5 class="fw-bold mb-2">Isi Pengaduan</h5>
              <p class="text-muted small mb-0">Pelapor mengisi formulir online dengan data kendala, bukti foto, dan kategori pengaduan yang relevan.</p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="step-flow-card">
              <div class="step-number-badge">02</div>
              <h5 class="fw-bold mb-2">Notifikasi & Verifikasi</h5>
              <p class="text-muted small mb-0">Sistem mengirimkan notifikasi instan via Bot Telegram ke tim Personalia untuk verifikasi awal dokumen.</p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="step-flow-card">
              <div class="step-number-badge">03</div>
              <h5 class="fw-bold mb-2">Disposisi & Tindak Lanjut</h5>
              <p class="text-muted small mb-0">Petugas menerbitkan Lembar Disposisi Resmi dan mengkoordinasikan investigasi / perbaikan di lapangan.</p>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="step-flow-card">
              <div class="step-number-badge">04</div>
              <h5 class="fw-bold mb-2">Penyelesaian & Arsip</h5>
              <p class="text-muted small mb-0">Laporan diselesaikan, status diperbarui secara real-time, dan pelapor dapat mencetak berkas resmi PDF.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 5 NILAI UTAMA & SOLUSI BERKELANJUTAN -->
    <section class="py-5" style="background-color: var(--slate-50);">
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
              <h5 class="solution-title">Kerahasiaan Terjamin</h5>
              <p class="solution-desc">Data dan identitas pelapor dilindungi penuh sesuai kode etik whistleblowing BUMN.</p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-lightning-charge-fill"></i>
              </div>
              <h5 class="solution-title">Respons Terukur</h5>
              <p class="solution-desc">Verifikasi dan koordinasi tindak lanjut pimpinan unit dalam waktu terukur (< 24 Jam).</p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-lg col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="solution-card">
              <div class="solution-icon-wrap">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <h5 class="solution-title">Lacak Real-Time</h5>
              <p class="solution-desc">Pantau status laporan dan riwayat disposisi kapan saja melalui kode tiket.</p>
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
              <h5 class="solution-title">Budaya AKHLAK</h5>
              <p class="solution-desc">Menjunjung tinggi nilai Amanah, Kompeten, Harmonis, Loyal, Adaptif, dan Kolaboratif.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- STANDAR & SERTIFIKASI INTERNASIONAL -->
    <section class="cert-section">
      <div class="container">
        <div class="row align-items-center gy-5">
          <div class="col-lg-5" data-aos="fade-right">
            <span class="section-eyebrow">STANDAR & SERTIFIKASI UNGGUL</span>
            <h2 class="section-heading-dark mb-3">Tata Kelola Unggul yang Terverifikasi.</h2>
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
                    <i class="bi bi-patch-check-fill fs-3 text-warning"></i>
                    <span class="fw-bold small">RSPO</span>
                  </div>
                  <h6 class="cert-seal-name">RSPO Certified</h6>
                  <span class="cert-seal-sub">Sustainable Palm Oil</span>
                </div>
              </div>

              <!-- Seal 2: ISPO -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-silver">
                    <i class="bi bi-award-fill fs-3 text-white"></i>
                    <span class="fw-bold small">ISPO</span>
                  </div>
                  <h6 class="cert-seal-name">ISPO Certified</h6>
                  <span class="cert-seal-sub">Indonesian Standard</span>
                </div>
              </div>

              <!-- Seal 3: ISO 9001 -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-gold">
                    <i class="bi bi-star-fill fs-3 text-warning"></i>
                    <span class="fw-bold small">ISO 9001</span>
                  </div>
                  <h6 class="cert-seal-name">ISO 9001:2015</h6>
                  <span class="cert-seal-sub">Quality Management</span>
                </div>
              </div>

              <!-- Seal 4: SMK3 & ISO 14001 -->
              <div class="col-sm-3 col-6">
                <div class="cert-seal-card">
                  <div class="cert-circle cert-platinum">
                    <i class="bi bi-shield-check fs-3 text-info"></i>
                    <span class="fw-bold small">SMK3</span>
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

    <!-- METRICS & IMPACT BANNER -->
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
              <p class="stat-lbl-txt">Verifikasi Awal Personalia</p>
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
              <p class="stat-lbl-txt">Toleransi Pungli / Gratifikasi</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- BERITA & INFORMASI TERKINI -->
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

    <!-- STRUKTUR ORGANISASI & JAJARAN PIMPINAN -->
    <section id="leadership" class="py-5" style="background-color: var(--slate-50);">
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

                  <!-- Executive Avatar Frame -->
                  <div class="pimpinan-avatar-wrap">
                    <div class="pimpinan-avatar-frame">
                      @if($leaderPhoto)
                        <img src="{{ $leaderPhoto }}" class="pimpinan-avatar-img" alt="{{ $leader->name }}">
                      @else
                        <div class="d-flex flex-column align-items-center justify-content-center h-100 w-100" style="background: linear-gradient(135deg, #052114 0%, #0f462c 100%); color: #ffffff;">
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

    <!-- CORE VALUES AKHLAK BUMN BANNER -->
    <section class="akhlak-banner-section">
      <div class="container position-relative" style="z-index: 2;">
        <div class="text-center mb-5" data-aos="fade-up">
          <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-50 px-3 py-1 rounded-pill mb-2 fw-bold">
            TATA NILAI BUMN
          </span>
          <h2 class="text-white fw-bold">Budaya Kerja AKHLAK</h2>
          <p class="text-white-50 mx-auto mb-0" style="max-width: 600px;">
            Pedoman perilaku utama insan PT Perkebunan Nusantara IV dalam menjalankan operasional dan pelayanan perkebunan.
          </p>
        </div>

        <div class="row g-3 justify-content-center">
          <div class="col-lg-2 col-md-4 col-6">
            <div class="akhlak-pill">
              <div class="akhlak-pill-title">Amanah</div>
              <div class="akhlak-pill-desc">Memegang teguh kepercayaan</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="akhlak-pill">
              <div class="akhlak-pill-title">Kompeten</div>
              <div class="akhlak-pill-desc">Terus belajar & kembangkan kapabilitas</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="akhlak-pill">
              <div class="akhlak-pill-title">Harmonis</div>
              <div class="akhlak-pill-desc">Saling peduli & hargai perbedaan</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="akhlak-pill">
              <div class="akhlak-pill-title">Loyal</div>
              <div class="akhlak-pill-desc">Berdedikasi & utamakan bangsa</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="akhlak-pill">
              <div class="akhlak-pill-title">Adaptif</div>
              <div class="akhlak-pill-desc">Terus berinovasi & antusias</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="akhlak-pill">
              <div class="akhlak-pill-title">Kolaboratif</div>
              <div class="akhlak-pill-desc">Membangun kerjasama sinergis</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="eco-footer">
    <div class="container position-relative" style="z-index: 2;">
      <div class="row gy-5 justify-content-between mb-5">
        <!-- Footer Left Contact Info -->
        <div class="col-lg-6">
          <h2 class="footer-heading mb-3">
            Membangun Masa Depan<br>Perkebunan Berkelanjutan.
          </h2>
          <p class="text-white-50 mb-4" style="max-width: 480px; font-size: 1rem; line-height: 1.7;">
            Bersinergi bersama seluruh karyawan dan masyarakat menciptakan perkebunan kelapa sawit yang hijau, sejahtera, dan penuh integritas di lingkungan PTPN IV Regional II.
          </p>

          <div class="footer-contact-item">
            <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
            <div>
              <div class="small text-white-50">Kontak Telepon Kebun</div>
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
            <h4 class="fw-bold text-dark mb-2">Layanan Cepat Aspirasi</h4>
            <p class="text-muted small mb-4">Sampaikan kendala kerja atau periksa perkembangan laporan Anda secara mandiri.</p>
            <div class="d-grid gap-3">
              <a href="{{ url('pengaduan') }}" class="btn btn-success fw-bold py-3 rounded-pill text-white shadow">
                <i class="bi bi-pencil-square me-2"></i> Isi Formulir Pengaduan (Lapor Pak!)
              </a>
              <a href="{{ route('pengaduan.cek-status') }}" class="btn btn-outline-dark fw-bold py-2 rounded-pill">
                <i class="bi bi-search me-2"></i> Cek Status Pengaduan Anda
              </a>
              <a href="{{ url('login') }}" class="btn btn-light border fw-bold py-2 rounded-pill text-muted">
                <i class="bi bi-shield-lock-fill me-2 text-success"></i> Login Petugas & Personalia
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
          <a href="{{ url('panduan') }}" class="text-muted text-decoration-none me-3 hover-white">Panduan Alur</a>
          <a href="{{ url('pengaduan') }}" class="text-muted text-decoration-none me-3 hover-white">Lapor Aspirasi</a>
          <a href="{{ url('login') }}" class="text-success fw-bold text-decoration-none">Login Petugas</a>
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

