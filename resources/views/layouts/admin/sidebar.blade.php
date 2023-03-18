<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Flipmart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboardActive')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item @yield('page')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Pages<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brands.index') }}" class="nav-link @yield('brandActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand Page</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="pages/examples/contact-us.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <li class="nav-item @yield('category')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Category<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link @yield('allcategoryActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Category </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subCategory.index') }}" class="nav-link @yield('subcategoryActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SubCategory </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('SubSubCategory.index') }}" class="nav-link @yield('subsubcategoryActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub SubCategory</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('product')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Products<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link @yield('allproductActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('products.create') }}" class="nav-link @yield('addproductActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item @yield('slider')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Slider<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link @yield('allsliderActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sliders.create') }}" class="nav-link @yield('addsliderActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('banner.index') }}" class="nav-link @yield('bannerActive')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Discount Banner</p>
                    </a>
                </li>

                <li class="nav-item @yield('coupon')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Coupon<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coupon.index') }}" class="nav-link @yield('allcouponActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupon</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coupon.create') }}" class="nav-link @yield('addcouponActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Coupon</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('shoppingArea')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Shopping Area<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview menuRight">
                        <li class="nav-item miniIcon @yield('division')">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-discourse"></i>
                                <p>Division<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item innerItem">
                                    <a href="{{ route('division.index') }}" class="nav-link @yield('alldivisionActive')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Division</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item innerItem">
                                    <a href="{{ route('division.create') }}" class="nav-link @yield('adddivisionActive')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New Division</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item miniIcon @yield('district')">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fab fa-deploydog"></i>
                                <p>District<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item innerItem">
                                    <a href="{{ route('district.index') }}" class="nav-link @yield('alldistrictActive')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>District</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item innerItem">
                                    <a href="{{ route('district.create') }}" class="nav-link @yield('adddistrictActive')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New District</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item miniIcon @yield('state')">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-flag-usa"></i>
                                <p>State<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item innerItem">
                                    <a href="{{ route('state.index') }}" class="nav-link @yield('allstateActive')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>State</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('Order')">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon  fab fa-first-order"></i>
                        <p>Orders<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview menuRight">
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.pending") }}" class="nav-link @yield('paddingActive')">
                                <i class="fab fa-openid"></i>
                                <p>Pending Orders</p>
                            </a>
                        </li>
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.confirm") }}" class="nav-link @yield('confirmActive')">
                                <i class="fas fa-clipboard-check"></i>
                                <p>Confirmed Orders</p>
                            </a>
                        </li>
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.processing") }}" class="nav-link @yield('processingActive')">
                                <i class="fas fa-microchip"></i>
                                <p>Processing Orders</p>
                            </a>
                        </li>
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.picked") }}" class="nav-link @yield('pickedActive')">
                                <i class="fas fa-crosshairs"></i>
                                <p>Picked Orders</p>
                            </a>
                        </li>
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.shipped") }}" class="nav-link @yield('shippedActive')">
                                <i class="fas fa-dolly"></i>
                                <p>Shipped Orders</p>
                            </a>
                        </li>
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.delivered") }}" class="nav-link @yield('deliveredActive')">
                                <i class="fas fa-truck"></i>
                                <p>Delivered Orders</p>
                            </a>
                        </li>
                        <li class="nav-item miniIcon">
                            <a href="{{ route("order.cancel") }}" class="nav-link @yield('cancelActive')">
                                <i class="fas fa-truck"></i>
                                <p>Cancel Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('report') }}" class="nav-link @yield('reportActive')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('review.index') }}" class="nav-link @yield('reviewOrder')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Review</p>
                    </a>
                </li>
                <li class="nav-item @yield('comment')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Comment<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('comments.store') }}" class="nav-link @yield('commentPending')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Pending Comment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('comments.approved.show') }}" class="nav-link @yield('commentApproved')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Approved Comment</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item @yield('stock')">
                    <a href="#" class="nav-link @yield('stockActive')">
                        <i class="nav-icon far fa-sticky-note"></i>
                        <p>Stock-Management<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('stock.index') }}" class="nav-link @yield('stockPending')">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>All Stock</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('storeroom')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Store Room<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brand.storeRoom') }}" class="nav-link @yield('brandstoreActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand Store Room</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.storeroom') }}" class="nav-link @yield('multistoreActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Multiple Image Store</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ProductView') }}" class="nav-link @yield('productstoreActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Store Room</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('blog')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Blog<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link @yield('allBlogActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.create') }}" class="nav-link @yield('addBlogActive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('blogComment')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>BlogComment<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blogcomment.index') }}" class="nav-link @yield('blogcommentPending')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comment Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blogcomments.approved.show') }}" class="nav-link @yield('blogcommentApproved')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Comment Show</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('social-links.index') }}" class="nav-link @yield('allSocialLinksActive')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Social Links</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
