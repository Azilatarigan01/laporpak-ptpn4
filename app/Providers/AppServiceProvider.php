<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Pengaduan; // Pastikan namespace benar
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $notifications = collect();

            if (auth()->check()) {
                $today = Carbon::today();
                $userType = auth()->user()->user_type;

                if ($userType === 1 || $userType === 2) {
                    $notifications = Pengaduan::with('karyawan')
                        ->whereDate('tgl_pengaduan', $today)
                        ->orderBy('tgl_pengaduan', 'desc')
                        ->get();
                }
            }

            $view->with('notifications', $notifications);
        });
    }
}
