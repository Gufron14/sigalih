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
            "id_warga" => "1",
            "nik" => "325201403010002",
            "nama" => "Gupron Nurjalil",
            "ttl" => "Garut, 14 Maret 2001",
            "jk" => 1,
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "desa" => "Sirnagalih",
            "agama" => "Islam",
            "stts_perkawinan" => 0,
            "pekerjaan" => "Pelajar",
            "kewarganegaraan" => "Indonesia"
        ]);
        Warga::create([
            "id_warga" => "2",
            "nik" => "325201403010003",
            "nama" => "Arip Ramdhani",
            "ttl" => "Garut, 14 Maret 2005",
            "jk" => 1,
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "desa" => "Sirnagalih",
            "agama" => "Islam",
            "stts_perkawinan" => 0,
            "pekerjaan" => "Pelajar",
            "kewarganegaraan" => "Indonesia"
        ]);
        Warga::create([
            "id_warga" => "3",
            "nik" => "325201403010014",
            "nama" => "Gunawan",
            "ttl" => "Garut, 14 Maret 2005",
            "jk" => 1,
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "desa" => "Sirnagalih",
            "agama" => "Islam",
            "stts_perkawinan" => 0,
            "pekerjaan" => "Pelajar",
            "kewarganegaraan" => "Indonesia"
        ]);
    }
}
