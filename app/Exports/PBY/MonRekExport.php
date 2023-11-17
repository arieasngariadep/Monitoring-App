<?php

namespace App\Exports\PBY;

use App\Models\PBY\MonRekRTLModel1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Illuminate\Support\Facades\DB;

class MonRekExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    
    public function columnFormats(): array
    {
        return [
            'B' => '@',
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
        ];
    }

    function __construct()
    { 
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = DB::table('monrek_rtl_1')->select('tanggal_1','tanggal_2','tanggal_3')->first();
        $data = MonRekRTLModel1::all();
        foreach ($data as $d) {
            $export[] = array( 
                'ID' => $d->id,
                'NO REK' => $d->no_rek,
                'NAMA REK' => $d->nama_rek,
                'FUNGSI REK' => $d->fungsi_rek,
                'CLUSTER REK' => $d->cluster_rek,
                $date->tanggal_1 => ($d->nominal_tanggal_1 === 0) ? '0,00' : $d->nominal_tanggal_1,
                $date->tanggal_2 => ($d->nominal_tanggal_2 === 0) ? '0,00' : $d->nominal_tanggal_2,
                $date->tanggal_3 => ($d->nominal_tanggal_3 === 0) ? '0,00' : $d->nominal_tanggal_3,
                'KETERANGAN' => $d->ket_rek,
                
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        $date = DB::table('monrek_rtl_1')->select('tanggal_1','tanggal_2','tanggal_3')->first();
        return [
            'ID',
            'NO REK',
            'NAMA REK',
            'FUNGSI REK',
            'CLUSTER REK',
            $date->tanggal_1,
            $date->tanggal_2,
            $date->tanggal_3,
            'KETERANGAN',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Monitoring Rekening';
    }
}