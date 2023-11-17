<?php

namespace App\Models\RKDA;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AntarBankModel extends Model
{
    protected $table = 'antar_bank';
    protected $guarded = [];
    public $timestamps = false;

    public function getAntarBank($year)
    {
        $query = new AntarBankModel;
        $data = $query
        ->select('*')
        ->whereYear('tanggal', $year)
        ->get();
        return $data;
    }

    public function getListAntarBank($tanggal1, $tanggal2)
    {
        
        if(isset($tanggal1) || isset($tanggal2))
        {
            $query = AntarBankModel::select('*');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getAntarBankById($id)
    {
        $query = AntarBankModel::select('*')
        ->where('id', $id)->first();
        return $query;
    }

    public static function getAntarBankReport($tanggal1, $tanggal2)
    {
        
        if(isset($tanggal1) || isset($tanggal2))
        {
            $query = AntarBankModel::select('*');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            return $query->get();
        }
    }

    public function getWdVsTf()
    {
        $antarbank = new AntarBankModel;
        $data = $antarbank
        ->select('tanggal', DB::raw('(total_hak_trx_wd + total_kwj_trx_wd) as total_trx_wd'), DB::raw('(total_hak_amount_wd + total_kwj_amount_wd) as total_amount_wd'), DB::raw('(total_hak_trx_trf + total_kwj_trx_trf) as total_trx_trf'), DB::raw('(total_hak_amount_trf + total_kwj_amount_trf) as total_amount_trf'), DB::raw('((total_hak_trx_wd + total_kwj_trx_wd) - (total_hak_trx_trf + total_kwj_trx_trf)) as total_trx_net'), DB::raw('((total_hak_amount_wd + total_kwj_amount_wd) - (total_hak_amount_trf + total_kwj_amount_trf)) as total_amount_net'))
        ->orderBy('tanggal', 'DESC')
        ->limit(30)->get();
        return $data;
    }

    public function getKwjVsHak()
    {
        $antarbank = new AntarBankModel;
        $data = $antarbank
        ->select('tanggal', DB::raw('(total_kwj_trx_wd + total_kwj_trx_trf) as total_trx_kwj'), DB::raw('(total_kwj_amount_wd + total_kwj_amount_trf) as total_amount_kwj'), DB::raw('(total_hak_trx_wd + total_hak_trx_trf) as total_trx_hak'), DB::raw('(total_hak_amount_wd + total_hak_amount_trf) as total_amount_hak'), DB::raw('((total_hak_trx_wd + total_hak_trx_trf) - (total_kwj_trx_wd + total_kwj_trx_trf)) as total_trx_net'), DB::raw('((total_hak_amount_wd + total_hak_amount_trf) - (total_kwj_amount_wd + total_kwj_amount_trf)) as total_amount_net'))
        ->orderBy('tanggal', 'DESC')
        ->limit(30)->get();
        return $data;
    }
}
