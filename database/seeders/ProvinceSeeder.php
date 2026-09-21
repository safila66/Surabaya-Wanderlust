<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            [
                'name' => 'Aceh',
                'slug' => 'aceh',
                'description' => 'Dikenal dengan kekayaan budaya Islam, sejarah Kesultanan Aceh, kuliner khas, serta pesona alam Sabang dan kawasan pesisirnya.',
            ],
            [
                'name' => 'Sumatera Utara',
                'slug' => 'sumatera-utara',
                'description' => 'Memiliki Danau Toba, budaya Batak, pegunungan, serta beragam kuliner khas yang menjadi daya tarik utama Sumatera Utara.',
            ],
            [
                'name' => 'Sumatera Selatan',
                'slug' => 'sumatera-selatan',
                'description' => 'Identik dengan Kota Palembang, Sungai Musi, Jembatan Ampera, peninggalan Sriwijaya, serta kuliner khas seperti pempek.',
            ],
            [
                'name' => 'Sumatera Barat',
                'slug' => 'sumatera-barat',
                'description' => 'Menawarkan kekayaan budaya Minangkabau, rumah gadang, kawasan pegunungan, lembah, serta kuliner khas yang mendunia.',
            ],
            [
                'name' => 'Bengkulu',
                'slug' => 'bengkulu',
                'description' => 'Memiliki sejarah kolonial, kawasan pesisir, bunga Rafflesia, serta destinasi alam yang menjadi ciri khas Bengkulu.',
            ],
            [
                'name' => 'Riau',
                'slug' => 'riau',
                'description' => 'Kental dengan budaya Melayu dan memiliki kekayaan sejarah, kuliner, sungai, serta kawasan alam di daratan Sumatera.',
            ],
            [
                'name' => 'Kepulauan Riau',
                'slug' => 'kepulauan-riau',
                'description' => 'Dikenal dengan gugusan pulau, pantai, wisata bahari, dan kawasan Batam serta Bintan yang menjadi tujuan wisata populer.',
            ],
            [
                'name' => 'Jambi',
                'slug' => 'jambi',
                'description' => 'Memiliki warisan Kerajaan Melayu, kompleks Candi Muaro Jambi, serta kawasan alam dan budaya yang beragam.',
            ],
            [
                'name' => 'Lampung',
                'slug' => 'lampung',
                'description' => 'Menawarkan pantai, taman nasional, kawasan konservasi, serta budaya masyarakat Lampung yang kaya akan tradisi.',
            ],
            [
                'name' => 'Kepulauan Bangka Belitung',
                'slug' => 'kepulauan-bangka-belitung',
                'description' => 'Terkenal dengan pantai berpasir putih, batu granit besar, wisata kepulauan, serta budaya masyarakat Melayu dan pesisir.',
            ],
            [
                'name' => 'Kalimantan Barat',
                'slug' => 'kalimantan-barat',
                'description' => 'Memiliki Sungai Kapuas, kawasan hutan tropis, budaya Melayu dan Dayak, serta kekayaan alam di sepanjang wilayahnya.',
            ],
            [
                'name' => 'Kalimantan Timur',
                'slug' => 'kalimantan-timur',
                'description' => 'Dikenal dengan kawasan hutan tropis, pesisir, Kepulauan Derawan, serta keberadaan Ibu Kota Nusantara.',
            ],
            [
                'name' => 'Kalimantan Selatan',
                'slug' => 'kalimantan-selatan',
                'description' => 'Kaya akan budaya Banjar, pasar terapung, sungai, pegunungan Meratus, serta kuliner khas Kalimantan Selatan.',
            ],
            [
                'name' => 'Kalimantan Tengah',
                'slug' => 'kalimantan-tengah',
                'description' => 'Memiliki hutan tropis yang luas, Sungai Kahayan, budaya Dayak, serta kawasan konservasi orangutan.',
            ],
            [
                'name' => 'Kalimantan Utara',
                'slug' => 'kalimantan-utara',
                'description' => 'Menawarkan bentang alam hutan dan pesisir, kawasan perbatasan, serta kekayaan budaya masyarakat Kalimantan Utara.',
            ],
            [
                'name' => 'Banten',
                'slug' => 'banten',
                'description' => 'Memiliki peninggalan Kesultanan Banten, kawasan Taman Nasional Ujung Kulon, pantai, serta budaya masyarakat Banten.',
            ],
            [
                'name' => 'DKI Jakarta',
                'slug' => 'dki-jakarta',
                'description' => 'Pusat metropolitan Indonesia dengan museum, kawasan bersejarah, pusat kuliner, ruang hiburan, dan beragam destinasi perkotaan.',
            ],
            [
                'name' => 'Jawa Barat',
                'slug' => 'jawa-barat',
                'description' => 'Dikenal dengan budaya Sunda, pegunungan, kawah, perkebunan, pantai selatan, serta kuliner khas yang beragam.',
            ],
            [
                'name' => 'Jawa Tengah',
                'slug' => 'jawa-tengah',
                'description' => 'Memiliki kekayaan budaya Jawa, candi bersejarah, keraton, pegunungan, desa wisata, serta beragam kuliner tradisional.',
            ],
            [
                'name' => 'Daerah Istimewa Yogyakarta',
                'slug' => 'daerah-istimewa-yogyakarta',
                'description' => 'Menawarkan perpaduan budaya Jawa, keraton, kawasan heritage, seni, kuliner, serta destinasi alam dari gunung hingga pantai.',
            ],
            [
                'name' => 'Jawa Timur',
                'slug' => 'jawa-timur',
                'description' => 'Memiliki Gunung Bromo, Kawah Ijen, pantai selatan, kawasan heritage, budaya lokal, serta kekayaan kuliner dari berbagai daerah.',
            ],
            [
                'name' => 'Bali',
                'slug' => 'bali',
                'description' => 'Dikenal dengan pura, tradisi Hindu Bali, seni, pantai, persawahan, serta kehidupan budaya yang menjadi daya tarik wisata dunia.',
            ],
            [
                'name' => 'Nusa Tenggara Timur',
                'slug' => 'nusa-tenggara-timur',
                'description' => 'Memiliki Kepulauan Komodo, Labuan Bajo, Danau Kelimutu, savana, pantai, serta keberagaman budaya masyarakat kepulauan.',
            ],
            [
                'name' => 'Nusa Tenggara Barat',
                'slug' => 'nusa-tenggara-barat',
                'description' => 'Dikenal dengan Gunung Rinjani, Kepulauan Gili, pantai Lombok, budaya Sasak, serta wisata bahari yang beragam.',
            ],
            [
                'name' => 'Gorontalo',
                'slug' => 'gorontalo',
                'description' => 'Menawarkan wisata bahari, pulau-pulau kecil, kawasan perbukitan, serta tradisi dan budaya masyarakat Gorontalo.',
            ],
            [
                'name' => 'Sulawesi Barat',
                'slug' => 'sulawesi-barat',
                'description' => 'Memiliki pesisir yang indah, pegunungan, budaya Mandar, serta kekayaan tradisi dan kuliner khas Sulawesi Barat.',
            ],
            [
                'name' => 'Sulawesi Tengah',
                'slug' => 'sulawesi-tengah',
                'description' => 'Dikenal dengan Kepulauan Togean, Danau Poso, pegunungan, pantai, serta keragaman budaya masyarakat Sulawesi Tengah.',
            ],
            [
                'name' => 'Sulawesi Utara',
                'slug' => 'sulawesi-utara',
                'description' => 'Menawarkan Taman Nasional Bunaken, wisata bawah laut, gunung api, serta budaya Minahasa dan masyarakat pesisir.',
            ],
            [
                'name' => 'Sulawesi Tenggara',
                'slug' => 'sulawesi-tenggara',
                'description' => 'Memiliki Kepulauan Wakatobi, perairan tropis, pantai, pulau-pulau kecil, serta budaya maritim yang kuat.',
            ],
            [
                'name' => 'Sulawesi Selatan',
                'slug' => 'sulawesi-selatan',
                'description' => 'Dikenal dengan budaya Bugis-Makassar, Tana Toraja, pantai, kawasan karst, serta kuliner khas seperti coto dan konro.',
            ],
            [
                'name' => 'Maluku Utara',
                'slug' => 'maluku-utara',
                'description' => 'Memiliki sejarah Kesultanan Ternate dan Tidore, gunung api, pulau-pulau tropis, serta wisata bahari yang menawan.',
            ],
            [
                'name' => 'Maluku',
                'slug' => 'maluku',
                'description' => 'Dikenal sebagai wilayah Kepulauan Rempah dengan sejarah perdagangan, budaya maritim, pulau tropis, dan kekayaan bawah laut.',
            ],
            [
                'name' => 'Papua Barat',
                'slug' => 'papua-barat',
                'description' => 'Memiliki bentang alam pegunungan dan pesisir, hutan tropis, serta kekayaan budaya masyarakat Papua yang beragam.',
            ],
            [
                'name' => 'Papua',
                'slug' => 'papua',
                'description' => 'Menawarkan bentang alam pegunungan, hutan tropis, sungai, serta keberagaman budaya masyarakat Papua yang sangat kaya.',
            ],
            [
                'name' => 'Papua Tengah',
                'slug' => 'papua-tengah',
                'description' => 'Memiliki kawasan pegunungan, danau, pesisir, serta kekayaan budaya masyarakat lokal yang menjadi bagian penting Papua Tengah.',
            ],
            [
                'name' => 'Papua Pegunungan',
                'slug' => 'papua-pegunungan',
                'description' => 'Dikenal dengan lanskap pegunungan tinggi, Lembah Baliem, serta keberagaman tradisi masyarakat di wilayah pegunungan Papua.',
            ],
            [
                'name' => 'Papua Selatan',
                'slug' => 'papua-selatan',
                'description' => 'Memiliki kawasan rawa dan hutan luas, budaya masyarakat adat, serta ekosistem unik di wilayah selatan Papua.',
            ],
            [
                'name' => 'Papua Barat Daya',
                'slug' => 'papua-barat-daya',
                'description' => 'Dikenal dengan Kepulauan Raja Ampat, keindahan terumbu karang, pulau-pulau tropis, serta kekayaan budaya pesisir.',
            ],
        ];

        foreach ($provinces as $province) {
            Province::updateOrCreate(
                ['slug' => $province['slug']],
                [
                    'name' => $province['name'],
                    'description' => $province['description'],
                    'image' => null,
                ]
            );
        }
    }
}