<?php

namespace Database\Seeders;

use App\Models\TravelGuide;
use Illuminate\Database\Seeder;

class TravelGuideSeeder extends Seeder
{
    public function run(): void
    {
        $regencyId = 329; // Kota Surabaya

        $tips = [
            ['Cuaca Panas & Lembap', 'Surabaya beriklim panas dan lembap sepanjang tahun (30–35°C). Bawa topi, kacamata hitam, tabir surya, dan botol minum. Jadwalkan wisata luar ruangan di pagi (07.00–10.00) atau sore hari (setelah 15.30).'],
            ['Pakaian Nyaman & Sopan', 'Pilih pakaian berbahan ringan yang menyerap keringat. Untuk mengunjungi masjid, kelenteng, makam Sunan Ampel, dan situs religi lain, kenakan pakaian sopan yang menutup bahu dan lutut.'],
            ['Siapkan Uang Tunai', 'Mayoritas mal dan restoran menerima QRIS/kartu, tetapi pasar tradisional, parkir, warung kaki lima, dan tiket beberapa situs sejarah masih membutuhkan uang tunai pecahan kecil.'],
            ['Transportasi Praktis', 'Gunakan ojek/taksi online untuk jarak dekat–menengah. Suroboyo Bus dan Trans Semanggi Suroboyo adalah pilihan hemat untuk rute utama. Hindari jam sibuk (06.30–08.30 dan 16.30–19.00) agar tidak terjebak macet.'],
            ['Cicipi Kuliner Lokal', 'Wajib coba rujak cingur, lontong balap, rawon, tahu tek, dan semanggi. Datang lebih awal untuk warung populer karena banyak yang kehabisan menu sebelum sore. Tanyakan tingkat kepedasan sebelum memesan.'],
            ['Cek Jam Operasional', 'Museum dan situs sejarah umumnya tutup pada hari tertentu (sering Senin) atau lebih awal saat hari libur. Periksa jam buka di halaman destinasi atau Google Maps sebelum berangkat.'],
            ['Hormati Adat & Warga Lokal', 'Warga Surabaya dikenal lugas dan ramah. Gunakan tangan kanan saat memberi/menerima sesuatu, minta izin sebelum memotret warga, dan jaga kebersihan di setiap lokasi wisata.'],
            ['Jaga Barang Bawaan', 'Di kawasan ramai seperti pasar, Tunjungan, dan Kenjeran, simpan dompet dan ponsel di tas bagian depan. Titipkan barang berharga di hotel dan jangan memamerkan perhiasan.'],
            ['Waktu Terbaik Berkunjung', 'Musim kemarau (Mei–Oktober) paling nyaman untuk eksplorasi. Saat musim hujan (Nov–Apr) bawa jas hujan/payung dan siapkan rencana cadangan dalam ruangan seperti museum dan mal.'],
        ];

        foreach ($tips as [$title, $text]) {
            TravelGuide::updateOrCreate(
                ['slug' => str($title)->slug()->toString()],
                [
                    'regency_id'   => $regencyId,
                    'title'        => $title,
                    'description'  => $text,
                    'travel_tips'  => $text,
                    'source'       => 'Surabaya Wanderlust',
                    'last_updated' => now()->toDateString(),
                ]
            );
        }
    }
}
