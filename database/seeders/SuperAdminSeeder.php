<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Allstar',
            'username' =>'kushal',
            'email' =>'allstarsms45@gmail.com',
            'password' =>Hash::make('12345'),
            'user_role' =>'2', 
            'is_banned' =>'0'
        ]);
    }
}
