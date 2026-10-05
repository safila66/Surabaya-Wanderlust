<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->string('opening_hours')->nullable()->after('price_max');
        });
    }

    public function down(): void
    {
        Schema::table('culinaries', function (Blueprint $table) {
            $table->dropColumn('opening_hours');
        });
    }
};