<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AvailibilityAtmModel extends Model
{
    protected $table = 'availibility_atm';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataAvailibilityAtm($year)
    {
        $atm = new AvailibilityAtmModel;
        $data = $atm
        ->select('*', DB::raw('substring(bulan, 6, 2) as bulan'))
        ->whereYear('bulan', $year)
        ->get();
        return $data;
    }

    public function getListAvailibilityAtm($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = AvailibilityAtmModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getAvailibilityAtmById($id)
    {
        $query = AvailibilityAtmModel::select('*', DB::raw('substring(bulan, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getAvailibilityAtmReport($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = AvailibilityAtmModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            return $query->get();
        }
    }
}
