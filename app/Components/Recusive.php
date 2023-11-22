<?php

namespace App\Components;

use App\Category;

class Recusive {

    private $categories;
    private $htmlSlect = '';

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    function categoryRecusive($parentId, $id = 0, $text = ''){
        foreach ($this->categories as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']){
                    $this->htmlSlect .= "<option selected value='". $value['id'] ."'>" . $text . ' ' . $value['name'] . "</option>";
                } else {
                    $this->htmlSlect .= "<option value='". $value['id'] ."'>" . $text . ' ' . $value['name'] . "</option>";
                }

                $this->categoryRecusive($parentId, $value['id'], $text. "一");
            }
        }

        return $this->htmlSlect;
    }
}
