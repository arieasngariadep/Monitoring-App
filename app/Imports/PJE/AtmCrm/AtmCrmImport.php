<?php

namespace App\Imports\PJE;

use App\Models\PJE\AtmCrmModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AtmCrmImport implements ToModel, WithStartRow, WithCalculatedFormulas
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
        $total = $row[18] + $row[20] + $row[22] + $row[24] + $row[26];
        return new AtmCrmModel([
            'tanggal' => $this->transformDate($row[1]),
            'pengelola_atm' => $row[2],
            'atmid' => $row[3],
            'lokasi' => $row[4],
            'kode_wil' => $row[5],
            'wilayah' => $row[6],
            'cabang' => $row[7],
            'jenis_atm' => $row[8],
            'service_level' => $row[9],
            'oos' => $row[10],
            'hardfault' => $row[11],
            'vandalism' => $row[12],
            'supplyout' => $row[13],
            'cashout' => $row[14],
            'comm' => $row[15],
            'reversal_usage' => $row[16],
            'reversal_amount' => $row[17],
            'withd_usage' => $row[18],
            'withd_amount' => $row[19],
            'deposit_usage' => $row[20],
            'deposit_amount' => $row[21],
            'transfer_usage' => $row[22],
            'transfer_amount' => $row[23],
            'payment_usage' => $row[24],
            'payment_amount' => $row[25],
            'inquiry_usage' => $row[26],
            'total' => $total,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
