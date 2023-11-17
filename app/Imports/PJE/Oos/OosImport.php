<?php

namespace App\Imports\PJE\Oos;

use App\Models\PJE\OosModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class OosImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
        return new OosModel([
            'tanggal' => $this->transformDate($row[0]),
            '00:00' => $row[1],
            '02:00' => $row[2],
            '04:00' => $row[3],
            '05:00' => $row[4],
            '05:30' => $row[5],
            '06:00' => $row[6],
            '06:30' => $row[7],
            '07:00' => $row[8],
            '07:30' => $row[9],
            '08:00' => $row[10],
            '08:30' => $row[11],
            '09:00' => $row[12],
            '09:30' => $row[13],
            '10:00' => $row[14],
            '10:30' => $row[15],
            '11:00' => $row[16],
            '11:30' => $row[17],
            '12:00' => $row[18],
            '12:30' => $row[19],
            '13:00' => $row[20],
            '13:30' => $row[21],
            '14:00' => $row[22],
            '14:30' => $row[23],
            '15:00' => $row[24],
            '15:30' => $row[25],
            '16:00' => $row[26],
            '16:30' => $row[27],
            '17:00' => $row[28],
            '17:30' => $row[29],
            '18:00' => $row[30],
            '18:30' => $row[31],
            '19:00' => $row[32],
            '19:30' => $row[33],
            '20:00' => $row[34],
            '20:30' => $row[35],
            '21:00' => $row[36],
            '21:30' => $row[37],
            '22:00' => $row[38],
            'avg' => $row[39],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
