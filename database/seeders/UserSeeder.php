<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            User::create([
                'name' => 'Admin',
                'role' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now()
            ]);

            User::create([
                'name' => 'User1',
                'role' => 'user',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now()
            ]);
            User::create([
                'name' => 'User2',
                'role' => 'user',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now()
            ]);
        }
    }
}
