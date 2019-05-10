<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('frontEnd/images/event1.png')}}"/>
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/royal.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/colorpicker.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/bootstrap-fullscreen-select.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/custom-fullscreen-select.css')}}" rel="stylesheet">
    
   <!--  //custom product zoom 
 --><link href="{{asset('frontEnd/css/custom.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <!-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
                        <?php
                                $all_publised_contact = DB::table('tbl_contact')
                                                        ->where('publication_status',1)
                                                        ->get();

                                foreach ($all_publised_contact as $v_contact) { ?>
                                   
                                
                        
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#0d166d;">
        <div class="header_top"><!--header_top-->
            <div class="container col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contactinfo">
                            <ul class="nav nav-pills" style="color: white;">
                                <li style="margin-top: 13px; margin-right: 20px;"><i class="fa fa-phone"></i> {{$v_contact->contact_mobile}}</a></li>
                                <li style="margin-top: 13px; margin-right: 20px;"><i class="fa fa-envelope"></i> {{$v_contact->contact_email}} </a></li>
                                <li><a href="{{URL::to('/')}}"> <i class="fa fa-home"> Home</i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-sm-8">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL::to($v_contact->contact_facebook)}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{URL::to($v_contact->contact_twitter)}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{URL::to($v_contact->contact_linkedin)}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{URL::to($v_contact->contact_googleplus)}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search. . ."/> <button class="btn-success">submit</button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                           <div class="mainmenu pull-left">
                           <!--  <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}"> 
                                    <i class="fa fa-home"> Home</i>
                                </a></li>
                                <li><a href="contact-us.html">

                                <i class="fa fa-phone"> Contact</i>
                            </a></li>
                        </ul> -->
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul>
                                <li><a href="{{URL::to('/contact')}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> Contact</a></li>
								<li><a href="{{URL::to('/gallery')}}"><i class="fa fa-star"></i> Gallery</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> About Us</a></li>
								{{-- <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    </nav><!--/header-->
    
    <?php 
    $all_published_slider=DB::table('tbl_slider')
    ->where('publication_status',1)
    ->get(); 

?>  
<p class="alert-success">
        <?php
        $message = Session::get('message');
        if($message)
        {
            echo "$message";
            Session::put('message',null);
        }
        ?>
<div class="jumbotron" style="background-color: white;"></div>

 
<section id="slider">
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $all_published_slider   = DB::table('tbl_slider')
                                                    ->where('publication_status',1)
                                                    ->get();

                                                $i=1;
                                                foreach ($all_published_slider as $v_slider) {

                                                     if($i==1){
                        ?>
                        <div class="item active">
                        <?php } else { ?>
                            <div class="item">
                            <?php } ?>
                            <!-- slider text here -->
                            <div class="col-sm-4">
                                <h1><span>{{$v_slider->slider_heading}}</span></h1>
                                <p>{{$v_slider->slider_text}}</p>
                            </div>
                            <div class="col-sm-8">
                                <img src="{{asset($v_slider->slider_image)}}" class="girl img-responsive" alt="Slider image missing" />
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->
        <div class="container" style="width: 100%;">
            <div class="row">
                
                
                <div class="col-sm-12">
                    <div class="features_items"><!--features_items-->
                      @yield('content')
                    </div>
            </div>
        </div>
    </div>

    </section>
    <div class="jumbotron" style="background-color: #fff;"></div>
    <!-- Footer -->
<footer class="page-footer font-small" style="height:auto; background-color:#0d166d;">
    <!-- Footer Elements -->
    <div class="container">
      <!--Grid row-->
      <div class="row">
        <div class="alert alert-warning" role="alert">
          <h4 class="alert-heading">Event Script</h4>
          <p class="alert alert-success">Event Scripts is a complete service event management firm which gives a grand Royal Shape and Presence to your function. We have introduced a fresh and unique style to the event management industry. We understand that a properly executed event will be leveraged to support an organization’s strategic vision, used to build networks and client loyalty.</p>
        </div>
        <?php 
        $footer_iamges = DB::table('gallery')
                        ->where('publication_status',1)
                        ->inRandomOrder()
                        ->limit(4)
                        ->get();
        foreach($footer_iamges as $v_gallery){ 

        ?>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                  @if($v_gallery->picture=='')
                  <img src="backEnd/img/noimage.png" alt="No image found" style="height:200px;">
                  @else
                  <img src="{{asset($v_gallery->picture)}}" alt="" style="height:200px;">
                  @endif
                  {{-- <h2>$56</h2> --}}
                  {{-- <p>{{$v_gallery->description}}</p> --}}
                  {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                </div>
                <div class="product-overlay">
                  <div class="overlay-content">
                    {{-- <h2>$56</h2> --}}
                    {{-- <p>{{$v_gallery->description}}</p> --}}
                    {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                  </div>
                </div>
            </div>
            <div class="choose">
              {{-- <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
              </ul> --}}
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="http://localhost/eventM/public/"> EventScript.com</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
   

 
   <script src="{{asset('frontEnd/js/jquery.js')}}"></script>
   <script src="{{asset('frontEnd/js/bootstrapcolor.js')}}"></script>
   <script src="{{asset('frontEnd/js/colorpicker.js')}}"></script>
   <script src="{{asset('frontEnd/js/datepicker.js')}}"></script>
   <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
   <script src="{{asset('frontEnd/js/price-range.js')}}"></script>
   <script src="{{asset('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
   <script src="{{asset('frontEnd/js/main.js')}}"></script>
   <script src="{{asset('frontEnd/js/bootstrap-fullscreen-select.js')}}"></script>
   {{-- <script src="{{ asset('js/fullselect/bootstrap-fullscreen-select.js') }}"></script> --}}
   
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                startDate:  '+1d'
            });

            $(".datepicker").keydown(function (event) {
                return false;
            });

            $('.timepicker').timepicker({defaultTime: ""});
            var localDate = moment(moment.utc(new Date)).local();
            var formatted_time = localDate.format("h:mm A");
            $('.timepicker').timepicker('setTime', (formatted_time));
            
            $(function() {
        $('#cp2').colorpicker();
    });
    });
    </script>
</body>
</html>