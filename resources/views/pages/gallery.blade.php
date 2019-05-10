@extends('layout_no_slider')
@section('content')



<body>
	
	<section>
		<div class="container">
			<div class="row">	
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Our Gallery</h2>
						<?php
							$all_publised_gallery = DB::table('gallery')
														->where('publication_status',1)
                                                        ->get();

                        foreach ($all_publised_gallery as $v_gallery) { ?> 
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											@if($v_gallery->picture=='')
											<img src="backEnd/img/noimage.png" alt="No image found" style="height:300px;">
											@else
											<img src="{{asset($v_gallery->picture)}}" alt="" style="height:300px;">
											@endif
											{{-- <h2>$56</h2> --}}
											<p>{{$v_gallery->description}}</p>
											{{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												{{-- <h2>$56</h2> --}}
												<p>{{$v_gallery->description}}</p>
												{{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
											</div>
										</div>
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
					<?php } ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Contact Us</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="{{url('/save-customer')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <p>
                                    Send your message in the form below and we will get back to you as early as possible.
                                </p>
                                <div class="form-group">
                                    {{-- <label for="name"> Name:</label> --}}
                                    <input type="text" class="form-control" id="name" name="name"   required maxlength="50" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    {{-- <label for="email">Email:</label> --}}
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="50" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                        {{-- <label for="email">Mobile Number:</label> --}}
                                    <input type="number" class="form-control" id="email" name="phone" required maxlength="50" placeholder="Enter Your Phone Number">
                                </div>
                                
                                <div class="form-group">
                                        {{-- <label for="email">Mobile Number:</label> --}}
                                    <input type="TEXT" class="form-control datepicker"  name="date" required maxlength="50" placeholder="Select Date">
                                </div>
                                <div class="form-group">
                                        {{-- <label for="email">Mobile Number:</label> --}}
                                    {{-- <select  name="date" required maxlength="50" placeholder="Select Service"> --}}
                                            <select id="room-multiple" name="service[]" class="form-control mobileSelect" multiple>
                                            <option selected="selected" disabled="">Select Servise</option>
                                            <?php
                                            $all_publised_service = DB::table('service')
                                                                        ->where('publication_status',1)
                                                                        ->get();
                
                                            foreach ($all_publised_service as $v_service) { ?> 
                                        <option value="{{$v_service->service_name}}">{{$v_service->service_name}}</option>
                                            <?php } ?>
                                        {{-- <option>Video</option>
                                        <option>Decoration</option>
                                        <option>Food</option> --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="name"> Message:</label> --}}
                                <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your Message Here" maxlength="6000" rows="7" placeholder="Enter Message"></textarea>
                            </div>
                                
                            <button type="submit" class="btn btn-md btn-success" id="btnContactUs">Send</button>
                        <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
	</section>

	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
@endsection