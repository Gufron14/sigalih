<?php

namespace Database\Seeders;

use App\Models\FormField;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormField::create([
            'jenis_surat_id' => 1,
            'field_name' => 'keperluan',
            'field_label' => 'Keperluan',
            'field_type' => 'text',
        ]);

        FormField::create([
            'jenis_surat_id' => 2,
            'field_name' => 'foto_ktp',
            'field_label' => 'Foto KTP',
            'field_type' => 'file',
        ]);
    }
}
