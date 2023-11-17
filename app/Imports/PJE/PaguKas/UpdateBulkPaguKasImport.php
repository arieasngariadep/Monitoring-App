<?php

namespace App\Imports\PJE\PaguKas;

use App\Models\PaguKasModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkPaguKasImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        date_default_timezone_set("Asia/Jakarta");
        foreach ($collection as $row) 
        {
            PaguKasModel::where('id', $row[0])
                ->update([
                    'bulan' => ($row[1] != NULL ? $this->transformDate($row[1]) : NULL),
                    'realisasi' => $row[2],
                    'pagu_kas' => $row[3],
                    'persentase_bulan' => $row[4],
                    'persentase_ytd' => $row[5],
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
