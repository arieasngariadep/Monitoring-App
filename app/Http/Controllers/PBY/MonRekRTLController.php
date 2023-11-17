<?php

namespace App\Http\Controllers\PBY;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\Alert;
use Illuminate\Support\Facades\DB;
use App\Imports\PBY\MonRekRTL1Imports;
use App\Imports\PBY\MonRekRTL1UpdateImports;
use App\Exports\PBY\MonRekExport;
use App\Models\PBY\MonRekRTLModel1;
use Maatwebsite\Excel\HeadingRowImport;

class MonRekRTLController extends Controller
{
    public function getMonRek(Request $request){
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
        $monRekRTL = DB::table('monrek_rtl_1')
        ->select(
            'cluster_rek',
            DB::raw('SUM(CASE WHEN ket_rek = "Normal" THEN 1 ELSE 0 END) as normal'),
            DB::raw('SUM(CASE WHEN ket_rek = "Janggal" THEN 1 ELSE 0 END) as janggal'), 
            DB::raw('SUM(CASE WHEN ket_rek = "Tidak Wajar" THEN 1 ELSE 0 END) as tidak_wajar'),
            DB::raw('SUM(CASE WHEN ket_rek = "Nihil" THEN 1 ELSE 0 END) as nihil'),
            DB::raw('SUM(CASE WHEN ket_rek = "Konstan" THEN 1 ELSE 0 END) as konstan')
        )->groupBy('cluster_rek')->get();

        $monRekNominal = DB::table('monrek_rtl_1')->select(
            'cluster_rek',
            DB::raw('SUM(CASE WHEN ket_rek = "Normal" THEN nominal_tanggal_1 + nominal_tanggal_2 + nominal_tanggal_3 ELSE 0 END) as normal'),
            DB::raw('SUM(CASE WHEN ket_rek = "Janggal" THEN nominal_tanggal_1 + nominal_tanggal_2 + nominal_tanggal_3 ELSE 0 END) as janggal'), 
            DB::raw('SUM(CASE WHEN ket_rek = "Tidak Wajar" THEN nominal_tanggal_1 + nominal_tanggal_2 + nominal_tanggal_3 ELSE 0 END) as tidak_wajar'),
            DB::raw('SUM(CASE WHEN ket_rek = "Nihil" THEN nominal_tanggal_1 + nominal_tanggal_2 + nominal_tanggal_3 ELSE 0 END) as nihil'),
            DB::raw('SUM(CASE WHEN ket_rek = "Konstan" THEN nominal_tanggal_1 + nominal_tanggal_2 + nominal_tanggal_3 ELSE 0 END) as konstan')
        )->groupBy('cluster_rek')->get();;

        $listRek = DB::table('monrek_rtl_1')->get();
        $date = DB::table('monrek_rtl_1')->select('tanggal_1','tanggal_2','tanggal_3')->first();

        $data = array(
            'date' => $date ?? NULL,
            'monRekRTL' => $monRekRTL ?? NULL,
            'monRekNominal' => $monRekNominal ?? NULL,
            'listRek' => $listRek ?? NULL,
            'alert' => $showalert,
        );

        return view('PBY.monRek',$data);
    }

    public function formUploadMonRek(Request $request){
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

        $data = array(
          'alert' => $showalert,  
        );
        return view('PBY.formUpload',$data);
    }

    public function formUpdateMonRek(Request $request){
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

        $data = array(
          'alert' => $showalert,  
        );
        return view('PBY.formUpdate',$data);
    }

    public function prosesImportMonRek1(Request $request)
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
            $file->move(\base_path() ."/public/Import/PBY/", $filename);
            Excel::import(new MonRekRTL1Imports, public_path("/Import/PBY/".$filename));
            unlink(base_path('public/Import/PBY/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Upload');
        }
    }

    public function editMonRek(Request $request){
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

        $monRek = MonRekRTLModel1::find($request->id);
        $date = DB::table('monrek_rtl_1')->select('tanggal_1','tanggal_2','tanggal_3')->first();

        $data = array(
            'alert' => $showalert,
            'monRek' => $monRek,
            'date' => $date,
        );

        return view('PBY.formEditMonRek',$data);
    }

    public function prosesEditMonRek(Request $request){
        date_default_timezone_set("Asia/Bangkok"); // Set your country name from below timezone list
        $data = array(
            'no_rek' => $request->noRek,
            'nama_rek' => $request->namaRek,
            'fungsi_rek' => $request->fungsiRek,
            'cluster_rek' => $request->clusterRek,
            'nominal_tanggal_1' => $request->nominal1,
            'nominal_tanggal_2' => $request->nominal2,
            'nominal_tanggal_3' => $request->nominal3,
            'ket_rek' => $request->ketRek,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        MonRekRTLModel1::where('id',$request->id)->update($data);
        
        return redirect('pby/MonRekRTL/getMonRek')->with('alertSuccess','Data Berhasil Diedit');
    }

    public function prosesImportUpdateMonRek1(Request $request)
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
            $file->move(\base_path() ."/public/Import/PBY/", $filename);
            Excel::import(new MonRekRTL1UpdateImports, public_path("/Import/PBY/".$filename));
            unlink(base_path('public/Import/PBY/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Update');
        }
    }

    public function exportMonRek(Request $request){
        return Excel::download(new MonRekExport(), "Report MonRek.xlsx");
    }

    public function deleteMonRek(Request $request){
        MonRekRTLModel1::truncate();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dibersihkan');
    }

}
