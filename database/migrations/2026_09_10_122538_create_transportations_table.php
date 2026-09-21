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
        Schema::create('transportations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regency_id')->constrained('regencies')->onDelete('cascade');
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('departure')->nullable();
            $table->string('destination')->nullable();
            $table->string('estimated_time')->nullable();
            $table->string('estimated_cost')->nullable();
            $table->text('description')->nullable();
            $table->string('ticket_url')->nullable();
            $table->string('image')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportations');
    }
};