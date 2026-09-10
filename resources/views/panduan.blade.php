<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Panduan Alur & Tata Cara Pengaduan | Lapor Pak! PTPN IV Kebun Dolok Sinumbah</title>
  <meta name="description" content="Petunjuk dan Panduan Lengkap Tata Cara Mengisi dan Memantau Pengaduan Karyawan PTPN IV Regional II Kebun Dolok Sinumbah" />

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

    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      color: var(--slate-700);
      background-color: var(--eco-bg);
      overflow-x: hidden;
    }

    /* Top Navbar */
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

    /* Page Hero */
    .page-hero {
      background: linear-gradient(180deg, #071e13 0%, #0d2818 60%, #133c24 100%);
      padding: 160px 0 90px 0;
      color: #ffffff;
      text-align: center;
      position: relative;
    }

    /* Step Card */
    .step-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.04);
      padding: 35px 28px;
      height: 100%;
      position: relative;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .step-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 35px -8px rgba(45, 106, 79, 0.18);
      border-color: var(--eco-lime);
    }
    .step-number {
      width: 56px;
      height: 56px;
      border-radius: 18px;
      background: linear-gradient(135deg, #2d6a4f 0%, #0d2818 100%);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      font-weight: 800;
      margin-bottom: 20px;
      box-shadow: 0 8px 18px rgba(45, 106, 79, 0.3);
    }
    .step-icon-badge {
      position: absolute;
      top: 28px;
      right: 28px;
      font-size: 2rem;
      color: rgba(82, 183, 136, 0.25);
    }

    /* Flow Connector */
    .flow-badge {
      background: rgba(82, 183, 136, 0.15);
      border: 1px solid rgba(82, 183, 136, 0.35);
      color: #166534;
      font-weight: 700;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 0.82rem;
      display: inline-block;
      margin-bottom: 12px;
    }

    /* FAQ Box */
    .faq-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      margin-bottom: 16px;
      overflow: hidden;
    }

    /* Footer */
    .eco-footer {
      background: #071e13;
      color: #cbd5e1;
      padding: 60px 0 30px 0;
      border-top: 1px solid rgba(255,255,255,0.08);
      margin-top: 70px;
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
        <a href="{{ url('about') }}" class="eco-nav-link">Tentang Kami</a>
        <a href="{{ url('panduan') }}" class="eco-nav-link active">Panduan Alur</a>
        <a href="{{ url('pengaduan') }}" class="eco-nav-link">Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="eco-nav-link">Berita Kebun</a>
        <a href="{{ url('/#leadership') }}" class="eco-nav-link">Struktur Organisasi</a>
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
        <a href="{{ url('panduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-journal-text me-2"></i>Panduan Alur</a>
        <a href="{{ url('pengaduan') }}" class="text-white text-decoration-none py-1"><i class="bi bi-megaphone me-2"></i>Layanan Pengaduan</a>
        <a href="{{ route('detail') }}" class="text-white text-decoration-none py-1"><i class="bi bi-newspaper me-2"></i>Berita Kebun</a>
        <a href="{{ route('pengaduan.cek-status') }}" class="text-white text-decoration-none py-1"><i class="bi bi-search me-2"></i>Cek Status Laporan</a>
        <a href="{{ url('login') }}" class="btn btn-success mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login Portal</a>
      </div>
    </div>
  </header>

  <main>
    <!-- Hero Banner -->
    <div class="page-hero">
      <div class="container position-relative" style="z-index: 2;">
        <span class="badge bg-success bg-opacity-25 text-white border border-white border-opacity-25 px-3 py-2 rounded-pill mb-3">
          <i class="bi bi-book-half me-1"></i> Petunjuk Resmi Pengisian & Pelacakan
        </span>
        <h1 class="fw-bold mb-2 font-display text-white" style="font-size: 2.8rem;">Panduan Alur Pengaduan "Lapor Pak!"</h1>
        <p class="text-white-50 mx-auto" style="max-width: 650px; font-size: 1.1rem;">
          Ikuti langkah-langkah mudah di bawah ini untuk menyampaikan aspirasi, kendala fasilitas, atau permohonan solusi operasional secara aman dan terverifikasi.
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
          <a href="{{ url('pengaduan') }}" class="btn btn-success fw-bold px-4 py-2 rounded-pill shadow-sm">
            <i class="bi bi-pencil-square me-1"></i> Langsung Buat Pengaduan
          </a>
          <a href="{{ route('pengaduan.cek-status') }}" class="btn btn-outline-light fw-bold px-4 py-2 rounded-pill">
            <i class="bi bi-search me-1"></i> Lacak Status Laporan
          </a>
        </div>
      </div>
    </div>

    <!-- 5 Steps Container -->
    <div class="container py-5" style="margin-top: -40px;">
      <div class="text-center mb-5">
        <span class="flow-badge"><i class="bi bi-diagram-3-fill me-1"></i> 5 LANGKAH MUDAH</span>
        <h2 class="fw-bold text-dark">Alur Proses Dari Pengajuan Hingga Selesai</h2>
        <p class="text-muted">Proses terstruktur untuk menjamin aspirasi Anda segera ditindaklanjuti oleh manajemen pimpinan.</p>
      </div>

      <div class="row g-4">
        <!-- Step 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="step-card">
            <div class="step-number">1</div>
            <i class="bi bi-person-lines-fill step-icon-badge"></i>
            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1 rounded-pill mb-2">Langkah Awal</span>
            <h4 class="fw-bold text-dark mb-2">Pilih Data Karyawan</h4>
            <p class="text-muted small mb-3">
              Buka menu <strong>Layanan Pengaduan</strong>, lalu pilih:
            </p>
            <ul class="text-muted small ps-3 mb-0" style="line-height: 1.8;">
              <li><strong>Area Kerja:</strong> (KBN DOS / Unit Kebun)</li>
              <li><strong>Bagian Realisasi:</strong> (Afdeling I - IX / Tata Usaha)</li>
              <li><strong>Posisi / Jabatan:</strong> (Krani, Pemanen, dll)</li>
              <li><strong>Nama Karyawan:</strong> NIKSAP terisi otomatis</li>
              <li><strong>Nomor HP / WhatsApp:</strong> Kontak aktif untuk konfirmasi</li>
            </ul>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="step-card">
            <div class="step-number">2</div>
            <i class="bi bi-card-text step-icon-badge"></i>
            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1 rounded-pill mb-2">Isi Laporan</span>
            <h4 class="fw-bold text-dark mb-2">Uraikan Keluhan / Aspirasi</h4>
            <p class="text-muted small mb-3">
              Pilih kategori dan jelaskan permasalahan secara jelas:
            </p>
            <ul class="text-muted small ps-3 mb-0" style="line-height: 1.8;">
              <li><strong>Kategori:</strong> Fasilitas Kantor, Lapangan, K3, Operasional, dll</li>
              <li><strong>Deskripsi Detail:</strong> Tuliskan kronologi, lokasi kejadian, serta usulan solusi yang diinginkan</li>
              <li>Gunakan bahasa yang santun, jelas, dan faktual</li>
            </ul>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="step-card">
            <div class="step-number">3</div>
            <i class="bi bi-camera-fill step-icon-badge"></i>
            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1 rounded-pill mb-2">Lampiran Bukti</span>
            <h4 class="fw-bold text-dark mb-2">Unggah Foto / Dokumen</h4>
            <p class="text-muted small mb-3">
              Perkuat laporan Anda dengan melampirkan bukti:
            </p>
            <ul class="text-muted small ps-3 mb-0" style="line-height: 1.8;">
              <li><strong>Foto Bukti Fisik:</strong> JPG, PNG, WEBP (Maks 2MB)</li>
              <li><strong>Dokumen Pendukung:</strong> PDF / Gambar Surat Permohonan</li>
              <li><em>(Opsional)</em> Jika tidak memiliki bukti, Anda tetap bisa mengirim pengaduan</li>
            </ul>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="col-lg-6 col-md-6">
          <div class="step-card">
            <div class="step-number">4</div>
            <i class="bi bi-ticket-perforated-fill step-icon-badge"></i>
            <span class="badge bg-warning bg-opacity-10 text-warning fw-bold px-3 py-1 rounded-pill mb-2">Penting</span>
            <h4 class="fw-bold text-dark mb-2">Simpan Kode Tiket Pengaduan</h4>
            <p class="text-muted small mb-3">
              Setelah tombol <strong>"Kirim Laporan Pengaduan"</strong> diklik, sistem akan membuatkan nomor tiket unik:
            </p>
            <div class="p-3 bg-light rounded-3 border mb-3">
              <strong class="text-success"><i class="bi bi-shield-check me-1"></i> Contoh Kode Tiket:</strong>
              <code class="fs-6 fw-bold text-dark d-block mt-1">PD240910-4821</code>
            </div>
            <p class="text-muted small mb-0">
              Catat atau screenshot kode tersebut untuk memantau perkembangan penanganan oleh pihak pimpinan.
            </p>
          </div>
        </div>

        <!-- Step 5 -->
        <div class="col-lg-6 col-md-12">
          <div class="step-card">
            <div class="step-number">5</div>
            <i class="bi bi-printer-fill step-icon-badge"></i>
            <span class="badge bg-info bg-opacity-10 text-info fw-bold px-3 py-1 rounded-pill mb-2">Hasil Akhir</span>
            <h4 class="fw-bold text-dark mb-2">Pantau Status & Cetak Lembar Resmi PDF</h4>
            <p class="text-muted small mb-3">
              Gunakan menu <strong>Cek Status</strong> untuk:
            </p>
            <ul class="text-muted small ps-3 mb-3" style="line-height: 1.8;">
              <li>Melihat status verifikasi: <strong>Diterima &rarr; Dalam Proses &rarr; Selesai</strong></li>
              <li>Membaca catatan tanggapan resmi dari Kepala Bagian / Personalia Kebun</li>
              <li>Mencetak <strong>Lembar Aspirasi & Pengaduan PDF Resmi</strong> ber-Kop Surat PTPN IV lengkap dengan tanda tangan pengesahan</li>
            </ul>
            <a href="{{ route('pengaduan.cek-status') }}" class="btn btn-sm btn-outline-success fw-bold rounded-pill px-3">
              <i class="bi bi-search me-1"></i> Coba Cek Status Sekarang
            </a>
          </div>
        </div>
      </div>

      <!-- FAQ Section -->
      <div class="mt-5 pt-4">
        <div class="text-center mb-4">
          <span class="flow-badge"><i class="bi bi-question-circle-fill me-1"></i> TANYA JAWAB</span>
          <h3 class="fw-bold text-dark">Pertanyaan yang Sering Diajukan (FAQ)</h3>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="accordion" id="accordionFaq">
              <div class="accordion-item faq-card">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    <i class="bi bi-lock-fill text-success me-2"></i> Apakah identitas pelapor dijamin aman dan rahasia?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFaq">
                  <div class="accordion-body text-muted small" style="line-height: 1.8;">
                    Ya, seluruh data pelapor dilindungi dengan prinsip kerahasiaan Good Corporate Governance (GCG) dan hanya dapat diakses oleh Administrator Sistem dan Pimpinan Unit terkait yang berwenang menindaklanjuti pengaduan tersebut.
                  </div>
                </div>
              </div>

              <div class="accordion-item faq-card">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    <i class="bi bi-clock-history text-success me-2"></i> Berapa lama waktu yang dibutuhkan untuk tindak lanjut pengaduan?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                  <div class="accordion-body text-muted small" style="line-height: 1.8;">
                    Laporan akan diverifikasi dalam 1x24 jam hari kerja. Penanganan tindak lanjut fisik/operasional akan disesuaikan dengan urgensi dan kategori pengaduan yang dilaporkan.
                  </div>
                </div>
              </div>

              <div class="accordion-item faq-card">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    <i class="bi bi-file-earmark-pdf-fill text-success me-2"></i> Bagaimana cara mencetak bukti pengaduan resmi?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                  <div class="accordion-body text-muted small" style="line-height: 1.8;">
                    Karyawan dapat membuka menu <strong>Cek Status</strong>, memasukkan kode tiket atau NIKSAP, lalu menekan tombol <strong>"Unduh / Cetak PDF Resmi"</strong> di bagian bawah detail pengaduan untuk mencetak format surat resmi.
                  </div>
                </div>
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
