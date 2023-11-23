<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.page.product.index');
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.page.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $categories = $this->category->all();
        $recusive = new  Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
