<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KasModel extends Model
{
    protected $table = 'kas';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataKas($year)
    {
        $kas =  new KasModel;
        $data = $kas
        ->select('*', DB::raw('substring(periode, 6, 2) as bulan'))
        ->whereYear('periode', $year)
        ->get();
        return $data;
    }

    public function getListKas($periode1, $periode2)
    {
        
        if(isset($periode1) || isset($periode2))
        {
            $query = KasModel::select('*');

            if(isset($periode1) && isset($periode2))
            {
                $query->whereBetween(DB::raw('substring(periode, 1, 7)'), [$periode1, $periode2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getKasById($id)
    {
        $query = KasModel::select('*', DB::raw('substring(periode, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getKasReport($periode1, $periode2)
    {
        
        if(isset($periode1) || isset($periode2))
        {
            $query = KasModel::select('*');

            if(isset($periode1) && isset($periode2))
            {
                $query->whereBetween(DB::raw('substring(periode, 1, 7)'), [$periode1, $periode2]);
            }

            return $query->get();
        }
    }
}
