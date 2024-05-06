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
            "ttl" => "Garut, 14/03/2001",
            "jk" => "Laki - Laki",
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "agama" => "Islam",
            "status" => "Belum Kawin",
            "pekerjaan" => "Pelajar/Mahasiswa",
        ]);
        Warga::create([
            "nik" => "3205202711030003",
            "nama" => "Muhamad Gunawan",
            "ttl" => "Garut, 27/11/2003",
            "jk" => "Laki - Laki",
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "agama" => "Islam",
            "status" => "Belum Kawin",
            "pekerjaan" => "Pelajar/Mahasiswa",
        ]);
        Warga::create([
            "nik" => "3205203010050004",
            "nama" => "Arip Ramdani",
            "ttl" => "Garut, 30/10/05",
            "jk" => "Laki - Laki",
            "alamat" => "Kp. Dungus Maung",
            "rt" => "02",
            "rw" => "06",
            "agama" => "Islam",
            "status" => "Belum Kawin",
            "pekerjaan" => "Pelajar/Mahasiswa",
        ]);
    }
}
