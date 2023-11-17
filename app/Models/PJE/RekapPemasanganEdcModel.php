<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekapPemasanganEdcModel extends Model
{
    protected $table = 'rekap_pemasangan_edc';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataRekapPemasanganEdc()
    {
        $edc =  new RekapPemasanganEdcModel;
        $data = $edc
        ->select('*')
        ->get();
        return $data;
    }

    public function getWilayah()
    {
        $edc =  new RekapPemasanganEdcModel;
        $data = $edc
        ->select('wilayah')->groupBy('wilayah')->get();
        return $data;
    }

    public function getListRekapPemasanganEdc($wilayah)
    {
        
        if(isset($wilayah))
        {
            $query = RekapPemasanganEdcModel::select('*');

            if(isset($wilayah))
            {
                $query->where('wilayah', $wilayah);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getRekapPemasanganEdcById($id)
    {
        $query = RekapPemasanganEdcModel::select('*')
        ->where('id', $id)->first();
        return $query;
    }

    public static function getRekapPemasanganEdcReport($wilayah)
    {
        
        if(isset($wilayah))
        {
            $query = RekapPemasanganEdcModel::select('*');

            if(isset($wilayah))
            {
                $query->where('wilayah', $wilayah);
            }

            return $query->get();
        }
    }
}
