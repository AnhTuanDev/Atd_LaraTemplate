<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tag = [
            [
                'name' => 'Áo', 
                'slug' => 'ao',
            ],
            [
                'name' => 'Quần', 
                'slug' => 'quan',
            ],
            [
                'name' => 'Áo khoác', 
                'slug' => 'ao-khoac',
            ],
            [
                'name' => 'Váy', 
                'slug' => 'vay',
            ],
            [
                'name' => 'Đầm', 
                'slug' => 'dam',
            ],
            [
                'name' => 'Áo dài cách tân', 
                'slug' => 'ao-dai-cach-tan',
            ],
            [
                'name' => 'Đồ bay', 
                'slug' => 'do-bay',
            ],
            [
                'name' => 'Áo cặp', 
                'slug' => 'ao-cap',
            ],

        ];

        DB::table('tags')->insert($tag);
    }
}
