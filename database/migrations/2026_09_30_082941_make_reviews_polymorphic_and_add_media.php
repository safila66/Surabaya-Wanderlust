<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['destination_id']);
            $table->renameColumn('destination_id', 'reviewable_id');
            $table->string('reviewable_type')->default('App\\\Models\\\Destination')->after('id');
            $table->string('media_path')->nullable()->after('comment');
        });
    }
    public function down(): void {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('media_path');
            $table->dropColumn('reviewable_type');
            $table->renameColumn('reviewable_id', 'destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }
};