<?php

namespace App\Http\Controllers;
use DB;
use App\http\requests;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();

class GalleryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
    	return view('admin.add_gallery');
    }

    public function all_gallery()
    {
        $this->AdminAuthCheck();
    	$all_gallery_info=DB::table('gallery')->get();
    	$manage_gallery=view('admin.all_gallery')
    		->with('all_gallery_info',$all_gallery_info);
    	return view('admin_layout')
    		->with('admin.all_gallery',$manage_gallery);

    	//return view ('admin.all_manufacture');
    }

    public function save_gallery(Request $request)
    {
        $this->AdminAuthCheck();
		$data = array();
		
    	$data['description'] = $request->description;
    	$data['publication_status'] = $request->publication_status;

    	$image = $request -> file('picture');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image ->move($upload_path,$image_full_name);
    		if($success){
    			$data ['picture']=$image_url;
    			DB::table('gallery')->insert($data);
    			Session::put('message','Picture uploaded successfully !!');
    			return Redirect::to('/add-gallery');
    		} 
    	}
		$data['picture']='';
		DB::table('gallery')->insert($data);
    	Session::put('message','uploaded successfully');
    	return Redirect::to('add-gallery');
    }

    public function unactivate_gallery($gallery_id)
    {
    	DB::table('gallery')
    		->where('gallery_id', $gallery_id)
    		->update(['publication_status' => 0]);
    		Session::put('message', 'Picture unactivated successfully !! ');
    		return Redirect::to('/all-gallery');
    }

    public function activate_gallery($gallery_id)
    {
    	DB::table('gallery')
    		->where('gallery_id', $gallery_id)
    		->update(['publication_status' => 1]);
    		Session::put('message', 'Picture activated successfully !! ');
    		return Redirect::to('/all-gallery');
    }

    public function delete_gallery($gallery_id)
    {
        
    	DB::table('gallery')
    	->where('gallery_id',$gallery_id)
    	->delete();

    	Session::put('message','Picture deleted successfully');
    	return Redirect::to('/all-gallery');

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
