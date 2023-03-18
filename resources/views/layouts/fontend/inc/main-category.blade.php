<!-- ================================== TOP NAVIGATION ================================== -->

@php
    $categorys = \App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @foreach($categorys as $cat)
                <li class="dropdown menu-item">
                    @if(session()->get('language') == 'bangle')
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $cat->category_icon }}" aria-hidden="true"></i>
                            {{ $cat->category_name_bn }}
                        </a>
                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $cat->category_icon }}" aria-hidden="true"></i>
                            {{ $cat->category_name_en }}
                        </a>
                @endif
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-4">
                                    <ul>
                                        @php
                                            $subCategorys = \App\Models\SubCategory::where('category_id', $cat->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                        @endphp
                                        @foreach($subCategorys as $subcat)
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
                                <div class="dropdown-banner-holder">
                                    <a href="#"><img alt="" src="{{ asset('fontend') }}/assets/images/banners/banner-side.png" /></a>
                                </div>
                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->
                    </ul><!-- /.dropdown-menu -->
                    <!-- ================================== MEGAMENU VERTICAL ================================== -->            </li><!-- /.menu-item -->
            @endforeach
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->

