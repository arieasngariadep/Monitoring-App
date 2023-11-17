<?php

namespace App\Models\RKDA;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekonsiliasiModel extends Model
{
    protected $table = 'rekonsiliasi';
    protected $guarded = [];
    public $timestamps = false;

    public function getDataRekon($year)
    {
        $rekon = new RekonsiliasiModel;
        $data = $rekon
        ->select('*', DB::raw('substring(bulan, 6, 2) as bulan'))
        ->whereYear('bulan', $year)
        ->get();
        return $data;
    }
}

?>
