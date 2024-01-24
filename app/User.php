<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'feature_image_name', 'feature_image_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user',
            'user_id'
        );
    }

    public function checkPermissionAccess($permissionCheck)
    {
        // B1 - Lay dc tat ca cac quyen user dang login he thong
        // B2 - So sanh gia tri dua vao router hien tai xem co ton tai cac quyen
        $roles = auth()->user()->roles;
        foreach ($roles as $role) {
            $permission = $role->permissions;
            if ($permission->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }
}
