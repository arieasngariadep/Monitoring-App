<?php

namespace App\Imports\IJE\Komplain;

use App\Models\IJE\KomplainModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkKomplainEdcImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
            KomplainModel::where('id', $row[0])
                ->update([
                    'bulan' => $this->transformDate($row[1]),
                    'jumlah_sesuai' => $row[2],
                    'persentase_sesuai' => $row[3],
                    'jumlah_tidak_sesuai' => $row[4],
                    'persentase_tidak_sesuai' => $row[5],
                    'jumlah_komplain' => $row[6],
                    'jenis_komplain' => 'EDC',
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
