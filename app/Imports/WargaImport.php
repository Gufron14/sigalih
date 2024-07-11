<?php

namespace App\Imports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\ToModel;

class WargaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
            'agama' => $row[7],
            'status' => $row[8],
            'pekerjaan' => $row[9],
        ]);
    }
}
