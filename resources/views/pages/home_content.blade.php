@extends('layout')
@section('content')
<link href="{{asset('frontEnd/css/bootstrap-fullscreen-select.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/custom-fullscreen-select.css')}}" rel="stylesheet">
<div class="col-sm-12">
        <div class="product-details"><!--product-details-->

            <div class="introduction" id="about">
                <div class="container">
                    <div class="w3l-heading">
                        <h3>Who We Are</h3>
                        <div class="w3ls-border"> </div>
                    </div>
                    <div class="introduction-info">
                        <p>Event Scripts is a complete service event management firm which gives a grand Royal Shape and Presence to your function. We have introduced a fresh and unique style to the event management industry. We understand that a properly executed event will be leveraged to support an organization’s strategic vision, used to build networks and client loyalty.</p>
                    </div>
                </div>
            </div>

            <div class="about" id="about-2">
                <div class="container">
                    <div class="w3l-heading about-heading">
                        <h3>Our Service</h3>
                        <div class="w3ls-border about-border"> </div>
                    </div>
                    <div class="agileits-about-grids">
                        <div class="about-grids">
                            <div class="col-md-6 about-grid">
                                <div class="col-xs-3 about-grid-left">
                                    <span class="fa fa-briefcase effect-1" aria-hidden="true"></span>
                                </div>
                                <div class="col-xs-9 about-grid-right">
                                    <h4>Coporate Events</h4>
                                    <p>We provide all the services to organize your corporate events where you will receive our full hands-on attention to make the entire event successful by our dedicated staff.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-6 about-grid">
                                <div class="col-xs-3 about-grid-left">
                                    <span class="fa fa-users effect-1" aria-hidden="true"></span>
                                </div>
                                <div class="col-xs-9 about-grid-right">
                                    <h4>Private Events</h4>
                                    <p>Feel relaxed at your own party! Event Scripts will assist you in planning all kind of private events. We will ensure that your special event is planned to create cherished moments and everlasting memories.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="about-grids1">
                            <div class="col-md-6 about-grid">
                                <div class="col-xs-3 about-grid-left">
                                    <span class="fa fa-heart effect-1" aria-hidden="true"></span>
                                </div>
                                <div class="col-xs-9 about-grid-right">
                                    <h4>Weddings</h4>
                                    <p>A wedding is one of the most significant and happiest events in a couple's life which creates propounding effects on relatives and friends of both parties. Therefore, we are with you to make your dreams come true.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-6 about-grid">
                                <div class="col-xs-3 about-grid-left">
                                    <span class="fa fa-pencil effect-1" aria-hidden="true"></span>
                                </div>
                                <div class="col-xs-9 about-grid-right">
                                    <h4>Creative &amp; Design Service</h4>
                                    <p>We understand the significance of designing and creativity. Event Scripts provides wide range of Creative &amp; Design services to achieve your corporate and personal objectives.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- our team --}}
            <div class="team-dot">
                <div class="container">
                    <div class="w3l-heading about-heading">
                        <h3 style="color:#000;">Our Team</h3>
                        <div class="w3ls-border about-border"> </div>
                    </div>
                    <div class="agileits-team-grids">
                            <?php
                            $all_publised_employee = DB::table('employee')
                                                        ->where('publication_status',1)
                                                        ->get();

                            foreach ($all_publised_employee as $v_employee) { ?> 
                        <div class="col-md-3 agileits-team-grid">
                            <div class="team-info">
                                <img src="{{asset($v_employee->e_picture)}}" alt="" style="height:300px;">
                                <div class="team-caption"> 
                                    <h4>{{$v_employee->e_name}}</h4>
                                    <p>{{$v_employee->e_designation}}</p>
                                    <p>{{$v_employee->e_contact_no}}</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>

                        <div class="news" id="news">
                <div class="container">
                    <div class="w3l-heading">
                        <h3>Our News</h3>
                        <div class="w3ls-border"> </div>
                    </div>
                    <div class="wthree-news-grids">
                        <div id="design" class="date">
                            <div id="cycler"> 
    
                                <div class="wthree-news-grid">
                                    <div class="wthree-news-left">
                                        <h4>20 <span>Feb 2018</span></h4>
                                    </div>
                                    <div class="date-text">
                                       Hollywood Night-2018 
                                        <p>Designed this Hollywood themed welcome party for the new MBA in IT batch of University of Moratuwa. </p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
    
                                <div class="wthree-news-grid">
                                    <div class="wthree-news-left">
                                        <h4>15 <span>Dec 2018</span></h4>
                                    </div>
                                    <div class="date-text">
                                        Terance &amp; Betsy's little angel's First Birthday-2018
                                        <p>There is the woodland setup we did for adorable olive's first birthdayS.thank you so much Terance &amp; Betsy for letting us be part of your little angel's first birthady.
                                        </p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                
                                <div class="wthree-news-grid">
                                    <div class="wthree-news-left">
                                        <h4>08 <span>jan 2019</span></h4>
                                    </div>
                                    <div class="date-text">
                                        Kajamukan &amp; Priyanka Engagement Day-2019
                                        <p>To a cute and wounderful couple, There is a magical setup of engagement by The Event Scripts so colorfully.thank you for letting us be part of your magical engagement</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
    
                                
    
                                <div class="wthree-news-grid">
                                    <div class="wthree-news-left">
                                        <h4>23 <span>february 2019</span></h4>
                                    </div>
                                    <div class="date-text">
                                        Golden Reunion Party for the 11th Batch of Medical Students' Union-2019
                                    <p>It was our pleasure designing a Golden Reunion Party for the 11th Batch of Medical Students’ Union. Back on its golden hinges their gate of memory swang, and their hearts had gone into a garden and walked with their golden memory on this reunion day.Thank you Dr. Mrs. Geethanjali for giving us this golden opportunity.
                                    </p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
    
                                <div class="wthree-news-grid">
                                    <div class="wthree-news-left">
                                        <h4>4 <span>March 2019</span></h4>
                                    </div>
                                    <div class="date-text">
                                    Ayish's 1st Birthday-2019
                                        <p> We had an absolute pleasure in creating this prince theme setup for Ayish's 1st Birthday. Thank you Leka Mayuran for letting us be a part of your little prince's birthday.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
    
                                <div class="wthree-news-grid">
                                    <div class="wthree-news-left">
                                        <h4>14 <span>March 2019</span></h4>
                                    </div>
                                    <div class="date-text">
                                       60th Birthday celebration-2019
                                        <p>Events don’t always need to be too grand. Simple arrangements always render classy look.  </p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 text-center">
                            <h2 style="color:#fff;">Need help Your Event?</h2>
                        </div>
                        <div class="col-md-6 col-sm-6 text-center">
                            <a class="contact-button" href="tel:+94770782930">Call Us Now - 0777758198</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 text-center">
                            <h2 style="color:#fff;">Request a demo</h2>
                        </div>
                        <div class="col-md-6 col-sm-6 text-center">
                            <a class="contact-button" href="" type="button" data-toggle="modal" data-target="#myModal" >Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- Modal -->
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
                                    <input type="text" class="form-control" id="name" name="name"   required maxlength="" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    {{-- <label for="email">Email:</label> --}}
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                        {{-- <label for="email">Mobile Number:</label> --}}
                                    <input type="text" class="form-control" id="email" name="phone" required minlength="10" maxlength="10" placeholder="Enter Your Phone Number">
                                </div>
                                
                                <div class="form-group">
                                        {{-- <label for="email">Mobile Number:</label> --}}
                                    <input type="text" class="form-control datepicker"  name="date" required maxlength="" placeholder="Select Date">
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
</div>
@endsection
