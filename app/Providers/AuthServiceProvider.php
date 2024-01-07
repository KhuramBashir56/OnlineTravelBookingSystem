<?php

namespace App\Providers;

use App\Gates\AdminGate;
use App\Gates\AgencyGate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', [AdminGate::class, 'verify_admin_role']);
        Gate::define('agency', [AgencyGate::class, 'verify_agency_role']);
    }
}
