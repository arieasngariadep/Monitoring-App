<?php

namespace App\Imports\PJE\RekapPemasanganEdc;

use App\Models\PJE\RekapPemasanganEdcModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class UpdateBulkRekapPemasanganEdcImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
            RekapPemasanganEdcModel::where('id', $row[0])
                ->update([
                    'wilayah' => $row[1],
                    'new_merchant' => $row[2],
                    'edc_terpasang' => $row[3],
                    'persentase_edc_terpasang' => $row[4],
                    'belum_pasang_sudah_spk' => $row[5],
                    'belum_pasang_belum_spk' => $row[6],
                    'persentase_belum_terpasang' => $row[7],
                    'failed' => $row[8],
                    'pending' => $row[9],
                    'persentase_gagal_pasang' => $row[10],
                    'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
