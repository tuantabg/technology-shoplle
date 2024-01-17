<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->latest()->paginate(10);
        $deletedRoles = $this->role->onlyTrashed()->latest()->paginate(10);

        return view('admin.page.role.index', compact('roles', 'deletedRoles'));
    }

    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();

        return view('admin.page.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        $role->permissions()->attach($request->permission_id);

        return redirect()->route('roles.index')->with('message','Thêm vai trò thành công');
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $permissionsChecked = $role->permissions;

        return view('admin.page.role.edit', compact('role', 'permissionsParent', 'permissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        $role = $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);

        return redirect()->route('roles.index')->with('message','Cập nhập vai trò thành công');
    }

    public function delete($id)
    {
        try {
            $this->role->find($id)->delete();
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
            $this->role->withTrashed()->find($id)->forceDelete();
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
        $this->role->withTrashed()->where('id', $id)->restore();

        return redirect()->route('roles.index')->with('message','Lấy lại vai trò thành công');
    }
}
