<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        $notifications = Notification::orderBy('status', 'desc')->orderBy('created_at', 'desc')->limit(5)->get();
        $notifCounter  = Notification::where('status', '1')->get();

        Paginator::useBootstrap();
        View::share(['notifications' => $notifications, 'notifCounter' => $notifCounter]);
    }
}
