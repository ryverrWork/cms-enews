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
        Schema::table('spesific_procurement_files', function (Blueprint $table) {
            $table->string('file_downloaded')->default(0)->after('file_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spesific_procurement_files', function (Blueprint $table) {
            $table->dropColumn('file_downloaded');
        });
    }
};
