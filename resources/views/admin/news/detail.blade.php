<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>{{ $news->title }} | PTPN IV Kebun Dolok Sinumbah</title>
  <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($news->intro ?: $news->main), 150) }}" />

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
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      background-color: #f8fafc;
      color: #334155;
    }
    .header {
      background: rgba(20, 83, 45, 0.96);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .page-hero {
      background: linear-gradient(135deg, #14532d 0%, #0f172a 100%);
      padding: 140px 0 60px 0;
      color: #ffffff;
    }
    .article-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.04);
      padding: 40px;
    }
    .article-img {
      width: 100%;
      max-height: 480px;
      object-fit: cover;
      border-radius: 14px;
      margin-bottom: 30px;
    }
    .quote-box {
      background: #f0fdf4;
      border-left: 4px solid #16a34a;
      padding: 20px 25px;
      border-radius: 0 14px 14px 0;
      font-style: italic;
      color: #166534;
      margin: 30px 0;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo" style="height: 44px;" class="me-2"> 
        <h1 class="sitename text-white" style="font-size: 1.25rem; font-weight: 800; margin: 0;">Dolok Sinumbah</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('about') }}">Tentang Kami</a></li>
          <li><a href="{{ route('detail') }}">Berita</a></li>
          <li><a href="{{ url('pengaduan') }}">Layanan Pengaduan</a></li>
          <li><a href="{{ route('pengaduan.cek-status') }}">Cek Status</a></li>
          <li>
            <a href="{{ url('login') }}" class="btn btn-sm btn-success text-white px-3 ms-lg-2" style="border-radius: 8px;">
              <i class="bi bi-box-arrow-in-right me-1"></i> Login Portal
            </a>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <div class="page-hero">
      <div class="container">
        <a href="{{ route('detail') }}" class="text-success text-decoration-none fw-bold small mb-2 d-inline-block">
          <i class="bi bi-arrow-left me-1"></i> Kembali ke Semua Berita
        </a>
        <h1 class="fw-bold text-white mb-2" style="line-height: 1.3;">{{ $news->title }}</h1>
        <div class="d-flex align-items-center text-white-50 small gap-3">
          <span><i class="bi bi-person-fill text-success me-1"></i>{{ $news->author }}</span>
          <span><i class="bi bi-calendar3 text-success me-1"></i>{{ $news->created_at ? $news->created_at->translatedFormat('d F Y') : '-' }}</span>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <div class="row g-4">
        
        <!-- Main Article Content -->
        <div class="col-lg-8">
          <div class="article-card">
            @php
              $img = null;
              if ($news->image && file_exists(public_path($news->image))) {
                $img = asset($news->image);
              } elseif ($news->image && file_exists(public_path('storage/' . $news->image))) {
                $img = asset('storage/' . $news->image);
              }
            @endphp
            @if($img)
              <img src="{{ $img }}" alt="{{ $news->title }}" class="article-img shadow-sm border">
            @endif

            @if($news->intro)
              <div class="lead fw-semibold text-dark mb-4" style="line-height: 1.8;">
                {{ $news->intro }}
              </div>
            @endif

            <div class="article-text text-dark" style="font-size: 1.05rem; line-height: 1.9; white-space: pre-line;">
              {{ $news->main }}
            </div>

            @if($news->quote)
              <div class="quote-box">
                <i class="bi bi-quote fs-2 text-success me-2"></i>
                <span class="fs-6 fw-semibold">{{ $news->quote }}</span>
              </div>
            @endif

            @if($news->conclusion)
              <div class="mt-4 p-3 bg-light rounded-3 text-muted" style="line-height: 1.8;">
                <strong>Penutup:</strong> {{ $news->conclusion }}
              </div>
            @endif
          </div>
        </div>

        <!-- Sidebar (Recent News) -->
        <div class="col-lg-4">
          <div class="p-4 bg-white rounded-4 border shadow-sm mb-4">
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-newspaper text-success me-2"></i>Berita Lainnya</h5>
            <div class="d-flex flex-column gap-3">
              @forelse ($recentNews as $rec)
                <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
                  @php
                    $recImg = null;
                    if ($rec->image && file_exists(public_path($rec->image))) {
                      $recImg = asset($rec->image);
                    } elseif ($rec->image && file_exists(public_path('storage/' . $rec->image))) {
                      $recImg = asset('storage/' . $rec->image);
                    }
                  @endphp
                  @if($recImg)
                    <img src="{{ $recImg }}" alt="{{ $rec->title }}" class="rounded border" style="width: 70px; height: 55px; object-fit: cover;">
                  @endif
                  <div>
                    <h6 class="mb-1" style="font-size: 0.9rem; line-height: 1.3;">
                      <a href="{{ route('news.detail', $rec->id_berita) }}" class="text-dark fw-bold text-decoration-none hover-success">
                        {{ \Illuminate\Support\Str::limit($rec->title, 55) }}
                      </a>
                    </h6>
                    <small class="text-muted">{{ $rec->created_at ? $rec->created_at->format('d M Y') : '' }}</small>
                  </div>
                </div>
              @empty
                <p class="text-muted small mb-0">Belum ada berita lainnya.</p>
              @endforelse
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <footer class="footer" style="background-color: #0f172a; color: #94a3b8; padding: 40px 0 20px 0;">
    <div class="container text-center">
      <p class="mb-1 text-white fw-bold">PTPN IV Regional II Kebun Dolok Sinumbah</p>
      <p class="small mb-0">&copy; {{ date('Y') }} Seluruh Hak Cipta Dilindungi.</p>
    </div>
  </footer>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
