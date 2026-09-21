<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('travel_post_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('travel_post_id')
                ->constrained('travel_posts')
                ->cascadeOnDelete();

            $table->string('image');

            $table->string('caption')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('travel_post_images');
    }
};