<?php

namespace App\Imports\PJE\RekapPemasanganEdc;

use App\Models\PJE\RekapPemasanganEdcModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class RekapPemasanganEdcImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 3;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        date_default_timezone_set("Asia/Jakarta");
        $persentase_edc_terpasang = ($row[2] / $row[1]) * 100;
        $persentase_belum_terpasang = (($row[3] + $row[4]) / $row[1]) * 100;
        $persentase_gagal_pasang = 
        $persentase_gagal_pasang = (($row[5] + $row[6]) / $row[1]) * 100;
        return new RekapPemasanganEdcModel([
            'wilayah' => $row[0],
            'new_merchant' => $row[1],
            'edc_terpasang' => $row[2],
            'persentase_edc_terpasang' => $persentase_edc_terpasang,
            'belum_pasang_sudah_spk' => $row[3],
            'belum_pasang_belum_spk' => $row[4],
            'persentase_belum_terpasang' => $persentase_belum_terpasang,
            'failed' => $row[5],
            'pending' => $row[6],
            'persentase_gagal_pasang' => $persentase_gagal_pasang,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
