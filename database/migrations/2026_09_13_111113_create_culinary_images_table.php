<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('culinary_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('culinary_id')
                ->constrained('culinaries')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('image');

            $table->string('caption')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->boolean('is_approved')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('culinary_images');
    }
};