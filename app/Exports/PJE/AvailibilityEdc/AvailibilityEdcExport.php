<?php

namespace App\Exports\PJE\AvailibilityEdc;

use App\Models\PJE\AvailibilityEdcModel;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class AvailibilityEdcExport implements FromView, WithTitle, WithEvents, WithColumnFormatting
{
    use RegistersEventListeners;

    public function columnFormats(): array
    {
        return [
            'B' => 'mmmm yy',
            'C' => '#,##',
            'D' => '#,##',
            'E' => '#,##',
            'F' => '#,##',
            'G' => NumberFormat::FORMAT_PERCENTAGE_00,
            'H' => NumberFormat::FORMAT_PERCENTAGE_00
        ];
    }

    function __construct($bulan1, $bulan2)
    {
        $this->bulan1 = $bulan1;
        $this->bulan2 = $bulan2;
    }

    public function view(): View
    {
        return view('PJE.AvailibilityEdc.reportAvailibilityEdc', [
            'listData' => AvailibilityEdcModel::getAvailibilityEdcReport($this->bulan1, $this->bulan2),
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
        $event->getSheet()->getDelegate()->getStyle('A1:H2')->applyFromArray($styleArray);

        $event->getSheet()->getDelegate()->getStyle('A1:H2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C5E0B2');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Availibility EDC';
    }
}
