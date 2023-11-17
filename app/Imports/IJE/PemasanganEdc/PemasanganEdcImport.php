<?php

namespace App\Imports\IJE\PemasanganEdc;

use App\Models\IJE\PemasanganEdcModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PemasanganEdcImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        date_default_timezone_set("Asia/Jakarta");
        $persentase = ($row[2] / $row[1]) * 100;
        return new PemasanganEdcModel([
            'bulan' => $row[0],
            'total' => $row[1],
            'sesuai_sla' => $row[2],
            'persentase' => $persentase,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
