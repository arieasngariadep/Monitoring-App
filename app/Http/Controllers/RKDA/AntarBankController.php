<?php

namespace App\Http\Controllers\RKDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use App\Models\RKDA\AntarBankModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RKDA\AntarBank\AntarBankImport;
use App\Imports\RKDA\AntarBank\UpdateBulkAntarBankImport;
use App\Exports\RKDA\AntarBank\AntarBankExport;

class AntarBankController extends Controller
{
    public function formUploadAntarBank(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }

        $passing = array(
            'alert' => $showalert,
        );
        return view('RKDA.AntarBank.formUploadAntarBank', $passing);
    }

    public function prosesImportAntarBank(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); // Set your country name from below timezone list
        $userId = $request->session()->get('userId');
        $ekstensi_file = array($request->file('file_import')->getClientOriginalExtension());
        $extensions = array("xlsx", "xls", "csv");

        if(!in_array($ekstensi_file[0], $extensions)){
            return redirect()->back()->with('alert', 'Format file yang anda upload bukan Excel');
        }else{
            $file = $request->file('file_import');
            $filename = $file->getClientOriginalName();
            $file->move(\base_path() ."/public/Import/RKDA/", $filename);

            Excel::import(new AntarBankImport, public_path("/Import/RKDA/".$filename));
            unlink(base_path('public/Import/RKDA/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Antar Bank Berhasil Di Upload');
        }
    }

    public function getListAntarBank(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }

        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $listData = AntarBankModel::getListAntarBank($tanggal1, $tanggal2);

        $passing = array(
            'alert' => $showalert,
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
            'listData' => $listData,
        );
        return view('RKDA.AntarBank.listAntarBank', $passing);
    }

    public function formUpdateAntarBank(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }

        $detail = AntarBankModel::getAntarBankById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('RKDA.AntarBank.formUpdate', $passing);
    }

    public function prosesUpdateAntarBank(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $hak_trx_wd_link = $request->hak_trx_wd_link;
        $hak_amount_wd_link = $request->hak_amount_wd_link;
        $hak_trx_wd_mp = $request->hak_trx_wd_mp;
        $hak_amount_wd_mp = $request->hak_amount_wd_mp;
        $hak_trx_wd_prima = $request->hak_trx_wd_prima;
        $hak_amount_wd_prima = $request->hak_amount_wd_prima;
        $hak_trx_wd_bersama = $request->hak_trx_wd_bersama;
        $hak_amount_wd_bersama = $request->hak_amount_wd_bersama;
        $hak_trx_wd_alto = $request->hak_trx_wd_alto;
        $hak_amount_wd_alto = $request->hak_amount_wd_alto;

        $total_hak_trx_wd = $hak_trx_wd_link + $hak_trx_wd_mp + $hak_trx_wd_prima + $hak_trx_wd_bersama+ $hak_trx_wd_alto;
        $total_hak_amount_wd = $hak_amount_wd_link + $hak_amount_wd_mp + $hak_amount_wd_prima + $hak_amount_wd_bersama+ $hak_amount_wd_alto;

        $hak_trx_trf_link = $request->hak_trx_trf_link;
        $hak_amount_trf_link = $request->hak_amount_trf_link;
        $hak_trx_trf_mp = $request->hak_trx_trf_mp;
        $hak_amount_trf_mp = $request->hak_amount_trf_mp;
        $hak_trx_trf_prima = $request->hak_trx_trf_prima;
        $hak_amount_trf_prima = $request->hak_amount_trf_prima;
        $hak_trx_trf_bersama = $request->hak_trx_trf_bersama;
        $hak_amount_trf_bersama = $request->hak_amount_trf_bersama;
        $hak_trx_trf_alto = $request->hak_trx_trf_alto;
        $hak_amount_trf_alto = $request->hak_amount_trf_alto;

        $total_hak_trx_trf = $hak_trx_trf_link + $hak_trx_trf_mp + $hak_trx_trf_prima + $hak_trx_trf_bersama + $hak_trx_trf_alto;
        $total_hak_amount_trf = $hak_amount_trf_link + $hak_amount_trf_mp + $hak_amount_trf_prima + $hak_amount_trf_bersama + $hak_amount_trf_alto;

        $kwj_trx_wd_link = $request->kwj_trx_wd_link;
        $kwj_amount_wd_link = $request->kwj_amount_wd_link;
        $kwj_trx_wd_mp = $request->kwj_trx_wd_mp;
        $kwj_amount_wd_mp = $request->kwj_amount_wd_mp;
        $kwj_trx_wd_prima = $request->kwj_trx_wd_prima;
        $kwj_amount_wd_prima = $request->kwj_amount_wd_prima;
        $kwj_trx_wd_bersama = $request->kwj_trx_wd_bersama;
        $kwj_amount_wd_bersama = $request->kwj_amount_wd_bersama;
        $kwj_trx_wd_alto = $request->kwj_trx_wd_alto;
        $kwj_amount_wd_alto = $request->kwj_amount_wd_alto;

        $total_kwj_trx_wd = $kwj_trx_wd_link + $kwj_trx_wd_mp + $kwj_trx_wd_prima + $kwj_trx_wd_bersama + $kwj_trx_wd_alto;
        $total_kwj_amount_wd = $kwj_amount_wd_link + $kwj_amount_wd_mp + $kwj_amount_wd_prima + $kwj_amount_wd_bersama + $kwj_amount_wd_alto;

        $kwj_trx_trf_link = $request->kwj_trx_trf_link;
        $kwj_amount_trf_link = $request->kwj_amount_trf_link;
        $kwj_trx_trf_mp = $request->kwj_trx_trf_mp;
        $kwj_amount_trf_mp = $request->kwj_amount_trf_mp;
        $kwj_trx_trf_prima = $request->kwj_trx_trf_prima;
        $kwj_amount_trf_prima = $request->kwj_amount_trf_prima;
        $kwj_trx_trf_bersama = $request->kwj_trx_trf_bersama;
        $kwj_amount_trf_bersama = $request->kwj_amount_trf_bersama;
        $kwj_trx_trf_alto = $request->kwj_trx_trf_alto;
        $kwj_amount_trf_alto = $request->kwj_amount_trf_alto;

        $total_kwj_trx_trf = $kwj_trx_trf_link + $kwj_trx_trf_mp + $kwj_trx_trf_prima + $kwj_trx_trf_bersama + $kwj_trx_trf_alto;
        $total_kwj_amount_trf = $kwj_amount_trf_link + $kwj_amount_trf_mp + $kwj_amount_trf_prima + $kwj_amount_trf_bersama + $kwj_amount_trf_alto;

        $data = array(
            'tanggal' => $request->tanggal,
            'hak_trx_wd_link' => $hak_trx_wd_link,
            'hak_amount_wd_link' => $hak_amount_wd_link,
            'hak_trx_wd_mp' => $hak_trx_wd_mp,
            'hak_amount_wd_mp' => $hak_amount_wd_mp,
            'hak_trx_wd_prima' => $hak_trx_wd_prima,
            'hak_amount_wd_prima' => $hak_amount_wd_prima,
            'hak_trx_wd_bersama' => $hak_trx_wd_bersama,
            'hak_amount_wd_bersama' => $hak_amount_wd_bersama,
            'hak_trx_wd_alto' => $hak_trx_wd_alto,
            'hak_amount_wd_alto' => $hak_amount_wd_alto,
            'total_hak_trx_wd' => $total_hak_trx_wd,
            'total_hak_amount_wd' => $total_hak_amount_wd,
            'hak_trx_trf_link' => $hak_trx_trf_link,
            'hak_amount_trf_link' => $hak_amount_trf_link,
            'hak_trx_trf_mp' => $hak_trx_trf_mp,
            'hak_amount_trf_mp' => $hak_amount_trf_mp,
            'hak_trx_trf_prima' => $hak_trx_trf_prima,
            'hak_amount_trf_prima' => $hak_amount_trf_prima,
            'hak_trx_trf_bersama' => $hak_trx_trf_bersama,
            'hak_amount_trf_bersama' => $hak_amount_trf_bersama,
            'hak_trx_trf_alto' => $hak_trx_trf_alto,
            'hak_amount_trf_alto' => $hak_amount_trf_alto,
            'total_hak_trx_trf' => $total_hak_trx_trf,
            'total_hak_amount_trf' => $total_hak_amount_trf,
            'kwj_trx_wd_link' => $kwj_trx_wd_link,
            'kwj_amount_wd_link' => $kwj_amount_wd_link,
            'kwj_trx_wd_mp' => $kwj_trx_wd_mp,
            'kwj_amount_wd_mp' => $kwj_amount_wd_mp,
            'kwj_trx_wd_prima' => $kwj_trx_wd_prima,
            'kwj_amount_wd_prima' => $kwj_amount_wd_prima,
            'kwj_trx_wd_bersama' => $kwj_trx_wd_bersama,
            'kwj_amount_wd_bersama' => $kwj_amount_wd_bersama,
            'kwj_trx_wd_alto' => $kwj_trx_wd_alto,
            'kwj_amount_wd_alto' => $kwj_amount_wd_alto,
            'total_kwj_trx_wd' => $total_kwj_trx_wd,
            'total_kwj_amount_wd' => $total_kwj_amount_wd,
            'kwj_trx_trf_link' => $kwj_trx_trf_link,
            'kwj_amount_trf_link' => $kwj_amount_trf_link,
            'kwj_trx_trf_mp' => $kwj_trx_trf_mp,
            'kwj_amount_trf_mp' => $kwj_amount_trf_mp,
            'kwj_trx_trf_prima' => $kwj_trx_trf_prima,
            'kwj_amount_trf_prima' => $kwj_amount_trf_prima,
            'kwj_trx_trf_bersama' => $kwj_trx_trf_bersama,
            'kwj_amount_trf_bersama' => $kwj_amount_trf_bersama,
            'kwj_trx_trf_alto' => $kwj_trx_trf_alto,
            'kwj_amount_trf_alto' => $kwj_amount_trf_alto,
            'total_kwj_trx_trf' => $total_kwj_trx_trf,
            'total_kwj_amount_trf' => $total_kwj_amount_trf,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        AntarBankModel::where('id', $request->id)->update($data);

        return redirect('RKDA/AntarBank/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkAntarBank(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }

        $passing = array(
            'alert' => $showalert,
        );
        return view('RKDA.AntarBank.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkAntarBank(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); // Set your country name from below timezone list
        $userId = $request->session()->get('userId');
        $ekstensi_file = array($request->file('file_import')->getClientOriginalExtension());
        $extensions = array("xlsx", "xls", "csv");

        if(!in_array($ekstensi_file[0], $extensions)){
            return redirect()->back()->with('alert', 'Format file yang anda upload bukan Excel');
        }else{
            $file = $request->file('file_import');
            $filename = $file->getClientOriginalName();
            $file->move(\base_path() ."/public/Import/RKDA/", $filename);

            Excel::import(new UpdateBulkAntarBankImport, public_path("/Import/RKDA/".$filename));
            unlink(base_path('public/Import/RKDA/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Antar Bank Berhasil Di Update');
        }
    }

    public function exportReportAntarBank(Request $request)
    {
        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;

        return Excel::download(new AntarBankExport($tanggal1, $tanggal2), "Report Antar Bank.xlsx");
    }

    public function prosesDeleteAntarBank(Request $request)
    {
        AntarBankModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteAntarBankBulk(Request $request)
    {
        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        AntarBankModel::whereBetween(DB::raw('substring(tanggal, 1, 7)'), [$tanggal1, $tanggal2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
