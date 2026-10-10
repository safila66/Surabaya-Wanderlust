<?php
namespace Database\Seeders;
use App\Models\TravelGuide;
use Illuminate\Database\Seeder;
class TravelGuideExtSeeder extends Seeder {
    public function run(): void {
        $regencyId = 329; // Kota Surabaya

        $gettingAround = [
            ["Suroboyo Bus & Trans Semanggi", "Transportasi umum andalan Surabaya. Pembayarannya menggunakan QRIS, kartu uang elektronik (Flazz, e-money), atau uniknya, bisa menggunakan botol plastik bekas untuk Suroboyo Bus. Cek rute di aplikasi GoBis atau Trans Jatim Ajaib."],
            ["Wira-Wiri Suroboyo", "Angkutan pengumpan (feeder) berupa minibus yang menjangkau rute perkampungan atau jalan kecil yang tidak dilewati bus besar. Sangat praktis untuk mobilitas lokal."],
            ["Ojek & Taksi Online", "Gojek, Grab, dan Maxim sangat mudah ditemukan kapan saja. Ini adalah cara paling praktis untuk berkeliling tanpa perlu memikirkan tempat parkir yang kadang sulit di pusat kota."],
            ["Sewa Kendaraan", "Banyak rental mobil atau motor harian jika Anda berencana mengeksplorasi Surabaya secara bebas atau menuju kawasan pinggiran seperti Kenjeran dan mangrove."],
            ["KAI Commuter (Kereta Lokal)", "Jika ingin bepergian ke wilayah aglomerasi (Sidoarjo, Gresik, Lamongan, Pasuruan), KAI Commuter adalah pilihan yang sangat murah dan bebas macet."]
        ];

        foreach ($gettingAround as [$title, $text]) {
            TravelGuide::updateOrCreate(["slug" => str($title)->slug()->toString()], [
                "regency_id" => $regencyId, "title" => $title, "getting_around" => $text, "last_updated" => now()->toDateString()
            ]);
        }

        $beforeYouGo = [
            ["Pakaian yang Tepat", "Surabaya sangat panas di siang hari. Bawa pakaian berbahan katun, topi, dan kacamata hitam. Namun, siapkan pakaian sopan tertutup jika berencana mengunjungi wisata religi."],
            ["Siapkan e-Money & QRIS", "Hampir semua transaksi di Surabaya (parkir mal, tiket masuk, transportasi, restoran) sudah cashless. Namun tetap siapkan uang pas untuk parkir jalanan atau warung kecil."],
            ["Pahami Dialek Lokal", "Orang Surabaya berbicara dengan dialek Suroboyoan yang terdengar keras dan lugas, sering diakhiri dengan kata \"Trek\" atau sapaan khas. Jangan kaget, mereka sebenarnya sangat ramah dan suka membantu."],
            ["Rencanakan Rute", "Surabaya adalah kota metropolitan yang besar. Kelompokkan kunjungan berdasarkan wilayah (Timur, Barat, Pusat) dalam satu hari agar tidak kehabisan waktu di jalan karena macet."],
            ["Unduh Aplikasi Penting", "Pastikan Anda memiliki aplikasi Google Maps, GoBis/Trans Jatim, dan KAI Access untuk memudahkan mobilitas Anda."]
        ];

        foreach ($beforeYouGo as [$title, $text]) {
            TravelGuide::updateOrCreate(["slug" => str($title)->slug()->toString()], [
                "regency_id" => $regencyId, "title" => $title, "local_rules" => $text, "last_updated" => now()->toDateString()
            ]);
        }
    }
}