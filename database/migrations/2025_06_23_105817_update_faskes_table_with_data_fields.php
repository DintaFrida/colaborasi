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
        Schema::table('faskes', function (Blueprint $table) {
        $table->string('nama');
        $table->string('nama_pengelola')->nullable();
        $table->text('alamat')->nullable();
        $table->string('website')->nullable();
        $table->string('email')->nullable();
        $table->foreignId('kabkota_id')->constrained()->onDelete('cascade');
        $table->foreignId('jenis_faskes_id')->constrained('jenis_faskes')->onDelete('cascade');
        $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
        $table->decimal('rating', 3, 2)->nullable();
        $table->decimal('latitude', 10, 7)->nullable();
        $table->decimal('longitude', 10, 7)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faskes', function (Blueprint $table) {
            //
        });
    }
};
