<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Str;

class RegencySeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            // =====================================================
            // 01. ACEH
            // =====================================================
            'aceh' => [
                'regencies' => [
                    'Aceh Tamiang',
                    'Aceh Jaya',
                    'Gayo Lues',
                    'Nagan Raya',
                    'Bener Meriah',
                    'Pidie Jaya',
                    'Aceh Barat',
                    'Aceh Besar',
                    'Aceh Selatan',
                    'Aceh Timur',
                    'Aceh Tengah',
                    'Aceh Utara',
                    'Pidie',
                    'Aceh Tenggara',
                    'Aceh Singkil',
                    'Bireuen',
                    'Simeulue',
                    'Aceh Barat Daya',
                ],
                'cities' => [
                    'Banda Aceh',
                    'Sabang',
                    'Lhokseumawe',
                    'Langsa',
                    'Subulussalam',
                ],
            ],

            // =====================================================
            // 02. SUMATERA UTARA
            // =====================================================
            'sumatera-utara' => [
                'regencies' => [
                    'Asahan',
                    'Batu Bara',
                    'Dairi',
                    'Deli Serdang',
                    'Humbang Hasundutan',
                    'Karo',
                    'Labuhanbatu',
                    'Labuhanbatu Selatan',
                    'Labuhanbatu Utara',
                    'Langkat',
                    'Mandailing Natal',
                    'Nias',
                    'Nias Barat',
                    'Nias Selatan',
                    'Nias Utara',
                    'Padang Lawas',
                    'Padang Lawas Utara',
                    'Pakpak Bharat',
                    'Samosir',
                    'Serdang Bedagai',
                    'Simalungun',
                    'Tapanuli Selatan',
                    'Tapanuli Tengah',
                    'Tapanuli Utara',
                    'Toba',
                ],
                'cities' => [
                    'Binjai',
                    'Gunungsitoli',
                    'Medan',
                    'Padangsidimpuan',
                    'Pematangsiantar',
                    'Sibolga',
                    'Tanjungbalai',
                    'Tebing Tinggi',
                ],
            ],

            // =====================================================
            // 03. SUMATERA SELATAN
            // =====================================================
            'sumatera-selatan' => [
                'regencies' => [
                    'Ogan Komering Ulu',
                    'Ogan Komering Ulu Timur',
                    'Ogan Komering Ulu Selatan',
                    'Ogan Komering Ilir',
                    'Muara Enim',
                    'Lahat',
                    'Musi Rawas',
                    'Musi Banyuasin',
                    'Banyuasin',
                    'Ogan Ilir',
                    'Empat Lawang',
                    'Penukal Abab Lematang Ilir',
                    'Musi Rawas Utara',
                ],
                'cities' => [
                    'Palembang',
                    'Pagar Alam',
                    'Lubuklinggau',
                    'Prabumulih',
                ],
            ],

            // =====================================================
            // 04. SUMATERA BARAT
            // =====================================================
            'sumatera-barat' => [
                'regencies' => [
                    'Agam',
                    'Pesisir Selatan',
                    'Padang Pariaman',
                    'Pasaman Barat',
                    'Solok',
                    'Lima Puluh Kota',
                    'Tanah Datar',
                    'Pasaman',
                    'Sijunjung',
                    'Dharmasraya',
                    'Solok Selatan',
                    'Kepulauan Mentawai',
                ],
                'cities' => [
                    'Padang',
                    'Payakumbuh',
                    'Bukittinggi',
                    'Pariaman',
                    'Solok',
                    'Sawahlunto',
                    'Padang Panjang',
                ],
            ],

            // =====================================================
            // 05. BENGKULU
            // =====================================================
            'bengkulu' => [
                'regencies' => [
                    'Bengkulu Selatan',
                    'Bengkulu Tengah',
                    'Bengkulu Utara',
                    'Kaur',
                    'Kepahiang',
                    'Lebong',
                    'Mukomuko',
                    'Rejang Lebong',
                    'Seluma',
                ],
                'cities' => [
                    'Bengkulu',
                ],
            ],

            // =====================================================
            // 06. RIAU
            // =====================================================
            'riau' => [
                'regencies' => [
                    'Bengkalis',
                    'Indragiri Hilir',
                    'Indragiri Hulu',
                    'Kampar',
                    'Kuantan Singingi',
                    'Pelalawan',
                    'Rokan Hilir',
                    'Rokan Hulu',
                    'Siak',
                    'Kepulauan Meranti',
                ],
                'cities' => [
                    'Dumai',
                    'Pekanbaru',
                ],
            ],

            // =====================================================
            // 07. KEPULAUAN RIAU
            // =====================================================
            'kepulauan-riau' => [
                'regencies' => [
                    'Bintan',
                    'Karimun',
                    'Kepulauan Anambas',
                    'Lingga',
                    'Natuna',
                ],
                'cities' => [
                    'Batam',
                    'Tanjungpinang',
                ],
            ],

            // =====================================================
            // 08. JAMBI
            // =====================================================
            'jambi' => [
                'regencies' => [
                    'Batanghari',
                    'Bungo',
                    'Kerinci',
                    'Merangin',
                    'Muaro Jambi',
                    'Sarolangun',
                    'Tanjung Jabung Barat',
                    'Tanjung Jabung Timur',
                    'Tebo',
                ],
                'cities' => [
                    'Jambi',
                    'Sungai Penuh',
                ],
            ],

            // =====================================================
            // 09. LAMPUNG
            // =====================================================
            'lampung' => [
                'regencies' => [
                    'Lampung Tengah',
                    'Lampung Utara',
                    'Lampung Selatan',
                    'Lampung Barat',
                    'Lampung Timur',
                    'Mesuji',
                    'Pesawaran',
                    'Pesisir Barat',
                    'Pringsewu',
                    'Tulang Bawang',
                    'Tulang Bawang Barat',
                    'Tanggamus',
                    'Way Kanan',
                ],
                'cities' => [
                    'Bandar Lampung',
                    'Metro',
                ],
            ],

            // =====================================================
            // 10. KEPULAUAN BANGKA BELITUNG
            // =====================================================
            'kepulauan-bangka-belitung' => [
                'regencies' => [
                    'Bangka',
                    'Bangka Barat',
                    'Bangka Selatan',
                    'Bangka Tengah',
                    'Belitung',
                    'Belitung Timur',
                ],
                'cities' => [
                    'Pangkalpinang',
                ],
            ],

            // =====================================================
            // 11. KALIMANTAN BARAT
            // =====================================================
            'kalimantan-barat' => [
                'regencies' => [
                    'Bengkayang',
                    'Kapuas Hulu',
                    'Kayong Utara',
                    'Ketapang',
                    'Kubu Raya',
                    'Landak',
                    'Melawi',
                    'Mempawah',
                    'Sambas',
                    'Sanggau',
                    'Sekadau',
                    'Sintang',
                ],
                'cities' => [
                    'Pontianak',
                    'Singkawang',
                ],
            ],

            // =====================================================
            // 12. KALIMANTAN TIMUR
            // =====================================================
            'kalimantan-timur' => [
                'regencies' => [
                    'Berau',
                    'Kutai Barat',
                    'Kutai Kartanegara',
                    'Kutai Timur',
                    'Paser',
                    'Penajam Paser Utara',
                    'Mahakam Ulu',
                ],
                'cities' => [
                    'Balikpapan',
                    'Bontang',
                    'Samarinda',
                ],
            ],

            // =====================================================
            // 13. KALIMANTAN SELATAN
            // =====================================================
            'kalimantan-selatan' => [
                'regencies' => [
                    'Balangan',
                    'Banjar',
                    'Barito Kuala',
                    'Hulu Sungai Selatan',
                    'Hulu Sungai Tengah',
                    'Hulu Sungai Utara',
                    'Kotabaru',
                    'Tabalong',
                    'Tanah Bumbu',
                    'Tanah Laut',
                    'Tapin',
                ],
                'cities' => [
                    'Banjarbaru',
                    'Banjarmasin',
                ],
            ],

            // =====================================================
            // 14. KALIMANTAN TENGAH
            // =====================================================
            'kalimantan-tengah' => [
                'regencies' => [
                    'Barito Selatan',
                    'Barito Timur',
                    'Barito Utara',
                    'Gunung Mas',
                    'Kapuas',
                    'Katingan',
                    'Kotawaringin Barat',
                    'Kotawaringin Timur',
                    'Lamandau',
                    'Murung Raya',
                    'Pulang Pisau',
                    'Sukamara',
                    'Seruyan',
                ],
                'cities' => [
                    'Palangka Raya',
                ],
            ],

            // =====================================================
            // 15. KALIMANTAN UTARA
            // =====================================================
            'kalimantan-utara' => [
                'regencies' => [
                    'Nunukan',
                    'Malinau',
                    'Bulungan',
                    'Tana Tidung',
                ],
                'cities' => [
                    'Tarakan',
                ],
            ],

            // =====================================================
            // 16. BANTEN
            // =====================================================
            'banten' => [
                'regencies' => [
                    'Lebak',
                    'Pandeglang',
                    'Serang',
                    'Tangerang',
                ],
                'cities' => [
                    'Cilegon',
                    'Serang',
                    'Tangerang',
                    'Tangerang Selatan',
                ],
            ],

            // =====================================================
            // 17. DKI JAKARTA
            // =====================================================
            'dki-jakarta' => [
                'regencies' => [
                    'Kepulauan Seribu',
                ],
                'cities' => [
                    'Jakarta Barat',
                    'Jakarta Pusat',
                    'Jakarta Selatan',
                    'Jakarta Timur',
                    'Jakarta Utara',
                ],
            ],

            // =====================================================
            // 18. JAWA BARAT
            // =====================================================
            'jawa-barat' => [
                'regencies' => [
                    'Bandung',
                    'Bandung Barat',
                    'Bekasi',
                    'Bogor',
                    'Ciamis',
                    'Cianjur',
                    'Cirebon',
                    'Garut',
                    'Indramayu',
                    'Karawang',
                    'Kuningan',
                    'Majalengka',
                    'Pangandaran',
                    'Purwakarta',
                    'Subang',
                    'Sukabumi',
                    'Sumedang',
                    'Tasikmalaya',
                ],
                'cities' => [
                    'Bandung',
                    'Banjar',
                    'Bekasi',
                    'Bogor',
                    'Cimahi',
                    'Cirebon',
                    'Depok',
                    'Sukabumi',
                    'Tasikmalaya',
                ],
            ],

            // =====================================================
            // 19. JAWA TENGAH
            // =====================================================
            'jawa-tengah' => [
                'regencies' => [
                    'Banjarnegara',
                    'Banyumas',
                    'Batang',
                    'Blora',
                    'Boyolali',
                    'Brebes',
                    'Cilacap',
                    'Demak',
                    'Grobogan',
                    'Jepara',
                    'Karanganyar',
                    'Kebumen',
                    'Kendal',
                    'Klaten',
                    'Kudus',
                    'Magelang',
                    'Pati',
                    'Pekalongan',
                    'Pemalang',
                    'Purbalingga',
                    'Purworejo',
                    'Rembang',
                    'Semarang',
                    'Sragen',
                    'Sukoharjo',
                    'Tegal',
                    'Temanggung',
                    'Wonogiri',
                    'Wonosobo',
                ],
                'cities' => [
                    'Magelang',
                    'Pekalongan',
                    'Salatiga',
                    'Semarang',
                    'Surakarta',
                    'Tegal',
                ],
            ],

            // =====================================================
            // 20. DI YOGYAKARTA
            // =====================================================
            'daerah-istimewa-yogyakarta' => [
                'regencies' => [
                    'Bantul',
                    'Gunungkidul',
                    'Kulon Progo',
                    'Sleman',
                ],
                'cities' => [
                    'Yogyakarta',
                ],
            ],

            // =====================================================
            // 21. JAWA TIMUR
            // =====================================================
            'jawa-timur' => [
                'regencies' => [
                    'Bangkalan',
                    'Banyuwangi',
                    'Blitar',
                    'Bojonegoro',
                    'Bondowoso',
                    'Gresik',
                    'Jember',
                    'Jombang',
                    'Kediri',
                    'Lamongan',
                    'Lumajang',
                    'Madiun',
                    'Magetan',
                    'Malang',
                    'Mojokerto',
                    'Nganjuk',
                    'Ngawi',
                    'Pacitan',
                    'Pamekasan',
                    'Pasuruan',
                    'Ponorogo',
                    'Probolinggo',
                    'Sampang',
                    'Sidoarjo',
                    'Situbondo',
                    'Sumenep',
                    'Trenggalek',
                    'Tuban',
                    'Tulungagung',
                ],
                'cities' => [
                    'Batu',
                    'Blitar',
                    'Kediri',
                    'Madiun',
                    'Malang',
                    'Mojokerto',
                    'Pasuruan',
                    'Probolinggo',
                    'Surabaya',
                ],
            ],

            // =====================================================
            // 22. BALI
            // =====================================================
            'bali' => [
                'regencies' => [
                    'Badung',
                    'Bangli',
                    'Buleleng',
                    'Gianyar',
                    'Jembrana',
                    'Karangasem',
                    'Klungkung',
                    'Tabanan',
                ],
                'cities' => [
                    'Denpasar',
                ],
            ],

            // =====================================================
            // 23. NUSA TENGGARA TIMUR
            // =====================================================
            'nusa-tenggara-timur' => [
                'regencies' => [
                    'Alor',
                    'Belu',
                    'Ende',
                    'Flores Timur',
                    'Kupang',
                    'Lembata',
                    'Malaka',
                    'Manggarai',
                    'Manggarai Barat',
                    'Manggarai Timur',
                    'Ngada',
                    'Nagekeo',
                    'Rote Ndao',
                    'Sabu Raijua',
                    'Sikka',
                    'Sumba Barat',
                    'Sumba Barat Daya',
                    'Sumba Tengah',
                    'Sumba Timur',
                    'Timor Tengah Selatan',
                    'Timor Tengah Utara',
                ],
                'cities' => [
                    'Kupang',
                ],
            ],

            // =====================================================
            // 24. NUSA TENGGARA BARAT
            // =====================================================
            'nusa-tenggara-barat' => [
                'regencies' => [
                    'Bima',
                    'Dompu',
                    'Lombok Barat',
                    'Lombok Tengah',
                    'Lombok Timur',
                    'Lombok Utara',
                    'Sumbawa',
                    'Sumbawa Barat',
                ],
                'cities' => [
                    'Bima',
                    'Mataram',
                ],
            ],

            // =====================================================
            // 25. GORONTALO
            // =====================================================
            'gorontalo' => [
                'regencies' => [
                    'Boalemo',
                    'Bone Bolango',
                    'Gorontalo',
                    'Gorontalo Utara',
                    'Pohuwato',
                ],
                'cities' => [
                    'Gorontalo',
                ],
            ],

            // =====================================================
            // 26. SULAWESI BARAT
            // =====================================================
            'sulawesi-barat' => [
                'regencies' => [
                    'Majene',
                    'Mamasa',
                    'Mamuju',
                    'Mamuju Tengah',
                    'Pasangkayu',
                    'Polewali Mandar',
                ],
                'cities' => [],
            ],

            // =====================================================
            // 27. SULAWESI TENGAH
            // =====================================================
            'sulawesi-tengah' => [
                'regencies' => [
                    'Banggai',
                    'Banggai Kepulauan',
                    'Banggai Laut',
                    'Buol',
                    'Donggala',
                    'Morowali',
                    'Morowali Utara',
                    'Parigi Moutong',
                    'Poso',
                    'Sigi',
                    'Tojo Una-Una',
                    'Tolitoli',
                ],
                'cities' => [
                    'Palu',
                ],
            ],

            // =====================================================
            // 28. SULAWESI UTARA
            // =====================================================
            'sulawesi-utara' => [
                'regencies' => [
                    'Bolaang Mongondow',
                    'Bolaang Mongondow Selatan',
                    'Bolaang Mongondow Timur',
                    'Bolaang Mongondow Utara',
                    'Kepulauan Sangihe',
                    'Kepulauan Siau Tagulandang Biaro',
                    'Kepulauan Talaud',
                    'Minahasa',
                    'Minahasa Selatan',
                    'Minahasa Tenggara',
                    'Minahasa Utara',
                ],
                'cities' => [
                    'Bitung',
                    'Kotamobagu',
                    'Manado',
                    'Tomohon',
                ],
            ],

            // =====================================================
            // 29. SULAWESI TENGGARA
            // =====================================================
            'sulawesi-tenggara' => [
                'regencies' => [
                    'Bombana',
                    'Buton',
                    'Buton Selatan',
                    'Buton Tengah',
                    'Buton Utara',
                    'Kolaka',
                    'Kolaka Timur',
                    'Kolaka Utara',
                    'Konawe',
                    'Konawe Kepulauan',
                    'Konawe Selatan',
                    'Konawe Utara',
                    'Muna',
                    'Muna Barat',
                    'Wakatobi',
                ],
                'cities' => [
                    'Baubau',
                    'Kendari',
                ],
            ],

            // =====================================================
            // 30. SULAWESI SELATAN
            // =====================================================
            'sulawesi-selatan' => [
                'regencies' => [
                    'Bantaeng',
                    'Barru',
                    'Bone',
                    'Bulukumba',
                    'Enrekang',
                    'Gowa',
                    'Jeneponto',
                    'Kepulauan Selayar',
                    'Luwu',
                    'Luwu Timur',
                    'Luwu Utara',
                    'Maros',
                    'Pangkajene dan Kepulauan',
                    'Pinrang',
                    'Sidenreng Rappang',
                    'Sinjai',
                    'Soppeng',
                    'Takalar',
                    'Tana Toraja',
                    'Toraja Utara',
                    'Wajo',
                ],
                'cities' => [
                    'Makassar',
                    'Palopo',
                    'Parepare',
                ],
            ],

            // =====================================================
            // 31. MALUKU UTARA
            // =====================================================
            'maluku-utara' => [
                'regencies' => [
                    'Halmahera Barat',
                    'Halmahera Tengah',
                    'Halmahera Timur',
                    'Halmahera Selatan',
                    'Halmahera Utara',
                    'Kepulauan Sula',
                    'Pulau Morotai',
                    'Pulau Taliabu',
                ],
                'cities' => [
                    'Ternate',
                    'Tidore Kepulauan',
                ],
            ],

            // =====================================================
            // 32. MALUKU
            // =====================================================
            'maluku' => [
                'regencies' => [
                    'Buru',
                    'Buru Selatan',
                    'Kepulauan Aru',
                    'Maluku Barat Daya',
                    'Maluku Tengah',
                    'Maluku Tenggara',
                    'Kepulauan Tanimbar',
                    'Seram Bagian Barat',
                    'Seram Bagian Timur',
                ],
                'cities' => [
                    'Ambon',
                    'Tual',
                ],
            ],

            // =====================================================
            // 33. PAPUA TENGAH
            // =====================================================
            'papua-tengah' => [
                'regencies' => [
                    'Deiyai',
                    'Dogiyai',
                    'Intan Jaya',
                    'Mimika',
                    'Nabire',
                    'Paniai',
                    'Puncak',
                    'Puncak Jaya',
                ],
                'cities' => [],
            ],

            // =====================================================
            // 34. PAPUA PEGUNUNGAN
            // =====================================================
            'papua-pegunungan' => [
                'regencies' => [
                    'Jayawijaya',
                    'Lanny Jaya',
                    'Mamberamo Tengah',
                    'Nduga',
                    'Pegunungan Bintang',
                    'Tolikara',
                    'Yalimo',
                    'Yahukimo',
                ],
                'cities' => [],
            ],

            // =====================================================
            // 35. PAPUA SELATAN
            // =====================================================
            'papua-selatan' => [
                'regencies' => [
                    'Asmat',
                    'Boven Digoel',
                    'Mappi',
                    'Merauke',
                ],
                'cities' => [],
            ],

            // =====================================================
            // 36. PAPUA BARAT DAYA
            // =====================================================
            'papua-barat-daya' => [
                'regencies' => [
                    'Sorong',
                    'Raja Ampat',
                    'Sorong Selatan',
                    'Tambrauw',
                    'Maybrat',
                ],
                'cities' => [
                    'Sorong',
                ],
            ],

            // =====================================================
            // 37. PAPUA BARAT
            // =====================================================
            'papua-barat' => [
                'regencies' => [
                    'Fakfak',
                    'Kaimana',
                    'Manokwari',
                    'Manokwari Selatan',
                    'Pegunungan Arfak',
                    'Teluk Bintuni',
                    'Teluk Wondama',
                ],
                'cities' => [],
            ],

            // =====================================================
            // 38. PAPUA
            // =====================================================
            'papua' => [
                'regencies' => [
                    'Biak Numfor',
                    'Jayapura',
                    'Keerom',
                    'Kepulauan Yapen',
                    'Mamberamo Raya',
                    'Sarmi',
                    'Supiori',
                    'Waropen',
                ],
                'cities' => [
                    'Jayapura',
                ],
            ],
        ];

        foreach ($data as $provinceSlug => $areas) {

            $province = Province::where('slug', $provinceSlug)->first();

            if (!$province) {
                $this->command->warn(
                    "Provinsi dengan slug '{$provinceSlug}' tidak ditemukan."
                );

                continue;
            }

            // =========================
            // INSERT KABUPATEN
            // =========================
            foreach ($areas['regencies'] as $name) {

                Regency::updateOrCreate(
                    [
                        'slug' => Str::slug($name),
                    ],
                    [
                        'province_id' => $province->id,
                        'name' => $name,
                        'description' => null,
                        'image' => null,
                    ]
                );
            }

            // =========================
            // INSERT KOTA
            // =========================
            foreach ($areas['cities'] as $name) {

                Regency::updateOrCreate(
                    [
                        'slug' => 'kota-' . Str::slug($name),
                    ],
                    [
                        'province_id' => $province->id,
                        'name' => 'Kota ' . $name,
                        'description' => null,
                        'image' => null,
                    ]
                );
            }
        }

        $this->command->info('Data kabupaten/kota berhasil dimasukkan.');
    }
}