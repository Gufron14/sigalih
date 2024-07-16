<?php

namespace App\Imports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class WargaImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new Warga([
            'nik' => $row[0],
            'nama' => $row[1],
            'ttl' => $row[2],
            'jk' => $row[3],
            'alamat' => $row[4],
            'rt' => $row[5],
            'rw' => $row[6],
            'desa' => $row[7],
            'kec' => $row[8],
            'kab' => $row[9],
            'agama' => $row[10],
            'status' => $row[11],
            'pekerjaan' => $row[12],
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => ['required', 'unique:warga,nik', 'min:16','max:16'],
            '1' => ['required'],
            '2' => ['required'],
            '3' => ['required'],
            '4' => ['required'],
            '5' => ['required'],
            '6' => ['required'],
            '7' => ['required'],
            '8' => ['required'],
            '9' => ['required'],
            '10' => ['required'],
            '11' => ['required'],
            '12' => ['required'],
        ];
    }
}
