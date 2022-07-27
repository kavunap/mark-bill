<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SkillUp - Online Learning Platform</title>
		 
        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
		
    </head>
	
    <body>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-transparent dark-text">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="assets/img/logo.png" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
									<li>
										<a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="crs_yuo12 w-auto text-white theme-bg">
											<span class="embos_45"><i class="fas fa-sign-in-alt mr-1"></i>Sign In</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper">
							<ul class="nav-menu">
							
								<li class="active"><a href="/">Home</a>
								</li>
								
								<li><a href="#">Courses<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="#">Search Courses in Grid<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="grid-layout-with-sidebar.html">Grid Layout Style 1</a></li>
												<li><a href="grid-layout-with-sidebar-2.html">Grid Layout Style 2</a></li>
												<li><a href="grid-layout-with-sidebar-3.html">Grid Layout Style 3</a></li>
												<li><a href="grid-layout-with-sidebar-4.html">Grid Layout Style 4</a></li>
												<li><a href="grid-layout-with-sidebar-5.html">Grid Layout Style 5</a></li>
												<li><a href="grid-layout-full.html">Grid Full Width</a></li>
												<li><a href="grid-layout-full-2.html">Grid Full Width 2</a></li>
												<li><a href="grid-layout-full-3.html">Grid Full Width 3</a></li>
											</ul>
										</li>
										<li><a href="#">Search Courses in List<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="list-layout-with-sidebar.html">List Layout Style 1</a></li>
												<li><a href="list-layout-with-full.html">List Full Width</a></li>
											</ul>
										</li>
										<li><a href="#">Courses Detail<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="course-detail.html">Course Detail 01</a></li>
												<li><a href="course-detail-2.html">Course Detail 02</a></li>
												<li><a href="course-detail-3.html">Course Detail 03</a></li>
												<li><a href="course-detail-4.html">Course Detail 04</a></li>
											</ul>
										</li>
										
										<li><a href="explore-category.html">Explore Category</a></li>
										<li><a href="find-instructor.html">Find Instructor</a></li>
										<li><a href="instructor-detail.html">Instructor Detail</a></li>
									</ul>
								</li>
								
								<li><a href="#">Pages<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="#">Shop Pages<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="shop-with-sidebar.html">Shop Sidebar Left</a></li>
												<li><a href="shop-with-right-sidebar.html">Shop Sidebar Right</a></li>
												<li><a href="list-shop-with-sidebar.html">Shop List Style</a></li>
												<li><a href="wishlist.html">Wishlist</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												<li><a href="product-detail.html">Product Detail</a></li>
											</ul>
										</li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact.html">Say Hello</a></li>
										<li><a href="blogs.html">Blog Style</a></li>
										<li><a href="pricing.html">Pricing</a></li>
										<li><a href="404.html">404 Page</a></li>
										<li><a href="component.html">Elements</a></li>
										<li><a href="faq.html">FAQs</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="signup.html">Signup</a></li>
										<li><a href="forgot.html">Forgot</a></li>
									</ul>
								</li>
								@if(auth()->check())
								<li class="active"><a href="/">Reports<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="/students">Students</a></li>
										<li><a href="/classrooms">Classes</a></a></li>
										<li><a href="/schools">Schools</a></li>
										<li><a href="/courses">Courses</a></li>
									</ul>
								</li>
									<li><a href="#">Account<span class="submenu-indicator"></span></a>
										<ul class="nav-dropdown nav-submenu">
											<a class="nav-link" href="{{ url('/logout') }}">Logout</a>
										</ul>
										<ul class="nav-dropdown nav-submenu">
											<a class="nav-link" href="{{ route('users.edit',Auth::user()->id) }}">Profile</a>
										</ul>
									</li>
								@endif
								
								<li><a href="/dashboard">Dashboard</a></li>
								
							</ul>
							@if(auth()->check())
								<ul class="nav-menu nav-menu-social align-to-right">
									
									<li class="account-drop">
										<a href="javascript:void(0);" class="crs_yuo12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="embos_45"><i class="fas fa-shopping-basket"></i><i class="embose_count">4</i></span>
										</a>
										<div class="dropdown-menu pull-right animated flipInX">
											<div class="drp_menu_headr bg-purple">
												<h4>Wishlist Product</h4>
											</div>
											<div class="ground-list ground-hover-list">
												<div class="ground ground-list-single">
													<div class="grd_thum"><img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" width="50" alt="" /></div>
													<div class="ground-content">
														<h6>Web History<small class="float-right text-fade">$120</small></h6>
														<a href="#" class="small text-danger">Remove</a>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<div class="grd_thum"><img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" width="50" alt="" /></div>
													<div class="ground-content">
														<h6>Physics Beginning<small class="float-right text-fade">$99</small></h6>
														<a href="#" class="small text-danger">Remove</a>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<div class="grd_thum"><img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" width="50" alt="" /></div>
													<div class="ground-content">
														<h6>Computer Fundamental<small class="float-right text-fade">$99</small></h6>
														<a href="#" class="small text-danger">Remove</a>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<div class="grd_thum"><img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" width="50" alt="" /></div>
													<div class="ground-content">
														<h6>Computer Advance<small class="float-right text-fade">$49</small></h6>
														<a href="#" class="small text-danger">Remove</a>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<button type="button" class="btn theme-bg text-white full-width">Go To Cart</button>
												</div>
												
											</div>
										</div>
									</li>
									<li class="account-drop">
										<a href="javascript:void(0);" class="crs_yuo12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="embos_45"><i class="fas fa-bell"></i><i class="embose_count red">3</i></span>
										</a>
										<div class="dropdown-menu pull-right animated flipInX">
											<div class="drp_menu_headr bg-warning">
												<h4>22 Notifications</h4>
											</div>
											<div class="ground-list ground-hover-list">
												<div class="ground ground-list-single">
													<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-success">
														<div class="position-absolute text-success h5 mb-0"><i class="fas fa-user"></i></div>
													</div>

													<div class="ground-content">
														<h6><a href="#">Maryam Amiri</a></h6>
														<small class="text-fade">New User Enrolled in Python</small>
														<span class="small">Just Now</span>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-danger">
														<div class="position-absolute text-danger h5 mb-0"><i class="fas fa-comments"></i></div>
													</div>

													<div class="ground-content">
														<h6><a href="#">Shilpa Rana</a></h6>
														<small class="text-fade">Shilpa Send a Message</small>
														<span class="small">02 Min Ago</span>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-info">
														<div class="position-absolute text-info h5 mb-0"><i class="fas fa-grin-squint-tears"></i></div>
													</div>

													<div class="ground-content">
														<h6><a href="#">Amar Muskali</a></h6>
														<small class="text-fade">Need Responsive Business Tem...</small>
														<span class="small">10 Min Ago</span>
													</div>
												</div>
												
												<div class="ground ground-list-single">
													<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-purple">
														<div class="position-absolute text-purple h5 mb-0"><i class="fas fa-briefcase"></i></div>
													</div>

													<div class="ground-content">
														<h6><a href="#">Maryam Amiri</a></h6>
														<small class="text-fade">Next Meeting on Tuesday..</small>
														<span class="small">15 Min Ago</span>
													</div>
												</div>
												
											</div>
										</div>
									</li>
									<li>
										<div class="btn-group account-drop">
											<a href="javascript:void(0);" class="crs_yuo12 btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<img src="https://via.placeholder.com/500x500" class="avater-img" alt="">
											</a>
											<div class="dropdown-menu pull-right animated flipInX">
												<div class="drp_menu_headr">
													<h4>Hi, Daniel</h4>
												</div>
												<ul>
													<li><a href="dashboard.html"><i class="fa fa-tachometer-alt"></i>Dashboard<span class="notti_coun style-1">4</span></a></li>                                  
													<li><a href="my-profile.html"><i class="fa fa-user-tie"></i>My Profile</a></li>                                 
													<li><a href="manage-course.html"><i class="fas fa-shopping-basket"></i>Manage Courses<span class="notti_coun style-2">7</span></a></li>
													<li><a href="manage-instructor.html"><i class="fas fa-toolbox"></i>Manage Instructor</a></li>
													<li><a href="manage-students.html"><i class="fa fa-envelope"></i>Manage Students<span class="notti_coun style-3">3</span></a></li>
													<li><a href="messages.html"><i class="fas fa-comments"></i>Messages</a></li>
													<li><a class="dropdown-item" href="{{ route('logout') }}"
														onclick="event.preventDefault();
																		document.getElementById('logout-form').submit();">
														<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
															@csrf
														</form>
														<i class="fa fa-unlock-alt"></i>Sign Out</a></li>
													

													
												</ul>
											</div>
										</div>
									</li>
								</ul>
							@else
							
								<ul class="nav-menu nav-menu-social align-to-right">
									
									<li>
										<a href="/login" class="alio_green" data-toggle="modal" data-target="#login">
											<i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
										</a>
									</li>
									<li class="add-listing theme-bg">
										<a href="/register" class="text-white">Get Started</a>
									</li>
								</ul>
							@endif
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			@yield('content')
			
			<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer style-2">
				<div class="footer-middle">
					<div class="container">
						<div class="row">
							
							<div class="col-lg-5 col-md-5">
								<div class="footer_widget">
									<img src="assets/img/logo-light.png" class="img-footer small mb-2" alt="" />
									<h4 class="extream mb-3">Do you need help with<br>anything?</h4>
									<p>Receive updates, hot deals, tutorials, discounts sent straignt in your inbox every month</p>
									<div class="foot-news-last">
										<div class="input-group">
										  <input type="text" class="form-control" placeholder="Email Address">
											<div class="input-group-append">
												<button type="button" class="input-group-text theme-bg b-0 text-light">Subscribe</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-7 ml-auto">
								<div class="row">
								
									<div class="col-lg-4 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Layouts</h4>
											<ul class="footer-menu">
												<li><a href="#">Home Page</a></li>
												<li><a href="#">About Page</a></li>
												<li><a href="#">Service Page</a></li>
												<li><a href="#">Property Page</a></li>
												<li><a href="#">Contact Page</a></li>
												<li><a href="#">Single Blog</a></li>
											</ul>
										</div>
									</div>
											
									<div class="col-lg-4 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">All Sections</h4>
											<ul class="footer-menu">
												<li><a href="#">Headers<span class="new">New</span></a></li>
												<li><a href="#">Features</a></li>
												<li><a href="#">Attractive<span class="new">New</span></a></li>
												<li><a href="#">Testimonials</a></li>
												<li><a href="#">Videos</a></li>
												<li><a href="#">Footers</a></li>
											</ul>
										</div>
									</div>
							
									<div class="col-lg-4 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Company</h4>
											<ul class="footer-menu">
												<li><a href="#">About</a></li>
												<li><a href="#">Blog</a></li>
												<li><a href="#">Pricing</a></li>
												<li><a href="#">Affiliate</a></li>
												<li><a href="#">Login</a></li>
												<li><a href="#">Changelog<span class="update">Update</span></a></li>
											</ul>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-12 col-md-12 text-center">
								<p class="mb-0">© 2021 SkillUp. Designd By <a href="https://themezhub.com">ThemezHub</a>.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content overli" id="loginmodal">
						<div class="modal-header">
							<h5 class="modal-title">Login Your Account</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
							</button>
						  </div>
						<div class="modal-body">
							<div class="login-form">
								<form method="POST" action="{{ route('login') }}">
									@csrf

									<div class="form-group">
										<label>User Name</label>
										<div class="input-with-icon">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-with-icon">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
											<i class="ti-unlock"></i>
										</div>
									</div>
									
									<div class="form-group row">
										<div class="col-xl-4 col-lg-4 col-4">
											<input id="admin" class="checkbox-custom" name="admin" type="checkbox">
											<label for="admin" class="checkbox-custom-label">Admin</label>
										</div>
										<div class="col-xl-4 col-lg-4 col-4">
											<input id="student" class="checkbox-custom" name="student" type="checkbox" checked>
											<label for="student" class="checkbox-custom-label">Student</label>
										</div>
										<div class="col-xl-4 col-lg-4 col-4">
											<input id="instructor" class="checkbox-custom" name="instructor" type="checkbox">
											<label for="instructor" class="checkbox-custom-label">Tutors</label>
										</div>
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width theme-bg text-white">Login</button>
									</div>
									
									<div class="rcs_log_125 pt-2 pb-3">
										<span>Or Login with Social Info</span>
									</div>
									<div class="rcs_log_126 full">
										<ul class="social_log_45 row">
											<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-facebook text-info"></i>Facebook</a></li>
											<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-google text-danger"></i>Google</a></li>
											<li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-twitter theme-cl"></i>Twitter</a></li>
										</ul>
									</div>
								
								</form>
							</div>
						</div>
						<div class="crs_log__footer d-flex justify-content-between mt-0">
							<div class="fhg_45"><p class="musrt">Don't have account? <a href="signup.html" class="theme-cl">SignUp</a></p></div>
							<div class="fhg_45"><p class="musrt"><a href="forgot.html" class="text-danger">Forgot Password?</a></p></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/select2.min.js') }}"></script>
		<script src="{{ asset('assets/js/slick.js') }}"></script>
		<script src="{{ asset('assets/js/moment.min.js') }}"></script>
		<script src="{{ asset('assets/js/daterangepicker.js"') }}"></script> 
		<script src="{{ asset('assets/js/summernote.min.js') }}"></script>
		<script src="{{ asset('assets/js/metisMenu.min.js"') }}"></script>	
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		<!-- Morris.js charts -->
		<script src="{{ asset('assets/js/raphael.min.js') }}"></script>
		<script src="{{ asset('assets/js/morris.min.js') }}"></script>
		
		<!-- Custom Morrisjs JavaScript -->
		<script src="{{ asset('assets/js/morris.js') }}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->		

	</body>
</html>