<?php

namespace App\Http\Controllers\IJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IJE\Komplain\KomplainAtmImport;
use App\Imports\IJE\Komplain\KomplainEdcImport;
use App\Models\IJE\KomplainModel;
use App\Imports\IJE\Komplain\UpdateBulkKomplainAtmImport;
use App\Imports\IJE\Komplain\UpdateBulkKomplainEdcImport;
use App\Exports\IJE\Komplain\KomplainExport;

class KomplainController extends Controller
{
    public function formUploadKomplain(Request $request)
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
        return view('IJE.Komplain.formUploadKomplain', $passing);
    }

    public function prosesImportKomplain(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); // Set your country name from below timezone list
        $userId = $request->session()->get('userId');
        $ekstensi_file = array($request->file('file_import')->getClientOriginalExtension());
        $extensions = array("xlsx", "xls", "csv");

        if(!in_array($ekstensi_file[0], $extensions)){
            return redirect()->back()->with('alert', 'Format file yang anda upload bukan Excel');
        }elseif($request->jenis_komplain == NULL){
            return redirect()->back()->with('alert', 'Silahkan Pilih Jenis Komplain');
        }else{
            $file = $request->file('file_import');
            $filename = $file->getClientOriginalName();
            $file->move(\base_path() ."/public/Import/IJE/", $filename);

            if($request->jenis_komplain == 'ATM')
            {
                Excel::import(new KomplainAtmImport, public_path("/Import/IJE/".$filename));
            }else{
                Excel::import(new KomplainEDCImport, public_path("/Import/IJE/".$filename));
            }
            
            unlink(base_path('public/Import/IJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Komplain Berhasil Di Upload');
        }
    }

    public function getListKomplain(Request $request)
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

        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        $jenis_komplain = $request->jenis_komplain;
        $listData = KomplainModel::getListKomplain($bulan1, $bulan2, $jenis_komplain);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'jenis_komplain' => $jenis_komplain,
            'listData' => $listData,
        );
        return view('IJE.Komplain.listKomplain', $passing);
    }

    public function formUpdateKomplain(Request $request)
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

        $detail = KomplainModel::getKomplainById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('IJE.Komplain.formUpdate', $passing);
    }

    public function prosesUpdateKomplain(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'bulan' => $request->bulan.'-01',
            'jumlah_sesuai' => $request->jumlah_sesuai,
            'persentase_sesuai' => $request->persentase_sesuai,
            'jumlah_tidak_sesuai' => $request->jumlah_tidak_sesuai,
            'persentase_tidak_sesuai' => $request->persentase_tidak_sesuai,
            'jumlah_komplain' => $request->jumlah_komplain,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        KomplainModel::where('id', $request->id)->update($data);

        return redirect('IJE/Komplain/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkKomplain(Request $request)
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
        return view('IJE.Komplain.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkKomplain(Request $request)
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
            $file->move(\base_path() ."/public/Import/IJE/", $filename);

            if($request->jenis_komplain == 'ATM')
            {
                Excel::import(new UpdateBulkKomplainAtmImport, public_path("/Import/IJE/".$filename));
            }else{
                Excel::import(new UpdateBulkKomplainEdcImport, public_path("/Import/IJE/".$filename));
            }

            unlink(base_path('public/Import/IJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Komplain Berhasil Di Update');
        }
    }

    public function exportReportKomplain(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        $jenis_komplain = $request->jenis_komplain;
        if($jenis_komplain == 'ATM')
        {
            $judul = 'ATM & E-Channel';
        }else{
            $judul = 'EDC';
        }

        return Excel::download(new KomplainExport($bulan1, $bulan2, $jenis_komplain), "Report Komplain $judul.xlsx");
    }

    public function prosesDeleteKomplain(Request $request)
    {
        KomplainModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteKomplainBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        $jenis_komplain = $request->jenis_komplain;
        KomplainModel::deleteBulkKomplain($bulan1, $bulan2, $jenis_komplain);

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
