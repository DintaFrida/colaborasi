<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabkota;
use Illuminate\Support\Facades\Schema; // Tambahkan ini

class KabkotaSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kabkota::truncate();
        Schema::enableForeignKeyConstraints();

        $kabkotas = [
            ['nama' => 'Jakarta Selatan', 'provinsi_id' => 1],
            ['nama' => 'Jakarta Pusat', 'provinsi_id' => 1],
            ['nama' => 'Jakarta Timur', 'provinsi_id' => 1],
            ['nama' => 'Jakarta Barat', 'provinsi_id' => 1],
            ['nama' => 'Jakarta Utara', 'provinsi_id' => 1],
        ];

        foreach ($kabkotas as $item) {
            Kabkota::create($item);
        }
    }
}
