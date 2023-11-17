<?php

namespace App\Imports\PJE\AvailibilityEdc;

use App\Models\PJE\AvailibilityEdcModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkAvailibilityEdcImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 3;
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
            AvailibilityEdcModel::where('id', $row[0])
                ->update([
                    'bulan' => $this->transformDate($row[1]),
                    'total_mid' => $row[2],
                    'total_tid' => $row[3],
                    'tid_tidak_trx' => $row[4],
                    'tid_trx' => $row[5],
                    'availability_bulan' => $row[6],
                    'availability_ytd' => $row[7],
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
