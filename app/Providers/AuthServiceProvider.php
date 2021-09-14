<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Group;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
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

        // admin can access any section
        Gate::before( function (User $user){
            if($user->group->title === "Admins") {
                return true;
            }
        });

        Gate::define('group-complaint', function (User $user, Group $group) {

            return $user->group->title === "Complaints"? true : false;

        });

        Gate::define('group-admin', function (User $user, Group $group) {

            return $user->group->title === "Admins"? true : false;

        });

        Gate::define('group-media', function (User $user, Group $group) {

            return $user->group->title === "Media"? true : false;

        });

        Gate::define('group-promotion', function (User $user, Group $group) {

            return $user->group->title === "Promotion"? true : false;

        });
    }
}
