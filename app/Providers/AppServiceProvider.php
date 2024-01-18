<?php

namespace App\Providers;

use App\Models\Agency;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Package;
use App\Models\TourPlace;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
                'guides' => User::where('account_type', 'guide')->where('status', 'active')->count(),
                'received_amount' => Transaction::where('type', 'booking')->sum('credit'),
                'total_commission' => Transaction::where('type', 'commission')->sum('credit'),
                'total_release' => Transaction::where('type', 'release')->sum('debit'),
                'bookings' => Booking::where('status', 'unverified')->count()
            ]);
        });

        View::composer('components.web-app.agencies', function ($view) {
            $view->with('agencies', Agency::where('status', 'active')->select('id', 'title', 'logo')->paginate(8));
        });

        View::composer('pages.web-app.tour-history', function ($view) {
            if (Gate::allows('user')) {
                $view->with([
                    'transitions' => Booking::where('status', '!=', 'deleted')->where('user_id', Auth::user()->id)->latest()->get(),
                    'total_transitions' => Booking::where('status', 'verified')->where('user_id', Auth::user()->id)->count(),
                    'persons' => Booking::where('status', 'verified')->where('user_id', Auth::user()->id)->sum('persons'),
                    'grand_total' => Booking::where('status', 'verified')->where('user_id', Auth::user()->id)->sum('total_amount'),
                ]);
            } else {
                abort(403, 'Unauthorized');
            }
        });

        View::composer('pages.panel-app.agency.dashboard', function ($view) {
            $view->with([
                'bookings' => User::find(Auth::user()->id),
                'guides' => User::where('account_type', 'guide')->where('status', 'active')->where('register_by', Auth::user()->id)->count(),
                'packages' => Package::where('end', '>', now()->endOfDay())->where('user_id', Auth::user()->id)->count()
            ]);
        });
    }
}
