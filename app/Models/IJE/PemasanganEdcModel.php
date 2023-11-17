<?php

namespace App\Models\IJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PemasanganEdcModel extends Model
{
    protected $table = 'pemasangan_edc';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataPemasanganEdc($year)
    {
        $edc = new PemasanganEdcModel;
        $data = $edc
        ->select('*', DB::raw('substring(bulan, 6, 2) as bulan'))
        ->whereYear('bulan', $year)
        ->get();
        return $data;
    }

    public function getListPemasanganEdc($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = PemasanganEdcModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getPemasanganEdcById($id)
    {
        $query = PemasanganEdcModel::select('*', DB::raw('substring(bulan, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getPemasanganEdcReport($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = PemasanganEdcModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            return $query->get();
        }
    }
}
