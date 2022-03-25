<?php

namespace App\Imports;

use App\Models\ModelMitra;
use Maatwebsite\Excel\Concerns\ToModel;

class MitraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModelMitra([
            'kodeinstansi' => $row[1],
            'ketinstansi' => $row[2],
            'instansi' => $row[3],
            'bidkerjasama' => $row[4],
            'mulai' => $row[5],
            'selesai' => $row[6],
            'jenisnaskah' => $row[7],
            'ketunit' => $row[8],
        ]);
    }
}
