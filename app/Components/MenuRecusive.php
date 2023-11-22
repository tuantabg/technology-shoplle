<?php

namespace App\Components;

use App\Menu;

class MenuRecusive {

    private $menus;
    private $htmlSlect = '';

    public function __construct($menus)
    {
        $this->menus = $menus;
    }

    function menuRecusive($parentId, $id = 0, $text = ''){
        foreach ($this->menus as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']){
                    $this->htmlSlect .= "<option selected value='". $value['id'] ."'>" . $text . ' ' . $value['name'] . "</option>";
                } else {
                    $this->htmlSlect .= "<option value='". $value['id'] ."'>" . $text . ' ' . $value['name'] . "</option>";
                }

                $this->menuRecusive($parentId, $value['id'], $text. "一");
            }
        }

        return $this->htmlSlect;
    }
}
