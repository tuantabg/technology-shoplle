<?php

namespace App\Providers;

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

        // Gate product
        Gate::define('listProduct', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listProduct'));
        });
        Gate::define('addProduct', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addProduct'));
        });
        Gate::define('editProduct', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editProduct'));
        });
        Gate::define('deleteProduct', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteProduct'));
        });

        // Gate category
        Gate::define('listCategory', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listCategory'));
        });
        Gate::define('addCategory', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addCategory'));
        });
        Gate::define('editCategory', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editCategory'));
        });
        Gate::define('deleteCategory', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteCategory'));
        });

        // Gate menu
        Gate::define('listMenu', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listMenu'));
        });
        Gate::define('addMenu', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addMenu'));
        });
        Gate::define('editMenu', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editMenu'));
        });
        Gate::define('deleteMenu', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteMenu'));
        });

        // Gate slide
        Gate::define('listSlide', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listSlide'));
        });
        Gate::define('addSlide', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addSlide'));
        });
        Gate::define('editSlide', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editSlide'));
        });
        Gate::define('deleteSlide', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteSlide'));
        });


        // Gate user
        Gate::define('listUser', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listUser'));
        });
        Gate::define('addUser', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addUser'));
        });
        Gate::define('editUser', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editUser'));
        });
        Gate::define('deleteUser', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteUser'));
        });

        // Gate role
        Gate::define('listRole', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listRole'));
        });
        Gate::define('addRole', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addRole'));
        });
        Gate::define('editRole', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editRole'));
        });
        Gate::define('deleteRole', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteRole'));
        });

        // Gate information
        Gate::define('listInformation', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.listInformation'));
        });
        Gate::define('addInformation', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addInformation'));
        });
        Gate::define('editInformation', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.editInformation'));
        });
        Gate::define('deleteInformation', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.deleteInformation'));
        });

        // Gate permission
        Gate::define('addPermission', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.addPermission'));
        });
    }
}
