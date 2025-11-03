<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Satrio Nugroho',
                'email' => 'satrio@blitaris.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Mautauaja021'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@blitaris.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'Developer',
                'email' => 'developer@blitaris.com',
                'email_verified_at' => now(),
                'password' => Hash::make('developer123'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // Alternative: Create a single admin user
        // User::create([
        //     'name' => 'Satrio Nugroho',
        //     'email' => 'satrio@blitaris.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        // ]);
    }
}
