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
use App\Services\PermissionGateAndPolicyAccessService;
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

        $permissionGateAndPolicy = new PermissionGateAndPolicyAccessService();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
    }

    
    
    

}