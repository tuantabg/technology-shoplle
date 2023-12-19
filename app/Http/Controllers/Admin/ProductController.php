<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag
    ){
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(10);
        $deletedProducts = $this->product->onlyTrashed()->latest()->paginate(10);

        return view('admin.page.product.index', compact('products', 'deletedProducts'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.page.product.add', compact('htmlOption'));
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataProductCreate = [
                'name'          => $request->name,
                'price'         => $request->price,
                'discount'      => $request->discount,
                'product_code'  => $request->product_code,
                'detail'        => $request->detail,
                'content'       => $request->contents,
                'user_id'       => auth()->id(),
                'category_id'   => $request->category_id,
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
                foreach ($request->image_path as $fileItem) {
                    $dataProductImage = $this->storageTraitUploadMultiple($fileItem, 'products');

                    $product->images()->create([
                        'image_name' => $dataProductImage['file_name'],
                        'image_path' => $dataProductImage['file_path'],
                    ]);
                }
            }

            // Insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name'=> $tagItem]);
                    $tagsId[] = $tagInstance->id;
                    $product->tags()->attach($tagsId);
                }
            }

            DB::commit();

            return redirect()->route('products.index')->with('message','Thêm Sản phẩm thành công');

        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.page.product.edit', compact('product', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $dataProductUpdate = [
                'name'          => $request->name,
                'price'         => $request->price,
                'discount'      => $request->discount,
                'product_code'  => $request->product_code,
                'detail'        => $request->detail,
                'content'       => $request->contents,
                'user_id'       => auth()->id(),
                'category_id'   => $request->category_id,
            ];

            // Upload file image one
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            // Upload file image multiple
            if ($request->hasFile('image_path')){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImage = $this->storageTraitUploadMultiple($fileItem, 'products');

                    $product->images()->create([
                        'image_name' => $dataProductImage['file_name'],
                        'image_path' => $dataProductImage['file_path'],
                    ]);
                }
            }

            // Insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name'=> $tagItem]);
                    $tagsId[] = $tagInstance->id;
                    $product->tags()->sync($tagsId);
                }
            }

            DB::commit();

            return redirect()->route('products.index')->with('message','Sửa sản phẩm thành công');

        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function deletePermanently($id)
    {
        try {
            $this->product->withTrashed()->find($id)->forceDelete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function deleteRecover($id)
    {
        $this->product->withTrashed()->where('id', $id)->restore();

        return redirect()->route('products.index')->with('message','Lấy lại sản phẩm thành công');
    }

    public function getCategory($parentId)
    {
        $categories = $this->category->all();
        $recusive   = new  Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
