<?php

namespace App\Exports\IJE\Komplain;

use App\Models\IJE\KomplainModel;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class KomplainExport implements FromView, WithTitle, WithEvents, WithColumnFormatting
{
    use RegistersEventListeners;

    public function columnFormats(): array
    {
        return [
            'B' => 'mmmm yy',
            'C' => '#,##',
            'D' => NumberFormat::FORMAT_PERCENTAGE_00,
            'E' => '#,##',
            'F' => NumberFormat::FORMAT_PERCENTAGE_00,
            'G' => '#,##'
        ];
    }

    function __construct($bulan1, $bulan2, $jenis_komplain)
    {
        $this->bulan1 = $bulan1;
        $this->bulan2 = $bulan2;
        $this->jenis_komplain = $jenis_komplain;
    }

    public function view(): View
    {
        return view('IJE.Komplain.reportKomplain', [
            'listData' => KomplainModel::getKomplainReport($this->bulan1, $this->bulan2, $this->jenis_komplain),
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
        $event->getSheet()->getDelegate()->getStyle('A1:G2')->applyFromArray($styleArray);

        $event->getSheet()->getDelegate()->getStyle('A1:G2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('8EAADC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        if($this->jenis_komplain == 'ATM')
        {
            $judul = 'ATM & E-Channel';
        }else{
            $judul = 'EDC';
        }
        return 'Report Komplain '.$judul.'';
    }
}
