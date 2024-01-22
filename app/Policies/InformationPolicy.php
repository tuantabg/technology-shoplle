<?php

namespace App\Policies;

use App\User;
use App\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.listInformation'));
    }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.addInformation'));
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.editInformation'));
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.deleteInformation'));
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function restore(User $user, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function forceDelete(User $user, Setting $setting)
    {
        //
    }
}
