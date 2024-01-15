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
            [
                'name'      => 'tuanta',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('123456'),
                'feature_image_name' => '',
                'feature_image_path' => ''
            ],
        ];

        $dataRoles = [
            ['name' => 'Admin', 'display_name' => 'Quản trị hệ thống'],
            ['name' => 'Guest', 'display_name' => 'Khách Hàng'],
            ['name' => 'Developer', 'display_name' => 'Phát triển hệ thống'],
            ['name' => 'Posting Staff', 'display_name' => 'Nhân viên đăng bài']
        ];

        $dataMenus = [
            [
                'name'      => 'Iphone',
                'parent_id'     => 0,
                'slug'  => 'iphone',
            ],
            [
                'name'      => 'Samsung',
                'parent_id'     => 0,
                'slug'  => 'samsung',
            ],
            [
                'name'      => 'Redmi',
                'parent_id'     => 0,
                'slug'  => 'redmi',
            ],
        ];

        $dataCategories = [
            [
                'name'      => 'Iphone',
                'parent_id'     => 0,
                'slug'  => 'iphone',
            ],
            [
                'name'      => 'Samsung',
                'parent_id'     => 0,
                'slug'  => 'samsung',
            ],
            [
                'name'      => 'Redmi',
                'parent_id'     => 0,
                'slug'  => 'redmi',
            ],
        ];

        $dataSliders = [
            [
                'name'          => 'Slider1',
                'description'   => 'Slider1',
                'image_url'     => 'Slider1',
                'image_name'    => 'how-to-make-a-banner-header-wide.png',
                'image_path'    => '/storage/slider/1/QDdoN0fJsilI5978FI2G.png',
            ],
            [
                'name'          => 'Slider1',
                'description'   => 'Slider1',
                'image_url'     => 'Slider1',
                'image_name'    => 'how-to-make-a-banner-header-wide.png',
                'image_path'    => '/storage/slider/1/QDdoN0fJsilI5978FI2G.png',
            ],
            [
                'name'          => 'Slider1',
                'description'   => 'Slider1',
                'image_url'     => 'Slider1',
                'image_name'    => 'how-to-make-a-banner-header-wide.png',
                'image_path'    => '/storage/slider/1/QDdoN0fJsilI5978FI2G.png',
            ],
        ];

        $dataSettings = [
            [
                'config_key'    => 'email',
                'config_value'  => 'admin@gmail.com',
                'type'          => 'Text',
            ],
            [
                'config_key'    => 'phone',
                'config_value'  => '0123456789',
                'type'          => 'Text',
            ],
            [
                'config_key'    => 'Text',
                'config_value'  => 'Copyright © 2011-2023 Laravel LLC.',
                'type'          => 'Textarea',
            ],
        ];

        DB::table('users')->insert($dataUsers);
        DB::table('roles')->insert($dataRoles);
        DB::table('menus')->insert($dataMenus);
        DB::table('categories')->insert($dataCategories);
        DB::table('sliders')->insert($dataSliders);
        DB::table('settings')->insert($dataSettings);
    }
}
