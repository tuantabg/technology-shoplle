<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Components\Recusive;
use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use StorageImageTrait;

    private $category;
    private $product;
    private $productImage;

    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
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

    public function store(Request $request)
    {
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'product_code' => $request->product_code,
            'detail' => $request->detail,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ];
        // Upload file image one
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
        if (!empty($dataUploadFeatureImage)) {
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);

        // Upload file image multiple
        if ($request->hasFile('image_path')){
            foreach ($request->image_path as $key => $fileItem) {
                $dataProductImage = $this->storageTraitUploadMultiple($fileItem, 'products');

                $product->images()->create([
                    'image_name' => $dataProductImage['file_name'],
                    'image_path' => $dataProductImage['file_path'],
                ]);
            }
        }


    }

    public function getCategory($parentId)
    {
        $categories = $this->category->all();
        $recusive = new  Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
