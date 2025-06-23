<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kriteria;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\Spesialis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiswaSeeder::class,
            AdminSeeder::class,
            GuruSeeder::class,
            BkSeeder::class,
            WaliKelasSeeder::class,
            KepsekSeeder::class,
            SpesialisSeeder::class,
        ]);
    }
}