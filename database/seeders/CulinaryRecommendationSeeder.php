<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Culinary;
use App\Models\Regency;

class CulinaryRecommendationSeeder extends Seeder
{
    public function run(): void
    {
        $surabaya = Regency::where('slug', 'kota-surabaya')->first();

        $malang = Regency::where('slug', 'malang')->first();

        if ($surabaya) {
            Culinary::updateOrCreate(
                ['slug' => 'lontong-balap'],
                [
                    'regency_id' => $surabaya->id,
                    'name' => 'Lontong Balap',
                    'description' => 'Kuliner khas Surabaya berupa perpaduan lontong, tauge, tahu, lentho, dan kuah gurih yang menjadi salah satu makanan ikonik kota ini.',
                    'history' => 'Lontong Balap telah lama dikenal sebagai salah satu kuliner khas Surabaya dan menjadi bagian dari identitas kuliner masyarakat setempat.',
                    'ingredients' => 'Lontong, tauge, tahu goreng, lentho, bawang goreng, sambal, dan kuah gurih.',
                    'taste' => 'Gurih, segar, sedikit pedas, dengan tekstur renyah dari tauge dan lentho.',
                    'price_range' => 'Rp10.000 – Rp25.000',
                    'where_to_buy' => 'Warung dan sentra kuliner di berbagai kawasan Kota Surabaya.',
                    'location' => 'Kota Surabaya, Jawa Timur',
                    'souvenir' => false,
                    'source' => 'Informasi kuliner lokal Surabaya',
                ]
            );

            Culinary::updateOrCreate(
                ['slug' => 'tahu-tek'],
                [
                    'regency_id' => $surabaya->id,
                    'name' => 'Tahu Tek',
                    'description' => 'Hidangan khas Surabaya yang terdiri dari tahu goreng, lontong, kentang, tauge, dan siraman saus kacang petis.',
                    'history' => 'Tahu tek merupakan salah satu kuliner rakyat yang berkembang dan populer di Surabaya.',
                    'ingredients' => 'Tahu, lontong, kentang, tauge, telur, saus kacang, petis, dan bawang goreng.',
                    'taste' => 'Gurih, manis, sedikit pedas, dengan rasa khas petis yang kuat.',
                    'price_range' => 'Rp10.000 – Rp25.000',
                    'where_to_buy' => 'Warung tahu tek dan sentra kuliner di Kota Surabaya.',
                    'location' => 'Kota Surabaya, Jawa Timur',
                    'souvenir' => false,
                    'source' => 'Informasi kuliner lokal Surabaya',
                ]
            );

            Culinary::updateOrCreate(
                ['slug' => 'semanggi-surabaya'],
                [
                    'regency_id' => $surabaya->id,
                    'name' => 'Semanggi Surabaya',
                    'description' => 'Kuliner khas Surabaya berbahan dasar daun semanggi yang disajikan dengan tauge dan saus berbahan ubi serta kacang.',
                    'history' => 'Semanggi merupakan salah satu makanan tradisional yang menjadi bagian dari warisan kuliner Kota Surabaya.',
                    'ingredients' => 'Daun semanggi, tauge, kerupuk puli, ubi, kacang tanah, gula merah, dan bumbu pelengkap.',
                    'taste' => 'Gurih, manis, dan khas dengan aroma bumbu yang kuat.',
                    'price_range' => 'Rp10.000 – Rp20.000',
                    'where_to_buy' => 'Penjual semanggi dan sentra kuliner tradisional di Surabaya.',
                    'location' => 'Kota Surabaya, Jawa Timur',
                    'souvenir' => false,
                    'source' => 'Informasi kuliner lokal Surabaya',
                ]
            );
        }

        if ($malang) {
            Culinary::updateOrCreate(
                ['slug' => 'rawon-malang'],
                [
                    'regency_id' => $malang->id,
                    'name' => 'Rawon Malang',
                    'description' => 'Hidangan berkuah gelap dengan cita rasa gurih dan khas kluwek yang banyak ditemukan di kawasan Malang.',
                    'history' => 'Rawon merupakan salah satu hidangan khas Jawa Timur yang memiliki berbagai variasi di sejumlah daerah.',
                    'ingredients' => 'Daging sapi, kluwek, bawang, serai, lengkuas, dan rempah-rempah.',
                    'taste' => 'Gurih, kaya rempah, dan memiliki karakter rasa khas dari kluwek.',
                    'price_range' => 'Rp20.000 – Rp40.000',
                    'where_to_buy' => 'Warung makan dan rumah makan di kawasan Malang.',
                    'location' => 'Malang, Jawa Timur',
                    'souvenir' => false,
                    'source' => 'Informasi kuliner lokal Malang',
                ]
            );
        }
    }
}