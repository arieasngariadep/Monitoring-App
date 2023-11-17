<?php

namespace App\Exports\RKS\DisputeResolution;

use App\Models\RKS\DisputeResolutionModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class DisputeResolutionExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmmm yy',
            'C' => '#,##',
            'D' => '#,##',
            'E' => NumberFormat::FORMAT_PERCENTAGE_00,
            'F' => NumberFormat::FORMAT_PERCENTAGE_00,
            'G' => NumberFormat::FORMAT_PERCENTAGE_00
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
        $data = DisputeResolutionModel::getDisputeResolutionReport($this->bulan1, $this->bulan2);
        foreach ($data as $d) {
            $export[] = array( 
                'ID' => $d->id,
                'PERIODE' => $d->periode,
                'TOTAL CASE' => $d->total_case,
                'WIN CASE' => $d->win_case,
                'TARGET' => round($d->target)."%",
                'PERSENTASE PER BULAN' => round($d->persentase_ytd, 2)."%",
                'PERSENTASE (YTD)' => round($d->persentase_ytd, 2)."%",
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'PERIODE',
            'TOTAL CASE',
            'WIN CASE',
            'TARGET',
            'PERSENTASE PER BULAN',
            'PERSENTASE (YTD)',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Dispute Resolution';
    }
}
