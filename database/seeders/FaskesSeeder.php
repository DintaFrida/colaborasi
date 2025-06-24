<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faskes;
use App\Models\JenisFaskes;
use App\Models\Kategori;
use App\Models\Kabkota;
use Illuminate\Support\Facades\Schema;

class FaskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Faskes::truncate();
        Schema::enableForeignKeyConstraints();

        $jenisPuskesmasId = JenisFaskes::where('nama', 'Puskesmas')->first()->id;
        $jenisRsId = JenisFaskes::where('nama', 'Rumah Sakit')->first()->id;
        $jenisApotekId = JenisFaskes::where('nama', 'Apotek')->first()->id;

        $kategoriIds = Kategori::pluck('id');
        $kabkotaIds = Kabkota::pluck('id');

        // Data Puskesmas (key diubah menjadi latitude & longitude)
        $puskesmas = [
            ['nama' => 'Puskesmas Kecamatan Tebet', 'alamat' => 'Jl. Prof. Dr. Soepomo No.54, Tebet, Jakarta Selatan', 'rating' => 4, 'latitude' => -6.2355, 'longitude' => 106.8488],
            ['nama' => 'Puskesmas Kecamatan Setiabudi', 'alamat' => 'Jl. Halimun Raya No.1, Guntur, Jakarta Selatan', 'rating' => 5, 'latitude' => -6.2123, 'longitude' => 106.8321],
            ['nama' => 'Puskesmas Kecamatan Kebayoran Baru', 'alamat' => 'Jl. Iskandarsyah Raya No. 105, Melawai, Jakarta Selatan', 'rating' => 4, 'latitude' => -6.2464, 'longitude' => 106.8005],
            ['nama' => 'Puskesmas Kelurahan Menteng', 'alamat' => 'Jl. Pegangsaan Barat No.14, Menteng, Jakarta Pusat', 'rating' => 4, 'latitude' => -6.1944, 'longitude' => 106.8344],
            ['nama' => 'Puskesmas Kecamatan Gambir', 'alamat' => 'Jl. Tanah Abang 1 No.10, Petojo Selatan, Jakarta Pusat', 'rating' => 5, 'latitude' => -6.1735, 'longitude' => 106.8195],
        ];

        // Data Rumah Sakit (key diubah menjadi latitude & longitude)
        $rumahSakit = [
            ['nama' => 'RSUPN Dr. Cipto Mangunkusumo', 'alamat' => 'Jl. Pangeran Diponegoro No.71, Senen, Jakarta Pusat', 'rating' => 5, 'latitude' => -6.194, 'longitude' => 106.845],
            ['nama' => 'RS Pondok Indah', 'alamat' => 'Jl. Metro Duta Kav. UE, Pondok Indah, Jakarta Selatan', 'rating' => 5, 'latitude' => -6.264, 'longitude' => 106.783],
            ['nama' => 'Siloam Hospitals Kebon Jeruk', 'alamat' => 'Jl. Perjuangan No.Kav 8, Kebon Jeruk, Jakarta Barat', 'rating' => 4, 'latitude' => -6.189, 'longitude' => 106.768],
            ['nama' => 'RS Medistra', 'alamat' => 'Jl. Gatot Subroto No.Kav. 59, Kuningan Timur, Jakarta Selatan', 'rating' => 4, 'latitude' => -6.236, 'longitude' => 106.828],
            ['nama' => 'RS Premier Jatinegara', 'alamat' => 'Jl. Jatinegara Timur No.85-87, Jatinegara, Jakarta Timur', 'rating' => 4, 'latitude' => -6.223, 'longitude' => 106.868],
        ];

        // Data Apotek (key diubah menjadi latitude & longitude)
        $apotek = [
            ['nama' => 'Apotek Kimia Farma Senayan', 'alamat' => 'Jl. Hang Lekir I No.4, Gelora, Jakarta Pusat', 'rating' => 4, 'latitude' => -6.228, 'longitude' => 106.797],
            ['nama' => 'Apotek K-24 Rawamangun', 'alamat' => 'Jl. Pemuda No.70, Rawamangun, Jakarta Timur', 'rating' => 4, 'latitude' => -6.195, 'longitude' => 106.883],
            ['nama' => 'Century Healthcare Grand Indonesia', 'alamat' => 'Grand Indonesia, West Mall, Jl. M.H. Thamrin No.1, Jakarta Pusat', 'rating' => 5, 'latitude' => -6.194, 'longitude' => 106.822],
            ['nama' => 'Guardian Mall Kelapa Gading', 'alamat' => 'Mal Kelapa Gading 3, Jl. Boulevard Raya, Jakarta Utara', 'rating' => 4, 'latitude' => -6.157, 'longitude' => 106.908],
            ['nama' => 'Watsons Kota Kasablanka', 'alamat' => 'Mall Kota Kasablanka, Jl. Casablanca Raya Kav. 88, Jakarta Selatan', 'rating' => 5, 'latitude' => -6.224, 'longitude' => 106.842],
        ];

        // Masukkan data ke tabel Faskes (logika create disederhanakan)
        foreach ($puskesmas as $faskes) {
            Faskes::create(array_merge($faskes, ['jenis_faskes_id' => $jenisPuskesmasId, 'kategori_id' => $kategoriIds->random(), 'kabkota_id' => $kabkotaIds->random()]));
        }
        foreach ($rumahSakit as $faskes) {
            Faskes::create(array_merge($faskes, ['jenis_faskes_id' => $jenisRsId, 'kategori_id' => $kategoriIds->random(), 'kabkota_id' => $kabkotaIds->random()]));
        }
        foreach ($apotek as $faskes) {
            Faskes::create(array_merge($faskes, ['jenis_faskes_id' => $jenisApotekId, 'kategori_id' => $kategoriIds->random(), 'kabkota_id' => $kabkotaIds->random()]));
        }
    }
}
