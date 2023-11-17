<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PJE\AvailibilityAtm\AvailibilityAtmImport;
use App\Models\PJE\AvailibilityAtmModel;
use App\Imports\PJE\AvailibilityAtm\UpdateBulkAvailibilityAtmImport;
use App\Exports\PJE\AvailibilityAtm\AvailibilityAtmExport;

class AvailibilityAtmController extends Controller
{
    public function formUploadAvailibilityAtm(Request $request)
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
        return view('PJE.AvailibilityAtm.formUploadAvailibilityAtm', $passing);
    }

    public function prosesImportAvailibilityAtm(Request $request)
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

            Excel::import(new AvailibilityAtmImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Availibility ATM Berhasil Di Upload');
        }
    }

    public function getListAvailibilityAtm(Request $request)
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
        $listData = AvailibilityAtmModel::getListAvailibilityAtm($bulan1, $bulan2);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'listData' => $listData,
        );
        return view('PJE.AvailibilityAtm.listAvailibilityAtm', $passing);
    }

    public function formUpdateAvailibilityAtm(Request $request)
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

        $detail = AvailibilityAtmModel::getAvailibilityAtmById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('PJE.AvailibilityAtm.formUpdate', $passing);
    }

    public function prosesUpdateAvailibilityAtm(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'bulan' => $request->bulan,
            'rata_event_problem' => $request->rata_event_problem,
            'durasi_bulan' => $request->durasi_bulan,
            'durasi_ytd' => $request->durasi_ytd,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        AvailibilityAtmModel::where('id', $request->id)->update($data);

        return redirect('pje/AvailibilityAtm/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkAvailibilityAtm(Request $request)
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
        return view('PJE.AvailibilityAtm.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkAvailibilityAtm(Request $request)
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

            Excel::import(new UpdateBulkAvailibilityAtmImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Availibility ATM Berhasil Di Update');
        }
    }

    public function exportReportAvailibilityAtm(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;

        return Excel::download(new AvailibilityAtmExport($bulan1, $bulan2), "Report Availibility ATM.xlsx");
    }

    public function prosesDeleteAvailibilityAtm(Request $request)
    {
        AvailibilityAtmModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteAvailibilityAtmBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        AvailibilityAtmModel::whereBetween(DB::raw('substring(periode, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
