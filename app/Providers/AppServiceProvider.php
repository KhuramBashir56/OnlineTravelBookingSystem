<?php

namespace App\Providers;

use App\Models\Agency;
use App\Models\Message;
use App\Models\TourPlace;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('pages.panel-app.admin.dashboard', function ($view) {
            $view->with([
                'agencies' => Agency::where('status', 'active')->count(),
                'places' => TourPlace::where('status', 'published')->count(),
                'messages' => Message::where('read', 'no')->count(),
                'users' => User::where('account_type', 'user')->where('status', 'active')->count(),
                'guides' => User::where('account_type', 'guide')->where('status', 'active')->count()
            ]);
        });
        View::composer('pages.web-app.welcome', function ($view) {
            $view->with([
                'places' => TourPlace::with(['city' => function ($query) {
                    $query->select('id', 'name');
                }])->select('id', 'city_id', 'title', 'thumbnail', 'slug', 'short_description')->where('status', 'published')->inRandomOrder()->take(3)->get()
            ]);
        });
    }
}
