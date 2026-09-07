<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Pengaduan::orderBy('tgl_pengaduan', 'desc')->paginate(10); // Semua notifikasi dengan paginasi
        return view('notifications.index', compact('notifications'));
    }
}

