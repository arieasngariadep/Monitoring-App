<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaguKasModel extends Model
{
    protected $table = 'pagu_kas';
    protected $guarded = [];
    public $timestamps = false;

    public function getPaguKas($year)
    {
        $pagu = new PaguKasModel;
        $data = $pagu
        ->select('*', DB::raw('substring(bulan, 6, 2) as bulan'))
        ->whereYear('bulan', $year)
        ->get();
        return $data;
    }

    public function getListPaguKas($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = PaguKasModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getPaguKasById($id)
    {
        $query = PaguKasModel::select('*', DB::raw('substring(bulan, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getPaguKasReport($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = PaguKasModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            return $query->get();
        }
    }
}
