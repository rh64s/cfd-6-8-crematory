<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Service;
use App\Policies\UserPolicy;
use App\Policies\ServicePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Service::class => ServicePolicy::class,
    ];

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
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('manage-services', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('manage-users', function (User $user) {
            return $user->is_admin;
        });
    }
}
