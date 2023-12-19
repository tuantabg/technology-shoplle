<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\Recusive;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(10);
        $deletedCategories = $this->category->onlyTrashed()->latest()->paginate(10);

        return view('admin.page.category.index', compact('categories', 'deletedCategories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.page.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('categories.index')->with('message','Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.page.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('categories.index')->with('message','Sửa danh mục thành công');
    }

    public function delete($id)
    {
        try {
            $this->category->find($id)->delete();
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
            $this->category->withTrashed()->find($id)->forceDelete();
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
        $this->category->withTrashed()->where('id', $id)->restore();

        return redirect()->route('categories.index')->with('message','Lấy lại danh mục thành công');
    }

    public function getCategory($parentId)
    {
        $categories = $this->category->all();
        $recusive = new  Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
