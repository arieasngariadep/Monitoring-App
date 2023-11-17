<?php

namespace App\Imports\PJE\Kas;

use App\Models\PJE\KasModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkKasImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
            KasModel::where('id', $row[0])
                ->update([
                    'periode' => ($row[1] != NULL ? $this->transformDate($row[1]) : NULL),
                    'pengambilan' => $row[2],
                    'pengisian' => $row[3],
                    'sisa' => $row[4],
                    'persentase_pengisian' => $row[5],
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
