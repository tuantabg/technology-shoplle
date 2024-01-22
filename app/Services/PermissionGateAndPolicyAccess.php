<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {
    public function setGateAndPolicyAccess()
    {
        $this->defineGateProduct();
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateSlider();
        $this->defineGateInformation();
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGatePermission();
    }

    public function defineGateProduct()
    {
        Gate::define('listProduct', 'App\Policies\ProductPolicy@view');
        Gate::define('addProduct', 'App\Policies\ProductPolicy@create');
        Gate::define('editProduct', 'App\Policies\ProductPolicy@update');
        Gate::define('deleteProduct', 'App\Policies\ProductPolicy@delete');
    }

    public function defineGateCategory()
    {
        Gate::define('listCategory', 'App\Policies\CategoryPolicy@view');
        Gate::define('addCategory', 'App\Policies\CategoryPolicy@create');
        Gate::define('editCategory', 'App\Policies\CategoryPolicy@update');
        Gate::define('deleteCategory', 'App\Policies\CategoryPolicy@delete');
    }

    public function defineGateMenu()
    {
        Gate::define('listMenu', 'App\Policies\MenuPolicy@view');
        Gate::define('addMenu', 'App\Policies\MenuPolicy@create');
        Gate::define('editMenu', 'App\Policies\MenuPolicy@update');
        Gate::define('deleteMenu', 'App\Policies\MenuPolicy@delete');
    }

    public function defineGateSlider()
    {
        Gate::define('listSlide', 'App\Policies\SliderPolicy@view');
        Gate::define('addSlide', 'App\Policies\SliderPolicy@create');
        Gate::define('editSlide', 'App\Policies\SliderPolicy@update');
        Gate::define('deleteSlide', 'App\Policies\SliderPolicy@delete');
    }

    public function defineGateInformation()
    {
        Gate::define('listInformation', 'App\Policies\InformationPolicy@view');
        Gate::define('addInformation', 'App\Policies\InformationPolicy@create');
        Gate::define('editInformation', 'App\Policies\InformationPolicy@update');
        Gate::define('deleteInformation', 'App\Policies\InformationPolicy@delete');
    }

    public function defineGateUser()
    {
        Gate::define('listUser', 'App\Policies\UserPolicy@view');
        Gate::define('addUser', 'App\Policies\UserPolicy@create');
        Gate::define('editUser', 'App\Policies\UserPolicy@update');
        Gate::define('deleteUser', 'App\Policies\UserPolicy@delete');
    }

    public function defineGateRole()
    {
        Gate::define('listRole', 'App\Policies\RolePolicy@view');
        Gate::define('addRole', 'App\Policies\RolePolicy@create');
        Gate::define('editRole', 'App\Policies\RolePolicy@update');
        Gate::define('deleteRole', 'App\Policies\RolePolicy@delete');
    }

    public function defineGatePermission()
    {
        Gate::define('addPermission', 'App\Policies\PermissionPolicy@create');
    }
}
