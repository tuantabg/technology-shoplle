<?php

namespace App\Http\Controllers\Client;

use App\Category;
use App\Menu;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProductsInCategoryController extends Controller
{
    private $menu;
    private $slider;
    private $category;
    private $product;

    public function __construct(
        Menu $menu,
        Slider $slider,
        Category $category,
        Product $product
    ){
        $this->menu = $menu;
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }

    public function index( $slug, $categoryId)
    {
        $menus = $this->menu->first()->get();
        $categories = $this->category->where('parent_id', 0)->latest()->get();
        $categoryProduct = $this->category->where('view_home', 1)->latest()->get();
        $categoryLimit = $this->category->where('parent_id', 0)->take(3)->get();
        $products = $this->product->where('category_id', $categoryId)->paginate(12);
        $productRecommended = $this->product->latest('category_id', 'desc')->take(12)->get();

        return view('client.page.category.index',
            compact('menus',
                'categories',
                'categoryProduct',
                'categoryLimit',
                'products',
                'productRecommended'
            )
        );
    }
}
