@extends('employee_layout')
@section('employee_content')
<style type="text/css">
	
a.dissabled {
  pointer-events: none;
  cursor: default;
}

.modal {
   position: absolute;
   top: 10px;
   right: 80px;
   bottom: 0;
   left: 200px;
  /* overflow: auto;
   overflow-y: auto;*/
   height: 450px;
}
</style>
<ul class="breadcrumb">

	<?php
					$message = Session::get('message');
					if($message)
					{ ?>
						<div class="alert alert-success" role="alert" style="font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
							<strong>
							<?php echo "$message";
							Session::put('message',null); ?>
							</strong>
						</div>
					<?php } ?>
			<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Request</a></li>
			</ul>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Request</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							 <tr>
						  <th>Message</th>
						   <th>Date</th>
						  <th>Action</th>
					  </tr>
						  </thead>
						  	 @foreach($all_request as $v_request_info)
				  <tbody>
					<tr>
						<td class="center" style="width: 120px;">{{ $v_request_info->message}}</td>
						<td class="center" style="width: 120px;">{{ $v_request_info->date}}</td>	
						<td class="center" style="width: 120px;">
							@if($v_request_info->employee_accept==0 && $v_request_info->employee_reject==0)
							<a class="btn btn-success" href="{{URL::to('/employee_accept/'.$v_request_info->allocate_request_id.'/'.$v_request_info->request_id)}}" data-toggle="tooltip" title="Accept">
								<i class="halflings-icon white check"></i> 
							</a>
							<a class="btn btn-danger" href="{{URL::to('/employee_reject/'.$v_request_info->allocate_request_id.'/'.$v_request_info->request_id)}}" id="allocate" data-toggle="tooltip" title="Reject">
								<i class="halflings-icon white remove"></i> 
							</a>
							
							@elseif($v_request_info->employee_accept==1 && $v_request_info->employee_reject==0)
							<button class="btn btn-warning dissabled" href="" data-toggle="tooltip" title="Request sent">
								<i class="halflings-icon white check"></i> 
							</button>
							@elseif($v_request_info->employee_accept==0 && $v_request_info->employee_reject==1)
							<button class="btn btn-secondary dissabled" href="" data-toggle="tooltip" title="you reject this">
								<i class="halflings-icon white check"></i> 
							</button>
							@endif
						</td>
					</tr>
				  </tbody>
					  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection