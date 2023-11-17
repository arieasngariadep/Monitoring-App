<?php

namespace App\Imports\PBY;

use App\Models\PBY\MonRekRTLModel1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class MonRekRTL1UpdateImports implements ToModel, WithStartRow, WithCalculatedFormulas
{
    

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

    private $firstRow = null;
    public function model(array $row)
    {   
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->firstRow){
            $this->firstRow = $row;

            return null;
        }

        MonRekRTLModel1::where('id',$row[0])->update([
                'no_rek' => $row[1],
                'nama_rek' => $row[2],
                'fungsi_rek' => $row[3],
                'cluster_rek' => $row[4],
                'nominal_tanggal_1' => intval($row[5]),
                'tanggal_1' => $this->transformDate($this->firstRow[5]),
                'nominal_tanggal_2' => intval($row[6]),
                'tanggal_2' => $this->transformDate($this->firstRow[6]),
                'nominal_tanggal_3' => intval($row[7]),
                'tanggal_3' => $this->transformDate($this->firstRow[7]),
                'ket_rek' => $row[8],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }

    public function startRow(): int
    {
        return 1;
    }
}

?>