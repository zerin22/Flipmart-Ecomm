
@php
    $tags_en = \App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_bn = \App\Models\Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
@endphp


<!-- ============================================== PRODUCT TAGS ============================= -->
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">


                @if(session()->get('language') == 'bangle')
                    @foreach($tags_bn as $tags)
                        <a class="item active" title="{{ $tags->product_tags_bn }}" href="{{ url('/product/tags/'. $tags->product_tags_bn)}}">{{ $tags->product_tags_bn }}</a>
                    @endforeach
                    @else
                    @foreach($tags_en as $tags)
                        <a class="item active" title="{{ $tags->product_tags_en }}" href="{{ url('/product/tags/'. $tags->product_tags_en) }}">{{ $tags->product_tags_en }}</a>
                    @endforeach
                @endif


        </div><!-- /.tag-list -->
    </div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ========================== -->
