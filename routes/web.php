<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend route.....................
Route::get('/', 'HomeController@index');

//backEnd route.......................
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SupperAdminController@index');
Route::get('/dashboard_employee', 'SupperAdminController@employee_login');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SupperAdminController@logout');

//Service routes
Route::get('/add-service', 'ServiceController@index');
Route::get('/all-service', 'ServiceController@all_service');
Route::post('/save-service', 'ServiceController@save_service');
Route::get('/unactivate_service/{service_id}', 'ServiceController@unactivate_service');
Route::get('/activate_service/{service_id}', 'ServiceController@activate_service');
Route::get('/edit_service/{service_id}', 'ServiceController@edit_service');
Route::post('/update-service/{service_id}', 'ServiceController@update_service');
Route::get('/delete_service/{service_id}', 'ServiceController@delete_service');

//Gallery routes
Route::get('/add-gallery', 'GalleryController@index');
Route::get('/all-gallery', 'GalleryController@all_gallery');
Route::post('/save-gallery', 'GalleryController@save_gallery');
Route::get('/unactivate_gallery/{gallery_id}', 'GalleryController@unactivate_gallery');
Route::get('/activate_gallery/{gallery_id}', 'GalleryController@activate_gallery');
Route::get('/edit_gallery/{gallery_id}', 'GalleryController@edit_gallery');
Route::post('/update-gallery/{gallery_id}', 'GalleryController@update_gallerye');
Route::get('/delete_gallery/{gallery_id}', 'GalleryController@delete_gallery');

//Employee routes
Route::get('/add-employee', 'EmployeeController@index');
Route::get('/employee_profile', 'EmployeeController@employee_profile');
Route::get('/all-employee', 'EmployeeController@all_employee');
Route::post('/save-emloyee', 'EmployeeController@save_employee');
Route::get('/unactivate_employee/{e_id}', 'EmployeeController@unactivate_employee');
Route::get('/activate_employee/{e_id}', 'EmployeeController@activate_employee');
Route::get('/edit_employee/{e_id}', 'EmployeeController@edit_employee');
Route::post('/update-employee/{e_id}', 'EmployeeController@update_employee');
Route::get('/delete_employee/{e_id}', 'EmployeeController@delete_employee');

//Customer routes
Route::get('/employee_accept/{allocate_request_id}/{request_id}', 'CustomerController@employee_accept');
Route::get('/employee_reject/{allocate_request_id}/{request_id}', 'CustomerController@employee_reject');
Route::post('/save-customer', 'CustomerController@saveCustomer');
Route::get('/manage-request','CustomerController@showRequest');
Route::post('/allocate_request','CustomerController@allocate_request');
Route::get('/manage-employee-request','CustomerController@manage_employe_request');
Route::get('/request_delete/{request_id}','CustomerController@request_delete');


//slider route
Route::get('/add-slider', 'SliderController@index');
Route::get('/all-slider', 'SliderController@all_slider');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/unactivate_slider/{slider_id}', 'SliderController@unactivate_slider');
Route::get('/activate_slider/{slider_id}', 'SliderController@activate_slider');
Route::get('/delete_slider/{slider_id}', 'SliderController@delete_slider');
Route::get('/gallery', 'SliderController@gallery_index');


//social link routes
Route::get('/add-socialmedia', 'SocialController@index');
Route::post('/save-socialmedia', 'SocialController@save_socialmedia');
Route::get('/all-socialmedia', 'SocialController@all_socialmedia');
Route::get('/unactivate_social/{id}', 'SocialController@unactivate_social');
Route::get('/activate_social/{id}', 'SocialController@activate_social');
Route::get('/edit_social/{contact_id}', 'SocialController@edit_social');
Route::post('/update_social/{contact_id}', 'SocialController@update_social');
Route::get('/delete_social/{contact_id}', 'SocialController@delete_social');

