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
        Schema::create('itinerary_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trip_plan_id')
                ->constrained('trip_plans')
                ->onDelete('cascade');

            $table->integer('day_number')->default(1);
            $table->string('time')->nullable();
            $table->string('activity');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('estimated_cost')->nullable();
            $table->string('duration')->nullable();
            $table->string('maps_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_items');
    }
};