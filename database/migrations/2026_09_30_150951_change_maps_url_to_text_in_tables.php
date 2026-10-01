<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->text('maps_url')->nullable()->change();
        });
        
        Schema::table('destinations', function (Blueprint $table) {
            $table->text('maps_url')->nullable()->change();
        });
        
        Schema::table('accommodations', function (Blueprint $table) {
            $table->text('maps_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->string('maps_url', 255)->nullable()->change();
        });
        
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('maps_url', 255)->nullable()->change();
        });
        
        Schema::table('accommodations', function (Blueprint $table) {
            $table->string('maps_url', 255)->nullable()->change();
        });
    }
};
