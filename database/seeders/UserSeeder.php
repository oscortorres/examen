<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        User::create(
            [
                'name' => "admin",
                'email' => "admin@gmail.com",
                'password' => Hash::make('12345678'),
                'rol' => "admin",
            ]
        );

        User::create(
            [
                'name' => "regular",
                'email' => "regular@gmail.com",
                'password' => Hash::make('12345678'),
                'rol' => "regular",
            ]
        );
        
    }
}
