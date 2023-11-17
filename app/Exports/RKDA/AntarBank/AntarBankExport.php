<?php

namespace App\Exports\RKDA\AntarBank;

use App\Models\RKDA\AntarBankModel;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;


class AntarBankExport implements FromView, WithTitle, WithEvents, WithColumnFormatting
{
    use RegistersEventListeners;

    public function columnFormats(): array
    {
        return [
            'C:AX' => '#,##'
        ];
    }

    function __construct($bulan1, $bulan2)
    {
        $this->bulan1 = $bulan1;
        $this->bulan2 = $bulan2;
    }

    public function view(): View
    {
        return view('RKDA.AntarBank.reportAntarBank', [
            'listData' => AntarBankModel::getAntarBankReport($this->bulan1, $this->bulan2),
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
        $event->getSheet()->getDelegate()->getStyle('A1:AX4')->applyFromArray($styleArray);

        $event->getSheet()->getDelegate()->getStyle('A1:A4')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('8EAADC');

        $event->getSheet()->getDelegate()->getStyle('B1:Z4')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C2D69A');

        $event->getSheet()->getDelegate()->getStyle('AA1:AX4')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B9B8');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Antar Bank';
    }
}
