<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Helpers\Alert;
use App\Models\UsersModel;
use App\Models\RoleModel;
use App\Models\KelompokModel;

class UsersController extends Controller
{
    public function getListUsers(Request $request)
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

        $role = $request->session()->get('role_id');
        $kelompok = $request->session()->get('kelompok_id');
        if($role == 1){
		    $userList = UsersModel::getListUserSuperAdmin();
        }else{
            $userList = UsersModel::getListUserAdminKelompok($kelompok);
        }

		$data = array(
            'alert' => $showalert,
			'userList' => $userList,
        ); 

		return view('Users.listUsers', $data);
	}

    public function formAddUser(Request $request)
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

        $role = $request->session()->get('role_id');
        if($role == 1){
            $roleList = RoleModel::get();
        }else{
            $roleList = RoleModel::where('role_id', '!=', 1)->get();
        }
        $kelompokList = KelompokModel::get();

        $data = array(
            'alert' => $showalert,
            'roleList' => $roleList,
            'kelompokList' => $kelompokList,
        );
        return view('Users.formAddUsers', $data);
    }

    public function prosesAddUser(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $password = Hash::make($request->password);
        $checkUser = UsersModel::checkEmailExists($request->email);

        if($checkUser == 1){
            return redirect('users/formAdd')->with('alert', 'Email Already Taken');
        }elseif($request->password != $request->confirm_password){
            return redirect('users/formAdd')->with('alert', 'Please Enter Same Password');
        }else{
            $data = array(
                'username' => $request->username,
                'email' => $request->email,
                'password' => $password,
                'role_id' => $request->role_id,
                'kelompok_id' => $request->kelompok_id,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            );
            UsersModel::insert($data);

            return redirect('users/list')->with('alertSuccess', 'User Successfully Added');
        }
    }

    public function formUpdateUser(Request $request)
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

        $user = UsersModel::getUserById($request->id);
        $kelompokList = KelompokModel::get();
        $role = $request->session()->get('role_id');
        if($role == 1){
            $roleList = RoleModel::get();
        }else{
            $roleList = RoleModel::where('role_id', '!=', 1)->get();
        }

        $data = array(
            'alert' => $showalert,
            'user' => $user,
            'roleList' => $roleList,
            'kelompokList' => $kelompokList,
        );
        return view('Users.formUpdateUsers', $data);
    }
    
    public function prosesUpdateUser(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $id = $request->userId;
        $oldPassword = $request->oldPassword;
        $password = Hash::make($request->password);
        $checkUser = UsersModel::where('email', $request->email)->count();
        if($checkUser > 1){
            return redirect('users/formUpdate/'.$id)->with('alert', 'Email Already Taken');
        }elseif($request->password != $request->confirm_password){
            return redirect('users/formUpdate/'.$id)->with('alert', 'Please Enter Same Password');
        }else{
            $data = array(
                'username' => $request->username,
                'email' => $request->email,
                'password' => $password,
                'role_id' => $request->role_id,
                'kelompok_id' => $request->kelompok_id,
                'updated_at' => date("Y-m-d h:i:s"),
            );
            UsersModel::where('id', $id)->update($data);

            return redirect('users/list')->with('alertSuccess', 'User Successfully Updated');
        }
    }

    public function prosesDeleteUser(Request $request)
    {
        UsersModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Useer Has Been Deleted');
    }

    function checkEmailExists(Request $request)
    {
        $id = $request->id;
        $email = $request->email;

        if(empty($userId)){
            $result = UsersModel::check_email_exists($email);
        }else{
            $result = UsersModel::check_email_exists($email, $id);
        }

        dd($result);
        if(empty($result)){
            echo("true");
        }else{
            echo("false");
        }
    }
}
