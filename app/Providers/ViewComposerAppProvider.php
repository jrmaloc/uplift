<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerAppProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            $auth = Auth::user();
            $all = User::all();
            // $unreadNotifications = optional($auth)->unreadNotifications; // Fetch notifications or any necessary data
            // $readNotifications = optional($auth)->readNotifications;

            $view->with([
                // 'readNotifications' => $readNotifications,
                // 'unreadNotifications' => $unreadNotifications,
                'auth' => $auth,
                'all' => $all,
            ]);
        });

    }
}
