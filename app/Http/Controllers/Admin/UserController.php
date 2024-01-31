<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Traits\StorageImageTrait;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use StorageImageTrait;

    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->latest()->paginate(15);
        $deletedUsers = $this->user->onlyTrashed()->latest()->paginate(15);

        return view('admin.page.user.index', compact('users', 'deletedUsers'));
    }

    public function create()
    {
        $roleUsers = $this->role->get()->all();

        return view('admin.page.user.add', compact('roleUsers'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $dataUserCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            // Upload file image one
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'users');
            if (!empty($dataUploadFeatureImage)) {
                $dataUserCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataUserCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $user = $this->user->create($dataUserCreate);
            $user->roles()->attach($request->role_id);

            DB::commit();

            return redirect()->route('users.index')->with('message','Thêm tài khoản thành công');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return redirect()->back()->with('message','Thêm tài khoản không thành công');
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = $this->role->get()->all();
        $roleOfUser = $user->roles;
        return view('admin.page.user.edit', compact('user', 'roles', 'roleOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $dataUserUpdate = [
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ];

            // Upload file image one
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'users');
            if (!empty($dataUploadFeatureImage)) {
                $dataUserUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataUserUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $user = $this->user->find($id)->update($dataUserUpdate);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);

            DB::commit();

            return redirect()->route('users.index')->with('message','Cập nhập tài khoản thành công');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return redirect()->back()->with('message','Cập nhập tài khoản không thành công');
        }
    }

    public function delete($id)
    {
        try {
            $this->user->find($id)->delete();
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
            $this->user->withTrashed()->find($id)->forceDelete();
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
        $this->user->withTrashed()->where('id', $id)->restore();

        return redirect()->route('users.index')->with('message','Lấy lại khoản thành thành công');
    }
}
