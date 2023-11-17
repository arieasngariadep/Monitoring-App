<?php

namespace App\Imports\RKS\RekonRji;

use App\Models\RKS\RekonRjiModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class RekonRjiImport implements ToModel,WithStartRow,WithCalculatedFormulas
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
            RekonRjiModel::where('id',$row[0])->update([
                'tanggal' => $this->transformDate($row[1]),
                'jenis_rekon' => $row[2],   
                'item_trx' => $row[3],
                'nominal' => $row[4],
                'item_trx_match' => $row[5],
                'nominal_trx_match' => $row[6],
                'item_trx_unmatch' => $row[7],
                'nominal_trx_unmatch' => $row[8],
            ]);  
    }
}

?>
