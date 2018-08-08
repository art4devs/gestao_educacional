<?php

namespace Educacional\Providers;

use Educacional\Models\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Educacional\Model' => 'Educacional\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // cria uma habilidade de autenticacao para admins
        \Gate::define('admin', function ($user) {
            return $user->userable instanceof Admin;
        });
    }
}
