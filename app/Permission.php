<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function permissionsChildrent()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
