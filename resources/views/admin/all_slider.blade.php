@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Slider ID</th>
								  <th>Slider Image</th>
								  <th>Slider Heading</th>
								  <th>Slider Text</th>
								  <th>status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  	@foreach($all_slider_info as $v_slider_info)
						  <tbody>
							<tr>
								<td>{{ $v_slider_info->slider_id }}</td>
								<td style="width: 300px;"> <img src="{{asset($v_slider_info -> slider_image)}}" style="height: 100px; width: 300px;"> </td>
								<td style="width: 150px;">{{ $v_slider_info->slider_heading}}</td>
								<td style="width: 250px;">{{ $v_slider_info->slider_text}}</td>
								<td>
									@if($v_slider_info->publication_status==1)
										<span class="label label-success">Active</span>
									@else
										<span class="label label-danger">Unactive</span>
									@endif
								</td>

								<td class="center">
									@if($v_slider_info->publication_status==1)
									
										<a class="btn btn-danger" href="{{URL::to('/unactivate_slider/'.$v_slider_info->slider_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									
									
									@else
									
										<a class="btn btn-success" href="{{URL::to('/activate_slider/'.$v_slider_info->slider_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
							
									@endif

									<a class="btn btn-danger" href="{{URL::to('/delete_slider/'.$v_slider_info->slider_id)}}"
										id="delete" >
										<i class="halflings-icon white trash"></i> 
									</a>

								</td>
							</tr>
						  </tbody>
						  	@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection