<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Facades\Schema; // Tambahkan ini

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kategori::truncate();
        Schema::enableForeignKeyConstraints();

        $kategori = [
            ['nama' => 'Pemerintah'],
            ['nama' => 'Swasta'],
            ['nama' => 'BPJS'],
            ['nama' => 'Non-BPJS'],
        ];

        foreach ($kategori as $item) {
            Kategori::create($item);
        }
    }
}
