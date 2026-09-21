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
        Schema::create('best_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade');
            $table->string('best_month')->nullable();
            $table->string('best_time')->nullable();
            $table->string('weather')->nullable();
            $table->string('temperature')->nullable();
            $table->text('scenery')->nullable();
            $table->string('crowd_level')->nullable();
            $table->text('recommended_activities')->nullable();
            $table->text('reason')->nullable();
            $table->date('last_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_times');
    }
};