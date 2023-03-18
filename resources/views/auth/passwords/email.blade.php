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
                    <div class="col-md-12 col-sm-12 sign-in m-auto ">

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form class="register-form outer-top-xs" method="POST" action="{{ route('password.email') }} ">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="text" id="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                        </form>
                        <div class="text-right">
                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}">{{ __('login') }}</a>
                        </div>
                    </div>
                    <!-- Reset password -->

                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('layouts.fontend.brandlogo')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>


@endsection
