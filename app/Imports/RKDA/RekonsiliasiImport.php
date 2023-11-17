<?php

namespace App\Imports\PJE;

use App\Models\PJE\RekonsiliasiModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class RekonsiliasiImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
        $persentase_switcher = ($row[2] / $row[1]) * 100;
        $persentase_principal = ($row[4] / $row[3]) * 100;
        $persentase_channel = ($row[6] / $row[5]) * 100;
        return new RekonsiliasiModel([
            'periode' => $this->transformDate($row[0]),
            'item_switcher' => $row[1],
            'sla_switcher' => $row[2],
            'persentase_switcher' => $persentase_switcher,
            'item_principal' => $row[3],
            'sla_principal' => $row[4],
            'persentase_principal' => $persentase_principal,
            'item_channel' => $row[5],
            'sla_channel' => $row[6],
            'persentase_channel' => $persentase_channel,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
