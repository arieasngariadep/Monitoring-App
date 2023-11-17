<?php

namespace App\Imports\RKS\DisputeResolution;

use App\Models\RKS\DisputeResolutionModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkDisputeResolutionImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
            DisputeResolutionModel::where('id', $row[0])
                ->update([
                    'periode' => $this->transformDate($row[1]),
                    'total_case' => $row[2],
                    'win_case' => $row[3],
                    'target' => $row[4],
                    'persentase_bulan' => $row[5],
                    'persentase_ytd' => $row[6],
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
