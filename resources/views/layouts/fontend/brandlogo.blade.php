
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @php
                $brands = \App\Models\Brand::orderBy("id", 'DESC')->get();
            @endphp
            @forelse($brands as $brand)
                <div class="item m-t-15">
                    <img src="{{asset($brand->brand_image)}}" alt="brandImage">
                </div><!--/.item-->
                @empty
                    @if(session()->get('language') == 'bangle')
                    <h4 class="text-danger font-weight-bold">
                        ব্র্যান্ডের লোগো পাওয়া যায়নি
                    </h4>
                    @else
                    <h4 class="text-danger font-weight-bold">
                        Brand logo not found
                    </h4>
                    @endif
           @endforelse
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
