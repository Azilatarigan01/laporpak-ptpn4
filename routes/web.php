<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KepalaBagianController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Publik (Beranda & Landing Page)
Route::get('/', [NewsController::class, 'welcome'])->name('home');
Route::get('/news/{id}', [NewsController::class, 'detail'])->name('news.detail');
Route::get('/detailblog', [NewsController::class, 'detailnews'])->name('detail');
Route::get('/about', fn() => view('about'))->name('about');

// Halaman Pengaduan Publik
Route::get('/pengaduan', [PengaduanController::class, 'beranda'])->name('pengaduan.beranda');
Route::get('/pengaduan/about', fn() => view('pengaduan.about'))->name('pengaduan.about');
Route::get('/pengaduan/cek-status', fn() => view('pengaduan.cek-status'))->name('pengaduan.cek-status');
Route::post('/cek-status-pengaduan', [PengaduanController::class, 'cekStatus'])->name('cekStatusPengaduan');

// Form Pengaduan (Tanpa Login)
Route::post('/pengaduan/add', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::match(['put', 'post'], '/pengaduan/update-status/{id?}', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
Route::get('/pengaduan/status/{status}', [PengaduanController::class, 'filterByStatus'])->name('pengaduan.status');
Route::get('/pengaduan/realisasi/{id_realisasi}', [PengaduanController::class, 'filterByRealisasi'])->name('pengaduan.realisasi');

// Dropdown Controller Routes (AJAX Select2)
Route::get('/selectArea', [DropdownController::class, 'area'])->name('area.index');
Route::get('/selectRealisasi/{id}', [DropdownController::class, 'realisasi'])->name('area.realisasi');
Route::get('/selectPosisi/{id}', [DropdownController::class, 'posisi'])->name('area.posisi');
Route::get('/selectKaryawan/{id}', [DropdownController::class, 'karyawan'])->name('area.karyawan');
Route::get('/selectNiksap/{id}', [DropdownController::class, 'niksap'])->name('area.niksap');

// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'Authlogin'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgotpassword');
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword'])->name('post.forgotpassword');

// User Account
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [UserController::class, 'showMyAccountForm'])->name('my_account');
    Route::match(['put', 'post'], '/my-account/update/admin/{id}', [UserController::class, 'updateAdminAccount'])->name('update_admin_account');
    Route::match(['put', 'post'], '/my-account/update/kepala/{id}', [UserController::class, 'updateKepalaAccount'])->name('update_kepala_account');
    Route::get('/account', [UserController::class, 'showMyAccountForm'])->name('admin.account');
});

// Notifications
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

// Admin Routes (Protected by admin middleware)
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Account Management
    Route::get('/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('/add', [AdminController::class, 'insert'])->name('admin.insert');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::match(['put', 'post'], '/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    // Pimpinan & Kepala Bagian Management (With Dynamic Hierarchy Ordering)
    Route::get('/kepala/list', [KepalaBagianController::class, 'list'])->name('kepala.list');
    Route::get('/kepala/add', [KepalaBagianController::class, 'add'])->name('kepala.add');
    Route::post('/kepala/add', [KepalaBagianController::class, 'insert'])->name('kepala.insert');
    Route::get('/kepala/edit/{id}', [KepalaBagianController::class, 'edit'])->name('kepala.edit');
    Route::match(['put', 'post'], '/kepala/update/{id}', [KepalaBagianController::class, 'update'])->name('kepala.update');
    Route::delete('/kepala/delete/{id}', [KepalaBagianController::class, 'delete'])->name('kepala.delete');
    // Hierarchy Reordering Routes:
    Route::post('/kepala/reorder', [KepalaBagianController::class, 'reorder'])->name('kepala.reorder');
    Route::get('/kepala/move/{id}/{direction}', [KepalaBagianController::class, 'move'])->name('kepala.move');

    // Karyawan Management
    Route::get('/karyawan/list', [KaryawanController::class, 'list'])->name('karyawan.list');
    Route::get('/karyawan/add', [KaryawanController::class, 'add'])->name('karyawan.add');
    Route::post('/karyawan/add', [KaryawanController::class, 'insert'])->name('karyawan.insert');
    Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::match(['put', 'post'], '/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'delete'])->name('karyawan.delete');
    Route::get('/karyawan/search', [KaryawanController::class, 'search'])->name('karyawan.search');

    // Dropdown for Karyawan Form
    Route::get('/karyawan/area-dropdown', [DropdownController::class, 'areadropdown'])->name('dropdown.area');
    Route::get('/karyawan/realisasi-dropdown/{id}', [DropdownController::class, 'realisasidropdown'])->name('dropdown.realisasi');
    Route::get('/karyawan/posisi-dropdown/{id}', [DropdownController::class, 'posisidropdown'])->name('dropdown.posisi');

    // Pengaduan Management
    Route::get('/pengaduan/list', [PengaduanController::class, 'list'])->name('pengaduan.list');
    Route::get('/pengaduan/add', [PengaduanController::class, 'add'])->name('pengaduan.add');
    Route::post('/pengaduan/add', [PengaduanController::class, 'insert'])->name('pengaduan.insert');
    Route::get('/pengaduan/{id}/cetak-pdf', [PengaduanController::class, 'cetakPdf'])->name('pengaduan.cetakPDF');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::get('/pengaduan/search', [PengaduanController::class, 'search'])->name('pengaduan.search');

    // News Management
    Route::get('/news', [NewsController::class, 'index'])->name('news.list');
    Route::get('/news/add', [NewsController::class, 'add'])->name('news.add');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::match(['put', 'post'], '/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Kepala Bagian Routes
Route::prefix('kepala')->middleware(['kepala_bagian'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('kepala.dashboard');
    Route::get('/karyawan/list', [KaryawanController::class, 'karyawanlist'])->name('kepala.karyawan.list');
    Route::get('/pengaduan/list', [PengaduanController::class, 'pengaduanlist'])->name('kepala.pengaduan.list');
});
