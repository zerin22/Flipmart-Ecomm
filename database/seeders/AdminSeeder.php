<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'role_id' => '1',
            'email' => 'admin@gmail.com',
            'phone' => '091112223',
            'image' => 'fontend/assets/images/upload/profile_img.png',
            'password' => Hash::make('admin@gmail.com'),
        ]);
    }
}
