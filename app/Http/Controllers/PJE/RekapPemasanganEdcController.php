<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PJE\RekapPemasanganEdcImport;
use App\Models\PJE\RekapPemasanganEdcModel;
use App\Imports\PJE\RekapPemasanganEdc\UpdateBulkRekapPemasanganEdcImport;
use App\Exports\PJE\RekapPemasanganEdc\RekapPemasanganEdcExport;

class RekapPemasanganEdcController extends Controller
{
    public function formUploadRekapPemasanganEdc(Request $request)
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
        return view('PJE.RekapPemasanganEdc.formUploadRekapPemasanganEdc', $passing);
    }

    public function prosesImportRekapPemasanganEdc(Request $request)
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

            Excel::import(new RekapPemasanganEdcImport, public_path("/Import/PJE/".$filename));
            
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Dispute Resolution Berhasil Di Upload');
        }
    }

    public function getListRekapPemasanganEdc(Request $request)
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

        $listWilayah = RekapPemasanganEdcModel::getWilayah();
        $listData = RekapPemasanganEdcModel::getListRekapPemasanganEdc($request->wilayah);

        $passing = array(
            'alert' => $showalert,
            'listWilayah' => $listWilayah,
            'wilayah' => $request->wilayah,
            'listData' => $listData,
        );
        return view('PJE.RekapPemasanganEdc.listRekapPemasanganEdc', $passing);
    }

    public function formUpdateRekapPemasanganEdc(Request $request)
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

        $listWilayah = RekapPemasanganEdcModel::getWilayah();
        $detail = RekapPemasanganEdcModel::getRekapPemasanganEdcById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
            'listWilayah' => $listWilayah,
        );
        return view('PJE.RekapPemasanganEdc.formUpdate', $passing);
    }

    public function prosesUpdateRekapPemasanganEdc(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'wilayah' => $request->wilayah,
            'edc_terpasang' => $request->edc_terpasang,
            'persentase_edc_terpasang' => $request->persentase_edc_terpasang,
            'belum_pasang_sudah_spk' => $request->belum_pasang_sudah_spk,
            'belum_pasang_belum_spk' => $request->belum_pasang_belum_spk,
            'persentase_belum_terpasang' => $request->persentase_belum_terpasang,
            'failed' => $request->failed,
            'pending' => $request->pending,
            'persentase_gagal_pasang' => $request->persentase_gagal_pasang,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        RekapPemasanganEdcModel::where('id', $request->id)->update($data);

        return redirect('pje/RekapPemasanganEdc/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkRekapPemasanganEdc(Request $request)
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
        return view('PJE.RekapPemasanganEdc.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkRekapPemasanganEdc(Request $request)
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

            Excel::import(new UpdateBulkRekapPemasanganEdcImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Rekap Pemasangan EDC Berhasil Di Update');
        }
    }

    public function exportReportRekapPemasanganEdc(Request $request)
    {
        return Excel::download(new RekapPemasanganEdcExport($request->wilayah), "Report Rekap Pemasangan EDC.xlsx");
    }

    public function prosesDeleteRekapPemasanganEdc(Request $request)
    {
        RekapPemasanganEdcModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteRekapPemasanganEdcBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        RekapPemasanganEdcModel::whereBetween(DB::raw('substring(periode, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
