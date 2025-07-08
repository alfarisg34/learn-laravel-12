<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Makanan & Minuman', 'slug' => Str::slug('Makanan & Minuman')],
            ['name' => 'Barang', 'slug' => Str::slug('Barang')],
            ['name' => 'Jasa', 'slug' => Str::slug('Jasa')],
            ['name' => 'Lainnya', 'slug' => Str::slug('Lainnya')],
        ]);
    }
}
