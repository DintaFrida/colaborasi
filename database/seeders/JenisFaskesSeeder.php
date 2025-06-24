<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisFaskes;
use Illuminate\Support\Facades\Schema; // Tambahkan ini

class JenisFaskesSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); // Nonaktifkan pengecekan
        JenisFaskes::truncate(); // Sekarang aman untuk truncate
        Schema::enableForeignKeyConstraints(); // Aktifkan kembali

        $jenis = [
            ['nama' => 'Puskesmas'],
            ['nama' => 'Rumah Sakit'],
            ['nama' => 'Apotek'],
        ];

        foreach ($jenis as $item) {
            JenisFaskes::create($item);
        }
    }
}
