@extends('layouts.fontend.fontend-master')
@section('title', 'Blogs')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    @php
        function bn_replace($str){
             $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
             $bn =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
             $str = str_replace($en, $bn, $str);
             return $str;
         }
    @endphp
    {{-- Breadcrumb Start --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Blog Details</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{ asset($blog->feature_image) }}" alt="">
                            <h1>{{ $blog->title }}</h1>
                            <span class="author">{{ $blog->relationWithUser->name }}</span>
                            <span class="review">7 Comments</span>
                            <span class="date-time">{{ \Carbon\Carbon::parse($blog->created_at)->format('l m F Y') }}</span>
                            <p>{!! $blog->description !!}</p>
                            {{-- <div class="col-sm-6">
                                <div class="favorite-button m-t-10">
                                     <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="social-media">
                                {{-- <h3>share post:</h3>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a> --}}
                                <div class="favorite-button m-auto">
                                    <div style="text-align: start" class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}">
                                   </div>
                               </div>

                            </div>
                        </div>
                        {{-- <div class="blog-post-author-details wow fadeInUp">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ (!empty($blog->relationWithUser->image) ? asset($blog->relationWithUser->image) : asset('fontend/assets/images/upload/profile_img.png')) }}" alt="Responsive image" class="img-circle img-responsive">
                                </div>
                                <div class="col-md-10">
                                    <h4>{{ $blog->relationWithUser->name }} </h4>
                                    <div class="btn-group author-social-network pull-right">
                                        <span>Follow me on</span>
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa-brands fa-twitter"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#"><i class="fa-brands fa-facebook"></i>Facebook</a></li>
                                            <li><a href="#"><i class="fa-brands fa-linkedin"></i>Linkedin</a></li>
                                            <li><a href="#"><i class="fa-brands fa-pinterest"></i>Pinterst</a></li>
                                        </ul>
                                    </div>
                                    <span class="author-job">Web Designer</span>
			                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                </div>
                            </div>
                        </div> --}}

                        <div class="blog-review wow fadeInUp">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session()->get('language') == 'bangle')
                                        <h3 class="title-review-comments">{{ count($blogcommentsall) }} মন্তব্য</h3>
                                    @else
                                        <h3 class="title-review-comments">{{ count($blogcommentsall) }} Comments</h3>
                                    @endif
                                </div>


                                <div class="grid grid-cols-1 gap-[1.875rem] sm:grid-cols-2 md:grid-cols-3" id="blog_data">
                                    <!-- Posts -->
                                @include('layouts.fontend.blog.comment-loadmore')
                                </div>

                                @if (count($blogcommentsall) > 0)
                                    <div class="load_more_button">
                                        <div class="post-load-more col-md-12">
                                            <a href="#!" id="load-more" blog-id="{{$blog->id}}" data-count="3" class="load_more btn btn-upper btn-primary" >
                                                Load more
                                            </a>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>
                                        @if (session()->get('language') == 'bangle')
                                            মতামত দিন
                                        @else
                                            Leave A Comment
                                        @endif
                                    </h4>
                                    <div class="comment_title">
                                        <h4>
                                            <a class="text-info" href="{{ route('login') }}">Login</a>
                                            @if (session()->get('language') == 'bangle')অথবা @else or @endif
                                            <a  class="text-info" href="{{ route('register') }}">Register</a>
                                            @if (session()->get('language') == 'bangle') প্রশ্ন জিজ্ঞাসা করতে@else to ask questions @endif
                                        </h4>
                                        {{-- <p>Total Question (100)</p> --}}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @if(Auth::check())
                                    <form class="register-form" role="form" action="{{ route('blog.comment.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        {{-- <input type="hidden" name="auth_id" value="{{ Auth::user()->name }}"> --}}
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                            <textarea name="comment" class="form-control unicase-form-control" id="exampleInputComments" cols="30" rows="10"></textarea>
                                            @error('comment')
                                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 outer-bottom-small m-t-20">
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                        </div>
                                    </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            @include('layouts.fontend.inc.blog-sidebar')
                            <!-- ======= PRODUCT TAGS ======= -->
                            @include('layouts.fontend.inc.products-tags')
                            <!-- ======= PRODUCT TAGS : END ========= -->
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.fontend.brandlogo')
        </div>
    </div>

</div>

@endsection

@section('scripts')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0&appId=519249602090939&autoLogAppEvents=1" nonce="4SHUMDc0"></script>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=615c7a6ed602b900198af761&product=inline-share-buttons" data-href="{{ Request::url() }}" async="async"></script>

    <script>
        $(document).ready(function () {
            $('.load_more').click(function () {
                let count = $(this).attr('data-count');
                let load_more = $(this);
                let blog_id = $(this).attr('blog-id');
                // alert(blog_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('blogcomments.load-more') }}",
                    type: "post",
                    data:{
                        count:count,
                        blog_id:blog_id,
                    },
                    success: function(data)
                    {
                        console.log(data);
                        $(load_more).attr('data-count', data.count);
                        if ((data.blog_count) <= 3) {
                            $('.load_more_button').hide();
                        }
                        $('#blog_data').append(data.data);
                    }
                })
            });
        });
    </script>

@endsection
