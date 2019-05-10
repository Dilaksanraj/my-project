@extends('admin_layout')
@section('admin_content')
<style type="text/css">
	
a.dissabled {
  pointer-events: none;
  cursor: default;
}

#myModal {
   position: absolute;
   top: 10px;
   /*right: 100px;*/
   bottom: 0;
   left: 400px;
  /* overflow: auto;
   overflow-y: auto;*/
   height: 450px;
}
</style>
<ul class="breadcrumb">
			<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Request</a></li>
			</ul>
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
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Request</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							 <tr>
						<th>Referance No</th> 	
						  <th>Customer Name</th>
						  <th>Customer Email</th>
						  <th>Mobile Number</th>
						  <th>Message</th>
						  <th>Service</th>
						   <th>Date</th>
						  <th>Action</th>
					  </tr>
						  </thead>
						  	 @foreach($all_request as $v_request_info)
				  <tbody>
					<tr>
						<td class="center" style="width: 80px;">{{ $v_request_info->customer_id}}</td>
						<td class="center" style="width: 100px;">{{ $v_request_info->customer_name}}</td>
						<td class="center" style="width: 120px;">{{ $v_request_info->customer_email}}</td>	
						<td class="center" style="width: 120px;">{{ $v_request_info->customer_phone}}</td>	
						<td class="center" style="width: 120px;">{{ $v_request_info->customer_message}}</td>
						<td class="center" style="width: 120px;">{{ $v_request_info->customer_service}}</td>
						<td class="center" style="width: 90px;">{{ $v_request_info->customer_date}}</td>
						<td class="center" style="width: 140px;">
							@if($v_request_info->manager_check == 0 && $v_request_info->employee_check == "")
							<a class="btn btn-success" href="" id="allocate" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Send Request">
								<i class="halflings-icon white tick"></i> 
							</a>
							@elseif($v_request_info->manager_check == 1 && $v_request_info->employee_check == "")
							<button class="btn btn-warning dissabled" href="" data-toggle="tooltip" title="Request sent">
								<i class="halflings-icon white tick"></i> 
							</button>
							@elseif($v_request_info->manager_check == 1 && $v_request_info->employee_check == 1)
							<button class="btn btn-primary dissabled" href="" data-toggle="tooltip" title="Accept">
								<i class="halflings-icon white check"></i> 
							</button>

							@elseif($v_request_info->manager_check == 1 && $v_request_info->employee_check == 0)
							<button class="btn btn-secondary dissabled" href="" data-toggle="tooltip" title="Rejected">
								<i class="halflings-icon white minus"></i> 
							</button>
							@endif
								<a class="btn btn-primary" href="mailto:someone@yoursite.com" id="" data-toggle="tooltip" title="Send Email">
									<i class="halflings-icon white envelope"></i> 
								</a>

								<a class="btn btn-danger" href="{{URL::to('/request_delete/'.$v_request_info->customer_id)}}" id="delete" data-toggle="tooltip" title="Delete">
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

			<div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Assign Staff</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="{{url('/allocate_request')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <p>
                            		<span class="badge badge-warning" style="font-size: 16px;">Make Sure that if you send the request once you can not undo </span>
                            	</p>
                                <div class="form-group">
                                   <select id="room-multiple" name="employee[]" class="form-control mobileSelect" multiple>
                                            <option selected="selected" disabled="">Select Employee</option>
                                            <?php
                                            $all_publised_service = DB::table('employee')
                                                                        ->where('publication_status',1)
                                                                        ->get();
                
                                            foreach ($all_publised_service as $v_service) { ?> 
                                        <option value="{{$v_service->e_id}}" style="">{{$v_service->e_name}}, {{$v_service->e_designation}}</option>
                                            <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control datepicker"  name="date" required maxlength="50" placeholder="Select Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="bookId" name="reference_no" placeholder="Reference No"/>
                                </div>
                                <div class="form-group">
                                   
                                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your Message Here" maxlength="6000" rows="4" placeholder="Enter Message"></textarea>
                                </div>
                                <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-md btn-success" id="btnContactUs">Send</button>
                            </form>
                		</div>
           	 		</div> 
        		</div>
    		</div>
@endsection

		<script>
    			$(document).on("click", "#allocate", function () {
    				console.log('ok');
     				var myBookId = $(this).data('id');
     				$("#bookId").val( myBookId );
});
		</script>

		<script>
    			$(document ).ready(function() {
    			console.log( "ready!" );
				});
		</script>