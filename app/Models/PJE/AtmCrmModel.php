<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtmCrmModel extends Model
{
    protected $table = 'atm_crm';
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Populasi ATM CRM
     */
    public function getPopulasi($jenis_atm)
    {
        $atm = new AtmCrmModel;
        $subquery = $atm->select(DB::raw('max(tanggal) as max_date'))->first();
        $data = $atm
            ->select('kode_wil', DB::raw('count(id) as jumlah'))
            ->where('jenis_atm', $jenis_atm)
            ->where('tanggal', $subquery->max_date)
            ->whereRaw("kode_wil regexp '[0-9]'")
            ->groupBy('kode_wil')
            ->get();
        return $data;
    }

    public function getTotalAtm()
    {
        $atm = new AtmCrmModel;
        $subquery = $atm->select(DB::raw('max(tanggal) as max_date'))->first();
        $data = $atm
            ->select('jenis_atm', DB::raw('count(jenis_atm) as total'))
            ->where('tanggal', $subquery->max_date)
            ->groupBy('jenis_atm')
            ->get();
        return $data;
    }

    /**
     * Usage ATM CRM
     */
    public function getUsage($jenis_atm)
    {
        $now = Carbon::now()->format('Y');
        $total = new AtmCrmModel;
        $data = $total
            ->select(DB::raw('SUBSTRING(tanggal, 6, 2) as bulan'), DB::raw('sum(withd_usage) as jumlah_withd_usage'), DB::raw('sum(transfer_usage) as jumlah_transfer_usage'), DB::raw('sum(payment_usage) as jumlah_payment_usage'), DB::raw('sum(inquiry_usage) as jumlah_inquiry_usage'))
            ->where('jenis_atm', $jenis_atm)
            ->whereYear('tanggal', $now)
            ->groupBy(DB::raw('SUBSTRING(tanggal, 6, 2)'))
            ->get();
        return $data;
    }

    public function getUsageDaily($jenis_atm)
    {
        $now = Carbon::now()->format('Y');
        $total = new AtmCrmModel;
        $data = $total
            ->select('tanggal', 'withd_usage as jumlah_withd_usage', 'transfer_usage as jumlah_transfer_usage', 'payment_usage as jumlah_payment_usage', 'inquiry_usage as jumlah_inquiry_usage')
            ->where('jenis_atm', $jenis_atm)
            ->orderBy('tanggal', 'DESC')
            ->limit(30)->get();
        return $data;
    }

    /**
     * SL ATM CRM
     */
    public function getUsageSL(string $date, bool $kode_wil = false, string $type = null)
    {
        $atmCrm = new AtmCrmModel;

        $data = $atmCrm
            ->select()
            // ->where('bulan', date('2021-01-01'))
            ->whereBetween('tanggal', [
                date('Y-m-d', strtotime($date . '-01-01')),
                date('Y-m-d', strtotime($date . '-12-01'))
            ])
            ->whereRaw("kode_wil regexp '[0-9]'")
            ->when(isset($type), function ($query) use ($type) {
                $query->where('jenis_atm', $type);
            })
            ->when($kode_wil == true, function ($query) {
                $query->select(
                    DB::raw('substring(avg(service_level),1,5) as average_sl'),
                    'kode_wil'
                )->groupBy('kode_wil');
            })
            ->when($kode_wil == false, function ($query) {
                $query->select(
                    'tanggal', DB::raw('SUBSTRING(tanggal, 6, 2) as month'),
                    DB::raw('substring(avg(service_level),1,5) as average_sl')
                )->groupBy('tanggal');
            })
            ->get();
        return $data;
    }

    /**
     * Amount Trx ATM CRM
     */
    public function getAmountTrx($jenis_atm)
    {
        $now = Carbon::now()->format('Y');
        $total = new AtmCrmModel;
        $data = $total
        ->select(DB::raw('SUBSTRING(tanggal, 6, 2) as bulan'), DB::raw('sum(withd_amount) as jumlah_withd_amount'), DB::raw('sum(deposit_amount) as jumlah_deposit_amount'), DB::raw('sum(transfer_amount) as jumlah_transfer_amount'), DB::raw('sum(payment_amount) as jumlah_payment_amount'))
            ->where('jenis_atm', $jenis_atm)
            ->whereYear('tanggal', $now)
            ->groupBy(DB::raw('SUBSTRING(tanggal, 6, 2)'))
            ->get();
        return $data;
    }

    public function getListAtmCrm($tanggal1, $tanggal2, $jenis_atm)
    {
        
        if(isset($tanggal1) || isset($tanggal2) || isset($jenis_atm))
        {
            $query = AtmCrmModel::select('*');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            if(isset($jenis_atm))
            {
                $query->where('jenis_atm', $jenis_atm);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getAtmCrmById($id)
    {
        $query = AtmCrmModel::select('*')
        ->where('id', $id)->first();
        return $query;
    }

    public static function getAtmCrmReport($tanggal1, $tanggal2, $jenis_atm)
    {
        
        if(isset($tanggal1) || isset($tanggal2) || isset($jenis_atm))
        {
            $query = AtmCrmModel::select('*');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            if(isset($jenis_atm))
            {
                $query->where('jenis_atm', $jenis_atm);
            }

            return $query->get();
        }
    }

    public function getDailyUsage($jenis_atm)
    {
        $query = new AtmCrmModel;
        $data = $query
        ->select('tanggal_input', \DB::raw('sum(amount) as amount'))
        ->where('jenis_atm', $jenis_atm)
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'DESC')
        ->limit(31)->get();
        
        return $data;
    }

    public static function prosesDeleteAtmCrmBulk($tanggal1, $tanggal2, $jenis_atm)
    {
        
        if(isset($tanggal1) || isset($tanggal2) || isset($jenis_atm))
        {
            $query = AtmCrmModel::select('*');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            if(isset($jenis_atm))
            {
                $query->where('jenis_atm', $tanggal1);
            }

            return $query->delete();
        }
    }
}
