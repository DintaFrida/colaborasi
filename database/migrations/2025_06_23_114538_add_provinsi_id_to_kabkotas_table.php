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
    Schema::table('kabkotas', function (Blueprint $table) {
        $table->foreignId('provinsi_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('kabkotas', function (Blueprint $table) {
        $table->dropForeign(['provinsi_id']);
        $table->dropColumn('provinsi_id');
    });
}

};
