<?php

namespace App\Exports\PJE\PaguKas;

use App\Models\PJE\PaguKasModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PaguKasExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmm-yy',
            'C' => '#,##',
            'D' => '#,##',
            'E' => NumberFormat::FORMAT_PERCENTAGE_00,
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
        $data = PaguKasModel::getPaguKasReport($this->bulan1, $this->bulan2);
        foreach ($data as $d) {
            $export[] = array( 
                'ID' => $d->id,
                'BULAN' => $d->bulan,
                // 'BULAN' => \Carbon\Carbon::createFromFormat('mmm-yy', $d->bulan),
                'REALISASI' => $d->realisasi,
                'PAGU KAS' => $d->pagu_kas,
                'PERSENTASE PER BULAN' => round($d->persentase_bulan, 2)."%",
                'PERSENTASE (YtD)' => round($d->persentase_ytd, 2)."%",
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'BULAN',
            'REALISASI',
            'PAGU KAS',
            'PERSENTASE PER BULAN',
            'PERSENTASE (YtD)',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Pagu Kas';
    }
}
