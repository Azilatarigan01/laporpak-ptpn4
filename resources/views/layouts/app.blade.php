<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $header_title ?? 'Dashboard' }} | Lapor Pak - PTPN IV Kebun Dolok Sinumbah</title>

    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    
    <!-- Material Design Icons for legacy icons support -->
    <link rel="stylesheet" href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}">
    
    <link rel="shortcut icon" href="{{ asset('assets/img/logoo.png') }}" />
    
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- SortableJS for Drag-and-Drop Reordering -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <style>
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
            --slate-900: #0f172a;
            --slate-800: #1e293b;
            --slate-700: #334155;
            --slate-600: #475569;
            --slate-500: #64748b;
            --slate-300: #cbd5e1;
            --slate-200: #e2e8f0;
            --slate-100: #f1f5f9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: var(--eco-bg);
            color: var(--slate-700);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Fixed Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 260px;
            background: var(--eco-dark);
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            overflow-y: auto;
            z-index: 1040;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        /* Sidebar Brand Header */
        .sidebar-brand-wrapper {
            height: 70px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.2);
            text-decoration: none;
            flex-shrink: 0;
        }

        .sidebar-brand-wrapper img {
            height: 38px;
            width: auto;
        }

        .sidebar-brand-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.1;
            margin: 0;
        }

        .sidebar-brand-sub {
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--eco-lime);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin: 0;
        }

        .sidebar-menu-wrapper {
            padding: 18px 12px;
            flex-grow: 1;
        }

        .sidebar-category {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--eco-lime);
            padding: 16px 14px 6px 14px;
            opacity: 0.85;
        }

        .sidebar-nav-item {
            list-style: none;
            margin-bottom: 3px;
        }

        .sidebar-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            border-radius: 12px;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .sidebar-nav-link i {
            font-size: 1.25rem;
            color: var(--eco-lime);
            line-height: 1;
            transition: transform 0.2s ease;
        }

        .sidebar-nav-link:hover {
            background: rgba(82, 183, 136, 0.15);
            color: #ffffff;
        }

        .sidebar-nav-link:hover i {
            transform: scale(1.1);
        }

        .sidebar-nav-link.active {
            background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
            color: #ffffff !important;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(45, 106, 79, 0.4);
            border: 1px solid rgba(116, 198, 157, 0.3);
        }

        .sidebar-nav-link.active i {
            color: #ffffff !important;
        }

        /* Top Fixed Navbar */
        .admin-topbar {
            position: fixed;
            top: 0;
            left: 260px;
            right: 0;
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid var(--slate-200);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 1030;
            transition: all 0.3s ease;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Main Content Wrapper */
        .admin-main-wrapper {
            margin-left: 260px;
            margin-top: 70px;
            padding: 28px 32px;
            flex-grow: 1;
            min-height: calc(100vh - 70px);
            background-color: var(--eco-bg);
            transition: all 0.3s ease;
        }

        /* Cards & Components */
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            background: #ffffff;
            margin-bottom: 24px;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 20px 26px;
            border-top-left-radius: 18px !important;
            border-top-right-radius: 18px !important;
        }

        /* Table Styling */
        .table-responsive {
            border-radius: 14px;
        }

        .table thead th {
            background-color: #f8fafc;
            color: var(--slate-700);
            font-weight: 700;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 20px;
        }

        .table tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            color: var(--slate-700);
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.92rem;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Hierarchy Drag Handle */
        .drag-handle {
            cursor: grab;
            color: #94a3b8;
            transition: color 0.15s;
        }
        .drag-handle:hover {
            color: var(--eco-green);
        }
        .sortable-ghost {
            opacity: 0.4;
            background-color: #dcfce7 !important;
        }

        /* Badges */
        .badge {
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        .badge-rank {
            background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
            color: #ffffff;
            font-weight: 800;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* Buttons */
        .btn {
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 9px 20px;
            transition: all 0.25s ease;
        }

        .btn-primary, .btn-success {
            background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);
            border: none;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.25);
        }

        .btn-primary:hover, .btn-success:hover {
            background: linear-gradient(135deg, #40916c 0%, #1b4332 100%);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(45, 106, 79, 0.35);
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 0.82rem;
            border-radius: 8px;
        }

        /* Form Controls */
        .form-control, .form-select {
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.92rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--eco-vibrant);
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.2);
        }

        /* Select2 */
        .select2-container .select2-selection--single {
            height: 44px !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 10px !important;
            padding: 6px 12px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 28px !important;
            color: #1e293b !important;
            font-weight: 600;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 42px !important;
        }
        .select2-dropdown {
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 10px !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-topbar {
                left: 0;
                padding: 0 16px;
            }
            .admin-main-wrapper {
                margin-left: 0;
                padding: 20px 15px;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Fixed Left Sidebar with Integrated Brand Header -->
    <aside class="admin-sidebar" id="adminSidebar">
        <!-- Brand Header inside Sidebar -->
        <a class="sidebar-brand-wrapper" href="{{ Auth::user()->user_type == 1 ? route('admin.dashboard') : route('kepala.dashboard') }}">
            <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo PTPN IV">
            <div>
                <h1 class="sidebar-brand-title">Lapor Pak!</h1>
                <p class="sidebar-brand-sub">Kebun Dolok Sinumbah</p>
            </div>
        </a>

        <!-- Sidebar Navigation Menu -->
        <div class="sidebar-menu-wrapper">
            @if(Auth::user()->user_type == 1)
            <!-- Admin Menu -->
            <ul class="p-0 m-0">
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-category">Manajemen Pengaduan</li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ Route::currentRouteName() === 'pengaduan.list' || request()->routeIs('pengaduan.*') ? 'active' : '' }}" href="{{ route('pengaduan.list') }}">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Data Pengaduan</span>
                    </a>
                </li>

                <li class="sidebar-category">Data Perusahaan</li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ request()->routeIs('kepala.*') ? 'active' : '' }}" href="{{ route('kepala.list') }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Pimpinan & Hierarki</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ request()->routeIs('karyawan.*') ? 'active' : '' }}" href="{{ route('karyawan.list') }}">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.list') }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Berita & Informasi</span>
                    </a>
                </li>

                <li class="sidebar-category">Pengguna & Akun</li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ request()->routeIs('admin.list') || request()->routeIs('admin.add') || request()->routeIs('admin.edit') ? 'active' : '' }}" href="{{ route('admin.list') }}">
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Akun Administrator</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ Route::currentRouteName() === 'my_account' ? 'active' : '' }}" href="{{ route('my_account') }}">
                        <i class="bi bi-person-gear"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
            </ul>
            @elseif(Auth::user()->user_type == 2)
            <!-- Kepala Bagian Menu -->
            <ul class="p-0 m-0">
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ Route::currentRouteName() === 'kepala.dashboard' ? 'active' : '' }}" href="{{ route('kepala.dashboard') }}">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-category">Layanan Aspirasi</li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ request()->routeIs('kepala.pengaduan.*') ? 'active' : '' }}" href="{{ route('kepala.pengaduan.list') }}">
                        <i class="bi bi-file-earmark-check-fill"></i>
                        <span>Data Pengaduan</span>
                    </a>
                </li>

                <li class="sidebar-category">Data Perusahaan</li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ Route::currentRouteName() === 'kepala.karyawan.list' ? 'active' : '' }}" href="{{ route('kepala.karyawan.list') }}">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>

                <li class="sidebar-category">Akun</li>
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link {{ Route::currentRouteName() === 'my_account' ? 'active' : '' }}" href="{{ route('my_account') }}">
                        <i class="bi bi-person-gear"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
            </ul>
            @endif
        </div>
    </aside>

    <!-- Top Fixed Header (Starts from right of sidebar) -->
    <header class="admin-topbar">
        <!-- Left: Mobile Toggle & System Role Badge -->
        <div class="topbar-left">
            <button class="btn btn-light d-lg-none border-0 p-2" type="button" id="sidebarToggleBtn">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-bold">
                    <i class="bi bi-shield-check me-1"></i> {{ Auth::user()->user_type == 1 ? 'Administrator Sistem' : (Auth::user()->jabatan ?: 'Kepala Bagian') }}
                </span>
                <span class="text-muted small fw-semibold d-none d-md-inline">&bull; PTPN IV Regional II</span>
            </div>
        </div>

        <!-- Right: Live Realtime Clock & User Actions -->
        <div class="d-flex align-items-center gap-3">
            <!-- Live Realtime Clock Badge -->
            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill small fw-semibold d-none d-lg-inline-flex align-items-center gap-2 shadow-sm">
                <i class="bi bi-clock-history text-success"></i>
                <span id="realtimeLiveClock">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </span>

            <a href="{{ url('/') }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3 d-none d-sm-inline-flex align-items-center gap-1">
                <i class="bi bi-globe"></i> <span>Buka Website</span>
            </a>

            <!-- Dropdown User -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="text-end d-none d-lg-block" style="line-height: 1.2;">
                        <div class="fw-bold small text-dark">{{ Auth::user()->name }}</div>
                        <small class="text-muted" style="font-size: 0.72rem;">{{ Auth::user()->email }}</small>
                    </div>
                    @if(Auth::user()->profil && file_exists(public_path('uploads/profiles/' . Auth::user()->profil)))
                        <img class="rounded-circle shadow-sm border border-2 border-success" src="{{ asset('uploads/profiles/' . Auth::user()->profil) }}" alt="Profile" style="width: 40px; height: 40px; object-fit: cover;"> 
                    @else
                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px; font-weight: 800; font-size: 1rem; background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-3" style="border-radius: 18px; min-width: 250px;">
                    <li class="text-center pb-3 border-bottom mb-2">
                        @if(Auth::user()->profil && file_exists(public_path('uploads/profiles/' . Auth::user()->profil)))
                            <img class="rounded-circle shadow-sm mb-2 border border-2 border-success" src="{{ asset('uploads/profiles/' . Auth::user()->profil) }}" alt="Profile" style="width: 55px; height: 55px; object-fit: cover;">
                        @else
                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center shadow-sm mx-auto mb-2" style="width: 55px; height: 55px; font-size: 1.4rem; font-weight: 800; background: linear-gradient(135deg, #2d6a4f 0%, #133c24 100%);">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <h6 class="mb-0 fw-bold text-dark">{{ Auth::user()->name }}</h6>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 fw-semibold rounded-3" href="{{ route('my_account') }}">
                            <i class="bi bi-person-gear text-success me-2 fs-5"></i> Profil Saya
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item py-2 text-danger fw-semibold rounded-3" href="{{ url('/logout') }}">
                            <i class="bi bi-box-arrow-right text-danger me-2 fs-5"></i> Keluar (Logout)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="admin-main-wrapper">
        <!-- Global Notifications -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center p-3 mb-4" role="alert" style="border-radius: 14px; background-color: #dcfce7; color: #166534;">
                <i class="bi bi-check-circle-fill me-3 fs-4 text-success"></i>
                <div class="flex-grow-1 fw-semibold">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-flex align-items-center p-3 mb-4" role="alert" style="border-radius: 14px; background-color: #fee2e2; color: #991b1b;">
                <i class="bi bi-exclamation-circle-fill me-3 fs-4 text-danger"></i>
                <div class="flex-grow-1 fw-semibold">{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show shadow-sm border-0 d-flex align-items-center p-3 mb-4" role="alert" style="border-radius: 14px; background-color: #e0f2fe; color: #075985;">
                <i class="bi bi-info-circle-fill me-3 fs-4 text-info"></i>
                <div class="flex-grow-1 fw-semibold">{{ session('info') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('container')

        <footer class="text-center text-muted small pt-5 pb-3">
            &copy; {{ date('Y') }} PT Perkebunan Nusantara IV (Persero) Regional II Kebun Dolok Sinumbah &bull; Sistem Lapor Pak!
        </footer>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // Mobile Sidebar Toggle
        const toggleBtn = document.getElementById('sidebarToggleBtn');
        const sidebar = document.getElementById('adminSidebar');
        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        }

        // Live Realtime Clock Ticker
        function updateLiveClock() {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const now = new Date();
            const dayName = days[now.getDay()];
            const day = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            const clockEl = document.getElementById('realtimeLiveClock');
            if (clockEl) {
                clockEl.innerText = `${dayName}, ${day} ${monthName} ${year} • ${hours}:${minutes}:${seconds} WIB`;
            }
            const heroDateEl = document.getElementById('heroLiveDate');
            if (heroDateEl) {
                heroDateEl.innerText = `${dayName}, ${day} ${monthName} ${year}`;
            }
        }
        setInterval(updateLiveClock, 1000);
        updateLiveClock();
    </script>

    @yield('scripts')
</body>
</html>
