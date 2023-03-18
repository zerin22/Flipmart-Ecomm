<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>
        </div>
    </form>
</div>
<div class="home-banner outer-top-n outer-bottom-xs">
    <img src="{{ asset('fontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
</div>
<!-- ===============CATEGORY========== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    @if (session()->get('language') == 'bangle')
    <h3 class="section-title">ক্যাটাগোরি</h3>
    @else
    <h3 class="section-title">Category</h3>
    @endif

    @php
     $categories = \App\Models\Category::orderBy('category_name_en', 'ASC')->get();
    @endphp
    <div class="sidebar-widget-body m-t-10">
        <div class="accordion">
            @forelse ($categories as $category)
                <div class="accordion-group">
                    <div class="accordion-heading">
                        @if (session()->get('language') == 'bangle')
                            <a href="#collapseOne__{{  $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                {{ $category->category_name_bn }}
                            </a>
                        @else
                            <a href="#collapseOne__{{  $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                {{ $category->category_name_en }}
                            </a>
                        @endif
                    </div><!-- /.accordion-heading -->

                    <div class="accordion-body collapse" id="collapseOne__{{  $category->id }}" style="height: 0px;">
                        <div class="accordion-inner">
                            <ul>
                                @php
                                    $subCategories = \App\Models\SubCategory::where('category_id', $category->id)->latest()->get();
                                @endphp

                                @foreach($subCategories as $subcat)
                                    <li>
                                        @if(session()->get('language') == 'bangle')
                                            <a href="{{  url('subCategory/product/'.$subcat->id) }}">{{ $subcat->subcategory_name_bn }}</a>
                                        @else
                                            <a href="{{ url('subCategory/product/'.$subcat->id) }}">{{ $subcat->subcategory_name_en }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /.accordion-inner -->
                    </div><!-- /.accordion-body -->
                </div><!-- /.accordion-group -->
            @empty
            <span style="color:red; font-weight:700">
                @if(session()->get('language') == 'bangle')
                    ক্যাটাগোরি পাওয়া যায় নি
                @else
                    Category Not Found
                @endif
            </span>
            @endforelse
        </div>
    </div>
</div>
<!-- =============== CATEGORY : END ========= -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">tab widget</h3>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
        <li><a href="#recent" data-toggle="tab">recent post</a></li>
    </ul>

    {{-- @php
        $popularBlogs = \App\Models\Blog::all()->get();
        $countComments =
        $popularBlogs = \App\Models\Blog::Where()->limit(2)->get();
    @endphp --}}
    <div class="tab-content" style="padding-left:0">

        <div class="tab-pane active m-t-20" id="popular">
            <div class="blog-post inner-bottom-30 " >
                <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/blog-post/blog_big_01.jpg" alt="">
                <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                    <span class="review">6 Comments</span>
                <span class="date-time">12/06/16</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            </div>
            <div class="blog-post" >
                <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/blog-post/blog_big_02.jpg" alt="">
                <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                <span class="review">6 Comments</span>
                <span class="date-time">23/06/16</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            </div>
        </div>

        <div class="tab-pane m-t-20" id="recent">
            <div class="blog-post inner-bottom-30" >
                <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/blog-post/blog_big_03.jpg" alt="">
                <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                <span class="review">6 Comments</span>
                <span class="date-time">5/06/16</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            </div>
            <div class="blog-post">
                <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/blog-post/blog_big_01.jpg" alt="">
                <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                <span class="review">6 Comments</span>
                <span class="date-time">10/07/16</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

            </div>
        </div>
    </div>
</div>
