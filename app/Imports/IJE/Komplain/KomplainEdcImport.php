<?php

namespace App\Imports\IJE\Komplain;

use App\Models\IJE\KomplainModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class KomplainEdcImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
        $jumlah_komplain = $row[1] + $row[2];
        $persentase_sesuai = ($row[1] / $jumlah_komplain) * 100;
        $persentase_tidak_sesuai = ($row[2] / $jumlah_komplain) * 100;
        return new KomplainModel([
            'bulan' => $this->transformDate($row[0]),
            'jumlah_sesuai' => $row[1],
            'persentase_sesuai' => $persentase_sesuai,
            'jumlah_tidak_sesuai' => $row[2],
            'persentase_tidak_sesuai' => $persentase_tidak_sesuai,
            'jumlah_komplain' => $jumlah_komplain,
            'jenis_komplain' => 'EDC',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
