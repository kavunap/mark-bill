@extends('layouts.home')

@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="hero_banner image-cover image_bottom h2_bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="simple-search-wrap text-left">
                        <div class="hero_search-2">
                            <div class="elsio_tag">LISTEN TO OUR NEW ANTHEM</div>
                            <h1 class="banner_title mb-4">Smart tools to digitalize your work</h1>
                            <p class="font-lg mb-4">Working smart is better than working hard.</p>
                            <div class="input-group simple_search">
                                <i class="fa fa-search ico"></i>
                                <input type="text" class="form-control" placeholder="Search Your service">
                                <div class="input-group-append">
                                    <button class="btn theme-bg" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="side_block">
                        <img src="assets/img/side-1.png" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Our Awards Start ================================== -->
    <section class="p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="crp_box ovr_top">
                        <div class="row align-items-center m-0">
                            <div class="col-xl-2 col-lg-3 col-md-2 col-sm-12">
                                <div class="crt_169">
                                    <div class="crt_overt style_2"><h4>4.7</h4></div>
                                    <div class="crt_stion">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="crt_io90"><h6>3,272 Rating</h6></div>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-10 col-sm-12">
                                <div class="part_rcp">
                                    <ul>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141"><i class="fa fa-layer-group"></i></div>
                                                <div class="dro_142"><h6>Best Online<br>Marking solution</h6></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141 st-1"><i class="fa fa-business-time"></i></div>
                                                <div class="dro_142"><h6>Fully Lifetime<br>Access</h6></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141 st-2"><i class="fa fa-user-shield"></i></div>
                                                <div class="dro_142"><h6>{{App\Models\School::count()}}+ <br>Schools</h6></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141 st-3"><i class="fa fa-journal-whills"></i></div>
                                                <div class="dro_142"><h6>200+ Cources<br>Available</h6></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>Enrolled
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Our Awards End ================================== -->

    <!-- ============================ Latest cources Start ================================== -->
    {{-- <section>
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h2>Recent Listed <span class="theme-cl">Cources</span></h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="slide_items">
                    
                        <!-- Single Item -->
                        <div class="lios_item">	
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="course-detail.html" class="crs_detail_link">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" alt="" />
                                    </a>
                                    <div class="crs_video_ico">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <div class="crs_locked_ico">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_cates cl_6"><span>Development</span></div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">149</span></h2></div>
                                        </div>
                                    </div>
                                    <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">Basic knowledge about hodiernal bharat in history</a></h4></div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li><i class="fa fa-clock text-danger"></i><span>02 hr 05 min</span></li>
                                            <li><i class="fa fa-video text-success"></i><span>17 Lectures</span></li>
                                        </ul>
                                    </div>
                                    <div class="preview_crs_info">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="course-detail.html" class="crs_detail_link">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" alt="" />
                                    </a>
                                    <div class="crs_video_ico">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <div class="crs_locked_ico">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_cates cl_5"><span>Finance</span></div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">99</span></h2></div>
                                        </div>
                                    </div>
                                    <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">Advance PHP knowledge with laravel to make smart web</a></h4></div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li><i class="fa fa-clock text-danger"></i><span>02 hr 47 min</span></li>
                                            <li><i class="fa fa-video text-success"></i><span>32 Lectures</span></li>
                                        </ul>
                                    </div>
                                    <div class="preview_crs_info">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="course-detail.html" class="crs_detail_link">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" alt="" />
                                    </a>
                                    <div class="crs_video_ico">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <div class="crs_locked_ico">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_cates cl_4"><span>Banking</span></div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">49</span></h2></div>
                                        </div>
                                    </div>
                                    <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">The complete accounting & bank financial course 2021</a></h4></div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li><i class="fa fa-clock text-danger"></i><span>04 hr 10 min</span></li>
                                            <li><i class="fa fa-video text-success"></i><span>40 Lectures</span></li>
                                        </ul>
                                    </div>
                                    <div class="preview_crs_info">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="course-detail.html" class="crs_detail_link">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" alt="" />
                                    </a>
                                    <div class="crs_video_ico">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <div class="crs_locked_ico">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_cates cl_3"><span>Business</span></div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">129</span></h2></div>
                                        </div>
                                    </div>
                                    <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">The complete business plan course includes 50 templates</a></h4></div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li><i class="fa fa-clock text-danger"></i><span>06 hr 07 min</span></li>
                                            <li><i class="fa fa-video text-success"></i><span>35 Lectures</span></li>
                                        </ul>
                                    </div>
                                    <div class="preview_crs_info">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="course-detail.html" class="crs_detail_link">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" alt="" />
                                    </a>
                                    <div class="crs_video_ico">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <div class="crs_locked_ico">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_cates cl_2"><span>Physics</span></div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">399</span></h2></div>
                                        </div>
                                    </div>
                                    <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">Full web designing course with 20 web template designing</a></h4></div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li><i class="fa fa-clock text-danger"></i><span>03 hr 10 min</span></li>
                                            <li><i class="fa fa-video text-success"></i><span>19 Lectures</span></li>
                                        </ul>
                                    </div>
                                    <div class="preview_crs_info">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="course-detail.html" class="crs_detail_link">
                                        <img src="https://via.placeholder.com/1200x800" class="img-fluid rounded" alt="" />
                                    </a>
                                    <div class="crs_video_ico">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <div class="crs_locked_ico">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_cates cl_1"><span>Design</span></div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">89</span></h2></div>
                                        </div>
                                    </div>
                                    <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">Sociology Optional: Test Series for UPSC CSE Mains (2021 & 2022)</a></h4></div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li><i class="fa fa-clock text-danger"></i><span>06 hr 07 min</span></li>
                                            <li><i class="fa fa-video text-success"></i><span>27 Lectures</span></li>
                                        </ul>
                                    </div>
                                    <div class="preview_crs_info">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
    </section> --}}
    <!-- ============================ Latest cources End ================================== -->

    <!-- ============================ Our Instructor Start ================================== -->
    {{-- <section class="pt-0">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h2>Our Top <span class="theme-cl">Instructors</span></h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="tutor-slide">
                    
                        <!-- Single Item -->
                        <div class="lios_item">	
                            <div class="crs_trt_grid shadow_none brd">
                                <div class="crs_trt_thumb">
                                    <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="https://via.placeholder.com/700x550" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="crs_trt_caption large">
                                    <div class="instructor_tag"><span>Hindi Teacher</span></div>
                                    <div class="instructor_title"><h4><a href="instructor-detail.html">Rodney T. Doyon</a></h4></div>
                                    <div class="trt_rate_inf">
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star-half filled"></i>
                                        <span class="alt_rates">(244 Reviews)</span>
                                    </div>
                                </div>
                                <div class="crs_trt_footer">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5k Users Enrolled</div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_trt_grid shadow_none brd">
                                <div class="crs_trt_thumb">
                                    <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="https://via.placeholder.com/700x550" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="crs_trt_caption large">
                                    <div class="instructor_tag"><span>Sanskrit Teacher</span></div>
                                    <div class="instructor_title"><h4><a href="instructor-detail.html">Luella J. Robles</a></h4></div>
                                    <div class="trt_rate_inf">
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star-half filled"></i>
                                        <span class="alt_rates">(244 Reviews)</span>
                                    </div>
                                </div>
                                <div class="crs_trt_footer">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5k Users Enrolled</div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_trt_grid shadow_none brd">
                                <div class="crs_trt_thumb">
                                    <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="https://via.placeholder.com/700x550" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="crs_trt_caption large">
                                    <div class="instructor_tag"><span>Math Teacher</span></div>
                                    <div class="instructor_title"><h4><a href="instructor-detail.html">David E. Lampkin</a></h4></div>
                                    <div class="trt_rate_inf">
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star-half filled"></i>
                                        <span class="alt_rates">(244 Reviews)</span>
                                    </div>
                                </div>
                                <div class="crs_trt_footer">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5k Users Enrolled</div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_trt_grid shadow_none brd">
                                <div class="crs_trt_thumb">
                                    <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="https://via.placeholder.com/700x550" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="crs_trt_caption large">
                                    <div class="instructor_tag"><span>History Teacher</span></div>
                                    <div class="instructor_title"><h4><a href="instructor-detail.html">Michael B. Maxwell</a></h4></div>
                                    <div class="trt_rate_inf">
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star-half filled"></i>
                                        <span class="alt_rates">(244 Reviews)</span>
                                    </div>
                                </div>
                                <div class="crs_trt_footer">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5k Users Enrolled</div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_trt_grid shadow_none brd">
                                <div class="crs_trt_thumb">
                                    <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="https://via.placeholder.com/700x550" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="crs_trt_caption large">
                                    <div class="instructor_tag"><span>PHP Developer</span></div>
                                    <div class="instructor_title"><h4><a href="instructor-detail.html">Linda R. Gibson</a></h4></div>
                                    <div class="trt_rate_inf">
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star-half filled"></i>
                                        <span class="alt_rates">(244 Reviews)</span>
                                    </div>
                                </div>
                                <div class="crs_trt_footer">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5k Users Enrolled</div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="lios_item">
                            <div class="crs_trt_grid shadow_none brd">
                                <div class="crs_trt_thumb">
                                    <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="https://via.placeholder.com/700x550" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="crs_trt_caption large">
                                    <div class="instructor_tag"><span>Chemistry Expert</span></div>
                                    <div class="instructor_title"><h4><a href="instructor-detail.html">Douglas M. Mikel</a></h4></div>
                                    <div class="trt_rate_inf">
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star-half filled"></i>
                                        <span class="alt_rates">(244 Reviews)</span>
                                    </div>
                                </div>
                                <div class="crs_trt_footer">
                                    <div class="crs_flex">
                                        <div class="crs_fl_first">
                                            <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5k Users Enrolled</div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Enroll Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
    </section> --}}
    <!-- ============================ Our Instructor End ================================== -->

    <!-- ============================ Categories Start ================================== -->
    {{-- <section class="min gray">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Select Your <span class="theme-cl">Categories</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-code"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Development</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-window-restore"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Web Designing</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-leaf"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Lifestyle</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-heartbeat"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Health & Fitness</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-landmark"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Gov. Exams</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-photo-video"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Photography</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-stamp"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Finance & Accounting</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-school"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">View Cources</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>Office Productivity</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                        </div>
                    </div>
                </div>
            
            </div>
            
        </div>
    </section> --}}
    <div class="clearfix"></div>
    <!-- ============================ Categories End ================================== -->

    <!-- ============================ Pricing Table ================================== -->
    <section class="min">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Select Your <span class="theme-cl">Package</span></h2>
                        <p>The features you will have in your dashboard will depend on the package you have. This means that the best package will have more features.</p>
                    </div>
                </div>
            </div>
            
            <div class="row align-items-center">
                
                <!-- Single Package -->
                <div class="col-lg-4 col-md-4">
                    <div class="pricing_wrap">
                        <div class="prt_head">
                            <h4>Basic</h4>
                        </div>
                        <div class="prt_price">
                            <h2><span>$</span>70</h2>
                            <span>per year</span>
                        </div>
                        <div class="prt_body">
                            <ul>
                                <li>Unlimited users(teachers)</li>
                                <li>24/7 help</li>
                                <li>Marks recoring and report generation</li>
                                <li class="none">Library control</li>
                                <li class="none">Staff documents request</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package">Start Basic</a>
                        </div>
                    </div>
                </div>
                
                <!-- Single Package -->
                <div class="col-lg-4 col-md-4">
                    <div class="pricing_wrap">
                        <div class="prt_head">
                            <div class="recommended">Best Value</div>
                            <h4>Standard</h4>
                        </div>
                        <div class="prt_price">
                            <h2><span>$</span>100</h2>
                            <span>per year</span>
                        </div>
                        <div class="prt_body">
                            <ul>
                                <li>Unlimited users(teachers)</li>
                                <li>24/7 help</li>
                                <li>Marks recoring and report generation</li>
                                <li>Library control</li>
                                <li class="none">Staff documents request</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package active">Start Standard</a>
                        </div>
                    </div>
                </div>
                
                <!-- Single Package -->
                <div class="col-lg-4 col-md-4">
                    <div class="pricing_wrap">
                        <div class="prt_head">
                            <h4>Platinum</h4>
                        </div>
                        <div class="prt_price">
                            <h2><span>$</span>150</h2>
                            <span>Per year</span>
                        </div>
                        <div class="prt_body">
                            <ul>
                                <li>Unlimited users(teachers)</li>
                                <li>24/7 help</li>
                                <li>Marks recoring and report generation</li>
                                <li>Library control</li>
                                <li>Staff documents request</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package">Start Platinum</a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
    <!-- ============================ Pricing Table End ================================== -->

    <!-- ============================ Students Reviews ================================== -->
    {{-- <section class="gray">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Our Schools <span class="theme-cl">Reviews</span></h2>
                        <p>We offer best services with 24/7 support to the shools that need to work smart and minimize time spening in works.</p>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    
                    <div class="reviews-slide space">
                        
                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Susan D. Murphy</h5>
                                            <div class="_ovr_posts"><span>CEO, Leader</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/300x300" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Maxine E. Gagliardi</h5>
                                            <div class="_ovr_posts"><span>Apple CEO</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.5</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/300x300" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Roy M. Cardona</h5>
                                            <div class="_ovr_posts"><span>Google Founder</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/300x300" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Dorothy K. Shipton</h5>
                                            <div class="_ovr_posts"><span>Linkedin Leader</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/300x300" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Robert P. McKissack</h5>
                                            <div class="_ovr_posts"><span>CEO, Leader</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="https://via.placeholder.com/300x300" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                
                </div>
            </div>
            
        </div>
    </section> --}}
    <!-- ============================ Students Reviews End ================================== -->

    <!-- ============================ Download App ================================== -->
    {{-- <section class="pb-0">
        <div class="container">
            
            <div class="row align-items-center justify-content-between rounded m-0">
                <div class="col-lg-7 col-md-7">
                    <div class="aps_crs_caption">
                        <h2 class="min_large mb-4">Get The Learning App</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        <div class="aps_buttons mt-4">
                            <a href="#" class="btn_aps mr-4">
                                <div class="aps_wrapb theme-bg"><div class="aps_ico"><img src="assets/img/apple.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Download On The</span><h4>App Store</h4></div></div>
                            </a>
                            <a href="#" class="btn_aps">
                                <div class="aps_wrapb"><div class="aps_ico"><img src="assets/img/google-play.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Get It On</span><h4>Google Play</h4></div></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="aps_crs_img mt-5">
                        <img src="assets/img/app.png" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
            
        </div>
    </section> --}}
    <div class="clearfix"></div>
    <!-- ============================ Download App ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <section class="theme-bg call_action_wrap-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="call_action_wrap">
                        <div class="call_action_wrap-head">
                            <h3>Do You Have Questions ?</h3>
                            <span>We'll help you to manage your school, library, stock, and so on.</span>
                        </div>
                        <a href="#" class="btn btn-call_action_wrap">Contact Us Today</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->

@endsection