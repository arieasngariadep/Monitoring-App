<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Models\UsersModel;

class AuthenticationController extends Controller
{
    public function login(Request $request)
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
        return view('Auth/login', $passing);
    }

    public function loginProcess(Request $request, UsersModel $user)
    {
        date_default_timezone_set("Asia/Jakarta");
        $today = date("Y-m-d");
        $email = $request->email;
        $password  = $request->password;
        $userLogin = $user->getLoginUser($email);
        if($userLogin){ //apakah email tersebut ada atau tidak
            $successSession = array(
                'userId' => $userLogin->userId,
                'oldPassword' => $userLogin->password,
                'username' => $userLogin->username,
                'user_mail' => $userLogin->email,
                'role_id' => $userLogin->role_id,
                'role_name' => $userLogin->role_name,
                'kelompok_id' => $userLogin->kelompok_id,
                'unit' => $userLogin->unit,
                'isLogin' => TRUE,
            );
            $request->session()->put($successSession);
            return redirect('success');
        }else{
            return redirect('/login')->with('alert', 'Email or Password Unmatched');
        }
    }

    public function successLogin()
    {
        return view('auth/suksesLogin');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
