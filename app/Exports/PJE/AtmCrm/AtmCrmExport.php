<?php

namespace App\Exports\PJE\AtmCrm;

use App\Models\PJE\AtmCrmModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class AtmCrmExport implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'B' => 'mmmm yy',
            'Q' => '#,##',
            'R' => '#,##',
            'S' => '#,##',
            'T' => '#,##',
            'U' => '#,##',
            'V' => '#,##',
            'W' => '#,##',
            'X' => '#,##',
            'Y' => '#,##',
            'Z' => '#,##',
            'AA' => '#,##',
            'AB' => '#,##',
        ];
    }

    function __construct($tanggal1, $tanggal2, $jenis_atm)
    {
        $this->tanggal1 = $tanggal1;
        $this->tanggal2 = $tanggal2;
        $this->jenis_atm = $jenis_atm;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = AtmCrmModel::getAtmCrmReport($this->tanggal1, $this->tanggal2, $this->jenis_atm);
        foreach ($data as $d) {
            $export[] = array(
                'ID' => $d->id,
                'TANGGAL' => $d->tanggal,
                'PENGELOLA ATM' => $d->pengelola_atm,
                'ATMID' => $d->atmid,
                'LOKASI' => $d->lokasi,
                'KODE WIL' => $d->kode_wil,
                'WILAYAH' => $d->wilayah,
                'CABANG' => $d->cabang,
                'JENIS ATM' => $d->jenis_atm,
                'SERVICE LEVEL' => round($d->service_level, 2),
                'OOS' => round($d->oos, 2),
                'HARDFAULT' => round($d->hardfault, 2),
                'VANDALISM' => $d->vandalism,
                'SUPPLYOUT' => round($d->supplyout, 2),
                'CASHOUT' => round($d->cashout, 2),
                'COMM' => round($d->comm, 2),
                'REVERSAL USAGE' => $d->reversal_usage,
                'REVERSAL AMOUNT' => $d->reversal_amount,
                'WITHD USAGE' => $d->withd_usage,
                'WITHD AMOUNT' => $d->withd_amount,
                'DEPOSIT USAGE' => $d->deposit_usage,
                'DEPOSIT AMOUNT' => $d->deposit_amount,
                'TRANSFER USAGE' => $d->transfer_usage,
                'TRANSFER AMOUNT' => $d->transfer_amount,
                'PAYMENT USAGE' => $d->payment_usage,
                'PAYMENT AMOUNT' => $d->payment_amount,
                'INQUIRY USAGE' => $d->inquiry_usage,
                'TOTAL' => $d->total,
            );
        }
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'ID',
            'TANGGAL',
            'PENGELOLA ATM',
            'ATMID',
            'LOKASI',
            'KODE WIL',
            'WILAYAH',
            'CABANG',
            'JENIS ATM',
            'SERVICE LEVEL',
            'OOS',
            'HARDFAULT',
            'VANDALISM',
            'SUPPLYOUT',
            'CASHOUT',
            'COMM',
            ' REVERSAL USAGE',
            'REVERSAL AMOUNT',
            'WITHD USAGE',
            'WITHD AMOUNT',
            'DEPOSIT USAGE',
            'DEPOSIT AMOUNT',
            ' TRANSFER USAGE',
            'TRANSFER AMOUNT',
            'PAYMENT USAGE',
            'PAYMENT AMOUNT',
            'INQUIRY USAGE',
            'TOTAL',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Report ATM CRM';
    }
}
