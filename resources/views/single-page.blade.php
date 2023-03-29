@extends('layouts.fontend.fontend-master')
@section('title') {{ $product->product_name_en }} @endsection

@section('meta')
    <meta property="og:title" content="{{ $product->product_name_en }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:image" content="{{ URL::to($product->product_thumbnail) }}" />
    <meta property="og:description" content="{{ $product->product_title_en }}" />
    <meta property="og:site_name" content="ShareThis" />
@endsection

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>{{ $product->product_name_en }} </li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{ asset('fontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                        </div>

                        @include('layouts.fontend.inc.hot-deals')

                        @include('layouts.fontend.inc.testmonial')

                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                            @forelse($multiImg as $img)
                                                <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                    <a data-lightbox="image-1" data-title="Gallery">
                                                        <img class="img-responsive" alt="" src="{{ asset($img->photo_name) }}"  />
                                                    </a>
                                                </div><!-- /.single-product-gallery-item -->
                                            @empty
                                            <div class="single-product-gallery-item" id="slide{{ $product->product_thumbnail }}">
                                                <a data-lightbox="image-1" data-title="Gallery">
                                                    <img class="img-responsive" alt="" src="{{ asset($product->product_thumbnail) }}"  />
                                                </a>
                                            </div>
                                            @endforelse
                                    </div><!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach ($multiImg as $img)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $img->id }}" href="#slide{{ $img->id }}">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name) }}"/>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="Pname">
                                        @if(session()->get('language') == 'bangle')
                                            {{ $product->product_name_bn }}
                                        @else
                                            {{ $product->product_name_en }}
                                        @endif
                                    </h1>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                @for($i=1; $i<=5; $i++)
                                                    <span style="color:red" data-value="{{ $i }}" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}} rating-star"></span>
                                                @endfor
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <span >({{ count($reviewProducts) }} Reviews)</span>
                                                    <span style="font-size: 20px; font-weight: 700; margin-left:10px" >5/{{$avarageRating}}</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">
                                                        @if( $product->product_qty > 0)
                                                            In Stock
                                                        @else
                                                            Stock Out
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Total Items :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">
                                                        {{ $product->product_qty }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if(session()->get('language') == 'bangle')
                                            {{ $product->product_title_bn }}
                                        @else
                                            {{ $product->product_title_en }}
                                        @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            @php
                                                function bn_replace($str){
                                                     $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
                                                     $bn =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
                                                     $str = str_replace($en, $bn, $str);
                                                     return $str;
                                                 }
                                            @endphp

                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if( $product->discount_price == NULL)
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">৳{{ bn_replace($product->selling_price) }} </span>
                                                        @else
                                                            <span class="price">${{ $product->selling_price }} </span>
                                                        @endif
                                                    @else
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">${{ bn_replace( $product->discount_price)  }} </span>
                                                            <span class="price-strike">${{ bn_replace($product->selling_price) }}</span>
                                                        @else
                                                            <span class="price">${{ $product->discount_price }} </span>
                                                            <span class="price-strike">${{ $product->selling_price }}</span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                     <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                        {{-- ============================ product dropdown started   ================================= --}}

                                        <div class="row" style="margin:20px 0px">
                                            <div class="col-sm-6">

                                                @if($product->product_color_bn == null)
                                                @else
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text">Select Color</label>
                                                        <select class="form-control" id="color">
                                                            @if(session()->get('language') == 'bangle')
                                                                @foreach ($product_color_bn as $color_bn)
                                                                    <option value="{{ $color_bn }}">{{ $color_bn }}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach ($product_color_en as $color_en)
                                                                    <option value="{{ $color_en }}">{{ $color_en }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                @if($product->product_size_bn == null)
                                                @else
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text">Select Size</label>
                                                        <select class="form-control" id="size">
                                                            @if(session()->get('language') == 'bangle')
                                                                @foreach ($product_size_bn as $size_bn)
                                                                    <option value="{{ $size_bn }}">{{ $size_bn }}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach ($product_size_en as $size_en)
                                                                    <option value="{{ $size_en }}">{{ $size_en }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>
                                            {{-- hidden id for card   --}}
                                            <input type="hidden" id="product_id" value="{{ $product->id }}">

                                        </div><!-- /.row -->

                                        {{-- ============================ product dropdown ended  ================================= --}}

                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <input type="number" id="quantity" class="form-control" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" onclick="addToCard()" class="btn btn-danger addCardBtn"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->
                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">Comments</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if(session()->get('language') == 'bangle')
                                                    {!! $product->product_desc_bn !!}
                                                @else
                                                    {!! $product->product_desc_en !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="comment_title">
                                                <h4><a class="text-info" href="{{ route('login') }}">Login</a> or <a  class="text-info" href="{{ route('register') }}">Register</a> for review</h4>
                                            </div>
                                            @forelse($reviewProducts as $review)
                                            <div class="product-reviews">
                                                <h4 class="title">{{ ucwords($review->user->name) }}</h4>
                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title">
                                                            <span class="summary">
                                                                @for($i=1; $i<=5; $i++)
                                                                <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $review->rating ? "" : '-empty'}}"></span>
                                                                @endfor
                                                            </span>

                                                            <span class="date"><i class="fa fa-calendar"></i><span>{{ $review->created_at->diffForHumans() }}</span></span></div>
                                                        <div class="text">{{ $review->comment }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <h4 style="color:red; font-weight:700">
                                                    @if (session()->get('language') == 'bangle') পাওয়া যায় নি @else Not Found @endif
                                                </h4>
                                            @endforelse

                                            @auth
                                                @if (Auth::user()->role_id == 2)
                                                    <div class="product-add-review">
                                                        <form action="{{ route('review.store') }}" method="post" role="form" class="cnt-form">
                                                        @csrf
                                                        <h4 class="title">Write your own review</h4>
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <div class="review-table">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="cell-label">&nbsp;</th>
                                                                            <th>1 star</th>
                                                                            <th>2 stars</th>
                                                                            <th>3 stars</th>
                                                                            <th>4 stars</th>
                                                                            <th>5 stars</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="cell-label">Rating</td>
                                                                            <td><input name="rating" type="radio" name="quality" class="radio" value="1"></td>
                                                                            <td><input name="rating" type="radio" name="quality" class="radio" value="2"></td>
                                                                            <td><input name="rating" type="radio" name="quality" class="radio" value="3"></td>
                                                                            <td><input name="rating" type="radio" name="quality" class="radio" value="4"></td>
                                                                            <td><input name="rating" type="radio" name="quality" class="radio" value="5"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="review-form">
                                                            <div class="form-container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                            <textarea name="comment" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="Comment Here..."></textarea>
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                </div>
                                                                <div class="action text-right">
                                                                    <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>

                                    @php
                                        $comments = App\Models\Comment::where('product_single_id', $product->id)->where('status', 'approved')->orderBy('id', 'desc')->paginate(15);
                                    @endphp

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">
                                           <div class="comment_title">
                                               <h4><a class="text-info" href="{{ route('login') }}">Login</a> or <a  class="text-info" href="{{ route('register') }}">Register</a> to ask questions</h4>
                                               {{-- <p>Total Question (100)</p> --}}
                                           </div>

                                            <div class="commentSection">
                                                @forelse($comments as $comment)
                                                    <div class="comment_item">
                                                        <div class="comment_item_group">
                                                            <div class="user_comment_icon">
                                                                <span><i class="fas fa-comment-medical"></i></span>
                                                            </div>

                                                            <div class="user_comment_text">
                                                                <h4>{{ $comment->description }}</h4>
                                                                <p>{{ ucwords( $comment->name ) }} - {{ $comment->created_at->diffForHumans() }}</p>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $adminComments = App\Models\CommentReply::where('reply_id',$comment->id)->get();
                                                        @endphp
                                                        @foreach( $adminComments as  $adminComment)
                                                        <div class="comment_item_group">
                                                            <div class="admin_comment_icon">
                                                                <span><i class="fas fa-audio-description"></i></span>
                                                            </div>
                                                            <div class="admin_comment_text">
                                                                <h4>{{ $adminComment->description }}</h4>
                                                                <p>{{ $adminComment->name }} - {{ $adminComment->created_at }}</p>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @empty
                                                    <h4 style="color:red; font-weight:700">
                                                        @if (session()->get('language') == 'bangle') পাওয়া যায় নি @else Not Found @endif
                                                    </h4>
                                                @endforelse
                                            </div>

                                            @auth
                                                @if (Auth::user()->role_id == 2)
                                                    <form action="{{ route('comment.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_single_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="auth_name" value="{{ Auth::user()->name }}">
                                                        <div class="form-group">
                                                            <textarea name="description" id="" cols="30" rows="7" class="form-control" placeholder="Comment Here..." ></textarea>
                                                            @error('description')
                                                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <input type="submit" value="Comment" class="btn btn-info">
                                                    </form>
                                                @endif
                                            @endauth
                                           <div class="paginationSection pull-right">
                                               <nav aria-label="Page navigation example">
                                                   <ul class="pagination justify-content-end">
                                                       {{ $comments->links() }}
                                                   </ul>
                                               </nav>
                                           </div>
                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle') সম্পর্কিত পণ্য @else Related products @endif
                        </h3>

                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @forelse($relatedProduct as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    @if(session()->get('language') == 'bangle')
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                    @else
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                    @endif
                                                </div><!-- /.image -->
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $persentage = ($amount / $product->selling_price)*100;
                                                @endphp
                                                @if($product->discount_price == NULL)
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
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}">{{ $product->product_title_bn }}</a>
                                                    @else
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}">{{ $product->product_title_en }}</a>
                                                    @endif
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price">
                                                    @if( $product->discount_price == NULL)
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">৳{{ bn_replace($product->selling_price) }} </span>
                                                        @else
                                                            <span class="price">${{ $product->selling_price }} </span>
                                                        @endif
                                                    @else
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">৳{{ bn_replace( $product->discount_price)  }} </span>
                                                            <span class="price-before-discount">${{ bn_replace($product->selling_price) }}</span>
                                                        @else
                                                            <span class="price">${{ $product->discount_price }} </span>
                                                            <span class="price-before-discount">${{ $product->selling_price }}</span>
                                                        @endif
                                                    @endif
                                                </div><!-- /.product-price -->
                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            @if(session()->get('language') == 'bangle')
                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="কার্ড যুক্ত করুন">
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </button>
                                                            @else
                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en ) }}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </button>
                                                            @endif
                                                        </li>
                                                        <li class="lnk wishlist">
                                                            @if(session()->get('language') == 'bangle')
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}" title="ইচ্ছেতালিকা">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            @else
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li class="lnk">
                                                            @if(session()->get('language') == 'bangle')
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}" title="তুলনা করা">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            @else
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}" title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            @empty
                                <h5 style="color:red; font-weight:700"> @if (session()->get('language') == 'bangle')সম্পর্কিত পণ্য পাওয়া যায় নি @else Related Product Not Found @endif </h5>
                            @endforelse
                        </div><!-- /.home-owl-carousel -->




                    </section>

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div>

            @include('layouts.fontend.brandlogo');
	    </div><!-- /.container -->
    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {
        $('.rating-star').click(function(){
           alert($(this).attr('data-value'))
        })

    });
    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0&appId=519249602090939&autoLogAppEvents=1" nonce="4SHUMDc0"></script>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=615c7a6ed602b900198af761&product=inline-share-buttons" data-href="{{ Request::url() }}" async="async"></script>

@endsection

