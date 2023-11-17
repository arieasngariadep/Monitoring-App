<?php

namespace App\Models\PJE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OosModel extends Model
{
    protected $table = 'oos';
    protected $guarded = [];
    public $timestamps = false;

    public function getOosMonthly($date)
    {
        $oos = new OosModel;
        $data = $oos
        ->select(DB::raw('substring(tanggal, 6, 2) as bulan'), DB::raw('avg(avg) as rata2'))
        ->whereYear('tanggal', $date)
        ->groupBy(DB::raw('substring(tanggal, 6, 2)'))
        ->get();
        return $data;
    }

    public function getOosDaily()
    {
        $oos = new OosModel;
        $subquery = $oos->select(DB::raw('max(substring(tanggal, 1, 7)) as max_date'))->first();
        $data = $oos
        ->select('tanggal', 'avg')
        ->where(DB::raw('substring(tanggal, 1, 7)'), $subquery->max_date)
        ->get();
        return $data;
    }

    public function getListOos($tanggal1, $tanggal2)
    {
        
        if(isset($tanggal1) || isset($tanggal2))
        {
            $query = OosModel::select('id', 'tanggal' ,'00:00 as satu', '02:00 as dua', '04:00 as tiga', '05:00 as empat', '05:30 as lima', '06:00 as enam', '06:30 as tujuh', '07:00 as delapan', '07:30 as sembilan', '08:00 as sepuluh', '08:30 as sebelas', '09:00 as duabelas', '09:30 as tigabelas', '10:00 as empatbelas', '10:30 as limabelas', '11:00 as enambelas', '11:30 as tujuhbelas', '12:00 as delapanbelas', '12:30 as sembilanbelas', '13:00 as duapuluh', '13:30 as duapuluhsatu', '14:00 as duapuluhdua', '14:30 as duapuluhtiga', '15:00 as duapuluhempat', '15:30 as duapuluhlima', '16:00 as duapuluhenam', '16:30 as duapuluhtujuh', '17:00 as duapuluhdelapan', '17:30 as duapuluhsembilan', '18:00 as tigapuluh', '18:30 as tigapuluhsatu', '19:00 as tigapuluhdua', '19:30 as tigapuluhtiga', '20:00 as tigapuluhempat', '20:30 as tigapuluhlima', '21:00 as tigapuluhenam', '21:30 as tigapuluhtujuh', '22:00 as tigapuluhdelapan', 'avg');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            $listData = $query->paginate(8);

            return $listData->appends(\Request::all());
        }
    }

    public function getOosById($id)
    {
        $query = OosModel::select('id', 'tanggal' ,'00:00 as satu', '02:00 as dua', '04:00 as tiga', '05:00 as empat', '05:30 as llima', '06:00 as enam', '06:30 as tujuh', '07:00 as delapan', '07:30 as sembilan', '08:00 as sepuluh', '08:30 as sebelas', '09:00 as duabelas', '09:30 as tigabelas', '10:00 as empatbelas', '10:30 as limabelas', '11:00 as enambelas', '11:30 as tujuhbelas', '12:00 as sembilanbelas', '12:30 as duapuluh', '13:00 as duapuluhsatu', '13:30 as duapuluhdua', '14:00 as duapuluhtiga', '14:30 as duapuluhempat', '15:00 as duapuluhlima', '15:30 as duapuluhenam', '16:00 as duapuluhtujuh', '16:30 as duapuluhdelapan', '17:00 as duapuluhsembilan', '17:30 as tigapuluh', '18:00 as tigapuluhsatu', '18:30 as tigapuluhdua', '19:00 as tigapuluhempat', '19:30 as tigapuluhlima', '20:00 as tigapuluhenam', '20:30 as tigapuluhtujuh', '21:00 as tigapuluhdelapan', '21:30 as tigapuluhsembilan', '22:00 as empatpuluh', 'avg')
        ->where('id', $id)->first();
        return $query;
    }

    public static function getOosReport($tanggal1, $tanggal2)
    {
        
        if(isset($tanggal1) || isset($tanggal2))
        {
            $query = OosModel::select('id', 'tanggal' ,'00:00 as satu', '02:00 as dua', '04:00 as tiga', '05:00 as empat', '05:30 as llima', '06:00 as enam', '06:30 as tujuh', '07:00 as delapan', '07:30 as sembilan', '08:00 as sepuluh', '08:30 as sebelas', '09:00 as duabelas', '09:30 as tigabelas', '10:00 as empatbelas', '10:30 as limabelas', '11:00 as enambelas', '11:30 as tujuhbelas', '12:00 as sembilanbelas', '12:30 as duapuluh', '13:00 as duapuluhsatu', '13:30 as duapuluhdua', '14:00 as duapuluhtiga', '14:30 as duapuluhempat', '15:00 as duapuluhlima', '15:30 as duapuluhenam', '16:00 as duapuluhtujuh', '16:30 as duapuluhdelapan', '17:00 as duapuluhsembilan', '17:30 as tigapuluh', '18:00 as tigapuluhsatu', '18:30 as tigapuluhdua', '19:00 as tigapuluhempat', '19:30 as tigapuluhlima', '20:00 as tigapuluhenam', '20:30 as tigapuluhtujuh', '21:00 as tigapuluhdelapan', '21:30 as tigapuluhsembilan', '22:00 as empatpuluh', 'avg');

            if(isset($tanggal1) && isset($tanggal2))
            {
                $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
            }

            return $query->get();
        }
    }
}
