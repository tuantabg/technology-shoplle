<?php

namespace App\Components;

use App\Permission;

class PermissionRecusive {

    private $permissions;
    private $htmlSlect = '';

    public function __construct($permissions)
    {
        $this->permissions = $permissions;
    }

    function permissionRecusive($parentId, $id = 0, $text = ''){
        foreach ($this->permissions as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']){
                    $this->htmlSlect .= "<option selected value='". $value['id'] ."'>" . $text . ' ' . $value['display_name'] . "</option>";
                } else {
                    $this->htmlSlect .= "<option value='". $value['id'] ."'>" . $text . ' ' . $value['display_name'] . "</option>";
                }

                $this->permissionRecusive($parentId, $value['id'], $text. "一");
            }
        }

        return $this->htmlSlect;
    }
}
