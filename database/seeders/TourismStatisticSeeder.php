<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismStatistic;
use App\Models\Destination;

class TourismStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | DATA DEMO
        |--------------------------------------------------------------------------
        | Angka visitor_count di bawah ini hanya digunakan sebagai data contoh
        | untuk pengembangan website Surabaya Wanderlust.
        |
        | Nantinya dapat diganti dengan data resmi dari BPS, pemerintah daerah,
        | atau pengelola destinasi.
        |--------------------------------------------------------------------------
        */

        $destinations = Destination::all();

        if ($destinations->isEmpty()) {
            return;
        }

        $demoData = [
            [
                'name' => $destinations->first()->name,
                'year' => 2025,
                'visitor_count' => 125000,
                'ranking' => 1,
            ],
            [
                'name' => $destinations->skip(1)->first()?->name,
                'year' => 2025,
                'visitor_count' => 98000,
                'ranking' => 2,
            ],
            [
                'name' => $destinations->skip(2)->first()?->name,
                'year' => 2025,
                'visitor_count' => 76000,
                'ranking' => 3,
            ],
        ];

        foreach ($demoData as $data) {
            if (!$data['name']) {
                continue;
            }

            $destination = Destination::where(
                'name',
                $data['name']
            )->first();

            if (!$destination) {
                continue;
            }

            TourismStatistic::updateOrCreate(
                [
                    'destination_id' => $destination->id,
                    'year' => $data['year'],
                ],
                [
                    'visitor_count' => $data['visitor_count'],
                    'ranking' => $data['ranking'],
                    'source' => 'Data Demo Surabaya Wanderlust',
                    'source_url' => null,
                    'last_updated' => now()->toDateString(),
                    'notes' => 'DATA DEMO untuk pengembangan website. Angka harus diganti dengan data resmi dari sumber terpercaya.',
                ]
            );
        }
    }
}