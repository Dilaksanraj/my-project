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
					<a href="#">Add Picturey</a>
				</li>
			</ul>
				
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Upload Picture</h2>
					</div>
					
				<p class="alert-success">
					<?php
					$message = Session::get('message');
					if($message)
					{
						echo "$message";
						Session::put('message',null);
					}
					?>
				
				<hr>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-gallery')}}" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
								<div class="control-group">
									<label class="control-label" for="fileInput">Photo</label>
									<div class="controls">
									<input class="input-file uniform_on" name="picture" id="fileInput" type="file">
									</div>
								</div> 
							<hr>    
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="description" rows="3" required=""></textarea>
							  </div>
							  <hr>
							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Satatus</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="publication_status"/>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Upload</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection