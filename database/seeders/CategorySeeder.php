<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $cate = [
            [
                'name' => 'Áo', 
                'slug' => 'ao',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Quần', 
                'slug' => 'quan',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Áo khoác', 
                'slug' => 'ao-khoac',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Váy', 
                'slug' => 'vay',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Đầm', 
                'slug' => 'dam',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Áo dài cách tân', 
                'slug' => 'ao-dai-cach-tan',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Đồ bay', 
                'slug' => 'do-bay',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],
            [
                'name' => 'Áo cặp', 
                'slug' => 'ao-cap',
                'order' => null,
                'location' => 'navbar',
                'parent_id' => null,
                'image' => null,
            ],

        ];

        DB::table('categories')->insert($cate);
    }
}
