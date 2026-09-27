<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'user@nusaexplore.test',
            ],
            [
                'name' => 'Somewhere in...',
                'password' => Hash::make('NusaExplore123'),
            ]
        );
    }
}