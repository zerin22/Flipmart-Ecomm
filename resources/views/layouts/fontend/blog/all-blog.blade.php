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
                    <li class='active'>Blog</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    {{-- Breadcrumb End --}}

    {{-- Body Content Start --}}
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        @forelse ($blogs as $blog)
                        <div class="blog-post  wow fadeInUp">
                            <a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}"><img class="img-responsive" src="{{ asset($blog->feature_image) }}" alt=""></a>
                            <h1><a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}">{{ $blog->title }}</a></h1>
                            <span class="author">{{ $blog->relationWithUser->name }}</span>
                            <span class="review">6 Comments</span>
                            {{-- <span class="date-time">14/06/2016 10.00AM</span> --}}
                            <span class="date-time">{{ \Carbon\Carbon::parse($blog->created_at)->format('l m F Y h:i:s A') }}</span>
                            <p>{!! substr($blog->description, 0, 500) !!}.... <a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}">Read More</a></p>
                            <a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}" class="btn btn-upper btn-primary read-more">read more</a>
                        </div>
                        @empty
                            <h3 class="text-danger font-weight-bold pb-3">
                                @if(session()->get('language') == 'bangle') পাওয়া যায় নি @else Not Found @endif
                            </h3>
                        @endforelse

                        <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                            <div class="text-right">
                                {{ $blogs->links('vendor.pagination.custom') }}
                            </div><!-- /.text-right -->
                        </div><!-- /.filters-container -->
                    </div>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">

                            @include('layouts.fontend.inc.blog-sidebar')
                                    <!-- ========= PRODUCT TAGS ============= -->
                            @include('layouts.fontend.inc.products-tags')
                            <!-- =============== PRODUCT TAGS : END ================= -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============ BRANDS CAROUSEL ============== -->
            @include('layouts.fontend.brandlogo')
            <!-- ======= BRANDS CAROUSEL : END ======= -->	</div>
        </div>
    </div>
    {{-- Body Content End --}}

</div>

@endsection
