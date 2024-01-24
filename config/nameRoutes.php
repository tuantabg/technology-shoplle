<?php

return [
    'routeAllCategories' => ['categories.index', 'categories.create', 'categories.edit', 'categories.delete', 'categories.delete.permanently', 'categories.delete.recover', 'products.index', 'products.create', 'products.edit', 'products.delete', 'products.delete.permanently', 'products.delete.recover'],
    'categories' => ['categories.index', 'categories.create', 'categories.edit', 'categories.delete', 'categories.delete.permanently', 'categories.delete.recover'],
    'products' => ['products.index', 'products.create', 'products.edit', 'products.delete', 'products.delete.permanently', 'products.delete.recover'],

    'routeAllSettings' => ['menus.index', 'menus.create', 'menus.edit', 'menus.delete', 'sliders.index', 'sliders.create', 'sliders.edit', 'sliders.delete', 'settings.index', 'settings.create', 'settings.edit', 'settings.delete'],
    'menus' => ['menus.index', 'menus.create', 'menus.edit', 'menus.delete'],
    'sliders' => ['sliders.index', 'sliders.create', 'sliders.edit', 'sliders.delete'],
    'information' => ['settings.index', 'settings.create', 'settings.edit', 'settings.delete'],

    'routeAccountManagement' => ['users.index', 'users.create', 'users.edit', 'users.delete','users.delete.permanently', 'users.delete.recover', 'roles.index', 'roles.create', 'roles.edit', 'roles.delete', 'roles.delete.permanently', 'roles.delete.recover', 'permissions.create'],
    'users' => ['users.index', 'users.create', 'users.edit', 'users.delete','users.delete.permanently', 'users.delete.recover'],
    'roles' => ['roles.index', 'roles.create', 'roles.edit', 'roles.delete', 'roles.delete.permanently', 'roles.delete.recover'],
    'permissions' => ['permissions.create'],
];
