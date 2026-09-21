<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BestTime;
use App\Models\Destination;

class BestTimeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'destination' => 'Monumen Kapal Selam (Monkasel)',
                'best_month' => 'Januari - Desember',
                'best_time' => 'Sore hari',
                'weather' => 'Cerah atau teduh',
                'temperature' => 'Sekitar 28-32°C',
                'scenery' => 'Pemandangan kapal selam dengan lampu sorot di malam hari atau sunset',
                'crowd_level' => 'Sedang',
                'recommended_activities' => 'Masuk ke dalam kapal selam, fotografi',
                'reason' => 'Sore hari lebih teduh untuk mengeksplorasi bagian luar dan dalam kapal selam.',
            ],
            [
                'destination' => 'Tugu Pahlawan',
                'best_month' => 'Januari - Desember',
                'best_time' => 'Pagi atau Sore hari',
                'weather' => 'Cerah',
                'temperature' => 'Sekitar 27-32°C',
                'scenery' => 'Monumen ikonik dengan rumput hijau luas',
                'crowd_level' => 'Sedang',
                'recommended_activities' => 'Wisata sejarah, foto-foto, mengunjungi museum',
                'reason' => 'Udara Surabaya cukup panas di siang hari, pagi dan sore lebih nyaman.',
            ],
            [
                'destination' => 'Surabaya North Quay',
                'best_month' => 'Mei - Oktober',
                'best_time' => 'Menjelang Sunset',
                'weather' => 'Cerah',
                'temperature' => 'Sekitar 26-30°C',
                'scenery' => 'Pemandangan laut dan kapal pesiar saat matahari terbenam',
                'crowd_level' => 'Ramai',
                'recommended_activities' => 'Makan malam, fotografi, menikmati sunset',
                'reason' => 'Pemandangan laut paling indah saat matahari terbenam dengan cuaca cerah.',
            ],
        ];

        foreach ($data as $item) {
            $destination = Destination::where('name', $item['destination'])->first();

            if (!$destination) {
                $this->command->warn("Destinasi '{$item['destination']}' tidak ditemukan.");
                continue;
            }

            BestTime::updateOrCreate(
                [
                    'destination_id' => $destination->id,
                ],
                [
                    'best_month' => $item['best_month'],
                    'best_time' => $item['best_time'],
                    'weather' => $item['weather'],
                    'temperature' => $item['temperature'],
                    'scenery' => $item['scenery'],
                    'crowd_level' => $item['crowd_level'],
                    'recommended_activities' => $item['recommended_activities'],
                    'reason' => $item['reason'],
                    'last_updated' => now()->toDateString(),
                ]
            );
        }

        $this->command->info('Data Best Time Surabaya berhasil dimasukkan.');
    }
}