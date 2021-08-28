<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as AuthenticationServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends AuthenticationServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // superadmin role
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });
    }
}
