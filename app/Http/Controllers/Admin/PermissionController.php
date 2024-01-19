<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\PermissionRecusive;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function create()
    {
        $htmlOption = $this->getPermission($parentId = '');

        return view('admin.page.permission.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        if ($request->input('parent_id') == 0) {
            $permission = $this->permission->create([
                'name' => $request->module_name,
                'display_name' => $request->display_name,
                'parent_id' => $request->input('parent_id'),
                'key_code' => ''
            ]);

            foreach ($request->module_children as $value) {

                $this->permission->create([
                    'name' => $value . ' ' . $request->module_name,
                    'display_name' => $value . ' ' . $request->display_name,
                    'parent_id' => $permission->id,
                    'key_code' => $request->module_name . '_' . $value
                ]);
            }
        } else {
            foreach ($request->module_children as $key => $value) {
                $table_module = config('permissions.table_module');

                $this->permission->create([
                    'name' => $value . ' ' . $request->module_name,
                    'display_name' => $table_module[$value] . ' ' . $request->display_name,
                    'parent_id' => $request->input('parent_id'),
                    'key_code' => $request->module_name . '_' . $value
                ]);
            }
        }

        return redirect()->back()->with('message','Thêm quyền thành công');
    }

    public function getPermission($parentId)
    {
        $permissions = $this->permission->where('parent_id', 0)->get();
        $recusive = new  PermissionRecusive($permissions);
        $htmlOption = $recusive->permissionRecusive($parentId);
        return $htmlOption;
    }
}
