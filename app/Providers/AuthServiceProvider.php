<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isPemain', function($user) {
            if($user->pemain_id != null){
                return $user->pemain_id;
            }
        });

        Gate::define('isPenpos', function($user) {
            if($user->penpos_id != null){
                return $user->penpos_id;
            }
        });
    }
}
