<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Status Pengaduan #{{ $pengaduan->kode_pengaduan }} | Lapor Pak! PTPN IV</title>

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

    /* Page Hero */
    .page-hero {
      position: relative;
      background: linear-gradient(180deg, rgba(7, 30, 19, 0.94) 0%, rgba(13, 40, 24, 0.90) 60%, rgba(19, 60, 36, 0.95) 100%), url('{{ asset('assets/img/1sawit.jpg') }}') center/cover no-repeat;
      padding: 50px 0 80px 0;
      color: #ffffff;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    /* Result Card */
    .result-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 24px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      margin-top: -40px;
      position: relative;
      z-index: 10;
    }
    .status-banner-diterima {
      background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
      color: #ffffff;
    }
    .status-banner-proses {
      background: linear-gradient(135deg, #b45309 0%, #78350f 100%);
      color: #ffffff;
    }
    .status-banner-selesai {
      background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
      color: #ffffff;
    }

    /* Timeline progression */
    .timeline-steps {
      display: flex;
      justify-content: space-between;
      position: relative;
      margin: 30px 0 40px 0;
    }
    .timeline-steps::before {
      content: "";
      position: absolute;
      top: 22px;
      left: 15%;
      right: 15%;
      height: 4px;
      background-color: #e2e8f0;
      z-index: 1;
    }
    .timeline-step {
      position: relative;
      z-index: 2;
      text-align: center;
      flex: 1;
    }
    .timeline-icon {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: #ffffff;
      border: 3px solid #cbd5e1;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 12px auto;
      font-size: 1.25rem;
      color: #94a3b8;
      transition: all 0.3s;
    }
    .timeline-step.completed .timeline-icon {
      background: #2d6a4f;
      border-color: #52b788;
      color: #ffffff;
      box-shadow: 0 4px 14px rgba(45, 106, 79, 0.4);
    }
    .timeline-step.active .timeline-icon {
      background: #b45309;
      border-color: #fde68a;
      color: #ffffff;
      box-shadow: 0 4px 14px rgba(180, 83, 9, 0.4);
      animation: pulse 1.8s infinite;
    }
    .timeline-title {
      font-weight: 700;
      font-size: 0.95rem;
      color: var(--slate-900);
      margin-bottom: 3px;
    }
    .timeline-desc {
      font-size: 0.78rem;
      color: var(--slate-500);
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.08); }
      100% { transform: scale(1); }
    }

    /* Footer */
    .eco-footer {
      background: #071e13;
      color: #cbd5e1;
      padding: 40px 0 20px 0;
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
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Struktur Organisasi</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="eco-nav-link active">Cek Status</a>
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
    <!-- Page Hero -->
    <div class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <span class="badge bg-success bg-opacity-25 text-light border border-success border-opacity-50 px-3 py-1 rounded-pill mb-2">
          <i class="bi bi-file-earmark-check me-1"></i> Data Pengaduan Ditemukan
        </span>
        <h1 class="fw-bold mb-1 text-white font-display" style="font-size: 2.2rem;">
          Nomor Tiket: {{ $pengaduan->kode_pengaduan }}
        </h1>
        <p class="text-white-50 small mb-0">Informasi rincian aspirasi dan progres respon pimpinan unit / personalia kantor</p>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="result-card">
            
            <!-- Top Status Banner -->
            @php
              $bannerClass = 'status-banner-diterima';
              $statusIcon = 'bi-inbox-fill';
              $statusTitle = 'Laporan Diterima & Tercatat';
              $statusDesc = 'Pengaduan telah masuk ke sistem dan menunggu verifikasi pimpinan unit/personalia.';

              if ($pengaduan->status == 'Dalam Proses' || $pengaduan->status == 'Sedang Proses') {
                $bannerClass = 'status-banner-proses';
                $statusIcon = 'bi-hourglass-split';
                $statusTitle = 'Laporan Sedang Ditindaklanjuti';
                $statusDesc = 'Permasalahan sedang dalam proses investigasi, penanganan lapangan, atau koordinasi manajemen.';
              } elseif ($pengaduan->status == 'Selesai') {
                $bannerClass = 'status-banner-selesai';
                $statusIcon = 'bi-check-circle-fill';
                $statusTitle = 'Laporan Selesai Ditangani';
                $statusDesc = 'Pengaduan telah tuntas diselesaikan disertai tanggapan resmi dari pihak personalia/pimpinan.';
              }
            @endphp

            <div class="p-4 p-md-5 {{ $bannerClass }}">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 58px; height: 58px; background: rgba(255, 255, 255, 0.2); border: 1.5px solid rgba(255,255,255,0.4);">
                    <i class="bi {{ $statusIcon }} fs-2"></i>
                  </div>
                  <div>
                    <span class="badge bg-white text-dark fw-bold px-3 py-1 rounded-pill mb-1">Status: {{ $pengaduan->status }}</span>
                    <h3 class="fw-bold mb-1">{{ $statusTitle }}</h3>
                    <p class="mb-0 text-white-50 small">{{ $statusDesc }}</p>
                  </div>
                </div>
                <div class="text-md-end">
                  <a href="{{ route('pengaduan.cetakPDF', $pengaduan->id_pengaduan) }}" target="_blank" class="btn btn-light fw-bold px-4 py-2 rounded-pill text-dark shadow-sm">
                    <i class="bi bi-printer-fill me-1 text-danger"></i> Cetak PDF Lembar Resmi
                  </a>
                </div>
              </div>
            </div>

            <!-- Body Details -->
            <div class="p-4 p-md-5 bg-white">
              
              <!-- Timeline Progression -->
              <h5 class="fw-bold text-dark mb-3"><i class="bi bi-diagram-3-fill text-success me-2"></i>Alur Progres Penanganan:</h5>
              <div class="timeline-steps">
                <!-- Step 1 -->
                <div class="timeline-step completed">
                  <div class="timeline-icon">
                    <i class="bi bi-check-lg"></i>
                  </div>
                  <div class="timeline-title">1. Diterima</div>
                  <div class="timeline-desc">Tercatat di sistem</div>
                </div>

                <!-- Step 2 -->
                @php
                  $step2Class = ($pengaduan->status == 'Dalam Proses' || $pengaduan->status == 'Sedang Proses' || $pengaduan->status == 'Selesai') ? ($pengaduan->status == 'Selesai' ? 'completed' : 'active') : '';
                @endphp
                <div class="timeline-step {{ $step2Class }}">
                  <div class="timeline-icon">
                    @if($pengaduan->status == 'Selesai')
                      <i class="bi bi-check-lg"></i>
                    @else
                      <i class="bi bi-hourglass-split"></i>
                    @endif
                  </div>
                  <div class="timeline-title">2. Diproses</div>
                  <div class="timeline-desc">Ditinjau Personalia / Unit</div>
                </div>

                <!-- Step 3 -->
                <div class="timeline-step {{ $pengaduan->status == 'Selesai' ? 'completed' : '' }}">
                  <div class="timeline-icon">
                    <i class="bi bi-flag-fill"></i>
                  </div>
                  <div class="timeline-title">3. Selesai</div>
                  <div class="timeline-desc">Tuntas & Diberi Respon</div>
                </div>
              </div>

              <!-- Pelapor & Informasi Registrasi -->
              <div class="row g-4 mb-4">
                <div class="col-md-6">
                  <div class="p-4 bg-light rounded-4 h-100 border">
                    <h6 class="fw-bold text-success mb-3"><i class="bi bi-person-badge-fill me-2"></i>Identitas Pelapor</h6>
                    <table class="table table-sm table-borderless mb-0">
                      <tr>
                        <td class="text-muted" style="width: 35%;">Nama</td>
                        <td class="fw-bold text-dark">: {{ $pengaduan->karyawan->nama_karyawan ?? 'Karyawan' }}</td>
                      </tr>
                      <tr>
                        <td class="text-muted">NIKSAP</td>
                        <td class="text-dark">: {{ $pengaduan->niksap }}</td>
                      </tr>
                      <tr>
                        <td class="text-muted">Area Kerja</td>
                        <td class="text-dark">: {{ $pengaduan->area->nama_area ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="text-muted">Posisi / Bagian</td>
                        <td class="text-dark">: {{ $pengaduan->posisi->nama_posisi ?? '-' }} ({{ $pengaduan->realisasi->nama_realisasi ?? '-' }})</td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="p-4 bg-light rounded-4 h-100 border">
                    <h6 class="fw-bold text-success mb-3"><i class="bi bi-info-circle-fill me-2"></i>Informasi Laporan</h6>
                    <table class="table table-sm table-borderless mb-0">
                      <tr>
                        <td class="text-muted" style="width: 40%;">Waktu Pengiriman</td>
                        <td class="fw-bold text-dark">: {{ $pengaduan->tgl_pengaduan ? \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->isoFormat('dddd, D MMMM Y - HH:mm') : '-' }} WIB</td>
                      </tr>
                      <tr>
                        <td class="text-muted">Kategori</td>
                        <td class="text-dark">: {{ $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum / Operasional' }}</td>
                      </tr>
                      <tr>
                        <td class="text-muted">Bukti Lampiran</td>
                        <td>: 
                          @if($pengaduan->foto || $pengaduan->lampiran)
                            <span class="badge bg-success">Tersedia Berkas</span>
                          @else
                            <span class="text-muted">Tidak Ada</span>
                          @endif
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Complaint Narrative -->
              <div class="mb-4">
                <label class="fw-bold text-dark mb-2"><i class="bi bi-file-text-fill me-1 text-success"></i>Uraian Masalah / Aspirasi:</label>
                <div class="p-4 bg-light border rounded-4 text-dark" style="white-space: pre-line; line-height: 1.7; font-size: 0.95rem;">
                  {{ $pengaduan->deskripsi }}
                </div>
              </div>

              <!-- Official Response Box from Personalia / Pimpinan -->
              <div class="mb-4">
                <label class="fw-bold text-dark mb-2"><i class="bi bi-chat-left-quote-fill me-1 text-primary"></i>Tanggapan Resmi Personalia / Pimpinan Kebun:</label>
                @if(!empty($pengaduan->balasan))
                  <div class="p-4 rounded-4 border-start border-4 border-success shadow-sm" style="background-color: #f0fdf4; color: #166534; white-space: pre-line; line-height: 1.7;">
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-shield-check fs-4 me-2 text-success"></i>
                      <strong class="fs-6">Balasan dari Personalia / Manajemen Kantor:</strong>
                    </div>
                    {{ $pengaduan->balasan }}
                  </div>
                @else
                  <div class="p-4 bg-light rounded-4 text-muted border text-center">
                    <i class="bi bi-clock-history me-1 fs-5"></i> Laporan sedang dalam antrean verifikasi dan peninjauan oleh Pimpinan Unit/Personalia Kantor. Tanggapan tertulis akan segera diperbarui di sini.
                  </div>
                @endif
              </div>

              <!-- Action Buttons -->
              <div class="d-flex flex-wrap gap-3 justify-content-between pt-4 border-top">
                <a href="{{ route('pengaduan.cek-status') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                  <i class="bi bi-arrow-left me-1"></i> Cek Pengaduan Lain
                </a>
                <a href="{{ route('pengaduan.cetakPDF', $pengaduan->id_pengaduan) }}" target="_blank" class="btn btn-danger px-4 py-2 rounded-pill fw-bold">
                  <i class="bi bi-file-earmark-pdf-fill me-1"></i> Unduh / Cetak PDF Resmi
                </a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="eco-footer">
    <div class="container text-center">
      <p class="mb-1 text-white fw-bold">PTPN IV Regional II Kebun Dolok Sinumbah &bull; Lapor Pak!</p>
      <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} Sistem Informasi Aspirasi & Pengaduan Karyawan.</p>
    </div>
  </footer>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>