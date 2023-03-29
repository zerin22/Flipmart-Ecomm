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
                        </div>
                    </div>
                </div>
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
        <li class="active"><a href="#recent" data-toggle="tab">recent post</a></li>
        <li><a href="#popular" data-toggle="tab">popular post</a></li>
    </ul>

    <div class="tab-content" style="padding-left:0">
        @php
            $recentBlogs = \App\Models\Blog::latest()->limit(2)->get();
        @endphp

        <div class="tab-pane active m-t-20" id="recent">
            <div class="blog-post inner-bottom-30" >
                @forelse ($recentBlogs as $recentBlog)
                    <img class="img-responsive" src="{{ asset($recentBlog->thumbnail_image) }}" alt="">
                    <h4 class="name"><a href="{{ route('single.blog', ['id' => $recentBlog->id, 'slug' => $recentBlog->slug]) }}">{{ $recentBlog->title }}</a></h4>
                    <span class="review">{{ $recentBlog->relationWithblogComment->count() }}</span>
                    <span class="date-time">{{ \Carbon\Carbon::parse($blog->created_at)->format('l m F Y') }}</span>
                    <p class="text">{!! Str::limit($recentBlog->description, 70) !!}.... <a href="{{ route('single.blog', ['id' => $recentBlog->id, 'slug' => $recentBlog->slug]) }}">Read More</a></p>
                @empty
                <span style="color:red; font-weight:700">
                    @if(session()->get('language') == 'bangle')
                        পাওয়া যায় নি
                    @else
                       Not Found
                    @endif
                </span>
                @endforelse
            </div>
        </div>
        @php
            $checkComments = \App\Models\BlogComment::select('blog_id', DB::raw('count(*) as total'))->groupBy('blog_id')->orderBy('total','desc')->limit(2)->get();
        @endphp

        <div class="tab-pane m-t-20" id="popular">
            <div class="blog-post inner-bottom-30" >
                @forelse ($checkComments as $checkComment)
                    <img class="img-responsive" src="{{ asset($checkComment->relationWithBlog->thumbnail_image) }}" alt="">
                    <h4><a href="{{ route('single.blog', ['id' => $checkComment->relationWithBlog->id, 'slug' => $checkComment->relationWithBlog->slug]) }}"></a>{{ $checkComment->relationWithBlog->title }}</h4>
                    <span class="date-time">{{ \Carbon\Carbon::parse($blog->created_at)->format('l m F Y') }}</span>
                    <p class="text">{!! Str::limit($checkComment->relationWithBlog->description, 70) !!}.... <a href="{{ route('single.blog', ['id' => $checkComment->relationWithBlog->id, 'slug' => $checkComment->relationWithBlog->slug]) }}">Read More</a></p>
                @empty
                    <span style="color:red; font-weight:700">
                        @if(session()->get('language') == 'bangle')
                            পাওয়া যায় নি
                        @else
                            Not Found
                        @endif
                    </span>
                @endforelse
            </div>
        </div>
    </div>
</div>


