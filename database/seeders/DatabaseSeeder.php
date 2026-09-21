<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user bawaan Laravel
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            ProvinceSeeder::class,
            RegencySeeder::class,
            DestinationSeeder::class,
            SurabayaCulinarySeeder::class,
            BestTimeSeeder::class,
            TourismStatisticSeeder::class,
        ]);
    }
}