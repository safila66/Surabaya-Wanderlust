<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->string('gofood_url')->nullable();
            $table->string('grabfood_url')->nullable();
            $table->string('shopeefood_url')->nullable();
            $table->boolean('reservation_required')->default(false);
        });
    }
    public function down(): void {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->dropColumn(['gofood_url', 'grabfood_url', 'shopeefood_url', 'reservation_required']);
        });
    }
};