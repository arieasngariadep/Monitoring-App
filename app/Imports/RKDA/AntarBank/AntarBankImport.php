<?php

namespace App\Imports\RKDA\AntarBank;

use App\Models\RKDA\AntarBankModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AntarBankImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 7;
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
        $total_hak_trx_wd = $row[1] + $row[3] + $row[5] + $row[7] + $row[9];
        $total_hak_amount_wd = $row[2] + $row[4] + $row[6] + $row[8] + $row[10];
        $total_hak_trx_trf = $row[13] + $row[15] + $row[17] + $row[19] + $row[21];
        $total_hak_amount_trf = $row[14] + $row[16] + $row[18] + $row[20] + $row[22];
        $total_kwj_trx_wd = $row[25] + $row[27] + $row[29] + $row[31] + $row[33];
        $total_kwj_amount_wd = $row[26] + $row[28] + $row[30] + $row[32] + $row[34];
        $total_kwj_trx_trf = $row[37] + $row[39] + $row[41] + $row[43] + $row[45];
        $total_kwj_amount_trf = $row[38] + $row[40] + $row[42] + $row[44] + $row[46];
        return new AntarBankModel([
            'tanggal' => $this->transformDate($row[0]),
            'hak_trx_wd_link' => $row[1],
            'hak_amount_wd_link' => $row[2],
            'hak_trx_wd_mp' => $row[3],
            'hak_amount_wd_mp' => $row[4],
            'hak_trx_wd_prima' => $row[5],
            'hak_amount_wd_prima' => $row[6],
            'hak_trx_wd_bersama' => $row[7],
            'hak_amount_wd_bersama' => $row[8],
            'hak_trx_wd_alto' => $row[9],
            'hak_amount_wd_alto' => $row[10],
            'total_hak_trx_wd' => $total_hak_trx_wd,
            'total_hak_amount_wd' => $total_hak_amount_wd,
            'hak_trx_trf_link' => $row[13],
            'hak_amount_trf_link' => $row[14],
            'hak_trx_trf_mp' => $row[15],
            'hak_amount_trf_mp' => $row[16],
            'hak_trx_trf_prima' => $row[17],
            'hak_amount_trf_prima' => $row[18],
            'hak_trx_trf_bersama' => $row[19],
            'hak_amount_trf_bersama' => $row[20],
            'hak_trx_trf_alto' => $row[21],
            'hak_amount_trf_alto' => $row[22],
            'total_hak_trx_trf' => $total_hak_trx_trf,
            'total_hak_amount_trf' => $total_hak_amount_trf,           
            'kwj_trx_wd_link' => $row[25],
            'kwj_amount_wd_link' => $row[26],
            'kwj_trx_wd_mp' => $row[27],
            'kwj_amount_wd_mp' => $row[28],
            'kwj_trx_wd_prima' => $row[29],
            'kwj_amount_wd_prima' => $row[30],
            'kwj_trx_wd_bersama' => $row[31],
            'kwj_amount_wd_bersama' => $row[32],
            'kwj_trx_wd_alto' => $row[33],
            'kwj_amount_wd_alto' => $row[34],
            'total_kwj_trx_wd' => $total_kwj_trx_wd,
            'total_kwj_amount_wd' => $total_kwj_amount_wd,
            'kwj_trx_trf_link' => $row[37],
            'kwj_amount_trf_link' => $row[38],
            'kwj_trx_trf_mp' => $row[39],
            'kwj_amount_trf_mp' => $row[40],
            'kwj_trx_trf_prima' => $row[41],
            'kwj_amount_trf_prima' => $row[42],
            'kwj_trx_trf_bersama' => $row[43],
            'kwj_amount_trf_bersama' => $row[44],
            'kwj_trx_trf_alto' => $row[45],
            'kwj_amount_trf_alto' => $row[46],
            'total_kwj_trx_trf' => $total_kwj_trx_trf,
            'total_kwj_amount_trf' => $total_kwj_amount_trf,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
