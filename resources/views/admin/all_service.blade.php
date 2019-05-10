@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">service</a></li>
			</ul>
			
				<spam class="alert-success">
					<?php
					$message = Session::get('message');
					if($message)
					{
						echo '<div class="jumbotron">'."$message".'<div>';
						Session::put('message',null);
					}
					?>
				</spam>
				
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>service</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Service ID</th>
								  <th>Service Name</th>
								  <th>Service Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  	@foreach($all_service_info as $v_service_info)
						  <tbody>
							<tr>
								<td>{{ $v_service_info->service_id }}</td>
								<td class="center">{{ $v_service_info->service_name}}</td>
								<td class="center">{{ $v_service_info->service_description}}</td>
								@if($v_service_info->publication_status==1)
								<td class="center"> <span class="badge badge-success">Active</span></td>
								@else
								<td class="center"> <span class="badge badge-danger">UnActive</span></td>
								@endif
								<td class="center">
									@if($v_service_info->publication_status==1)
									
										<a class="btn btn-danger" href="{{URL::to('/unactivate_service/'.$v_service_info->service_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									
									
									@else
									
										<a class="btn btn-success" href="{{URL::to('/activate_service/'.$v_service_info->service_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
							
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit_service/'.$v_service_info->service_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete_service/'.$v_service_info->service_id)}}"
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