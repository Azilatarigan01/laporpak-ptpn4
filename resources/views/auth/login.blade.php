<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Login Portal | Lapor Pak PTPN IV Dolok Sinumbah</title>

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
    body {
      font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
      background: linear-gradient(135deg, #14532d 0%, #0f172a 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 15px;
      color: #334155;
    }
    .login-card {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
      overflow: hidden;
      max-width: 440px;
      width: 100%;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .btn-login {
      background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
      border: none;
      color: #ffffff;
      font-weight: 700;
      padding: 12px;
      border-radius: 10px;
      font-size: 1rem;
      transition: all 0.25s ease;
    }
    .btn-login:hover {
      background: linear-gradient(135deg, #15803d 0%, #14532d 100%);
      color: #ffffff;
      transform: translateY(-1px);
      box-shadow: 0 8px 18px rgba(22, 163, 74, 0.35);
    }
  </style>
</head>

<body>
  <div class="login-card">
    <div class="p-4 p-md-5">
      <div class="text-center mb-4">
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo" style="height: 55px;" class="mb-2">
        </a>
        <h4 class="fw-bold text-dark mb-1">Login Petugas & Personalia</h4>
        <p class="text-muted small">Portal Pengelolaan Aspirasi Lapor Pak! PTPN IV</p>
      </div>

      @if(session('error'))
        <div class="alert alert-danger shadow-sm border-0 d-flex align-items-center p-3 mb-3" style="border-radius: 10px; background-color: #fee2e2; color: #991b1b; font-size: 0.88rem;">
          <i class="bi bi-exclamation-circle-fill me-2 fs-5"></i>
          <div>{{ session('error') }}</div>
        </div>
      @endif

      @if(session('success'))
        <div class="alert alert-success shadow-sm border-0 d-flex align-items-center p-3 mb-3" style="border-radius: 10px; background-color: #dcfce7; color: #166534; font-size: 0.88rem;">
          <i class="bi bi-check-circle-fill me-2 fs-5"></i>
          <div>{{ session('success') }}</div>
        </div>
      @endif

      <form action="{{ route('auth.login') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-bold text-dark small">Alamat Email Login</label>
          <div class="input-group">
            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control form-control-lg border-start-0 ps-0 bg-light" name="email" value="{{ old('email') }}" placeholder="admin@ptpn4.co.id" required autofocus>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <label class="form-label fw-bold text-dark small mb-0">Kata Sandi</label>
            <a href="{{ route('forgotpassword') }}" class="small text-success text-decoration-none fw-semibold">Lupa Password?</a>
          </div>
          <div class="input-group">
            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
            <input type="password" id="loginPassword" class="form-control form-control-lg border-start-0 border-end-0 ps-0 bg-light" name="password" placeholder="••••••••" required>
            <button type="button" class="input-group-text bg-light border-start-0 text-muted" id="togglePassword" style="cursor: pointer;">
              <i class="bi bi-eye" id="eyeIcon"></i>
            </button>
          </div>
        </div>

        <div class="mb-4 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label small text-muted" for="remember">Ingat Sesi Saya</label>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn-login">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk ke Sistem
          </button>
        </div>

        <div class="p-3 bg-light rounded-3 border mb-3 text-start small">
          <div class="fw-bold text-dark mb-1"><i class="bi bi-info-circle-fill text-success me-1"></i> Akun Login Default:</div>
          <div class="text-muted"><strong>Admin:</strong> <code>admin@gmail.com</code> | Pass: <code>123456</code></div>
          <div class="text-muted"><strong>Kepala Bagian:</strong> <code>kepalabagian@gmail.com</code> | Pass: <code>123456</code></div>
        </div>

        <div class="text-center">
          <a href="{{ url('/') }}" class="small text-muted text-decoration-none">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda Utama
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    const toggleBtn = document.getElementById('togglePassword');
    const pwdInput = document.getElementById('loginPassword');
    const eyeIcon = document.getElementById('eyeIcon');

    if (toggleBtn && pwdInput) {
      toggleBtn.addEventListener('click', function() {
        if (pwdInput.type === 'password') {
          pwdInput.type = 'text';
          eyeIcon.classList.remove('bi-eye');
          eyeIcon.classList.add('bi-eye-slash');
        } else {
          pwdInput.type = 'password';
          eyeIcon.classList.remove('bi-eye-slash');
          eyeIcon.classList.add('bi-eye');
        }
      });
    }
  </script>
</body>
</html>