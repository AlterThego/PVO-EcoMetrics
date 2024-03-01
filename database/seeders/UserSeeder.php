<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    // public function run()
    // {
    //     for ($i = 0; $i < 1; $i++) {
    //         User::factory()->create();
    //     }
    // }
    public function run()
    {
        // Create users directly
        User::create([
            'name' => 'RootAdmin',
            'email' => 'admin@admin',
            'email_verified_at' => now(),
            'municipality_id' => 0,
            'role' => 'admin',
            'password' => Hash::make('admin@admin'),
            'remember_token' => Str::random(10),
        ]);

        // Add users for each municipality
        $municipalities = [
            'Atok', 'Bakun', 'Bokod', 'Buguias', 'Itogon', 'Kabayan', 'Kapangan', 'Kibungan',
            'La Trinidad', 'Mankayan', 'Sablan', 'Tuba', 'Tublay'
        ];

        foreach ($municipalities as $index => $municipality) {
            User::create([
                'name' => $municipality,
                'email' => strtolower($municipality) . '@' . strtolower($municipality),
                'email_verified_at' => now(),
                'municipality_id' => $index + 1, // Assuming municipality IDs start from 1
                'role' => 'user',
                'password' => Hash::make($municipality),
                'remember_token' => Str::random(10),
            ]);
        }
    }


}
