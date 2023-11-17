<?php

namespace App\Http\Controllers\IJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IJE\PemasanganEdc\PemasanganEdcImport;
use App\Models\IJE\PemasanganEdcModel;
use App\Imports\IJE\PemasanganEdc\UpdateBulkPemasanganEdcImport;
use App\Exports\IJE\PemasanganEdc\PemasanganEdcExport;

class PemasanganEdcController extends Controller
{
    public function formUploadPemasanganEdc(Request $request)
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
        return view('IJE.PemasanganEdc.formUploadPemasanganEdc', $passing);
    }

    public function prosesImportPemasanganEdc(Request $request)
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

            Excel::import(new PemasanganEdcImport, public_path("/Import/IJE/".$filename));
            
            unlink(base_path('public/Import/IJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Dispute Resolution Berhasil Di Upload');
        }
    }

    public function getListPemasanganEdc(Request $request)
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
        $listData = PemasanganEdcModel::getListPemasanganEdc($bulan1, $bulan2);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'listData' => $listData,
        );
        return view('IJE.PemasanganEdc.listPemasanganEdc', $passing);
    }

    public function formUpdatePemasanganEdc(Request $request)
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

        $detail = PemasanganEdcModel::getPemasanganEdcById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('IJE.PemasanganEdc.formUpdate', $passing);
    }

    public function prosesUpdatePemasanganEdc(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'bulan' => $request->bulan.'-01',
            'realisasi' => $request->realisasi,
            'pagu_kas' => $request->pagu_kas,
            'persentase_bulan' => $request->persentase_bulann,
            'persentase_ytd' => $request->persentase_ytd,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        PemasanganEdcModel::where('id', $request->id)->update($data);

        return redirect('IJE/PemasanganEdc/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkPemasanganEdc(Request $request)
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
        return view('IJE.PemasanganEdc.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkPemasanganEdc(Request $request)
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

            Excel::import(new UpdateBulkPemasanganEdcImport, public_path("/Import/IJE/".$filename));
            unlink(base_path('public/Import/IJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Pemasangan EDC Berhasil Di Update');
        }
    }

    public function exportReportPemasanganEdc(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;

        return Excel::download(new PemasanganEdcExport($bulan1, $bulan2), "Report Pemasangan EDC.xlsx");
    }

    public function prosesDeletePemasanganEdc(Request $request)
    {
        PemasanganEdcModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeletePemasanganEdcBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        PemasanganEdcModel::whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
