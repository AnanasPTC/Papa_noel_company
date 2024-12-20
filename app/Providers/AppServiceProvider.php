<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            if (auth()->check()) {
                $userId = auth()->id();

                // Récupérer les notifications non lues
                $unreadNotifications = Message::where('receiver_id', $userId)
                    ->where('is_read', false)
                    ->with('sender')
                    ->orderBy('created_at', 'desc')
                    ->get();

                $view->with('unreadNotifications', $unreadNotifications);
            }
        });

    }
}
