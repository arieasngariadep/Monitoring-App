<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AvailibilityEdcModel extends Model
{
    protected $table = 'availibility_edc';
    protected $guarded = [];
    public $timestamps = false;

    public function getAvailibilityEdc()
    {
        $year = carbon::now()->format('Y');
        $edc = new AvailibilityEdcModel;
        $data = $edc
            ->select(DB::raw('substring(bulan, 6, 2) as bulan'), 'total_tid', 'tid_trx', 'availability_bulan')
            ->whereYear('bulan', $year)
            ->get();
        return $data;
    }

    public function getListAvailibilityEdc($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = AvailibilityEdcModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getAvailibilityEdcById($id)
    {
        $query = AvailibilityEdcModel::select('*', DB::raw('substring(bulan, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getAvailibilityEdcReport($bulan1, $bulan2)
    {
        
        if(isset($bulan1) || isset($bulan2))
        {
            $query = AvailibilityEdcModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            return $query->get();
        }
    }
}
