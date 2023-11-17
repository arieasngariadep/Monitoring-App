<?php

namespace App\Imports\PJE\AvailibilityAtm;

use App\Models\PJE\AvailibilityAtmModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AvailibilityAtmImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
        return new AvailibilityAtmModel([
            'bulan' => $this->transformDate($row[0]),
            'rata_event_problem' => $row[1],
            'durasi_bulan' => $row[2],
            'durasi_ytd' => $row[3],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
