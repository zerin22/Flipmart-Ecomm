
@php
    $hot_deals = App\Models\Product::where('hot_deals', 1)->where('status', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->get();
@endphp


<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        @if(session()->get('language') == 'bangle') গরম চুক্তি @else hot deals @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @forelse($hot_deals as $hot_deal)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ asset($hot_deal->product_thumbnail) }}" alt="">
                        </div>
                        @php
                            $amount = $hot_deal->selling_price - $hot_deal->discount_price;
                            $parsentage = ($amount /$hot_deal->selling_price)*100;
                        @endphp
                        <div class="sale-offer-tag">
                            @if(session()->get('language') == 'bangle')
                                <span>{{ bn_replace(round($parsentage))  }}%<br>অফার</span>
                            @else
                                <span>{{round($parsentage)}}%<br>off</span>
                            @endif
                        </div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box">
                                    <span class="key">120</span>
                                    <span class="value">DAYS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="hour box">
                                    <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="minutes box">
                                    <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>

                            <div class="box-wrapper hidden-md">
                                <div class="seconds box">
                                    <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hot-deal-wrapper -->
                    <div class="product-info text-left m-t-20">
                        <h3 class="name">
                            @if(session()->get('language') == 'bangle')
                                <a href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_bn) }}">{{ $hot_deal->product_title_bn }}</a>
                            @else
                                <a href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_en) }}">{{ $hot_deal->product_title_en }}</a>
                            @endif
                        </h3>

                        {{--  rating --}}
                        @if(\App\Models\ReviewModel::where('product_id', $hot_deal->id)->first())
                            @php
                                $reviewProducts = \App\Models\ReviewModel::where('product_id',  $hot_deal->id)->where('status', 'approved')->latest()->get();

$rating = \App\Models\ReviewModel::where('product_id',  $hot_deal->id)->where('status', 'approved')->avg('rating');
$avarageRating = number_format($rating, 1);
                            @endphp
                            @for($i=1; $i<=5; $i++)
                                <span style="color:red" class="glyphicon glyphicon-star{{ $i <= $avarageRating ? "" : '-empty'}}"></span>
                            @endfor
                        @else
                            <span style="color:red; font-weight-bold:700">No Rating</span>
                        @endif
                        <div class="product-price">
                            @if( $hot_deal->discount_price == NULL)
                                @if(session()->get('language') == 'bangle')
                                    <span class="price">৳{{ bn_replace($hot_deal->selling_price) }} </span>
                                @else
                                    <span class="price">${{ $hot_deal->selling_price }} </span>
                                @endif
                            @else
                                @if(session()->get('language') == 'bangle')
                                    <span class="price">৳{{ bn_replace( $hot_deal->discount_price)  }} </span>
                                    <span class="price-before-discount">${{ bn_replace($hot_deal->selling_price) }}</span>
                                @else
                                    <span class="price">${{ $hot_deal->discount_price }} </span>
                                    <span class="price-before-discount">${{ $hot_deal->selling_price }}</span>
                                @endif
                            @endif
                        </div><!-- /.product-price -->
                    </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary icon" type="button" title="Add Cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                {{--  button--}}
                                @if(session()->get('language') == 'bangle')
                                    <button class="btn btn-primary cart-btn" type="button">
                                        <a style="background: none!important" href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_bn) }}">
                                            কার্ট যোগ করুন
                                        </a>
                                    </button>
                                @else
                                    <button class="btn btn-primary cart-btn" type="button">
                                        <a style="background: none!important" href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_en ) }}">
                                            Add to cart
                                        </a>
                                    </button>
                                @endif
                            </div>
                        </div><!-- /.action -->
                    </div><!-- /.cart -->
                </div>
            </div>
        @empty
        @endforelse

    </div><!-- /.sidebar-widget -->
</div>
