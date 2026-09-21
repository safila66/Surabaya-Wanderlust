<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Culinary;
use App\Models\Regency;

class SurabayaCulinarySeeder extends Seeder
{
    public function run(): void
    {
        $surabaya = Regency::where('slug', 'kota-surabaya')->first();

        // Fallback
        if (!$surabaya) {
            $surabaya = Regency::where('name', 'Surabaya')->first();
        }
        if (!$surabaya) {
            return;
        }

        $culinaries = [
            [
                'name' => 'Tahu Campur',
                'slug' => 'tahu-campur-surabaya',
                'description' => 'Kuliner khas Surabaya yang memadukan tahu, lontong, sayuran, mie, perkedel, daging, dan kuah berbumbu petis.',
                'history' => 'Tahu campur merupakan salah satu kuliner yang populer di Surabaya dan berbagai wilayah Jawa Timur.',
                'ingredients' => 'Tahu, lontong, mie, tauge, selada, perkedel, daging, dan kuah berbumbu petis.',
                'taste' => 'Gurih, sedikit manis, kaya rempah, dengan karakter petis yang khas.',
                'price_range' => 'Rp15.000 - Rp30.000',
                'where_to_buy' => 'Warung tahu campur dan sentra kuliner Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi kuliner lokal Surabaya',
            ],
            [
                'name' => 'Lontong Kupang',
                'slug' => 'lontong-kupang-surabaya',
                'description' => 'Lontong dengan kupang, lentho, kuah gurih, dan sambal petis yang menjadi salah satu kuliner khas Jawa Timur.',
                'history' => 'Lontong kupang dikenal sebagai kuliner pesisir Jawa Timur dan populer di Surabaya serta wilayah sekitarnya.',
                'ingredients' => 'Lontong, kupang, lentho, petis, bawang putih, jeruk nipis, dan sambal.',
                'taste' => 'Gurih, segar, sedikit pedas, dan memiliki rasa khas petis.',
                'price_range' => 'Rp12.000 - Rp25.000',
                'where_to_buy' => 'Warung lontong kupang dan kawasan kuliner Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi kuliner lokal Surabaya',
            ],
            [
                'name' => 'Sate Klopo',
                'slug' => 'sate-klopo-surabaya',
                'description' => 'Sate yang dibalut parutan kelapa berbumbu sebelum dibakar sehingga menghasilkan aroma dan rasa yang khas.',
                'history' => 'Sate klopo menjadi salah satu kuliner yang dikenal sebagai bagian dari kekayaan makanan khas Surabaya.',
                'ingredients' => 'Daging sapi atau ayam, kelapa parut, kacang tanah, bawang, dan rempah.',
                'taste' => 'Gurih, harum, sedikit manis, dengan aroma kelapa panggang.',
                'price_range' => 'Rp20.000 - Rp40.000',
                'where_to_buy' => 'Warung sate dan kawasan kuliner Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi kuliner lokal Surabaya',
            ],
            [
                'name' => 'Soto Ambengan',
                'slug' => 'soto-ambengan',
                'description' => 'Soto khas Surabaya dengan kuah gurih berwarna kuning yang biasanya disajikan bersama ayam dan koya.',
                'history' => 'Soto Ambengan dikenal luas sebagai salah satu sajian soto yang identik dengan kuliner Surabaya.',
                'ingredients' => 'Ayam, kaldu, kunyit, bawang, koya, soun, telur, dan daun bawang.',
                'taste' => 'Gurih, hangat, harum rempah, dan semakin kaya dengan tambahan koya.',
                'price_range' => 'Rp15.000 - Rp35.000',
                'where_to_buy' => 'Warung soto dan rumah makan di Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi kuliner lokal Surabaya',
            ],
            [
                'name' => 'Rawon Surabaya',
                'slug' => 'rawon-surabaya',
                'description' => 'Sup daging berkuah hitam dengan kluwek dan rempah yang populer di Jawa Timur, termasuk Surabaya.',
                'history' => 'Rawon merupakan hidangan tradisional Jawa Timur yang juga sangat populer di Surabaya.',
                'ingredients' => 'Daging sapi, kluwek, bawang, serai, lengkuas, dan berbagai rempah.',
                'taste' => 'Gurih, kaya rempah, dengan rasa khas kluwek yang kuat.',
                'price_range' => 'Rp20.000 - Rp40.000',
                'where_to_buy' => 'Warung rawon dan rumah makan Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi kuliner lokal Surabaya',
            ],
            [
                'name' => 'Zangrandi Ice Cream',
                'slug' => 'zangrandi-ice-cream',
                'description' => 'Kedai es krim tertua di Surabaya yang sudah berdiri sejak zaman kolonial Belanda dengan nuansa klasik.',
                'history' => 'Didirikan oleh keluarga Renato Zangrandi dari Italia pada tahun 1930.',
                'ingredients' => 'Es krim, susu, buah-buahan segar, wafer.',
                'taste' => 'Manis, segar, dengan cita rasa es krim klasik (old school).',
                'price_range' => 'Rp30.000 - Rp75.000',
                'where_to_buy' => 'Zangrandi Ice Cream, Jl. Yos Sudarso, Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi kafe legendaris Surabaya',
            ],
            [
                'name' => 'Cafe Tenda Surabaya',
                'slug' => 'cafe-tenda-surabaya',
                'description' => 'Tempat nongkrong dengan konsep outdoor dan tenda-tenda ala camping, menawarkan suasana santai di sore hingga malam hari.',
                'history' => 'Konsep kafe outdoor yang sedang tren di kalangan anak muda Surabaya.',
                'ingredients' => 'Kopi, teh, makanan ringan, mie instan.',
                'taste' => 'Beragam varian minuman kopi dan non-kopi yang kekinian.',
                'price_range' => 'Rp20.000 - Rp50.000',
                'where_to_buy' => 'Kawasan Surabaya Barat dan Timur.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi cafe Surabaya',
            ],
            [
                'name' => 'Carpentier Kitchen',
                'slug' => 'carpentier-kitchen',
                'description' => 'Cafe yang menggabungkan konsep distro dan tempat makan dengan nuansa homey serta desain vintage.',
                'history' => 'Dikenal sebagai salah satu pioneer cafe aesthetic dan tempat nongkrong asik di Surabaya.',
                'ingredients' => 'Burger, pasta, kopi, dan makanan barat.',
                'taste' => 'Rasa hidangan western yang disesuaikan dengan selera lokal.',
                'price_range' => 'Rp40.000 - Rp100.000',
                'where_to_buy' => 'Jl. Untung Suropati No.83, DR. Soetomo, Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi cafe Surabaya',
            ],
            [
                'name' => 'Tropicola Surabaya',
                'slug' => 'tropicola-surabaya',
                'description' => 'Kafe dengan konsep ala beach club Bali di tengah kota Surabaya, menawarkan suasana tropis.',
                'history' => 'Membawa vibe Bali ke Surabaya untuk tempat nongkrong dan berfoto ria.',
                'ingredients' => 'Mocktail, jus segar, makanan ringan, pasta.',
                'taste' => 'Segar dan bervariasi dengan tema tropikal.',
                'price_range' => 'Rp35.000 - Rp90.000',
                'where_to_buy' => 'Pusat kuliner kekinian Surabaya.',
                'location' => 'Kota Surabaya, Jawa Timur',
                'souvenir' => false,
                'source' => 'Informasi cafe Surabaya',
            ]
        ];

        foreach ($culinaries as $culinary) {
            Culinary::updateOrCreate(
                ['slug' => $culinary['slug']],
                array_merge($culinary, [
                    'regency_id' => $surabaya->id,
                ])
            );
        }
    }
}