<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisSurat::create([
            'id' => 1,
            'nama_surat' => 'Surat Keterangan Domisili',
            'singkatan' => 'SKD',
            'desc' => 'Surat Keterangan Domisili',
        ]);
        JenisSurat::create([
            'id' => 2,
            'nama_surat' => 'Surat Pengantar SKCK',
            'singkatan' => 'SKCK',
            'desc' => 'Surat Pengantar SKCK',
        ]);
        JenisSurat::create([
            'id' => 3,
            'nama_surat' => 'Surat Keterangan Tidak Mampu',
            'singkatan' => 'SKTM',
            'desc' => 'Surat Keterangan Tidak Mampu',
        ]);
        JenisSurat::create([
            'id' => 4,
            'nama_surat' => 'Surat Keterangan Beda Nama',
            'singkatan' => 'SKBN',
            'desc' => 'Surat Keterangan Beda Nama',
        ]);
    }
}
