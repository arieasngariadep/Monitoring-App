<?php

namespace App\Exports\PJE\RekapPemasanganEdc;

use App\Models\PJE\RekapPemasanganEdcModel;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class RekapPemasanganEdcExport implements FromView, WithTitle, WithEvents, WithColumnFormatting
{
    use RegistersEventListeners;

    public function columnFormats(): array
    {
        return [
            'C' => '#,##',
            'D' => '#,##',
            'E' => NumberFormat::FORMAT_PERCENTAGE_00,
            'F' => '#,##',
            'G' => '#,##',
            'H' => NumberFormat::FORMAT_PERCENTAGE_00,
            'I' => '#,##',
            'J' => '#,##',
            'K' => NumberFormat::FORMAT_PERCENTAGE_00
        ];
    }

    function __construct($wilayah)
    {
        $this->wilayah = $wilayah;
    }

    public function view(): View
    {
        return view('PJE.RekapPemasanganEdc.reportRekapPemasanganEdc', [
            'listData' => RekapPemasanganEdcModel::getRekapPemasanganEdcReport($this->wilayah),
        ]);
    }

    public static function afterSheet(AfterSheet $event)
    {
        $styleArray = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $event->getSheet()->getDelegate()->getStyle('A1:K2')->applyFromArray($styleArray);

        $event->getSheet()->getDelegate()->getStyle('A1:C2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('8EAADC');
            
        $event->getSheet()->getDelegate()->getStyle('D1:E2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C5E0B2');

        $event->getSheet()->getDelegate()->getStyle('F1:H2')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('F8CBAC');
                
        $event->getSheet()->getDelegate()->getStyle('I1:K2')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFE799');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Rekap Pemasangan EDC';
    }
}
