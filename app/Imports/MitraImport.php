<?php

namespace App\Imports;

use App\Models\ModelMitra;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class MitraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[2]) || $row[2] == "Keterangan Instansi") {
            return null;
        }
        // dd($row);
        return new ModelMitra([
            'kodeinstansi' => $row[1],
            'ketinstansi' => $row[2],
            'instansi' => $row[3],
            'bidkerjasama' => $row[4],
            // 'mulai' => Carbon::createFromFormat('d/m/Y', $row[5])->toDateTimeString(),
            // 'selesai' => Carbon::createFromFormat('d/m/Y', $row[6])->toDateTimeString(),
            'mulai' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]))->toDateTimeString(),
            'selesai' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]))->toDateTimeString(),
            'jenisnaskah' => $row[7],
            'ketunit' => $row[8],
        ]);
    }
}
