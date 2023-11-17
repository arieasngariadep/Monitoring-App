<?php

namespace App\Imports\PJE\Oos;

use App\Models\OosModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkOosImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
            OosModel::where('id', $row[0])
                ->update([
                    'tanggal' => ($row[1] != NULL ? $this->transformDate($row[1]) : NULL),
                    '00:00' => $row[2],
                    '02:00' => $row[3],
                    '04:00' => $row[4],
                    '05:00' => $row[5],
                    '05:30' => $row[6],
                    '06:00' => $row[7],
                    '06:30' => $row[8],
                    '07:00' => $row[9],
                    '07:30' => $row[10],
                    '08:00' => $row[11],
                    '08:30' => $row[12],
                    '09:00' => $row[13],
                    '09:30' => $row[14],
                    '10:00' => $row[15],
                    '10:30' => $row[16],
                    '11:00' => $row[17],
                    '11:30' => $row[18],
                    '12:00' => $row[19],
                    '12:30' => $row[20],
                    '13:00' => $row[21],
                    '13:30' => $row[22],
                    '14:00' => $row[23],
                    '14:30' => $row[24],
                    '15:00' => $row[25],
                    '15:30' => $row[26],
                    '16:00' => $row[27],
                    '16:30' => $row[28],
                    '17:00' => $row[29],
                    '17:30' => $row[30],
                    '18:00' => $row[31],
                    '18:30' => $row[32],
                    '19:00' => $row[33],
                    '19:30' => $row[34],
                    '20:00' => $row[35],
                    '20:30' => $row[36],
                    '21:00' => $row[37],
                    '21:30' => $row[38],
                    '22:00' => $row[39],
                    'avg' => $row[40],
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
