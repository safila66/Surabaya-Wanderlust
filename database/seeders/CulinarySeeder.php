<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Culinary;
use App\Models\Regency;

class CulinarySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'regency' => 'Kota Surabaya',
                'name' => 'Rujak Cingur',
                'slug' => 'rujak-cingur',
                'description' => 'Kuliner khas Surabaya yang memadukan sayuran, buah, lontong, tahu, tempe, dan cingur dengan bumbu petis yang khas.',
                'history' => 'Rujak cingur merupakan salah satu kuliner tradisional yang telah lama menjadi bagian dari identitas kuliner masyarakat Surabaya.',
                'ingredients' => 'Cingur, lontong, tahu, tempe, kangkung, tauge, mentimun, buah-buahan, petis, dan kacang tanah.',
                'taste' => 'Gurih, manis, pedas, dan memiliki aroma khas petis.',
                'price_range' => 'Rp15.000 – Rp35.000',
                'where_to_buy' => 'Warung rujak tradisional dan pusat kuliner Surabaya.',
                'location' => 'Surabaya, Jawa Timur',
                'souvenir' => false,
                'image' => null,
                'source' => 'Dinas Kebudayaan, Kepemudaan dan Olahraga serta Pariwisata Kota Surabaya',
            ],

            [
                'regency' => 'Malang',
                'name' => 'Bakso Malang',
                'slug' => 'bakso-malang',
                'description' => 'Hidangan bakso khas Malang yang biasanya disajikan dengan berbagai isian seperti bakso, tahu, siomay, pangsit, dan kuah kaldu.',
                'history' => 'Bakso Malang berkembang menjadi salah satu kuliner yang sangat dikenal dari Kota Malang dan sekitarnya.',
                'ingredients' => 'Daging sapi, tepung tapioka, tahu, siomay, pangsit, mie, daun bawang, dan kuah kaldu.',
                'taste' => 'Gurih, hangat, dan kaya rasa.',
                'price_range' => 'Rp12.000 – Rp30.000',
                'where_to_buy' => 'Warung bakso dan pusat kuliner di Kota Malang.',
                'location' => 'Malang, Jawa Timur',
                'souvenir' => false,
                'image' => null,
                'source' => 'Informasi pariwisata Kota Malang',
            ],

            [
                'regency' => 'Kota Yogyakarta',
                'name' => 'Gudeg',
                'slug' => 'gudeg',
                'description' => 'Kuliner khas Yogyakarta berbahan dasar nangka muda yang dimasak dengan santan dan berbagai rempah.',
                'history' => 'Gudeg telah menjadi bagian penting dari identitas kuliner dan budaya masyarakat Yogyakarta.',
                'ingredients' => 'Nangka muda, santan, gula merah, telur, ayam, daun salam, lengkuas, dan berbagai rempah.',
                'taste' => 'Manis, gurih, dan kaya rempah.',
                'price_range' => 'Rp15.000 – Rp50.000',
                'where_to_buy' => 'Warung gudeg, sentra kuliner, dan kawasan wisata Yogyakarta.',
                'location' => 'Yogyakarta, DI Yogyakarta',
                'souvenir' => true,
                'image' => null,
                'source' => 'Dinas Pariwisata Daerah Istimewa Yogyakarta',
            ],

            [
                'regency' => 'Bandung',
                'name' => 'Batagor',
                'slug' => 'batagor',
                'description' => 'Jajanan khas Bandung berupa adonan ikan dan tepung yang dibungkus tahu atau kulit pangsit kemudian digoreng.',
                'history' => 'Batagor berkembang sebagai salah satu jajanan populer dari Bandung dan dikenal luas di berbagai daerah Indonesia.',
                'ingredients' => 'Ikan tenggiri, tahu, tepung tapioka, kulit pangsit, kacang tanah, kecap, dan sambal.',
                'taste' => 'Gurih, renyah, sedikit pedas, dan kaya rasa kacang.',
                'price_range' => 'Rp10.000 – Rp25.000',
                'where_to_buy' => 'Pusat jajanan dan kedai kuliner Bandung.',
                'location' => 'Bandung, Jawa Barat',
                'souvenir' => false,
                'image' => null,
                'source' => 'Dinas Pariwisata dan Kebudayaan Kota Bandung',
            ],
        ];

        foreach ($data as $item) {
            $regency = Regency::where('name', $item['regency'])->first();

            if (!$regency) {
                continue;
            }

            Culinary::updateOrCreate(
                [
                    'slug' => $item['slug'],
                ],
                [
                    'regency_id' => $regency->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'history' => $item['history'],
                    'ingredients' => $item['ingredients'],
                    'taste' => $item['taste'],
                    'price_range' => $item['price_range'],
                    'where_to_buy' => $item['where_to_buy'],
                    'location' => $item['location'],
                    'souvenir' => $item['souvenir'],
                    'image' => $item['image'],
                    'source' => $item['source'],
                ]
            );
        }
    }
}