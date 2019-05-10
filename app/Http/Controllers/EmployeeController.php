<?php

namespace App\Http\Controllers;
use DB;
use App\http\requests;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();
class EmployeeController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
    	return view('admin.add_employee');
    }

     public function all_employee()
    {
        $this->AdminAuthCheck();
		$all_employee_info=DB::table('employee')
    							->get();
       
    	$manage_employee=view('admin.all_employee')
    		->with('all_employee_info',$all_employee_info);
    	return view('admin_layout')
    		->with('admin.all_employee',$manage_employee);

    	
    }

    public function save_employee(Request $request)
    {
        $this->AdminAuthCheck();
    	$data = array();
		$data['e_name']=$request->employee_name;
        $data['e_user_name']=$request->employee_user_name;
        $data['e_password']=md5($request->employee_password);
		$data['e_designation']=$request->employee_designation;
		$data['e_description']=$request->employee_description;
		$data['e_contact_no']=$request->employee_contact;
		$data['publication_status']=$request->publication_status;
		
    	$image = $request -> file('employee_image');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image ->move($upload_path,$image_full_name);
    		if($success){
    			$data ['e_picture']=$image_url;
    			DB::table('employee')->insert($data);
    			Session::put('message','Employee added successfully !!');
    			return Redirect::to('/add-employee');
    		} 
    	}
    	$data['e_picture']='';
    	DB::table('employee')->insert($data);
    	Session::put('message','Employee added successfully without image !!');
    	return Redirect::to('add-employee');
    }

    public function unactivate_employee($e_id)
    {
    	DB::table('employee')
    		->where('e_id', $e_id)
    		->update(['publication_status' => 0]);
    		Session::put('message', 'Employee unactivated successfully !! ');
    		return Redirect::to('/all-employee');
    }

    public function activate_employee($e_id)
    {
    	DB::table('employee')
    		->where('e_id', $e_id)
    		->update(['publication_status' => 1]);
    		Session::put('message', 'Employee activated successfully !! ');
    		return Redirect::to('/all-employee');
    }


    public function edit_employee($e_id)
    {
        $this->AdminAuthCheck();
    	//return view('admin.edit_category');
    	$employee_info=DB::table('employee')
    			->where('e_id',$e_id)
    			->first();

    	$employee_info=view('admin.edit_employee')
    			->with('employee_info',$employee_info);
    			return view('admin_layout')
    			->with('admin.edit_employee',$employee_info);
    }


	public function update_employee( Request $request,$e_id)
    {
		$data = array();
		$data['e_name']=$request->employee_name;
		$data['e_designation']=$request->employee_designation;
		$data['e_description']=$request->employee_description;
		$data['e_contact_no']=$request->employee_contact;
		$data['publication_status']=$request->publication_status;
		
    	$image = $request -> file('employee_image');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image ->move($upload_path,$image_full_name);
    		if($success){
    			$data ['e_picture']=$image_url;
				DB::table('employee')
				->where('e_id',$e_id)
				->update($data);
    			Session::put('message','Employee added successfully !!');
    			return Redirect::to('/all-employee');
    		} 
    	}
    	$data['e_picture']='';
		DB::table('employee')
		->where('e_id',$e_id)
		->update($data);
    	Session::put('message','Employee added successfully without image !!');
    	return Redirect::to('all-employee');
	}
	
    public function delete_employee($e_id)
    {

    	DB::table('employee')
    	->where('e_id',$e_id)
    	->delete();
    	Session::put('message','Employee deleted successfully');
    	return Redirect::to('/all-employee');
    }

    public function employee_profile()
    {
        $e_id = Session::get('employee_id');
        $employee_info=DB::table('employee')
                ->where('e_id',$e_id)
                ->first();

                 return view('employee.profile_employee')
                ->with(compact('employee_info'));

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
}
