<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $dataUsers = [
            ['name'=>'tuanta','email'=>'admin@gmail.com','password'=>bcrypt('123456'),'feature_image_name'=>'','feature_image_path'=>''],
        ];
        $dataRoles = [
            ['name'=>'Admin','display_name'=>'Quản trị hệ thống'],
            ['name'=>'Guest','display_name'=>'Khách Hàng'],
            ['name'=>'Developer','display_name'=>'Phát triển hệ thống'],
            ['name'=>'Posting Staff','display_name'=>'Nhân viên đăng bài']
        ];
        $dataMenus = [
            ['name'=>'Iphone','parent_id'=>0,'slug'=>'iphone'],
            ['name'=>'Samsung','parent_id'=>0,'slug'=>'samsung'],
            ['name'=>'Redmi','parent_id'=>0,'slug'=>'redmi'],
        ];
        $dataCategories = [
            ['name'=> 'Iphone','parent_id'=>0,'slug'=>'iphone'],
            ['name'=> 'Samsung','parent_id'=>0,'slug'=>'samsung'],
            ['name'=>'Redmi','parent_id'=>0,'slug'=>'redmi'],
        ];
        $dataSliders = [
            ['name'=>'Slider1','description'=>'Slider1','image_url'=>'Slider1','image_name'=>'how-to-make-a-banner-header-wide.png','image_path'=>'/storage/slider/1/QDdoN0fJsilI5978FI2G.png'],
            ['name'=>'Slider1','description'=>'Slider1','image_url'=>'Slider1','image_name'=>'how-to-make-a-banner-header-wide.png','image_path'=>'/storage/slider/1/QDdoN0fJsilI5978FI2G.png'],
            ['name'=>'Slider1','description'=>'Slider1','image_url'=>'Slider1','image_name'=>'how-to-make-a-banner-header-wide.png','image_path'=>'/storage/slider/1/QDdoN0fJsilI5978FI2G.png'],
        ];
        $dataSettings = [
            ['config_key'=>'email','config_value'=>'admin@gmail.com','type'=>'Text'],
            ['config_key'=>'phone','config_value'=>'0123456789','type'=> 'Text'],
            ['config_key'=>'Text','config_value'=>'Copyright © 2011-2023 Laravel LLC.','type'=>'Textarea'],
        ];
        $dataPermissions = [
            ['parent_id'=>0,'name'=>'Category','display_name'=>'Danh mục','key_code'=>''],
            ['parent_id'=>1,'name'=>'List Product','display_name'=>'Danh sách sản phẩm','key_code'=>'list_product'],
            ['parent_id'=>1,'name'=>'Add Product','display_name'=>'Thêm sản phẩm','key_code'=>'add_product'],
            ['parent_id'=>1,'name'=>'Edit Product','display_name'=>'Sửa sản phẩm','key_code'=>'edit_product'],
            ['parent_id'=>1,'name'=>'Delete Product','display_name'=>'Xóa sản phẩm','key_code'=>'delete_product'],
            ['parent_id'=>1,'name'=>'Add Product','display_name'=>'Thêm sản phẩm','key_code'=>'add_product'],
            ['parent_id'=>1,'name'=>'List Category','display_name'=>'Danh sách danh mục','key_code'=>'list_category'],
            ['parent_id'=>1,'name'=>'Add Category','display_name'=>'Thêm danh mục','key_code'=>'add_category'],
            ['parent_id'=>1,'name'=>'Edit Category','display_name'=>'Sửa danh mục','key_code'=>'edit_category'],
            ['parent_id'=>1,'name'=>'Delete Category','display_name'=>'Xóa danh mục','key_code'=>'delete_category'],
            ['parent_id'=>0,'name'=>'Setting','display_name'=>'Cài đặt','key_code'=>''],
            ['parent_id'=>11,'name'=>'List Menu','display_name'=>'Danh sách menu','key_code'=>'list_menu'],
            ['parent_id'=>11,'name'=>'Add Menu','display_name'=>'Thêm menu','key_code'=>'add_menu'],
            ['parent_id'=>11,'name'=>'Edit Menu','display_name'=>'Sửa menu','key_code'=>'edit_menu'],
            ['parent_id'=>11,'name'=>'Delete Menu','display_name'=>'Xóa menu','key_code'=>'delete_menu'],
            ['parent_id'=>11,'name'=>'List Slide','display_name'=>'Danh sách Slide','key_code'=>'list_slide'],
            ['parent_id'=>11,'name'=>'Add Slide','display_name'=>'Thêm Slide','key_code'=>'add_slide'],
            ['parent_id'=>11,'name'=>'Edit Slide','display_name'=>'Sửa Slide','key_code'=>'edit_slide'],
            ['parent_id'=>11,'name'=>'Delete Slide','display_name'=>'Xóa Slide','key_code'=>'delete_slide'],
            ['parent_id'=>11,'name'=>'List Information','display_name'=>'Danh sách thông tin web','key_code'=>'list_information'],
            ['parent_id'=>11,'name'=>'Add Information','display_name'=>'Thêm thông tin','key_code'=>'add_information'],
            ['parent_id'=>11,'name'=>'Edit Information','display_name'=>'Sửa thông tin','key_code'=>'edit_information'],
            ['parent_id'=>11,'name'=>'Delete Information','display_name'=>'Xóa thông tin','key_code'=>'delete_information'],
            ['parent_id'=>0,'name'=>'Account Management','display_name'=>'Quản lý tài khoản','key_code'=>''],
            ['parent_id'=>24,'name'=>'List Accounts','display_name'=>'Danh sách tài khoản','key_code'=>'list_user'],
            ['parent_id'=>24,'name'=>'Add Accounts','display_name'=>'Thêm tài khoản','key_code'=>'add_user'],
            ['parent_id'=>24,'name'=>'Edit Accounts','display_name'=>'Sửa tài khoản','key_code'=>'edit_user'],
            ['parent_id'=>24,'name'=>'Delete Accounts','display_name'=>'Xóa tài khoản','key_code'=>'delete_user'],
            ['parent_id'=>24,'name'=>'List Roles','display_name'=>'Danh sách vai trò','key_code'=>'list_role'],
            ['parent_id'=>24,'name'=>'Add Roles','display_name'=>'Thêm vai trò','key_code'=>'add_role'],
            ['parent_id'=>24,'name'=>'Edit Roles','display_name'=>'Sửa vai trò','key_code'=>'edit_role'],
            ['parent_id'=>24,'name'=>'Delete Roles','display_name'=>'Xóa vai trò','key_code'=>'delete_role'],
            ['parent_id'=>24,'name'=>'Add Permissions','display_name'=>'Thêm Quyền','key_code'=>'add_permission'],
        ];
        $dataPermissionRole = [
            ['role_id'=> 1,'permission_id'=> 2],
            ['role_id'=> 1,'permission_id'=> 3],
            ['role_id'=> 1,'permission_id'=> 4],
            ['role_id'=> 1,'permission_id'=> 5],
            ['role_id'=> 1,'permission_id'=> 6],
            ['role_id'=> 1,'permission_id'=> 7],
            ['role_id'=> 1,'permission_id'=> 8],
            ['role_id'=> 1,'permission_id'=> 9],
            ['role_id'=> 1,'permission_id'=> 10],
            ['role_id'=> 1,'permission_id'=> 12],
            ['role_id'=> 1,'permission_id'=> 13],
            ['role_id'=> 1,'permission_id'=> 14],
            ['role_id'=> 1,'permission_id'=> 15],
            ['role_id'=> 1,'permission_id'=> 16],
            ['role_id'=> 1,'permission_id'=> 17],
            ['role_id'=> 1,'permission_id'=> 18],
            ['role_id'=> 1,'permission_id'=> 19],
            ['role_id'=> 1,'permission_id'=> 20],
            ['role_id'=> 1,'permission_id'=> 21],
            ['role_id'=> 1,'permission_id'=> 22],
            ['role_id'=> 1,'permission_id'=> 23],
            ['role_id'=> 1,'permission_id'=> 25],
            ['role_id'=> 1,'permission_id'=> 26],
            ['role_id'=> 1,'permission_id'=> 27],
            ['role_id'=> 1,'permission_id'=> 28],
            ['role_id'=> 1,'permission_id'=> 29],
            ['role_id'=> 1,'permission_id'=> 30],
            ['role_id'=> 1,'permission_id'=> 31],
            ['role_id'=> 1,'permission_id'=> 32],
            ['role_id'=> 1,'permission_id'=> 33],
        ];
        $dataRoleUser = [
            ['user_id'=> 1,'role_id'=> 1],
        ];

        DB::table('users')->insert($dataUsers);
        DB::table('roles')->insert($dataRoles);
        DB::table('menus')->insert($dataMenus);
        DB::table('categories')->insert($dataCategories);
        DB::table('sliders')->insert($dataSliders);
        DB::table('settings')->insert($dataSettings);
        DB::table('permissions')->insert($dataPermissions);
        DB::table('permission_role')->insert($dataPermissionRole);
        DB::table('role_user')->insert($dataRoleUser);
    }
}
