<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travel_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regency_id')->constrained('regencies')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('getting_around')->nullable();
            $table->text('travel_tips')->nullable();
            $table->text('local_rules')->nullable();
            $table->text('best_time')->nullable();
            $table->string('estimated_budget')->nullable();
            $table->string('image')->nullable();
            $table->string('source')->nullable();
            $table->string('source_url')->nullable();
            $table->date('last_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_guides');
    }
};