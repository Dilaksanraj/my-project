<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\http\requests;
use Session;
session_start();
use Illuminate\support\facades\Redirect;

class SupperAdminController extends Controller
{

	public function index()
    {
    	$this->AdminAuthCheck();
    	return view('admin.dashboard');
    }

    public function employee_login()
    {
        $this->EmployeeAuthCheck();
        return view('employee.dashboard_employee');
    }


    public function logout(){
    	Session::flush();
   		return Redirect::to('/admin');
    }

    public function AdminAuthCheck()
    {
    	$admin_id=Session::get('admin_id');
    	if($admin_id) {
    		return;
    	} else{
    		return Redirect::to('/admin')->send();
    	}
    }

     public function EmployeeAuthCheck()
    {
        $employee_id=Session::get('employee_id');
        if($employee_id) {
            return;
        } else{
            return Redirect::to('/admin')->send();
        }
    }
}
