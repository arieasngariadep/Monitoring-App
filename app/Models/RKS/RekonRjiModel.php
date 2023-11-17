<?php

namespace App\Models\RKS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekonRjiModel extends Model{

    protected $table = 'rekon_rji';
    protected $guarded = [];
    public $timestamps = false;

    public function getAll(){
        $data = RekonRjiModel::select('*')->get();
        return $data;
    }

    public function getByIdRekonRji($id){
        $query = RekonRjiModel::select('*')->where('id', $id)->first();
        return $query;
    }

    public function getAcquiring(){
        $data = RekonRjiModel::select('*')->where('jenis_rekon','acquiring')->get();
        return $data;
    }

    public function getIssuer(){
        $data = RekonRjiModel::select('*')->where('jenis_rekon','issuer')->get();
        return $data;
    }

    public function getPayment(){
        $data = RekonRjiModel::select('*')->where('jenis_rekon','payment')->get();
        return $data;
    }

    public function getTotalRekonRji(){
        $data = RekonRjiModel::select(DB::raw('sum(item_trx) as item_trx'),DB::raw('sum(nominal) as nominal'),DB::raw('sum(item_trx_match) as item_trx_match'),DB::raw('sum(nominal_trx_match) as nominal_trx_match'),DB::raw('sum(item_trx_unmatch) as item_trx_unmatch'),DB::raw('sum(nominal_trx_unmatch) as nominal_trx_unmatch'))->get();
        return $data;
    }
}

?>