<?php

namespace App\Http\Controllers\Admin;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->middleware('auth');
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->latest()->paginate(15);
        $deletedMenus = $this->menu->onlyTrashed()->latest()->paginate(15);

        return view('admin.page.menu.index', compact('menus', 'deletedMenus'));
    }

    public function create()
    {
        $htmlOption = $this->getMenu($parentId = '');

        return view('admin.page.menu.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('menus.create')->with('message','Thêm menu thành công');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->parent_id);

        return view('admin.page.menu.edit', compact('menu', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('menus.index')->with('message','Sửa menu thành công');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();

        return redirect()->route('menus.index');
    }

    public function getMenu($parentId)
    {
        $menus = $this->menu->all();
        $recusive = new  MenuRecusive($menus);
        $htmlOption = $recusive->menuRecusive($parentId);
        return $htmlOption;
    }

    public function deletePermanently($id)
    {
        try {
            $this->menu->withTrashed()->find($id)->forceDelete();
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
        $this->menu->withTrashed()->where('id', $id)->restore();

        return redirect()->route('menus.index')->with('message','Lấy lại menu thành công');
    }
}
