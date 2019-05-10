@extends('employee_layout')
@section('employee_content')
<style type="text/css">


body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 20%;
  height: 20%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}


element.style {
}
table[Attributes Style] {
    width: 100%;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    -webkit-border-horizontal-spacing: 0px;
    -webkit-border-vertical-spacing: 0px;
}
user agent stylesheet
table {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: grey;
}
</style>
<div class="container">
    <div class="row profile">
		<div class="col-md-5" style="width: 400px;">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic profile-usertitle-job">
					
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<img src="{{asset($employee_info ->e_picture)}}" class="img-responsive" alt="" style="border-radius: 50%; height: 30%; width: 30%;">
					</div>
					<div class="profile-usertitle-job">
					{{$employee_info->e_name}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
					</ul>
				</div>
				<table cellspacing="0" cellpadding="0" border="0" width="100%">
					<tbody>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Account Name
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$employee_info->e_name}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Email Address
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$employee_info->e_user_name}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Mobile Number
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$employee_info->e_contact_no}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">Designation
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$employee_info->e_designation}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>

						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">Description
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$employee_info->e_description}}
							</td>
							
						</tr>

						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Password
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">**********
							</td>
							
						</tr>
					</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

@endsection
