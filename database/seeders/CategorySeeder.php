<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i=1; $i < 4; $i++) { 
            Category::create(
                [
                    'title' => "Categoria $i",
                    'slug' => "cat-$i"
                ]
                );
        }
    }
}
