<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678'
        ]);

         \App\Models\User::create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => '12345678'
         ]);
    }
}
