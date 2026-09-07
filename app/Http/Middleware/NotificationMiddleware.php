<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Pengaduan;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $today = Carbon::today();
            $userType = auth()->user()->user_type;

            $notifications = collect(); // Default kosong
            if ($userType === 1) { // Admin
                $notifications = Pengaduan::whereDate('tgl_pengaduan', $today)->get();
            } elseif ($userType === 2) { // Kepala bagian
                $notifications = Pengaduan::where('status', 'menunggu')->get();
            }

            // Share notifikasi ke view
            view()->share('notifications', $notifications);
        }

        return $next($request);
    }
}
