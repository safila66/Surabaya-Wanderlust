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
        Schema::create('trip_plans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('regency_id')
                ->constrained('regencies')
                ->onDelete('cascade');

            $table->string('title');
            $table->integer('duration_days')->default(1);

            $table->string('travel_style')->nullable();
            $table->string('interests')->nullable();
            $table->string('budget')->nullable();

            $table->text('description')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_plans');
    }
};