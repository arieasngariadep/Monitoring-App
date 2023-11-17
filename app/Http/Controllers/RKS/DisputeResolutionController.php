<?php

namespace App\Http\Controllers\RKS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RKS\DisputeResolutionImport;
use App\Models\RKS\DisputeResolutionModel;
use App\Imports\RKS\DisputeResolution\UpdateBulkDisputeResolutionImport;
use App\Exports\RKS\DisputeResolution\DisputeResolutionExport;

class DisputeResolutionController extends Controller
{
    public function formUploadDisputeResolution(Request $request)
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
        return view('RKS.DisputeResolution.formUploadDisputeResolution', $passing);
    }

    public function prosesImportDisputeResolution(Request $request)
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
            $file->move(\base_path() ."/public/Import/RKS/", $filename);

            Excel::import(new DisputeResolutionImport, public_path("/Import/RKS/".$filename));
            
            unlink(base_path('public/Import/RKS/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Dispute Resolution Berhasil Di Upload');
        }
    }

    public function getListDisputeResolution(Request $request)
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
        $listData = DisputeResolutionModel::getListDisputeResolution($bulan1, $bulan2);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'listData' => $listData,
        );
        return view('RKS.DisputeResolution.listDisputeResolution', $passing);
    }

    public function formUpdateDisputeResolution(Request $request)
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

        $detail = DisputeResolutionModel::getDisputeResolutionById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('RKS.DisputeResolution.formUpdate', $passing);
    }

    public function prosesUpdateDisputeResolution(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'periode' => $request->periode.'-01',
            'total_case' => $request->total_case,
            'win_case' => $request->win_case,
            'target' => $request->target,
            'persentase_bulan' => $request->persentase_bulan,
            'persentase_ytd' => $request->persentase_ytd,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        DisputeResolutionModel::where('id', $request->id)->update($data);

        return redirect('RKS/DisputeResolution/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkDisputeResolution(Request $request)
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
        return view('RKS.DisputeResolution.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkDisputeResolution(Request $request)
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
            $file->move(\base_path() ."/public/Import/RKS/", $filename);

            Excel::import(new UpdateBulkDisputeResolutionImport, public_path("/Import/RKS/".$filename));
            unlink(base_path('public/Import/RKS/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Dispute Resolution Berhasil Di Update');
        }
    }

    public function exportReportDisputeResolution(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;

        return Excel::download(new DisputeResolutionExport($bulan1, $bulan2), "Report Dispute Resolution.xlsx");
    }

    public function prosesDeleteDisputeResolution(Request $request)
    {
        DisputeResolutionModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteDisputeResolutionBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        DisputeResolutionModel::whereBetween(DB::raw('substring(periode, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
