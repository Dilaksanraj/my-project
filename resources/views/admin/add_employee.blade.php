@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Employee</a>
				</li>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
					</div>
				<p class="alert-success">
					
				</p>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-emloyee')}}" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Emloyee Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="employee_name" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Emloyee Email</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" value="" name="employee_user_name" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Emloyee Password</label>
							  <div class="controls">
								<input type="Password" class="input-xlarge" name="employee_password" required="">
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Emloyee Description</label>
							    <div class="controls">
										<input type="text" class="input-xlarge" name="employee_description" required="">
							  	</div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Emloyee Designation</label>
							    <div class="controls">
										{{-- <input type="text" class="input-xlarge" name="employee_designation" required=""> --}}
										<select id="room-multiple" name="employee_designation" class="form-control mobileSelect">
												<option disabled="">Select One</option>
												<?php
												$all_publised_service = DB::table('service')
																										->where('publication_status',1)
																										->get();

												foreach ($all_publised_service as $v_service) { ?> 
										<option value="{{$v_service->service_name}}">{{$v_service->service_name}}</option>
												<?php } ?>
								</select>
							  	</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Employee contact NO</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="employee_contact" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Photo</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="employee_image" id="fileInput" type="file">
							  </div>
							</div> 

							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Satatus</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="publication_status"/>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Employee</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection