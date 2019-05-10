<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\requests;
use Session;
session_start();
use Illuminate\support\facades\Redirect;
class AdminController extends Controller
{
    public function index()
    {
    	return view('admin_login');
    }


    public function dashboard(Request $request)
    {
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    		->where('admin_email', $admin_email)
    		->where('admin_password', $admin_password)
    		->first();

        $resulte=DB::table('employee')
            ->where('e_user_name', $admin_email)
            ->where('e_password', $admin_password)
            ->first();
    		
    		if ($result) {
    			Session::put('admin_name',$result->admin_name);
    			Session::put('admin_id',$result->admin_id);
    			return Redirect::to('/dashboard');
    		}

            elseif ($resulte) {
               Session::put('employee_name',$resulte->e_name);
                Session::put('employee_id',$resulte->e_id);
                return Redirect::to('/dashboard_employee');
            }

    		else{
    			Session::put('message', 'Email or password does not match');
    			return Redirect::to('/admin');
    		}


    }
}
