@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Employee</a></li>
			</ul>
			<hr>
			<spam class="alert-success">

					<?php
					$message = Session::get('message');
					if($message)
					{
						echo "$message";
						Session::put('message',null);
					}
					?>
				</spam>
			<hr>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Employee</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  {{-- <th>Employee ID</th> --}}
								  <th>Employee Name</th>
								 <!--  <th>Product Quantity</th> -->
								  <th>Employee Designation</th>
								  <th>Employee Description</th>
								  <th>Employee No</th>
								  <th>Employee Picture</th>
								  <th>status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  	@foreach($all_employee_info as $v_employee_info)
						  <tbody>
							<tr>
								{{-- <td>{{ $v_employee_info->id}}</td> --}}
								<td class="center" style="width: 120px;">{{ $v_employee_info->e_name}}</td>	
								<td class="center" style="width: 120px;">{{ $v_employee_info->e_designation}}</td>	
								<td class="center" style="width: 120px;">{{ $v_employee_info->e_description}}</td>	
								<td class="center" style="width: 120px;">{{ $v_employee_info->e_contact_no}}</td>
								<td> <img src="{{asset($v_employee_info -> e_picture)}}" style="height: 80px; width: 200px;"> </td>
								@if($v_employee_info->publication_status==1)
								<td class="center"> <span class="badge badge-success">Active</span></td>
								@else
								<td class="center"> <span class="badge badge-danger">UnActive</span></td>
								@endif
								
								<td>
								@if($v_employee_info->publication_status==1)
								<a class="btn btn-danger" href="{{URL::to('/unactivate_employee/'.$v_employee_info->e_id)}}">
									<i class="halflings-icon white thumbs-down"></i>  
								</a>
								@else
								<a class="btn btn-success" href="{{URL::to('/activate_employee/'.$v_employee_info->e_id)}}">
									<i class="halflings-icon white thumbs-down"></i>  
								</a>
								@endif

								<a class="btn btn-info" href="{{URL::to('/edit_employee/'.$v_employee_info->e_id)}}">
									<i class="halflings-icon white edit"></i>  
								</a>

								<a class="btn btn-danger" href="{{URL::to('/delete_employee/'.$v_employee_info->e_id)}}"
									id="delete" >
									<i class="halflings-icon white trash"></i> 
								</a>

								</td>
						  </tbody>
						  	@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection