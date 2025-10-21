<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User_232187;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1 user untuk testing
        User_232187::create([
            'name_232187' => 'Test User',
            'email_232187' => 'test@example.com',
            'password_232187' => Hash::make('user123'),
            'role_232187' => 'user',
        ]);

    }
}
