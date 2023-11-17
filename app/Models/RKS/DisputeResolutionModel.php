<?php

namespace App\Models\RKS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DisputeResolutionModel extends Model
{
    protected $table = 'dispute_resolution';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataDisputeR($year)
    {
        $dispute = new DisputeResolutionModel;
        $data = $dispute
        ->select('*', DB::raw('substring(periode, 6, 2) as bulan'))
        ->whereYear('periode', $year)
        ->get();
        return $data;
    }

    public function getListDisputeResolution($periode1, $periode2)
    {
        
        if(isset($periode1) || isset($periode2))
        {
            $query = DisputeResolutionModel::select('*');

            if(isset($periode1) && isset($periode2))
            {
                $query->whereBetween(DB::raw('substring(periode, 1, 7)'), [$periode1, $periode2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getDisputeResolutionById($id)
    {
        $query = DisputeResolutionModel::select('*', DB::raw('substring(periode, 1, 7) as monthYear'))
        ->where('id', $id)->first();
        return $query;
    }

    public static function getDisputeResolutionReport($periode1, $periode2)
    {
        
        if(isset($periode1) || isset($periode2))
        {
            $query = DisputeResolutionModel::select('*');

            if(isset($periode1) && isset($periode2))
            {
                $query->whereBetween(DB::raw('substring(periode, 1, 7)'), [$periode1, $periode2]);
            }

            return $query->get();
        }
    }
}

?>
