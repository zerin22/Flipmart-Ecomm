@extends('layouts.fontend.fontend-master')
@section('title', 'Home')
@section('content')


    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">

        @php
            function bn_replace($str){
                 $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
                 $bn =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
                 $str = str_replace($en, $bn, $str);
                 return $str;
             }
        @endphp
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    @include('layouts.fontend.inc.main-category')

                    <!-- ============================================== HOT DEALS ============================================== -->
                        @include('layouts.fontend.inc.hot-deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->


                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle')
                                বিশেষ অফার
                            @else
                             Special Offer
                            @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @forelse($spacial_offers as $spacial_offer)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_bn) }}">
                                                                        <img src="{{ asset($spacial_offer->product_thumbnail) }}" alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_en) }}">
                                                                        <img src="{{ asset($spacial_offer->product_thumbnail) }}" alt="">
                                                                    </a>
                                                                @endif
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_bn) }}">{{ $spacial_offer->product_title_bn }}</a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_en) }}">{{ $spacial_offer->product_title_en }}</a>
                                                                @endif
                                                            </h3>
                                                            {{--  rating --}}
                                                            @if(\App\Models\ReviewModel::where('product_id',  $spacial_offer->id)->first())
                                                                @php
                                                                    $reviewProducts = \App\Models\ReviewModel::where('product_id',  $spacial_offer->id)->where('status', 'approved')->latest()->get();
                                                                    $rating = \App\Models\ReviewModel::where('product_id',  $spacial_offer->id)->where('status', 'approved')->avg('rating');
                                                                    $avarageRating = number_format($rating, 1);
                                                                @endphp
                                                                @for($i=1; $i<=5; $i++)
                                                                    <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}}"></span>
                                                                @endfor
                                                            @else
                                                                <span style="color:red; font-weight-bold:700">No Rating</span>
                                                            @endif
                                                            <div class="product-price">
                                                                @if($spacial_offer->discount_price == NULL)
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace($spacial_offer->selling_price) }}</span>
                                                                    @else
                                                                        <span class="price">${{ $spacial_offer->selling_price }}</span>
                                                                    @endif
                                                                @else
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace($spacial_offer->discount_price) }}</span>
                                                                    @else
                                                                        <span class="price">${{ $spacial_offer->discount_price }}</span>
                                                                    @endif
                                                                @endif
                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->
                                        </div>
                                        @empty
                                            <h3 style="color:red; font-weight:bold;">
                                                @if(session()->get('language') == 'bangle')
                                                    কোন পণ্য পাওয়া যায় নি
                                                @else
                                                    No Product Found
                                                @endif
                                            </h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->

                  @include('layouts.fontend.inc.products-tags');


                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle')
                                বিশেষ চুক্তি
                            @else
                                Special Deals
                            @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @forelse($spacial_deals as $spacial_deal)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_bn) }}">
                                                                            <img src="{{ asset($spacial_deal->product_thumbnail) }}" alt="">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_en) }}">
                                                                            <img src="{{ asset($spacial_deal->product_thumbnail) }}" alt="">
                                                                        </a>
                                                                    @endif
                                                                </div><!-- /.image -->
                                                            </div><!-- /.product-image -->
                                                        </div><!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_bn) }}">{{ $spacial_deal->product_title_bn }}</a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_en) }}">{{ $spacial_deal->product_title_en }}</a>
                                                                    @endif
                                                                </h3>
                                                                {{--  rating --}}
                                                                @if(\App\Models\ReviewModel::where('product_id',  $spacial_deal->id)->first())
                                                                    @php
                                                                        $reviewProducts = \App\Models\ReviewModel::where('product_id',  $spacial_deal->id)->where('status', 'approved')->latest()->get();

                                    $rating = \App\Models\ReviewModel::where('product_id',$spacial_deal->id)->where('status', 'approved')->avg('rating');
                       $avarageRating = number_format($rating, 1);
                                                                    @endphp
                                                                    @for($i=1; $i<=5; $i++)
                                                                        <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}}"></span>
                                                                    @endfor
                                                                @else
                                                                    <span style="color:red; font-weight-bold:700">No Rating</span>
                                                                @endif
                                                                <div class="product-price">
                                                                    @if($spacial_deal->discount_price == NULL)
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">৳{{ bn_replace($spacial_deal->selling_price) }}</span>
                                                                        @else
                                                                            <span class="price">${{ $spacial_deal->selling_price }}</span>
                                                                        @endif
                                                                    @else
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">৳{{ bn_replace($spacial_deal->discount_price) }}</span>
                                                                        @else
                                                                            <span class="price">${{ $spacial_deal->discount_price }}</span>
                                                                        @endif
                                                                    @endif
                                                                </div><!-- /.product-price -->
                                                            </div>
                                                        </div><!-- /.col -->
                                                    </div><!-- /.product-micro-row -->
                                                </div><!-- /.product-micro -->
                                            </div>
                                        @empty
                                            <h3 style="color:red; font-weight:bold;">
                                                @if(session()->get('language') == 'bangle')
                                                    কোন পণ্য পাওয়া যায় নি
                                                @else
                                                    No Product Found
                                                @endif
                                            </h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ================== SPECIAL DEALS : END ============= -->
                    <!-- ============= Testimonials ============== -->
                        @include('layouts.fontend.inc.testmonial');
                    <!-- ============== Testimonials: END ============ -->
                    <div class="home-banner">
                        <img src="{{ asset('fontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>
                </div><!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @php
                                $sliders = App\Models\sliders::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
                            @endphp
                            @foreach($sliders as $slider)
                                <div class="item" style="background-image: url({{ asset($slider->sliderImage)}});">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">
                                            <div class="slider-header fadeInDown-1">
                                                @if (session()->get('language') == 'bangle')
                                                    {{$slider->subTitle_bn}}
                                                @else
                                                    {{ $slider->subTitle_en }}
                                                @endif
                                            </div>
                                            <div class="big-text fadeInDown-1">
                                                @if (session()->get('language') == 'bangle')
                                                    {{$slider->title_bn}}
                                                @else
                                                    {{ $slider->title_en }}
                                                @endif
                                            </div>

                                            <div class="excerpt fadeInDown-2 hidden-xs">

                                                <span>
                                                    @if (session()->get('language') == 'bangle')
                                                        {{$slider->description_bn}}
                                                    @else
                                                        {{ $slider->description_en }}
                                                    @endif
                                                </span>

                                            </div>
                                            {{-- <div class="button-holder fadeInDown-3">
                                                <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                            </div> --}}
                                        </div><!-- /.caption -->
                                    </div><!-- /.container-fluid -->
                                </div><!-- /.item -->
                            @endforeach

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- /.row -->
                        </div><!-- /.info-boxes-inner -->

                    </div><!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">
                                @if(session()->get('language') == 'bangle') নতুন পণ্য @else New Products @endif
                            </h3>
                            @php
                                $tabcategorys = \App\Models\Category::orderBy('category_name_en', 'ASC')->limit(3)->get();
                            @endphp
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                                        @if(session()->get('language') == 'bangle')সব @else All @endif </a></li>
                                @foreach($tabcategorys as $cat)
                                <li><a data-transition-type="backSlide" href="#category{{ $cat->id }}" data-toggle="tab">
                                        @if(session()->get('language') == 'bangle')
                                            {{ $cat->category_name_bn }}
                                        @else
                                            {{ $cat->category_name_en }}
                                        @endif
                                    </a></li>
                                @endforeach
                            </ul><!-- /.nav-tabs -->
                        </div>

                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @foreach($tabAllProducts as $tabAllProduct)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                @endif
                                                            </div><!-- /.image -->
                                                            @php
                                                                $amount = $tabAllProduct->selling_price - $tabAllProduct->discount_price;
                                                                $parsentage = ($amount /$tabAllProduct->selling_price)*100;
                                                            @endphp
                                                            @if($tabAllProduct->discount_price == NULL)
                                                                <div class="tag sale">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span>নতুন</span>
                                                                    @else
                                                                        <span>New</span>
                                                                    @endif
                                                                </div>
                                                            @else
                                                                <div class="tag new">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span>{{ bn_replace(round($parsentage))  }}%</span>
                                                                    @else
                                                                        <span>{{round($parsentage)}}%</span>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        </div><!-- /.product-image -->
                                                        <div class="product-info text-left">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}">{{ $tabAllProduct->product_title_bn }}</a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}">{{ $tabAllProduct->product_title_en }}</a>
                                                                @endif
                                                            </h3>


                                                            @if(\App\Models\ReviewModel::where('product_id', $tabAllProduct->id)->first())
                                                                @php
                                                                    $reviewProducts = \App\Models\ReviewModel::where('product_id',  $tabAllProduct->id)->where('status', 'approved')->latest()->get();

                                                                        $rating = \App\Models\ReviewModel::where('product_id',  $tabAllProduct->id)->where('status', 'approved')->avg('rating');
                                                                        $avarageRating = number_format($rating, 1);
                                                                @endphp
                                                                @for($i=1; $i<=5; $i++)
                                                                    <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}}"></span>
                                                                @endfor
                                                            @else
                                                                <span style="color:red; font-weight-bold:700">No Rating</span>
                                                            @endif

                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                @if( $tabAllProduct->discount_price == NULL)
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace($tabAllProduct->selling_price) }} </span>
                                                                    @else
                                                                        <span class="price">${{ $tabAllProduct->selling_price }} </span>
                                                                    @endif
                                                                @else
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace( $tabAllProduct->discount_price)  }} </span>
                                                                        <span class="price-before-discount">${{ bn_replace($tabAllProduct->selling_price) }}</span>
                                                                    @else
                                                                        <span class="price">${{ $tabAllProduct->discount_price }} </span>
                                                                        <span class="price-before-discount">${{ $tabAllProduct->selling_price }}</span>
                                                                    @endif
                                                                @endif
                                                            </div><!-- /.product-price -->
                                                        </div><!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="modal" data-target="#cardModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $tabAllProduct->id }}" onclick="cardView(this.id)">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>

                                                                    </li>

                                                                    {{-- tab slider wishlis --}}
                                                                    <li class="lnk wishlist">
                                                                        <a style="cursor:pointer" class="icon" id="{{ $tabAllProduct->id }}" onclick="addWishList(this.id)">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        </a>
                                                                    </li>
                                                                    {{-- tab slider wishlis --}}
                                                                    <li class="lnk">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}" title="তুলনা করা">
                                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                                            </a>
                                                                        @else
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}" title="Compare">
                                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                                            </a>
                                                                        @endif
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            @foreach($tabcategorys as $cat)
                                <div class="tab-pane" id="category{{ $cat->id }}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                            @php
                                                $categoryWiseProducts = \App\Models\Product::where('category_id', $cat->id)->orderBy('id', 'DESC')->get();
                                            @endphp
                                            @forelse($categoryWiseProducts as $tabAllProduct)
                                                <div class="item item-carousel">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                    @endif
                                                                </div><!-- /.image -->
                                                                @if($tabAllProduct->discount_price == NULL)
                                                                    <div class="tag sale">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span>নতুন</span>
                                                                        @else
                                                                            <span>New</span>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <div class="tag new">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span>{{ bn_replace(round($parsentage))  }}%</span>
                                                                        @else
                                                                            <span>{{round($parsentage)}}%</span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div><!-- /.product-image -->
                                                            <div class="product-info text-left">
                                                                <h3 class="name">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}">{{ $tabAllProduct->product_title_bn }}</a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}">{{ $tabAllProduct->product_title_en }}</a>
                                                                    @endif
                                                                </h3>
                                                                {{--  rating  --}}
                                                                @if(\App\Models\ReviewModel::where('product_id', $tabAllProduct->id)->first())
                                                                    @php
                                                                        $reviewProducts = \App\Models\ReviewModel::where('product_id',  $tabAllProduct->id)->where('status', 'approved')->latest()->get();

            $rating = \App\Models\ReviewModel::where('product_id',  $tabAllProduct->id)->where('status', 'approved')->avg('rating');
            $avarageRating = number_format($rating, 1);
                                                                    @endphp
                                                                    @for($i=1; $i<=5; $i++)
                                                                        <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}}"></span>
                                                                    @endfor
                                                                @else
                                                                    <span style="color:red; font-weight-bold:700">No Rating</span>
                                                                @endif

                                                                <div class="description"></div>
                                                                <div class="product-price">
                                                                    @if( $tabAllProduct->discount_price == NULL)
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">৳{{ bn_replace($tabAllProduct->selling_price) }} </span>
                                                                        @else
                                                                            <span class="price">${{ $tabAllProduct->selling_price }} </span>
                                                                        @endif
                                                                    @else
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">${{ bn_replace( $tabAllProduct->discount_price)  }} </span>
                                                                            <span class="price-before-discount">${{ bn_replace($tabAllProduct->selling_price) }}</span>
                                                                        @else
                                                                            <span class="price">${{ $tabAllProduct->discount_price }} </span>
                                                                            <span class="price-before-discount">${{ $tabAllProduct->selling_price }}</span>
                                                                        @endif
                                                                    @endif
                                                                </div><!-- /.product-price -->
                                                            </div><!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="modal" data-target="#cardModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $tabAllProduct->id }}" onclick="cardView(this.id)">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                        </li>
                                                                        {{--    tab wishlist   --}}
                                                                        <li class="lnk wishlist">
                                                                            <a style="cursor:pointer" class="icon" id="{{ $tabAllProduct->id }}" onclick="addWishList(this.id)">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                            </a>
                                                                        </li>
                                                                        {{--    tab wishlist   --}}
                                                                        <li class="lnk">
                                                                            @if(session()->get('language') == 'bangle')
                                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}" title="তুলনা করা">
                                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                                </a>
                                                                            @else
                                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}" title="Compare">
                                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                                </a>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- /.action -->
                                                            </div>
                                                        </div>
                                                    </div><!-- /.products -->
                                                </div>
                                                @empty
                                                    <h3 class="text-danger font-weight-bold pb-3">
                                                        @if(session()->get('language') == 'bangle') কোন পণ্য পাওয়া যায় নি @else No Product Found @endif
                                                    </h3>
                                            @endforelse
                                        </div>
                                    </div><!-- /.product-slider -->
                                </div>
                            @endforeach

                        </div><!-- /.tab-content -->
                    </div>
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                    @forelse($discountBanners as $discountBanner)
                                        <img class="img-responsive" src="{{ asset($discountBanner->image_left) }}" alt="">
                                    </div>
                                    @empty
                                        <h4 style="color:red; font-weight:700">@if (session()->get('language') == 'bangle') পাওয়া যায় নি @else Not Found @endif </h4>
                                    @endforelse
                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.wide-banners -->
                    {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        @forelse($discountBanners as $discountBanner)
                                            <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/home-banner1.jpg" alt="">
                                            <img class="img-responsive" src="{{ asset($discountBanner->image_left) }}" alt="">
                                        @empty
                                            <h4 style="color:red; font-weight:700">
                                                 @if (session()->get('language') == 'bangle') পাওয়া যায় নি @else Not Found @endif </h4>
                                        @endforelse
                                    </div>

                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/home-banner2.jpg" alt="">
                                    </div>

                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.wide-banners --> --}}

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle') বৈশিষ্ট্যযুক্ত পণ্য @else Featured products @endif
                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @forelse($featureds as $featured)
                                <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                @if(session()->get('language') == 'bangle')
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}"><img  src="{{ asset($featured->product_thumbnail) }}" alt=""></a>
                                                @else
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}"><img  src="{{ asset($featured->product_thumbnail) }}" alt=""></a>
                                                @endif
                                            </div><!-- /.image -->
                                                @php
                                                    $amount = $featured->selling_price - $featured->discount_price;
                                                    $persentage = ($amount / $featured->selling_price)*100;
                                                @endphp
                                                @if($featured->discount_price == NULL)
                                                    <div class="tag new">
                                                        @if(session()->get('language') == 'bangle')
                                                            <span>নতুন</span>
                                                        @else
                                                            <span>New</span>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="tag sale">
                                                        @if(session()->get('language') == 'bangle')
                                                            <span>{{ bn_replace(round($persentage)) }}%</span>
                                                        @else
                                                            <span>{{ round($persentage) }}%</span>
                                                        @endif
                                                    </div>
                                                @endif
                                        </div><!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if(session()->get('language') == 'bangle')
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}">{{ $featured->product_title_bn }}</a>
                                                @else
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}">{{ $featured->product_title_en }}</a>
                                                @endif
                                            </h3>

                                        {{--  rating --}}
                                            @if(\App\Models\ReviewModel::where('product_id', $tabAllProduct->id)->first())
                                                @php
                                                    $reviewProducts = \App\Models\ReviewModel::where('product_id',  $tabAllProduct->id)->where('status', 'approved')->latest()->get();

                                                    $rating = \App\Models\ReviewModel::where('product_id',  $tabAllProduct->id)->where('status', 'approved')->avg('rating');
                                                    $avarageRating = number_format($rating, 1);
                                                @endphp
                                                @for($i=1; $i<=5; $i++)
                                                    <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}}"></span>
                                                @endfor
                                            @else
                                                <span style="color:red; font-weight-bold:700">No Rating</span>
                                            @endif

                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if( $featured->discount_price == NULL)
                                                    @if(session()->get('language') == 'bangle')
                                                        <span class="price">৳{{ bn_replace($featured->selling_price) }} </span>
                                                    @else
                                                        <span class="price">${{ $featured->selling_price }} </span>
                                                    @endif
                                                @else
                                                    @if(session()->get('language') == 'bangle')
                                                        <span class="price">৳{{ bn_replace( $featured->discount_price)  }} </span>
                                                        <span class="price-before-discount">${{ bn_replace($featured->selling_price) }}</span>
                                                    @else
                                                        <span class="price">${{ $featured->discount_price }} </span>
                                                        <span class="price-before-discount">${{ $featured->selling_price }}</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="modal" data-target="#cardModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $featured->id }}" onclick="cardView(this.id)">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a style="cursor:pointer" class="icon" id="{{ $featured->id }}" onclick="addWishList(this.id)">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        @if(session()->get('language') == 'bangle')
                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}" title="তুলনা করা">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        @else
                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @empty
                                <h4 style="color:red; font-weight:700"> @if (session()->get('language') == 'bangle') পণ্য পাওয়া যায় নি @else Product Not Found @endif </h4>
                            @endforelse
                        </div>
                    </section>




                    <!-- ================ FEATURED PRODUCTS : END ================== -->
                    <!-- ================== WIDE PRODUCTS =================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/home-banner.jpg" alt="">
                                    </div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span></h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div><!-- /.new-label -->
                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.wide-banners -->
                    <!-- ============= ======== WIDE PRODUCTS : END ======== =================== -->

                    <!-- ==================== BEST SELLER ======================= -->

{{--                    <div class="best-deal wow fadeInUp outer-bottom-xs">--}}
{{--                        <h3 class="section-title">Best seller</h3>--}}
{{--                        <div class="sidebar-widget-body outer-top-xs">--}}
{{--                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">--}}
{{--                                <div class="item">--}}
{{--                                    <div class="products best-product">--}}
{{--                                        <div class="product">--}}
{{--                                            <div class="product-micro">--}}
{{--                                                <div class="row product-micro-row">--}}
{{--                                                    <div class="col col-xs-5">--}}
{{--                                                        <div class="product-image">--}}
{{--                                                            <div class="image">--}}
{{--                                                                <a href="#">--}}
{{--                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p20.jpg" alt="">--}}
{{--                                                                </a>--}}
{{--                                                            </div><!-- /.image -->--}}
{{--                                                        </div><!-- /.product-image -->--}}
{{--                                                    </div><!-- /.col -->--}}
{{--                                                    <div class="col2 col-xs-7">--}}
{{--                                                        <div class="product-info">--}}
{{--                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                            <div class="rating rateit-small"></div>--}}
{{--                                                            <div class="product-price">--}}
{{--				                                                <span class="price">$450.99</span>--}}
{{--                                                            </div><!-- /.product-price -->--}}
{{--                                                        </div>--}}
{{--                                                    </div><!-- /.col -->--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product">--}}
{{--                                            <div class="product-micro">--}}
{{--                                                <div class="row product-micro-row">--}}
{{--                                                    <div class="col col-xs-5">--}}
{{--                                                        <div class="product-image">--}}
{{--                                                            <div class="image">--}}
{{--                                                                <a href="#">--}}
{{--                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p21.jpg" alt="">--}}
{{--                                                                </a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col2 col-xs-7">--}}
{{--                                                        <div class="product-info">--}}
{{--                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                            <div class="rating rateit-small"></div>--}}
{{--                                                            <div class="product-price">--}}
{{--				                                                <span class="price">$450.99</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- ======= ====== BEST SELLER : END =========== -->


                    <!-- ============ BLOG SLIDER ================ -->
                    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">
                                @forelse ($blogs as $blog)
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                {{-- <a href="blog.html"><img src="{{ asset('fontend') }}/assets/images/blog-post/post1.jpg" alt=""></a> --}}
                                                <a href="blog.html"><img src="{{ asset($blog->thumbnail_image) }}" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            {{-- <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3> --}}
                                            <h3 class="name"><a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                                            <span class="info">By {{ $blog->relationWithUser->name }} &nbsp;|&nbsp; {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }} </span>
                                            <p class="text">{!! substr($blog->description, 0, 200) !!}.... <a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}">Read More</a></p>
                                            <a href="{{ route('single.blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <h3 class="text-danger font-weight-bold pb-3">
                                        @if(session()->get('language') == 'bangle') পাওয়া যায় নি @else Not Found @endif
                                    </h3>
                                @endforelse
                            </div>
                        </div>
                    </section>
                    <!-- =============== BLOG SLIDER : END =========== -->

                    <!-- ============ FEATURED PRODUCTS ======== -->
{{--                    <section class="section wow fadeInUp new-arriavls">--}}
{{--                        <h3 class="section-title">New Arrivals</h3>--}}
{{--                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">--}}

{{--                            <div class="item item-carousel">--}}
{{--                                <div class="products">--}}

{{--                                    <div class="product">--}}
{{--                                        <div class="product-image">--}}
{{--                                            <div class="image">--}}
{{--                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p19.jpg" alt=""></a>--}}
{{--                                            </div><!-- /.image -->--}}

{{--                                            <div class="tag new"><span>new</span></div>--}}
{{--                                        </div><!-- /.product-image -->--}}


{{--                                        <div class="product-info text-left">--}}
{{--                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                            <div class="rating rateit-small"></div>--}}
{{--                                            <div class="description"></div>--}}

{{--                                            <div class="product-price">--}}
{{--				<span class="price">--}}
{{--					$450.99				</span>--}}
{{--                                                <span class="price-before-discount">$ 800</span>--}}

{{--                                            </div><!-- /.product-price -->--}}

{{--                                        </div>--}}
{{--                                        <div class="cart clearfix animate-effect">--}}
{{--                                            <div class="action">--}}
{{--                                                <ul class="list-unstyled">--}}
{{--                                                    <li class="add-cart-button btn-group">--}}
{{--                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">--}}
{{--                                                            <i class="fa fa-shopping-cart"></i>--}}
{{--                                                        </button>--}}
{{--                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}

{{--                                                    </li>--}}

{{--                                                    <li class="lnk wishlist">--}}
{{--                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">--}}
{{--                                                            <i class="icon fa fa-heart"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}

{{--                                                    <li class="lnk">--}}
{{--                                                        <a class="add-to-cart" href="detail.html" title="Compare">--}}
{{--                                                            <i class="fa fa-signal" aria-hidden="true"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div><!-- /.action -->--}}
{{--                                        </div><!-- /.cart -->--}}
{{--                                    </div><!-- /.product -->--}}

{{--                                </div><!-- /.products -->--}}
{{--                            </div><!-- /.item -->--}}
{{--                        </div><!-- /.home-owl-carousel -->--}}
{{--                    </section><!-- /.section -->--}}
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                </div><!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div><!-- /.row -->


            @include('layouts.fontend.brandlogo')


        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->

@endsection


























