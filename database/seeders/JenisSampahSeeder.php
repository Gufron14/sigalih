<?php

namespace Database\Seeders;

use App\Models\BankSampah\JenisSampah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisSampah::create([
            "jenis_sampah" => "Botol Plastik",
            "harga_per_kg" => "700",
            "desc" => "Botol Plastik"
        ]);
        JenisSampah::create([
            "jenis_sampah" => "Besi",
            "harga_per_kg" => "1200",
            "desc" => "Besi"
        ]);
        JenisSampah::create([
            "jenis_sampah" => "Kardus",
            "harga_per_kg" => "1000",
            "desc" => "Kardus"
        ]);
    }
}
