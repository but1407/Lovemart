<?php

namespace App\Providers;

use App\Models\Permission;
use App\Policies\MenuPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\SliderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\SettingPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        
        #category
        Gate::define('category-list', [CategoryPolicy::class,'view']);
        Gate::define('category-add', [CategoryPolicy::class,'create']);
        Gate::define('category-edit', [CategoryPolicy::class,'update']);
        Gate::define('category-delete', [CategoryPolicy::class,'delete']);
        #menu
        Gate::define('menu-list', [MenuPolicy::class,'view']);
        Gate::define('menu-add', [MenuPolicy::class,'create']);
        Gate::define('menu-edit', [MenuPolicy::class,'update']);
        Gate::define('menu-delete', [MenuPolicy::class,'delete']);
        #slider
        Gate::define('slider-list', [SliderPolicy::class,'view']);
        Gate::define('slider-add', [SliderPolicy::class,'create']);
        Gate::define('slider-edit', [SliderPolicy::class,'update']);
        Gate::define('slider-delete', [SliderPolicy::class,'delete']);
        #product
        Gate::define('product-list', [ProductPolicy::class,'view']);
        Gate::define('product-add', [ProductPolicy::class,'create']);
        Gate::define('product-edit', [ProductPolicy::class,'update']);
        Gate::define('product-delete', [ProductPolicy::class,'delete']);
        #user
        Gate::define('user-list', [UserPolicy::class,'view']);
        Gate::define('user-add', [UserPolicy::class,'create']);
        Gate::define('user-edit', [UserPolicy::class,'update']);
        Gate::define('user-delete', [UserPolicy::class,'delete']);
        #setting
        Gate::define('setting-list', [SettingPolicy::class,'view']);
        Gate::define('setting-add', [SettingPolicy::class,'create']);
        Gate::define('setting-edit', [SettingPolicy::class,'update']);
        Gate::define('setting-delete', [SettingPolicy::class,'delete']);
        #role
        Gate::define('role-list', [RolePolicy::class,'view']);
        Gate::define('role-add', [RolePolicy::class,'create']);
        Gate::define('role-edit', [RolePolicy::class,'update']);
        Gate::define('role-delete', [RolePolicy::class,'delete']);
        #permission
        Gate::define('permission-add', [PermissionPolicy::class,'create']);

        
        
    }
}