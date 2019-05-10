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
								  <th>Picture</th>
								  <th>Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  	@foreach($all_gallery_info as $v_gallery_info)
						  <tbody>
							<tr>
								{{-- <td>{{ $v_manufacture_info->manufacture_id }}</td> --}}
								@if($v_gallery_info->picture !='')
								<td style="width:320px;"> <img src="{{asset($v_gallery_info->picture)}}" style="height: 150px; width: 300px;"> </td>
								@else 
								<td> <img src="backEnd/img/noimage.png" alt="No image found" style="height: 100px; width: 100px;"> </td>
								@endif
								<td class="center">{{ $v_gallery_info->description}}</td>
								@if($v_gallery_info->publication_status==1)
								<td class="center"> <span class="badge badge-success">Active</span></td>
								@else
								<td class="center"> <span class="badge badge-danger">UnActive</span></td>
								@endif
								<td class="center">
									@if($v_gallery_info->publication_status==1)
									
										<a class="btn btn-danger" href="{{URL::to('/unactivate_gallery/'.$v_gallery_info->gallery_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									
									
									@else
									
										<a class="btn btn-success" href="{{URL::to('/activate_gallery/'.$v_gallery_info->gallery_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
							
									@endif

									{{-- <a class="btn btn-info" href="{{URL::to('/edit_gallery/'.$v_gallery_info->gallery_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a> --}}

									<a class="btn btn-danger" href="{{URL::to('/delete_gallery/'.$v_gallery_info->gallery_id)}}"
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