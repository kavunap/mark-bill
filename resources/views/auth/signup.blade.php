@extends('layouts.home')
@section('content')
<!-- ============================ Signup Wrap ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">
        
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="crs_log_wrap">
                        <div class="crs_log__thumb">
                            <img src="{{asset('assets/img/user.jpg')}}" class="img-fluid" alt="new user" />
                        </div>
                        <div class="crs_log__caption">
                            <div class="rcs_log_123">
                                <div class="rcs_ico"><i class="fas fa-user"></i></div>
                            </div>
                            
                            <div class="rcs_log_124">
                                <div class="Lpo09"><h4>Create Your New Account</h4></div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-control" name="user_role" id="urole" disabled>
                                                <option value="User">User</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Super Admin">Super Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status" disabled>
                                                <option value="Active">Active</option>
                                                <option value="suspended">Suspened</option>
                                                <option value="terminated">Terminated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <ul>
                                        <li> <strong>Password rules</strong> </li>
                                        <li>The password must be at least 8 characters.</li>
                                        <li>The password must contain at least one letter.</li>
                                        <li>The password must contain at least one number.</li>
                                        <li>The password must contain at least one symbol.</li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn full-width btn-md theme-bg text-white">Sign Up</button>
                                </div>
                            </div>
                            <div class="rcs_log_125">
                                <span>Or SignUp with Social Info</span>
                            </div>
                            <div class="rcs_log_126">
                                <ul class="social_log_45 row">
                                    <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-facebook text-info"></i>Facebook</a></li>
                                    <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-google text-danger"></i>Google</a></li>
                                    <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-twitter theme-cl"></i>Twitter</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="crs_log__footer d-flex justify-content-between">
                            <div class="fhg_45"><p class="musrt">Already have account? <a href="login.html" class="theme-cl">Login</a></p></div>
                            <div class="fhg_45"><p class="musrt"><a href="forgot.html" class="text-danger">Forgot Password?</a></p></div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Signup Wrap ================================== -->
@endsection