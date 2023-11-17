<?php

namespace App\Exports\PJE\AvailibilityAtm;

use App\Models\PJE\AvailibilityAtmModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class AvailibilityAtmExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmm-yy',
            'C' => '#,##'
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
        $data = AvailibilityAtmModel::getAvailibilityAtmReport($this->bulan1, $this->bulan2);
        foreach ($data as $d) {
            $export[] = array( 
                'ID' => $d->id,
                'PERIODE' => $d->bulan,
                'RATA-RATA EVENT PROBLEM' => $d->rata_event_problem,
                'DURASI PER BULAN' => round($d->durasi_bulan, 2).' Menit',
                'DURASI (YTD)' => round($d->durasi_ytd, 2).' Menit',
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'PERIODE',
            'RATA-RATA EVENT PROBLEM',
            'DURASI PER BULAN',
            'DURASI (YTD)',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Availibility ATM';
    }
}
