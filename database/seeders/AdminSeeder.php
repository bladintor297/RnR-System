<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultpwd = '@dmin123';
        $createMultipleUsers = [
            ['name' => 'Admin HR', 'role' => '1', 'email' => 'admin-hr@rnrsystem.com', 'password'=>bcrypt($defaultpwd)],
            ['name' => 'Admin FS', 'role' => '2', 'email' => 'admin-fs@rnrsystem.com', 'password'=>bcrypt($defaultpwd)],
            ['name' => 'Admin IT', 'role' => '3', 'email' => 'admin-it@rnrsystem.com', 'password'=>bcrypt($defaultpwd)],
        ];
        
        User::insert($createMultipleUsers);
    }
}
