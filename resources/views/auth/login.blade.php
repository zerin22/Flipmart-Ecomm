@extends('layouts.fontend.fontend-master')

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->

                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-sm-12 sign-in">
                        @error('Banned')
                            <h4 class="alert alert-danger">{{ $message }}</h4>
                        @enderror
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="{{ route('login.facebook') }}" class="github-sign-in"><i class="fab fa-github"></i> Sign In with GitHub</a>
                            <a href="{{ route('login.google') }}" class="twitter-sign-in"><i class="fab fa-google"></i> Sign In with Google</a>
                        </div>
                        <form class="register-form outer-top-xs" method="POST" action="{{ route('login') }} ">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" id="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>

                            </div>
                            <button type="submit" class="btn-upper btn btn-primary Login">Login</button>
                        </form>
                        <center>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></center>
                    </div>
                    <!-- Sign-in -->
                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('layouts.fontend.brandlogo')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
        </div>


@endsection
