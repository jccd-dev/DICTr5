<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $roles = [
            'sa' => 100,
            'na' => 200,
            'cc' => 300,
        ];

        // Restrict the role Creator(cc) to access the functions that for admins only
        // admins_only function is for super_admin(sa) and normal_admin(na) only
        Gate::define('admins_only', function ($admin) use ($roles) {
            return (int)$admin->role !== $roles['cc'];
        });

        // restrict the role normal_admin(na) to delete any contents in the website
        Gate::define('delete_content', function ($admin) use ($roles) {
            return (int)$admin->role !== $roles['na'];
        });
    }
}
