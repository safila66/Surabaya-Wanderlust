<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Lewati kalau tabel sudah ada (sisa percobaan migrate yang gagal)
        if (Schema::hasTable('wishlists')) {
            return;
        }

        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            // Satu user hanya bisa menyimpan satu destinasi satu kali
            $table->unique(['user_id', 'destination_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};