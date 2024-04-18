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
            'email' => 'admin@benguet.gov.ph',
            'email_verified_at' => now(),
            'municipality_id' => 0,
            'role' => 'admin',
            'password' => Hash::make('admin@benguet.gov.ph'),
            'remember_token' => Str::random(10),
        ]);

        // Add users for each municipality
        $municipalities = [
            'Atok', 'Bakun', 'Bokod', 'Buguias', 'Itogon', 'Kabayan', 'Kapangan', 'Kibungan',
            'LaTrinidad', 'Mankayan', 'Sablan', 'Tuba', 'Tublay'
        ];

        foreach ($municipalities as $index => $municipality) {
            $email = strtolower($municipality) . '@' . strtolower($municipality);
            User::create([
                'name' => $municipality,
                'email' => $email,
                'email_verified_at' => now(),
                'municipality_id' => $index + 1,
                'role' => 'user',
                'password' => Hash::make($email),
                'remember_token' => Str::random(10),
            ]);
        }
    }


}
