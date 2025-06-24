<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Schema;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Provinsi::truncate();
        Schema::enableForeignKeyConstraints();

        // Buat data provinsi DKI Jakarta
        Provinsi::create(['nama' => 'DKI Jakarta']);
    }
}
