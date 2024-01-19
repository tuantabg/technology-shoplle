<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'display_name', 'key_code', 'parent_id'];

    public function permissionsChildrent()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
