<?php

namespace App\Models\IJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KomplainModel extends Model
{
    protected $table = 'komplain';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataKomplain($jenis_komplain, $year)
    {
        $komplain =  new KomplainModel;
        $data = $komplain
        ->select('*', DB::raw('substring(bulan, 6, 2) as bulan'))
        ->where('jenis_komplain', $jenis_komplain)
        ->whereYear('bulan', $year)
        ->get();
        return $data;
    }

    public function getListKomplain($bulan1, $bulan2, $jenis_komplain)
    {
        
        if(isset($bulan1) || isset($bulan2) || isset($jenis_komplain))
        {
            $query = KomplainModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            if(isset($jenis_komplain))
            {
                $query->where('jenis_komplain', $jenis_komplain);
            }
            
            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getKomplainById($id)
    {
        $query = KomplainModel::select('*', DB::raw('substring(bulan, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getKomplainReport($bulan1, $bulan2, $jenis_komplain)
    {
        
        if(isset($bulan1) || isset($bulan2) || isset($jenis_komplain))
        {
            $query = KomplainModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            if(isset($jenis_komplain))
            {
                $query->where('jenis_komplain', $jenis_komplain);
            }

            return $query->get();
        }
    }

    public function deleteBulkKomplain($bulan1, $bulan2, $jenis_komplain)
    {
        
        if(isset($bulan1) || isset($bulan2) || isset($jenis_komplain))
        {
            $query = KomplainModel::select('*');

            if(isset($bulan1) && isset($bulan2))
            {
                $query->whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2]);
            }

            if(isset($jenis_komplain))
            {
                $query->where('jenis_komplain', $jenis_komplain);
            }

            return $query->delete();
        }
    }
}
