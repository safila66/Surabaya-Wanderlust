<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->text('gofood_url')->nullable()->change();
            $table->text('grabfood_url')->nullable()->change();
            $table->text('shopeefood_url')->nullable()->change();
        });
        
        Schema::table('destinations', function (Blueprint $table) {
            $table->text('ticket_url')->nullable()->change();
        });
        
        Schema::table('accommodations', function (Blueprint $table) {
            $table->text('booking_url')->nullable()->change();
            $table->text('official_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->string('gofood_url', 255)->nullable()->change();
            $table->string('grabfood_url', 255)->nullable()->change();
            $table->string('shopeefood_url', 255)->nullable()->change();
        });
        
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('ticket_url', 255)->nullable()->change();
        });
        
        Schema::table('accommodations', function (Blueprint $table) {
            $table->string('booking_url', 255)->nullable()->change();
            $table->string('official_url', 255)->nullable()->change();
        });
    }
};
