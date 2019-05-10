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
					<a href="#">Add Product</a>
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
					<hr>
				
				<hr>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-slider')}}" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Slider image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file" required="">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Slider heading</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="slider_heading" required="">
							  </div>
							</div>  

							<div class="control-group">
							  <label class="control-label" for="date01">Slider text</label>
							  <div class="controls">
									<textarea class="cleditor" name="slider_text" rows="3" required=""></textarea>
							  	</div>
							</div>  

							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Satatus</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="publication_status" required="" />
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection