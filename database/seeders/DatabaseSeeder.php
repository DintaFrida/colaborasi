<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder dalam urutan yang benar untuk mengatasi ketergantungan
        $this->call([
            ProvinsiSeeder::class,      // Dijalankan pertama
            JenisFaskesSeeder::class,
            KategoriSeeder::class,
            KabkotaSeeder::class,       // Dijalankan setelah Provinsi
            FaskesSeeder::class,        // Dijalankan terakhir
        ]);
        
    }
}
