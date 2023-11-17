<?php

namespace App\Exports\RKS\RekonRji;

use App\Models\RKS\RekonRjiModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class RekonRjiExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmmm yy',
            'C' => '#,##',
            'D' => '#,##',
            'E' => '#,##',
            'F' => '#,##',
            'G' => '#,##',
            'H' => '#,##',
            'I' => '#,##',
            'J' => NumberFormat::FORMAT_PERCENTAGE_00,
            'K' => NumberFormat::FORMAT_PERCENTAGE_00,
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
        $data = RekonRjiModel::getAll();
        foreach ($data as $d) {
            $percentageMatch = $d->item_trx_match/$d->item_trx * 100;
            $percentageUnmatch = $d->item_trx_unmatch/$d->item_trx * 100;
            $export[] = array( 
                'ID' => $d->id,
                'TANGGAL' => $d->tanggal,
                'JENIS REKON' => $d->jenis_rekon,
                'ITEM TRX' => $d->item_trx,
                'NOMINAL' => $d->nominal,
                'ITEM TRX MATCH' => $d->item_trx_match,
                'NOMINAL TRX MATCH' => $d->nominal_trx_match,
                'ITEM TRX UNMATCH' => $d->item_trx_unmatch,
                'NOMINAL TRX UNMATCH' => $d->nominal_trx_unmatch,
                'PERCENTAGE MATCH' => number_format($percentageMatch,2,',','')."%",
                'PERCENTAGE UNMATCH' => number_format($percentageUnmatch,2,',','')."%",
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'TANGGAL',
            'JENIS REKON',
            'ITEM TRX',
            'NOMINAL',
            'ITEM TRX MATCH',
            'NOMINAL TRX MATCH',
            'ITEM TRX UNMATCH',
            'NOMINAL TRX UNMATCH',
            'PERCENTAGE MATCH',
            'PERCENTAGE UNMATCH',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Rekonsiliasi Rji';
    }
}