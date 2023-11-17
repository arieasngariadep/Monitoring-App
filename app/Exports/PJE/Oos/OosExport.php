<?php

namespace App\Exports\PJE\Oos;

use App\Models\PJE\OosModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class OosExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_YYYYMMDD2,
            'C' => '#,##0',
            'D' => '#,##0',
            'E' => '#,##0',
            'F' => '#,##0',
            'G' => '#,##0',
            'H' => '#,##0',
            'I' => '#,##0',
            'J' => '#,##0',
            'K' => '#,##0',
            'L' => '#,##0',
            'M' => '#,##0',
            'N' => '#,##0',
            'O' => '#,##0',
            'P' => '#,##0',
            'Q' => '#,##0',
            'R' => '#,##0',
            'S' => '#,##0',
            'T' => '#,##0',
            'U' => '#,##0',
            'V' => '#,##0',
            'W' => '#,##0',
            'X' => '#,##0',
            'Y' => '#,##0',
            'Z' => '#,##0',
            'AA' => '#,##0',
            'AB' => '#,##0',
            'AC' => '#,##0',
            'AD' => '#,##0',
            'AE' => '#,##0',
            'AF' => '#,##0',
            'AG' => '#,##0',
            'AH' => '#,##0',
            'AI' => '#,##0',
            'AJ' => '#,##0',
            'AK' => '#,##0',
            'AL' => '#,##0',
            'AM' => '#,##0',
            'AN' => NumberFormat::FORMAT_PERCENTAGE_00
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
        $data = OosModel::getOosReport($this->bulan1, $this->bulan2);
        foreach ($data as $d) {
            $export[] = array(
                'ID' => $d->id,
                'TANGGAL' => $d->tanggal,
                '00:00' => $d->satu,
                '02:00' => $d->dua,
                '04:00' => $d->tiga,
                '05:00' => $d->empat,
                '05:30' => $d->lima,
                '06:00' => $d->enam,
                '06:30' => $d->tujuh,
                '07:00' => $d->delapan,
                '07:30' => $d->sembilan,
                '08:00' => $d->sepuluh,
                '08:30' => $d->sebelas,
                '09:00' => $d->duabelas,
                '09:30' => $d->tigabelas,
                '10:00' => $d->empatbelas,
                '10:30' => $d->limabelas,
                '11:00' => $d->enambelas,
                '11:30' => $d->tujuhbelas,
                '12:00' => $d->delapanbelas,
                '12:30' => $d->sembilanbelas,
                '13:00' => $d->duapuluh,
                '13:30' => $d->duapuluhsatu,
                '14:00' => $d->duapuluhdua,
                '14:30' => $d->duapuluhtiga,
                '15:00' => $d->duapuluhempat,
                '15:30' => $d->duapuluhlima,
                '16:00' => $d->duapuluhenam,
                '16:30' => $d->duapuluhtujuh,
                '17:00' => $d->duapuluhdelapan,
                '17:30' => $d->duapuluhsembilan,
                '18:00' => $d->tigapuluh,
                '18:30' => $d->tigapuluhsatu,
                '19:00' => $d->tigapuluhdua,
                '19:30' => $d->tigapuluhtiga,
                '20:00' => $d->tigapuluhempat,
                '20:30' => $d->tigapuluhlima,
                '21:00' => $d->tigapuluhenam,
                '21:30' => $d->tigapuluhtujuh,
                '22:00' => $d->tigapuluhdelapan,
                '21:30' => $d->tigapuluhsembilan,
                '22:00' => $d->empatpuluh,
                'AVG' => $d->avg,
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'TANGGAL',
            '00:00',
            '02:00',
            '04:00',
            '05:00',
            '05:30',
            '06:00',
            '06:30',
            '07:00',
            '07:30',
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
            '17:30',
            '18:00',
            '18:30',
            '19:00',
            '19:30',
            '20:00',
            '20:30',
            '21:00',
            '21:30',
            '22:00',
            'AVG',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report Out Of Service';
    }
}
