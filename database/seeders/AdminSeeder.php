<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'is_admin' => true,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('111222333'),
            'remember_token' => Str::random(10),
        ]);
    }
}
