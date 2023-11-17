<?php

namespace App\Exports\IJE\PemasanganEdc;

use App\Models\IJE\PemasanganEdcModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PemasanganEdcExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmmm yy',
            'C' => '#,##',
            'D' => '#,##',
            'E' => NumberFormat::FORMAT_PERCENTAGE_00
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
        $data = PemasanganEdcModel::getPemasanganEdcReport($this->bulan1, $this->bulan2);
        foreach ($data as $d) {
            $export[] = array( 
                'ID' => $d->id,
                'PERIODE' => $d->bulan,
                'TOTAL' => $d->total,
                'SESUAI SLA' => $d->sesuai_sla,
                'PERSENTASE' => round($d->persentase, 2)."%",
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'PERIODE',
            'TOTAL',
            'SESUAI SLA',
            'PERSENTASE',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Pemasangan EDC';
    }
}
