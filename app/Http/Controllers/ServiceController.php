<?php

namespace App\Http\Controllers;
use DB;
use App\http\requests;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();
class ServiceController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
    	return view('admin.add_service');
    }

    public function all_service()
    {
        $this->AdminAuthCheck();
    	$all_service_info=DB::table('service')->get();
    	$manage_service=view('admin.all_service')
    		->with('all_service_info',$all_service_info);
    	return view('admin_layout')
    		->with('admin.all_service',$manage_service);

    	//return view ('admin.all_category');
    }

    public function save_service(Request $request)
    {
        $this->AdminAuthCheck();
    	$data = array();
    	// $data['category_id'] = $request->category_id;
    	$data['service_name'] = $request->service_name;
    	$data['service_description'] = $request->service_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('service')->insert($data);
    	Session::put('message', 'Service added successfully !! ');
    	return Redirect::to('/add-service');
    }

    public function unactivate_service($service_id)
    {
    	DB::table('service')
    		->where('service_id', $service_id)
    		->update(['publication_status' => 0]);
    		Session::put('message', 'Service unactivated successfully !! ');
    		return Redirect::to('/all-service');
    }

    public function activate_service($service_id)
    {
    	DB::table('service')
    		->where('service_id', $service_id)
    		->update(['publication_status' => 1]);
    		Session::put('message', 'Service Activated successfully !! ');
    		return Redirect::to('/all-service');
    }
    public function edit_service($service_id)
    {
        $this->AdminAuthCheck();
    	//return view('admin.edit_category');
    	$service_info=DB::table('service')
    			->where('service_id',$service_id)
    			->first();

    	$service_info=view('admin.edit_service')
    			->with('service_info',$service_info);
    			return view('admin_layout')
    			->with('admin.edit_service',$service_info);
    }

    public function update_service(Request $request, $service_id)
    {
        $this->AdminAuthCheck();
    	$data=array();
    	$data['service_name'] = $request->service_name;
    	$data['service_description'] = $request->service_description;
    	$data['publication_status'] = $request->publication_status;

		DB::table('service')
		->where('service_id',$service_id)
		->update($data);
    	Session::put('message', 'Service Uploaded successfully !! ');
    	return Redirect::to('/all-service');
    }

    public function delete_service($service_id)
    {
    	DB::table('service')
    	->where('service_id',$service_id)
    	->delete();

    	Session::get('message','Service deleted successfully');
    	return Redirect::to('/all-service');
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
