<?php

use App\Http\Controllers\Admin\AdminBioController;
use Illuminate\Support\Facades\Route;

// admin route
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\StoreRoomController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DiscountBannerController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\StockManagement;


// user route
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\wishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\SSLHostController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\BlogUserCommentController;
use App\Http\Controllers\Auth\LoginController;

// fontEnd route
use App\Http\Controllers\FontEnd\LanguageController;
use App\Http\Controllers\FontEnd\CardController;
use App\Http\Controllers\FontEnd\FontEndController;
use App\Http\Controllers\FontEnd\OrderTrackController;
use App\Http\Controllers\FontEnd\SearchController;

use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;

Auth ::routes();

Route::group(['prefix' => 'admin', 'middleware'=> ['admin', 'auth'] ], function() {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-profile', [AdminController::class, 'adminProfileShow'])->name('admin.profile');
    Route::get('/adminNameShow/{id}', [AdminController::class, 'adminNameShow'])->name('admin.NameShow');
    Route::post('/adminNameStore/{id}', [AdminController::class, 'adminNameStore'])->name('adminNameUpdate-store');
    // admin email update route
    Route::get('/adminEmailShow/{id}', [AdminController::class, 'adminEmailShow'])->name('adminEmailShow');
    Route::post('/adminEmail/store/{id}', [AdminController::class, 'adminEmailStore'])->name('adminEmailUpdate-store');
    // admin update password route
    Route::get('/adminPasswordShow', [AdminController::class, 'showPasswordUpdatePage'])->name('admin.passwordShow');
    Route::post('/password/store', [AdminController::class, 'adminPasswordStore'])->name('updatePassword-store');
    Route::post('/photoUpload', [UserController::class, 'photoUpload'])->name('file.Upload');

    // ==================== brand router ==================================
    Route::resource('brands', BrandController::class);
    // ==================== brand router =================================

    // =================== Store Room All route ===================================
    Route::get('/store/room/', [StoreRoomController::class, 'StoreRoomView'])->name('brand.storeRoom');
    Route::get('/brand/permanentDelete/{id}', [StoreRoomController::class, 'brandPermanentDelete']);
    Route::get('/brand/restore/{id}', [StoreRoomController::class, 'brandRestore'])->name('brand.restore');
    // multiple image store
    Route::get('multipleImage/storeRoom', [StoreRoomController::class, 'StoreRoomController'])->name('products.storeroom');
    Route::get('multipleImage/permanentDelete/{id}', [StoreRoomController::class, 'multipleImagePermanenetDelete'])->name('multipleImage.premanentDelete');
    Route::get('multipleImage/restore/{id}', [StoreRoomController::class, 'multipleImageRestore'])->name('multiImage.restore');
    // product store
    Route::get('Product/restore/view', [StoreRoomController::class, 'ProductRestoreView'])->name('ProductView');
    Route::get('Product/restore/{id}', [StoreRoomController::class, 'ProductRestore'])->name('product.restore');
    Route::get('Product/permanentDelete/{id}', [StoreRoomController::class, 'ProductImagePermanentDelete'])->name('product.permanentDelete');
    // =================== Store Room All route ===================================

    // =========================== Category routes =======================
    Route::resource('category', CategoryController::class);

    // =================== subCategory ============================
    Route::resource('subCategory', SubCategoryController::class);

    // ====================== sub subcategory ========================
    Route::resource('SubSubCategory', SubSubCategoryController::class);
    Route::get('subsubcategory/ajax/', [SubSubCategoryController::class, 'SubSubCategoryAjaxShow'])->name('SubSubCategoryAjaxShow');

    // ====================== product route ============================
    Route::resource('products', ProductController::class);

    // ajax data change products route
    Route::get('products/changeProduct/ajax/{id}', [ProductController::class, 'subCategoryIdGetByAjax']);
    Route::get('products/SubSubCategory/ajax/{id}', [ProductController::class, 'SubSubCategoryIdGetByAjax']);

    // Edit custom route
    Route::get('products/edit/{id}', [ProductController::class, 'editFunc'])->name('subcategoryEdit');

    // Update ajax data change route
    Route::get('products/edit/updateChangeSubcategory/{id}', [ProductController::class, 'subCategoryIdGetByAjax']);
    Route::get('products/edit/updateChangeSubSubcategory/{id}', [ProductController::class, 'SubSubCategoryIdGetByAjax']);

    // edit multiple image
    Route::post('products/multipleImage/Update/', [ProductController::class, 'updateMultipleImage'])->name('edit-multipleImage');
    Route::post('products/single-Image/Update/{id}', [ProductController::class, 'updateSingleImage'])->name('single-Image');
    Route::get('products/Image/delete/{id}', [ProductController::class, 'imageDelete'])->name('products.delete');
    Route::get('products/softDelete/{id}', [ProductController::class, 'ProductSoftDelete'])->name('softDelete.delete');
    Route::get('products/inactive/{id}', [ProductController::class, 'inactive'])->name('products.inactive');
    Route::get('products/active/{id}', [ProductController::class, 'active'])->name('products.active');

    // sliders controller
    Route::resource('sliders', SliderController::class);
    Route::get('sliders/inactive/{id}', [SliderController::class, 'inactive'])->name('sliders.inactive');
    Route::get('sliders/active/{id}', [SliderController::class, 'active'])->name('sliders.active');

    // coupon
    Route::resource('coupon', CouponController::class);
    Route::get('coupon/active/{id}', [CouponController::class, 'couponActive'])->name('coupon.active');
    Route::get('coupon/inactive/{id}', [CouponController::class, 'couponInActive'])->name('coupon.inactive');

    // Division
    Route::resource('division', DivisionController::class);
    Route::get('division/active/{id}', [DivisionController::class, 'divisionActive'])->name('division.active');
    Route::get('division/inactive/{id}', [DivisionController::class, 'divisionInActive'])->name('division.inactive');

    // District
    Route::resource('district', DistrictController::class);
    Route::get('district/active/{id}', [DistrictController::class, 'districtActive'])->name('district.active');
    Route::get('district/inactive/{id}', [DistrictController::class, 'districtInActive'])->name('district.inactive');

    // state
    Route::resource('state', StateController::class);
    Route::get('district-get/ajax/{division_id}', [StateController::class, 'distinctAjaxLoad']);
    Route::get('state/active/{id}', [StateController::class, 'stateActive'])->name('state.active');
    Route::get('state/inactive/{id}', [StateController::class, 'stateInActive'])->name('state.inactive');

    // admin order settings
    Route::get("/pending/view", [OrderController::class, 'pendingOrder'])->name("order.pending");
    Route::get("/confirm/view", [OrderController::class, 'confirmOrder'])->name("order.confirm");
    Route::get("/processing/view", [OrderController::class, 'processingOrder'])->name("order.processing");
    Route::get("/picked/view", [OrderController::class, 'pickedOrder'])->name("order.picked");
    Route::get("/shipped/view", [OrderController::class, 'shippedOrder'])->name("order.shipped");
    Route::get("/delivered/view", [OrderController::class, 'deliveredOrder'])->name("order.delivered");
    Route::get("/cancel/order/view/", [OrderController::class, 'cancelOrderView'])->name("order.cancel");
    Route::get("/order/view/{order_id}", [OrderController::class, 'orderView'])->name("order.view");
    Route::get("/pending-to-confirm/{order_id}", [OrderController::class, 'pendingToConfirm']);
    Route::get("/pending-to-cancel/{order_id}", [OrderController::class, 'pendingToCancel']);
    Route::get("/confirm-to-processing/{order_id}", [OrderController::class, 'confirmToProcessing']);
    Route::get("/processing-to-picked/{order_id}", [OrderController::class, 'processingToPicked']);
    Route::get("/picked-to-shipped/{order_id}", [OrderController::class, 'pickedToShipped']);
    Route::get("/shipped-to-deliver/{order_id}", [OrderController::class, 'shippedToDelivered']);
    Route::get("/orderInvoiceDownload/{order_id}", [OrderController::class, 'orderInvoiceDownload'])->name("orderInvoiceDownload");
    Route::get("/orderReport", [ReportController::class, 'orderReport'])->name("report");
    Route::post("/reportByDataTime", [ReportController::class, 'reportByDataTime'])->name("reportByDataTime");
    Route::post("/reportByMonth", [ReportController::class, 'reportByMonth'])->name("reportByMonth");
    Route::post("/reportByYear", [ReportController::class, 'reportByYear'])->name("reportByYear");

    // admin all user
    Route::get("/allUser", [RoleController::class, 'allUserIndex'])->name("allUser");
    Route::get("/user/banned/{banned_id}", [RoleController::class, 'userBanned'])->name("user.banned");
    Route::get("/user/userUnBanned/{unbanned_id}", [RoleController::class, 'userUnBanned'])->name("user.unbanned");
    Route::get("/user/adminRoleChange/{admin_role_change_id}", [RoleController::class, 'adminRoleChange'])->name("admin.role.change");
    Route::get("/user/userRleChange/{role_change_id}", [RoleController::class, 'userRoleChange'])->name("user.role.change");
    Route::get("/user/delete/{id}", [RoleController::class, 'userDelete'])->name("user.delete");

    // review
    Route::get("/review", [AdminReviewController::class, 'index'])->name("review.index");
    Route::get("/review/approved/{id}", [AdminReviewController::class, 'reviewApproved'])->name("review.approved");
    Route::get("/review/pending/{id}", [AdminReviewController::class, 'reviewPending'])->name("review.pending");

    // admin comment controller
    Route::get('comments', [AdminCommentController::class, 'adminCommentIndex'])->name('comments.store');
    Route::get('comments/approved/show/', [AdminCommentController::class, 'adminApprovedCommentShow'])->name('comments.approved.show');
    Route::get("/comments/approved/{id}", [AdminCommentController::class, 'commentsApproved'])->name("comments.approved");
    Route::get("/comments/pending/{id}", [AdminCommentController::class, 'commentsPending'])->name("comments.pending");
    Route::get("/comments/replay/{id}", [AdminCommentController::class, 'commentsReplay'])->name('adminComments.replay');
    Route::post("/comments/replay/store", [AdminCommentController::class, 'commentsReplayStore'])->name('comments.replay.store');
    Route::get("/comment/delete/{id}", [AdminCommentController::class, 'commentDelete'])->name('comments.delete');

    //stock management
    Route::resource('stock', StockManagement::class);

    //Discount Banner
    Route::resource('banner', DiscountBannerController::class);

    //Blog
    Route::resource('blog', BlogController::class);

    //BlogComment
    Route::resource('blogcomment', BlogCommentController::class);
    Route::get('blogcomment/approved/show', [BlogCommentController::class, 'blogApprovedCommentShow'])->name('blogcomments.approved.show');
    Route::get('blogcomment/approved/{id}', [BlogCommentController::class, 'blogCommentsApproved'])->name('blogcomment.approved');
    Route::get('blogcomment/pending/{id}', [BlogCommentController::class, 'blogCommentsPending'])->name('blogcomment.pending');
    Route::get('blogcomment/reply/{id}', [BlogCommentController::class, 'blogCommentReply'])->name('blogcomments.replay');
    Route::post('blogcomment/reply/{id}', [BlogCommentController::class, 'blogCommentReplyStore'])->name('blogcomments.replay.store');

    // Social Links
    Route::resource('social-links', SocialLinkController::class);

    //Admin Bio
    Route::resource('bio', AdminBioController::class);

});

Route::group(['prefix' => 'user', 'middleware'=> ['user', 'auth'],], function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // user Name
    Route::get('/userNameGetId/{id}', [UserController::class, 'userNameGetId'])->name('userUpdate-Id');
    Route::post('/userNameUpdate/store/{id}', [UserController::class, 'userNameUpdateStore'])->name('userNameUpdate-store');
    // user Email
    Route::get('/userEmailGetId/{id}', [UserController::class, 'userEmailGetId'])->name('emailGet-Id');
    Route::post('/userEmailUpdate/store/{id}', [UserController::class, 'userEmailUpdateStore'])->name('userEmailUpdate-store');
    // update password
    Route::get('/updatePasswordShow', [UserController::class, 'updatePasswordShow'])->name('updatePassword-Show');
    Route::post('/password/store', [UserController::class, 'passwordStore'])->name('password-store');
    //user image upload
    Route::post('/photoUpload', [UserController::class, 'photoUpload'])->name('file.Upload');

    // cardPage
    Route::get('/get-shoppingCart', [CartPageController::class, 'getShoppingCart'])->name('getShoppingCart');
    Route::post('/shoppingCart/remove/{rowId}', [CartPageController::class, 'shoppingCartRemove']);
    Route::get('/shoppingCart/increment/{rowId}', [CartPageController::class, 'shoppingCartIncrement']);
    Route::get('/shoppingCart/decrement/{rowId}', [CartPageController::class, 'shoppingCartDecrement']);
    //==== apply coupon =======
    Route::post('/create-coupon', [CartPageController::class, 'applyCoupon']);
    Route::get('coupon-calculate/', [CartPageController::class, 'couponCalculationField']);
    Route::get('couponRemove/', [CartPageController::class, 'couponRemove']);

    // get district data by ajax
    Route::get('checkout/districtGet/ajax{division_id}', [CartPageController::class, 'getCheckoutDataGetAjax']);
    Route::get('checkout/stateGet/ajax{district_id}', [CartPageController::class, 'getStateDataGetAjax']);

    // Stripe payment route
    Route::post('payment-store/', [CartPageController::class, 'paymentStore']);
    Route::get('payment-stripe-page/', [StripeController::class, 'paymentStripePageView']);
    Route::post('payment/stripe/', [StripeController::class, 'stripePaymentStore'])->name('stripe.order');

    // ssl easy payment route
    Route::get('SSLPayment/', [SSLHostController::class, 'SSLPayment']);

    // Order Route
    Route::get('/orderView/{order_id}', [OrderController::class, 'ViewOrder']);
    Route::get('/downloadInvoice/{invoice_id}', [OrderController::class, 'downloadInvoice']);
    // return order
    Route::post("/return/order/{order_id}", [OrderController::class, 'returnOrder'])->name('order.return');

    // product review
    Route::get("/product/review/{product_id}", [ReviewController::class, 'productReview'])->name('review.create');
    Route::post("/review/store", [ReviewController::class, 'productReviewStore'])->name('review.store');
    // product comment system
    Route::post("/comment/store", [CommentController::class, 'commentStore'])->name('comment.store');
    // Route::post("/comment/index", [CommentController::class, 'commentIndex']);

    //user blog Comment
    Route::post('/blog/comment/store', [BlogUserCommentController::class, 'blogCommentStore'])->name('blog.comment.store');
});

Route::group([ 'middleware'=> ['user', 'auth']], function() {
    // SSLCOMMERZ Start
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END
});

    Route::get('/', [FontEndController::class, 'index']);
    Route::get('/single/product/{id}/{slug}', [FontEndController::class, 'singleProduct']);

    // blog
    Route::get('/blog', [FontEndController::class, 'allBlog']);
    Route::get('/single/blog/{id}/{slug}', [FontEndController::class, 'singleBlog'])->name('single.blog');
    Route::post('/blogcomment/more', [FontEndController::class, 'commentMore'])->name('blogcomments.load-more');


    // ====================== card settings start ======================
    Route::get('/product/card/view/{id}', [CardController::class, 'productCardView']);
    Route::post('/product/card/add/{id}', [CardController::class, 'productAddToCard']);
    Route::get('/ProductMiniCardView', [CardController::class, 'ProductMiniCardView']);
    Route::get('/miniCartRemove/{rowId}', [CardController::class, 'miniCartRemove']);
    // ==================== card settings end ============================
    //==================== tag wise product show ==========================
    Route::get('/product/tags/{tag}', [FontEndController::class, 'tagWiseProductsShow']);
    // ============================ subCategory wise product show =========
    Route::get('subCategory/product/{id}', [FontEndController::class, 'subcategoryWiseProductShow']);
    Route::get('subSubCategory/product/{id}', [FontEndController::class, 'subSubcategoryWiseProductShow']);
    // ===================== Frontend Language route =======================
    Route::get('/bangle/language/', [LanguageController::class, 'Bangle'])->name('bangle.language');
    Route::get('/english/language/', [LanguageController::class, 'English'])->name('english.language');
    //========================= wishlist start ==============================
    Route::get('/wishListPageView', [wishlistController::class, 'wishlistPageView']);
    Route::get('/getWishListData', [wishlistController::class, 'getWishListData']);
    Route::get('/removeWishlistData/{id}', [wishlistController::class, 'removeWishlistData']);
    Route::post('/add-to-userWishList/{product_id}', [wishlistController::class, 'addWishlist']);
    //========================= wishlist end ==================================
    Route::get('my-cart/', [CartPageController::class, 'cartIndex'])->name('cart');
    Route::get('checkout', [CartPageController::class, 'checkout'])->name('checkout');
    // social login route
    Route::get('login/google', [LoginController::class, 'loginWithGoogle'])->name('login.google');
    Route::get('login/google/callback/', [LoginController::class, 'loginWithGoogleCallback']);
    Route::get('login/github', [LoginController::class, 'loginWithGithub'])->name('login.facebook');
    Route::get('login/github/callback/', [LoginController::class, 'loginWithGithubCallback']);
    // order tracking route
    Route::post('order/track/', [OrderTrackController::class, 'orderTrack'])->name('order.track');
    // product search
    Route::get('product-search', [SearchController::class, 'productSearch'])->name('search.product');
    Route::post('searchProductByAjax', [SearchController::class, 'searchProductByAjax']);


