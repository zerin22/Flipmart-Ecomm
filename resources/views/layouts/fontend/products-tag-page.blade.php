@extends('layouts.fontend.fontend-master')
@section('title', 'Product tag')
@section('content')

            @php
              function bn_replace($str){
                    $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
                    $bn =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
                    $str = str_replace($en, $bn, $str);
                    return $str;
                }
            @endphp


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Product tag</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('layouts.fontend.inc.main-category')
                    <!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">

                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">
                                    @if(session()->get('language') == 'bangle')
                                        দোকানে
                                    @else
                                        shop by
                                    @endif
                                </h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">
                                        @if(session()->get('language') == 'bangle')
                                            ক্যাটাগোরি
                                        @else
                                            Category
                                        @endif
                                    </h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        @forelse($categorys as $cat)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    @if(session()->get('language') == 'bangle')
                                                        <a href="#collapse{{ $cat->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            {{ $cat->category_name_bn }}
                                                        </a>
                                                    @else
                                                        <a href="#collapse{{ $cat->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            {{ $cat->category_name_en }}
                                                        </a>
                                                    @endif
                                                </div><!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapse{{ $cat->id }}" style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        @php
                                                            $subCategorys = \App\Models\SubCategory::where('category_id', $cat->id)->orderBy('id', 'DESC')->get();
                                                        @endphp
                                                        <ul>
                                                            @forelse($subCategorys as $subCat)
                                                                @if(session()->get('language') == 'bangle')
                                                                    <li><a href="#">{{ $subCat->subcategory_name_bn }}</a></li>
                                                                @else
                                                                    <li><a href="#">{{ $subCat->subcategory_name_en }}</a></li>
                                                                @endif
                                                            @empty
                                                                <span style="color:red">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        সাব ক্যাটাগোরি পাওয়া যায় নি
                                                                    @else
                                                                        SubCategory not found
                                                                    @endif
                                                                </span>
                                                            @endforelse
                                                        </ul>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                                            @empty
                                            <span style="color:red; font-weight: 700;">
                                                @if(session()->get('language') == 'bangle')
                                                    কোন ক্যাটাগোরি পাওয়া যায় নি
                                                @else
                                                    No Category Found
                                                @endif
                                            </span>
                                        @endforelse



                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div>

                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder">
                                        <span class="min-max">
                                             <span class="pull-left">$200.00</span>
                                             <span class="pull-right">$800.00</span>
                                        </span>
                                        <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

                                        <input type="text" class="price-slider" value="" >

                                    </div><!-- /.price-range-holder -->
                                    <a href="#" class="lnk btn btn-primary">Show Now</a>
                                </div><!-- /.sidebar-widget-body -->
                            </div>

                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Manufactures</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Forever 18</a></li>
                                        <li><a href="#">Nike</a></li>
                                        <li><a href="#">Dolce & Gabbana</a></li>
                                        <li><a href="#">Alluare</a></li>
                                        <li><a href="#">Chanel</a></li>
                                        <li><a href="#">Other Brand</a></li>
                                    </ul>
                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->

                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Yellow</a></li>
                                        <li><a href="#">Pink</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Teal</a></li>
                                    </ul>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->

                            <div class="sidebar-widget wow fadeInUp outer-top-vs" style="margin-bottom: 30px">
                                <h3 class="section-title">Compare products</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report">
                                        <p>You have no <span>item(s)</span> to compare</p>
                                    </div><!-- /.compare-report -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->

                            @include('layouts.fontend.inc.products-tags')

                            @include('layouts.fontend.inc.testmonial')

                            <div class="home-banner">
                                <img src="{{ asset('fontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                            </div>

                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    @if($pageBanner)
                        @if($pageBanner->status == 'approved')
                            <div id="category" class="category-carousel hidden-xs">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset($pageBanner->image) }}" alt="Add Image" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div><!-- /.filter-tabs -->
                            </div>
                            <div class="col col-sm-12 col-md-6">
                                <div class="lbl-cnt">
                                    <span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">

                                            <select class="form-control" id="tagpagesortBy">
                                                <option value>Positionss</option>
                                                <option {{ $sort == 'lowestPrice'? 'selected': "" }} value="lowestPrice">Price: Lowest first</option>
                                                <option {{ $sort == 'heightPrice'? 'selected': "" }} value="heightPrice">Price: Height first</option>
                                                <option {{ $sort == 'priceAToZname'? 'selected': "" }} value="priceAToZname">Product Name: A to Z</option>
                                                <option {{ $sort == 'priceZToAname'? 'selected': "" }} value="priceZToAname">Product Name: Z to A</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-6 col-md-4 text-right">
                                {{ $products->links() }}
                            </div>
                        </div><!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">

                                        @forelse($products as $product)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">

                                                            <div class="image">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                                @endif
                                                            </div>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $persantage = ($amount / $product->selling_price)*100;
                                                            @endphp
                                                            @if($product->discount_price == NULL)
                                                                <div class="tag new"><span>
                                                                        @if(session()->get('language') == 'bangle') নতুন @else new @endif
                                                                    </span></div>
                                                            @else
                                                                <div class="tag sale">
                                                                    <span>
                                                                         @if(session()->get('language') == 'bangle')
                                                                            {{ bn_replace(round($persantage)) }}%
                                                                        @else
                                                                            {{ round($persantage)}}%
                                                                        @endif
                                                                    </span>
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
                                                                        <button data-toggle="modal" data-target="#cardModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="cardView(this.id)">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>

                                                                    </li>
                                                                    <li class="lnk wishlist">
                                                                        <a style="cursor:pointer" class="icon" id="{{ $product->id }}" onclick="addWishList(this.id)">
                                                                            <i class="icon fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                                            <i class="fa fa-signal"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div><!-- /.action -->
                                                        </div><!-- /.cart -->
                                                    </div><!-- /.product -->

                                                </div><!-- /.products -->
                                            </div>
                                            @empty
                                            <span style="color:red; font-weight:700;">
                                                @if(session()->get('language') == 'bangle')
                                                    পণ্য পাওয়া যায় নি
                                                @else
                                                    Product Not Found
                                                @endif
                                            </span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane "  id="list-container">
                                <div class="category-product">
                                    @forelse($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img src="{{ asset($product->product_thumbnail) }}" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}">{{ $product->product_title_bn }}</a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}">{{ $product->product_title_en }}</a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
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
                                                            <div class="description m-t-10">
                                                                @if(session()->get('language') == 'bangle')
                                                                   {!! $product->product_desc_bn !!}
                                                                @else
                                                                   {!! $product->product_desc_en !!}
                                                                @endif
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="modal" data-target="#cardModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="cardView(this.id)">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                        </li>
                                                                        <li class="lnk wishlist">
                                                                            <a style="cursor:pointer" class="icon" id="{{ $product->id }}" onclick="addWishList(this.id)">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="lnk">
                                                                            <a class="add-to-cart" href="detail.html" title="Compare">
                                                                                <i class="fa fa-signal"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $persantage = ($amount / $product->selling_price)*100;
                                                @endphp
                                                @if($product->discount_price == NULL)
                                                    <div class="tag new">
                                                        <span>
                                                            @if(session()->get('language') == 'bangle') নতুন @else new @endif
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="tag sale">
                                                    <span>
                                                         @if(session()->get('language') == 'bangle')
                                                            {{ bn_replace(round($persantage)) }}%
                                                        @else
                                                            {{ round($persantage)}}%
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->
                                    @empty
                                        <span style="color:red; font-weight:700">
                                                @if(session()->get('language') == 'bangle')
                                                পণ্য পাওয়া যায় নি
                                            @else
                                                Product Not Found
                                            @endif
                                            </span>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                        <div class="clearfix filters-container">
                            <div class="text-right">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('layouts.fontend.brandlogo')

            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->

    </div><!-- /.body-content -->


@endsection

@section('scripts')

    <script>
        $("#tagpagesortBy").change(function(e){
            e.preventDefault();
            let data = $("#tagpagesortBy").val();
            window.location = "{{ url(''.$baseLink.'') }}/{{ $tag_name }}?sort="+data;
        })
    </script>

@endsection
