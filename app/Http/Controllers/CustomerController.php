<?php

namespace App\Http\Controllers;
use DB;
use Cart;
use App\http\requests;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();
use Validator;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Darryldecode\Cart\Helpers\Helpers;
use Darryldecode\Cart\Validators\CartItemValidator;


class CustomerController extends Controller
{
   public function saveCustomer(Request $request){
		$data = array();
		$service = $request->input('service');
		$service = implode(', ', $service);
		$data['customer_name']=$request->name;
		$data['customer_email']=$request->email;
		$data['customer_phone']=$request->phone;
		$data['customer_date']=$request->date;
		$data['customer_message']=$request->message;
		$data['customer_service']=$service;
		DB::table('customer')->insert($data);
    	Session::put('message','Your Request has been sent successfully!!');
		return Redirect::to('/');
		
	}

	public function showRequest(){
		$all_request = DB::table('customer')
						->orderBy('customer_id', 'DESC')
						->get();
						

		$manage_request=view('admin.manage_request')
    			->with('all_request',$all_request);
    			return view('admin_layout')
    			->with('admin.manage_request',$manage_request);
	}

	public function allocate_request(Request $request){
		$data = array();
		$employee = array();
		$customer_request_id =$request->reference_no;
		$employee = $request->input('employee');

		foreach ($employee as $v_employee) {

		$data['date']=$request->date;
		$data['request_id']=$customer_request_id;
		$data['message']=$request->message;
		$data['employee_id']=$v_employee;
		DB::table('allocate_request')->insert($data);
			
		}

		DB::table('customer')
    		->where('customer_id', $customer_request_id)
    		->update(['manager_check' => 1]);

    	Session::put('message','Your Request has been sent successfully!!');
		return Redirect::to('/manage-request');
	}
	

	public function manage_employe_request(){
		$employee_id = Session::get('employee_id');
		$all_request = DB::table('allocate_request')
						->where('employee_id',$employee_id)
						->get();
						

		$manage_request=view('employee.manage_request')
    			->with('all_request',$all_request);
    			return view('employee_layout')
    			->with('employee.manage_request',$manage_request);
	}

	public function employee_accept($employee_accept, $request_id){


		DB::table('allocate_request')
    		->where('allocate_request_id', $employee_accept)
    		->update(['employee_accept' => 1]);

    		DB::table('customer')
    		->where('customer_id', $request_id)
    		->update(['employee_check' => 1]);

    	Session::put('message','Your Request has been sent successfully!!');
		return Redirect::to('/manage-employee-request');
						
	}

	public function employee_reject($employee_accept, $request_id)
	{


		DB::table('allocate_request')
    		->where('allocate_request_id', $employee_accept)
    		->update(['employee_reject' => 1]);

    		DB::table('customer')
    		->where('customer_id', $request_id)
    		->update(['employee_check' => 0]);

    	Session::put('message','Your Request has been sent successfully!!');
		return Redirect::to('/manage-employee-request');
						
	}

	public function request_delete($request_id)
	{
		DB::table('customer')
    		->where('customer_id', $request_id)
    		->delete();

    		DB::table('allocate_request')
    		->where('request_id', $request_id)
    		->delete();

    		

    	Session::put('message','Deleted  successfully!!');
		return Redirect::to('/manage-request');
						
	}


	

}
 