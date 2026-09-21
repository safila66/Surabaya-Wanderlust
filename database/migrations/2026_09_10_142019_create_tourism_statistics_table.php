<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tourism_statistics', function (Blueprint $table) {
            $table->id();

            $table->foreignId('destination_id')
                ->constrained('destinations')
                ->onDelete('cascade');

            $table->year('year');

            $table->unsignedBigInteger('visitor_count')->nullable();

            $table->unsignedInteger('ranking')->nullable();

            $table->string('source')->nullable();

            $table->string('source_url')->nullable();

            $table->date('last_updated')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->unique([
                'destination_id',
                'year'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tourism_statistics');
    }
};