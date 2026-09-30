<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('ticket_url')->nullable()->after('ticket_price');
        });
    }
    public function down(): void {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('ticket_url');
        });
    }
};