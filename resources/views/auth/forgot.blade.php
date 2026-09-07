<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Reset Password | Lapor Pak PTPN IV</title>

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
      background: linear-gradient(135deg, #14532d 0%, #0f172a 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 15px;
      color: #334155;
    }
    .auth-card {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
      overflow: hidden;
      max-width: 440px;
      width: 100%;
    }
    .btn-submit {
      background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
      border: none;
      color: #ffffff;
      font-weight: 700;
      padding: 12px;
      border-radius: 10px;
    }
    .btn-submit:hover {
      background: linear-gradient(135deg, #15803d 0%, #14532d 100%);
      color: #ffffff;
    }
  </style>
</head>

<body>
  <div class="auth-card">
    <div class="p-4 p-md-5">
      <div class="text-center mb-4">
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo" style="height: 55px;" class="mb-2">
        </a>
        <h4 class="fw-bold text-dark mb-1">Lupa Kata Sandi?</h4>
        <p class="text-muted small">Masukkan email akun Anda untuk mendapatkan bantuan pemulihan kata sandi.</p>
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

      <form action="{{ route('post.forgotpassword') }}" method="POST">
        @csrf

        <div class="mb-4">
          <label class="form-label fw-bold text-dark small">Alamat Email Terdaftar</label>
          <div class="input-group">
            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control form-control-lg border-start-0 ps-0 bg-light" name="email" value="{{ old('email') }}" placeholder="email@ptpn4.co.id" required autofocus>
          </div>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-submit">
            <i class="bi bi-send-check me-1"></i> Kirim Permintaan Reset
          </button>
        </div>

        <div class="text-center">
          <a href="{{ route('login') }}" class="small text-success fw-bold text-decoration-none">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Login
          </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>