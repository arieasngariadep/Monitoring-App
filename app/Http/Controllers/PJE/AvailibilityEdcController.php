<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PJE\AvailibilityEdcImport;
use App\Models\PJE\AvailibilityEdcModel;
use App\Imports\PJE\AvailibilityEdc\UpdateBulkAvailibilityEdcImport;
use App\Exports\PJE\AvailibilityEdc\AvailibilityEdcExport;

class AvailibilityEdcController extends Controller
{
    public function formUploadAvailibilityEdc(Request $request)
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
        return view('PJE.AvailibilityEdc.formUploadAvailibilityEdc', $passing);
    }

    public function prosesImportAvailibilityEdc(Request $request)
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
            $file->move(\base_path() ."/public/Import/PJE/", $filename);

            Excel::import(new AvailibilityEdcImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Availibility EDC Berhasil Di Upload');
        }
    }

    public function getListAvailibilityEdc(Request $request)
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
        $listData = AvailibilityEdcModel::getListAvailibilityEdc($bulan1, $bulan2);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'listData' => $listData,
        );
        return view('PJE.AvailibilityEdc.listAvailibilityEdc', $passing);
    }

    public function formUpdateAvailibilityEdc(Request $request)
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

        $detail = AvailibilityEdcModel::getAvailibilityEdcById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('PJE.AvailibilityEdc.formUpdate', $passing);
    }

    public function prosesUpdateAvailibilityEdc(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'bulan' => $request->bulan.'-01',
            'total_mid' => $request->total_mid,
            'total_tid' => $request->total_tid,
            'tid_tidak_trx' => $request->tid_tidak_trx,
            'tid_trx' => $request->tid_trx,
            'availability_bulan' => $request->availability_bulan,
            'availability_ytd' => $request->availability_ytd,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        AvailibilityEdcModel::where('id', $request->id)->update($data);

        return redirect('pje/AvailibilityEdc/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkAvailibilityEdc(Request $request)
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
        return view('PJE.AvailibilityEdc.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkAvailibilityEdc(Request $request)
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
            $file->move(\base_path() ."/public/Import/PJE/", $filename);

            Excel::import(new UpdateBulkAvailibilityEdcImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Availibility EDC Berhasil Di Update');
        }
    }

    public function exportReportAvailibilityEdc(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;

        return Excel::download(new AvailibilityEdcExport($bulan1, $bulan2), "Report Availibility EDC.xlsx");
    }

    public function prosesDeleteAvailibilityEdc(Request $request)
    {
        AvailibilityEdcModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteAvailibilityEdcBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        AvailibilityEdcModel::whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
