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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('regency_id')
                ->constrained('regencies')
                ->onDelete('cascade');

            $table->string('transport_cost')->nullable();
            $table->string('accommodation_cost')->nullable();
            $table->string('food_cost')->nullable();
            $table->string('ticket_cost')->nullable();
            $table->string('other_cost')->nullable();
            $table->string('total_cost')->nullable();

            $table->text('notes')->nullable();
            $table->date('last_updated')->nullable();
            $table->string('source')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};