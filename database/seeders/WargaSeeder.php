<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warga::create([
            "nik" => "3205201403010002",
            "nama" => "Gupron Nurjalil",
            "ttl" => "Garut, 14 Maret 2001",
            "jk" => "Laki - Laki",
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "desa" => "Sirnagalih",
            "agama" => "Islam",
            "stts_perkawinan" => "Belum Kawin",
            "pekerjaan" => "Mahasiswa",
            "kewarganegaraan" =>  "Indonesia",
        ]);
        Warga::create([
            "nik" => "3205201403010003",
            "nama" => "Gunawan",
            "ttl" => "Garut, 14 Maret 2003",
            "jk" => "Laki - Laki",
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "desa" => "Sirnagalih",
            "agama" => "Islam",
            "stts_perkawinan" => "Belum Kawin",
            "pekerjaan" => "Mahasiswa",
            "kewarganegaraan" =>  "Indonesia",
        ]);
    }
}
