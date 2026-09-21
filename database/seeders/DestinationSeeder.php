<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Regency;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'regency' => 'Kota Surabaya',
                'name' => 'Monumen Kapal Selam (Monkasel)',
                'slug' => 'monumen-kapal-selam',
                'description' => 'Monkasel adalah monumen kapal selam terbesar di kawasan Asia yang merupakan bekas kapal selam KRI Pasopati 410 dari TNI Angkatan Laut.',
                'activities' => 'Wisata sejarah, fotografi, melihat interior kapal selam',
                'opening_hours' => '08:00 - 21:00',
                'ticket_price' => 'Rp15.000',
                'facilities' => 'Area parkir, toilet, taman, tempat duduk',
                'accessibility' => 'Mudah diakses di pusat kota',
                'visit_duration' => '1-2 jam',
                'location' => 'Jl. Pemuda No.39, Embong Kaliasin, Surabaya',
                'maps_url' => 'https://maps.google.com/?q=Monumen+Kapal+Selam',
                'image' => null,
            ],
            [
                'regency' => 'Kota Surabaya',
                'name' => 'Tugu Pahlawan',
                'slug' => 'tugu-pahlawan',
                'description' => 'Monumen setinggi 41,15 meter yang menjadi ikon kota Surabaya, didedikasikan untuk mengenang peristiwa 10 November 1945.',
                'activities' => 'Wisata sejarah, mengunjungi Museum 10 November, fotografi',
                'opening_hours' => '08:00 - 16:00',
                'ticket_price' => 'Mulai Rp5.000',
                'facilities' => 'Museum, area parkir, toilet, taman luas',
                'accessibility' => 'Sangat mudah diakses, terletak di tengah kota',
                'visit_duration' => '2-3 jam',
                'location' => 'Jl. Pahlawan, Alun-alun Contong, Surabaya',
                'maps_url' => 'https://maps.google.com/?q=Tugu+Pahlawan',
                'image' => null,
            ],
            [
                'regency' => 'Kota Surabaya',
                'name' => 'Kebun Binatang Surabaya',
                'slug' => 'kebun-binatang-surabaya',
                'description' => 'Salah satu kebun binatang tertua dan terbesar di Asia Tenggara dengan berbagai koleksi satwa dari dalam dan luar negeri.',
                'activities' => 'Melihat satwa, rekreasi keluarga, wisata edukasi',
                'opening_hours' => '08:00 - 16:00',
                'ticket_price' => 'Rp15.000',
                'facilities' => 'Area parkir, toilet, food court, wahana',
                'accessibility' => 'Mudah diakses, berdekatan dengan terminal Joyoboyo',
                'visit_duration' => '3-4 jam',
                'location' => 'Jl. Setail No.1, Darmo, Surabaya',
                'maps_url' => 'https://maps.google.com/?q=Kebun+Binatang+Surabaya',
                'image' => null,
            ],
            [
                'regency' => 'Kota Surabaya',
                'name' => 'Hutan Bambu Keputih',
                'slug' => 'hutan-bambu-keputih',
                'description' => 'Taman rekreasi alam bekas tempat pembuangan akhir yang disulap menjadi hutan bambu asri mirip dengan di Sagano, Jepang.',
                'activities' => 'Fotografi, bersantai, jalan-jalan santai',
                'opening_hours' => '06:00 - 18:00',
                'ticket_price' => 'Gratis',
                'facilities' => 'Area parkir, taman bermain, toilet',
                'accessibility' => 'Mudah diakses dengan kendaraan pribadi',
                'visit_duration' => '1-2 jam',
                'location' => 'Jl. Raya Marina Asri, Keputih, Surabaya',
                'maps_url' => 'https://maps.google.com/?q=Hutan+Bambu+Keputih',
                'image' => null,
            ],
            [
                'regency' => 'Kota Surabaya',
                'name' => 'Surabaya North Quay',
                'slug' => 'surabaya-north-quay',
                'description' => 'Tempat wisata yang berada di terminal penumpang kapal pesiar mewah (Gapura Surya Nusantara), menyuguhkan pemandangan laut dan pelabuhan.',
                'activities' => 'Menikmati sunset, kuliner, melihat kapal pesiar',
                'opening_hours' => '11:00 - 20:00',
                'ticket_price' => 'Rp10.000',
                'facilities' => 'Food court, area parkir, toilet bersih, AC',
                'accessibility' => 'Bisa dicapai dengan kendaraan pribadi atau taksi',
                'visit_duration' => '2-3 jam',
                'location' => 'Perak Utara, Pabean Cantikan, Surabaya',
                'maps_url' => 'https://maps.google.com/?q=Surabaya+North+Quay',
                'image' => null,
            ]
        ];

        foreach ($destinations as $data) {
            $regency = Regency::where('name', $data['regency'])->first();
            // Fallback if regency name is just 'Surabaya' instead of 'Kota Surabaya'
            if (!$regency) {
                $regency = Regency::where('name', 'Surabaya')->first();
            }

            if (!$regency) {
                $this->command->warn(
                    "Kabupaten/Kota '{$data['regency']}' tidak ditemukan."
                );

                continue;
            }

            Destination::updateOrCreate(
                [
                    'slug' => $data['slug'],
                ],
                [
                    'regency_id' => $regency->id,
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'activities' => $data['activities'],
                    'opening_hours' => $data['opening_hours'],
                    'ticket_price' => $data['ticket_price'],
                    'facilities' => $data['facilities'],
                    'accessibility' => $data['accessibility'],
                    'visit_duration' => $data['visit_duration'],
                    'location' => $data['location'],
                    'maps_url' => $data['maps_url'],
                    'image' => $data['image'],
                ]
            );
        }

        $this->command->info('Data destinasi Surabaya berhasil dimasukkan.');
    }
}