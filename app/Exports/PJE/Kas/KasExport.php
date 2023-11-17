<?php

namespace App\Exports\PJE\Kas;

use App\Models\PJE\KasModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class KasExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmm-yy',
            'C' => '#,##',
            'D' => '#,##',
            'E' => '#,##',
            'F' => NumberFormat::FORMAT_PERCENTAGE_00
        ];
    }

    function __construct($bulan1, $bulan2)
    {
        $this->bulan1 = $bulan1;
        $this->bulan2 = $bulan2;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = KasModel::getKasReport($this->bulan1, $this->bulan2);
        foreach ($data as $d) {
            $export[] = array( 
                'ID' => $d->id,
                'PERIODE' => $d->periode,
                'PENGAMBILAN' => $d->pengambilan,
                'PENGISIAN' => $d->pengisian,
                'SISA' => $d->sisa,
                'PERSENTASE PENGISIAN' => round($d->persentase_pengisian, 2)."%",
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'PERIODE',
            'PENGAMBILAN',
            'PENGISIAN',
            'SISA',
            'PERSENTASE PENGISIAN',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Kas ATM/CRM';
    }
}
