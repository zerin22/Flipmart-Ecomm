
@include('layouts.fontend.inc.header')

@yield('content')

<!-- Card Modal -->
<div class="modal fade bd-example-modal-lg" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><h4 id="Pname"></h4></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img width="100%" height="100%" src="" id="Pimage" alt="cardImg">
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="margin-top: 10px">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong id="productSellingPrice"></strong> <del id="productDIscountPprice"></del>  </li>
                                <li class="list-group-item">Product Code: <strong id="Pcode"></strong></li>
                                <li class="list-group-item">Product Category: <strong id="Pcategory"></strong></li>
                                <li class="list-group-item">Stock:
                                    <span class="badge badge-pill" style="background:green" id="stockIn"></span>
                                    <span id="stockOut"  style="background:red" class="badge badge-pill"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="colorArea">
                            <label for="color">Color</label>
                            <select class="form-control" id="color"></select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="size" class="mt-3">Size</label>
                            <select class="form-control" id="size"></select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" class="form-control" value="1" min="1">
                        </div>
                        <input type="hidden" id="product_id">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">
                    @if(session()->get('language') == 'bangle')
                        বাদ
                    @else
                        Close
                    @endif

                </button>
                <button type="button" class="btn btn-lg btn-warning" onclick="addToCard()">
                    @if(session()->get('language') == 'bangle')
                        কার্ডে যোগ করুন
                    @else
                        Add To Card
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>

@include('layouts.fontend.inc.footer')

    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
        function cardView(id){
            $.ajax({
                type:"GET",
                dataType:"json",
                url:"/product/card/view/"+id,
                success: function(response){
                    $("#Pname").text(response.product.product_name_en);
                    $("#Pcode").text(response.product.product_code);
                    $("#Pcategory").text(response.product.category.category_name_en);
                    $("#Pstock").text(response.product.product_qty);
                    $("#Pimage").attr('src','/'+response.product.product_thumbnail);
                    $("#product_id").val(id);
                    $("#quantity").val(1);
                    $("#color").empty();
                    $("#size").empty();
                    $.each(response.color, function(key, value){
                        if(response.color == ""){
                            $("#colorArea").hide();
                        }else {
                            $("#colorArea").show();
                        }
                        $("#color").append('<option '+value+' >'+value+'</option>');
                    });
                    $.each(response.size, function(key, value){
                        $("#size").append('<option '+value+' >'+value+'</option>');
                        if(response.size == ""){
                            $("#sizeArea").hide();
                        }else {
                            $("#sizeArea").show();
                        }
                    });

                    // price settings
                    if(response.product.discount_price == null){
                        $("#productSellingPrice").empty();
                        $("#productDIscountPprice").empty();
                        $("#productSellingPrice").text(response.product.selling_price);
                    }else {
                        $("#productSellingPrice").empty();
                        $("#productDIscountPprice").empty();
                        $("#productSellingPrice").text(response.product.discount_price);
                        $("#productDIscountPprice").text(response.product.selling_price);
                    }

                    // product quantity
                    if(response.product.product_qty > 0){
                        $("#stockIn").empty()
                        $("#stockOut").empty()
                        $("#stockIn").text('StockIn');
                    }else {
                        $("#stockOut").empty()
                        $("#stockIn").empty()
                        $("#stockOut").text('StockOut');
                    }

                }
            })
        }

        function addToCard(){
            var name = $("#Pname").text();
            var id = $("#product_id").val();
            var color = $("#color option:selected").text();
            var size = $("#size option:selected").text();
            var quantity = $("#quantity").val();
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{
                    color:color,
                    size:size,
                    quantity:quantity,
                    productName: name,
                },
                url:'/product/card/add/'+id,
                success: function(response){
                    viewMiniCard()
                    $("#cardModal").modal('hide');
                    toastr.success("Card Added Success");
                },
                error: function(error){
                    toastr.error("Something went wrong! Card not added");
                }
            })
        }

        // view mini card
        function viewMiniCard(){
            $.ajax({
                type:'GET',
                dataType: 'json',
                url: '/ProductMiniCardView/',
                success: function(response){
                    $("#miniCartQuantity").text(response.cartQty);
                    $("span[id='miniCartTotal']").text(response.cartTotal);
                    var miniCardData = "";
                    $.each(response.carts, function(key, value){
                        miniCardData += `
                        <div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="image">
                                        <a href="detail.html"><img src="/${value.options.image}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
                                    <div class="price">${value.price}$  <span style="color: red">(${value.qty})</span></div>
                                </div>
                                <div class="col-xs-1 action">
                                    <button type="submit" id="${value.rowId}" onclick="miniCartRemoveFun(this.id)" ><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    `
                    });
                    $("#miniCart").html(miniCardData);
                }
            });
        }
        viewMiniCard();

        // mini cart remove
        function miniCartRemoveFun(rowId){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:'/miniCartRemove/'+rowId,
                success:function(){
                    couponCalculationField();
                    shoppingCart();
                    viewMiniCard();
                    toastr.success("Cart remove success");
                },
                error:function(){
                    toastr.error("Opps! card not removed");
                }
            })
        }

        //========================== add wishlist ================================
        function addWishList(product_id){
            $.ajax({
                type:"POST",
                dataType:'json',
                url : "{{ url('/add-to-userWishList/') }}/"+product_id,
                success:function(data){
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            })
        }

        //================= get wishlist data =========================
        function getWishListData(){
            $.ajax({
                type:'GET',
                dataType: 'json',
                url: '/getWishListData/',
                success: function(response){
                    var wishlistCardData = "";
                    $.each(response, function(key, value){
                        wishlistCardData += `
                        <tr>
                            <td class="col-md-2"><img src="${value.product.product_thumbnail}" alt="imga"></td>
                            <td class="col-md-7">
                                <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                                <div class="price">
                                ${value.product.discount_price == null
                            ? `$${value.product.selling_price}`
                            : `$${value.product.discount_price}  <span>$${value.product.selling_price}</span>`
                        }
                                </div>
                            </td>
                            <td class="col-md-2">
                              <button data-toggle="modal" data-target="#cardModal" class="btn btn-primary icon" type="button" title="Add Cart" id="${value.product_id}" onclick="cardView(this.id)">
                                     Add to card
                                 </button>
                            </td>
                            <td class="col-md-1 close-btn">
                                <button type="submit" id="${value.id}" onclick="removeWishListData(this.id)" ><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                    `
                    });
                    $("#wishlistBody").html(wishlistCardData);
                }
            });
        }
        getWishListData();


        //================ remove wishlist ================
        function removeWishListData(id){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:'/removeWishlistData/'+id,
                success:function(){
                    getWishListData();
                    toastr.success("Wishlist product remove success");
                },
                error:function(){
                    toastr.error("Opps! Product not removed");
                }
            })
        }


        //========== my cart page =====================

        function shoppingCart(){

            $.ajax({
                type:'GET',
                dataType:'json',
                url:'{{ route('getShoppingCart') }}',
                success:function(response){
                    let shoppingCardData = '';
                    $.each(response.carts, function(key, value){
                        shoppingCardData += `
                          <tr>

                                <td class="cart-image">
                                    <a class="entry-thumbnail" href="detail.html">
                                        <img  src="/${value.options.image}" alt="">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
                                    <h4 class='cart-product-description'><a href="detail.html">${value.name}</a></h4>

                                    <div class="cart-product-info">
                                      <div style="margin-bottom: 10px !important;">
                                        <span class="product-color" >COLOR:<span style="font-size:15px" >
  ${value.options.color == null ? `<span style="color: red; font-size: 15px">No Color Found</span>`  :  `${value.options.color }`
                        }
                                        </span></span>
                                        </div>
                                         <div class="price">
                                            <span class="product-color">Price:<span style="font-size:15px" >${value.price}</span></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart-product-edit">
                                   ${value.options.size == null
                            ? `<span style="color: red; font-size: 15px">No Size Found</span>`
                            :
                            `${value.options.size}`
                        }
                                    </td>
                                <td class="cart-product-quantity">
                                    <div class="cart-quantity">
                                      ${value.qty > 1
                            ? `<button type="submit" class="btn btn-danger" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                            :
                            `<button type="submit" disabled class="btn btn-danger" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                        }

                                        <input style="width:50px; padding:3px 15px 6px" type="text" min="1" value="${value.qty}">
                                        <button type="submit" class="btn btn-primary" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                    </div>
                                </td>
                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">${value.subtotal}</span></td>
                                 <td class="romove-item">
                                    <button type="submit" id="${value.rowId}" onclick="shoppingCartRemove(this.id)" ><i class="fas fa-times"></i></button>
                                </td>
                          </tr>
                         `

                    });
                    $("#shoppingCart").html(shoppingCardData)

                }

            })

        }
        shoppingCart()

        //================== shoping cart remove ==================

        function shoppingCartRemove(rowId){
            $.ajax({
                type:"POST",
                dataType:'json',
                url:'/user/shoppingCart/remove/'+rowId,
                success: function(){
                    couponCalculationField();
                    viewMiniCard();
                    shoppingCart();
                    $("#coupon_area").show();
                    $("#appliedCoupon").hide()
                    toastr.success("shopping Cart Remove successfully");
                },
                error: function(){
                    toastr.error("Opps! shoppingCart Not Remove");
                }
            })
        }

        //=============== cart increment ===============

        function cartIncrement(rowId){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:'/user/shoppingCart/increment/'+rowId,
                success: function(){
                    couponCalculationField();
                    viewMiniCard();
                    shoppingCart();
                },
                error: function(){
                    toastr.error("Opps! shoppingCart Not Increment");
                }
            })
        }
        //=============== cart Decrement ===============
        function cartDecrement(rowId){
            $.ajax({
                type:"GET",
                dataType:'json',
                url:'/user/shoppingCart/decrement/'+rowId,
                success: function(){
                    couponCalculationField();
                    viewMiniCard();
                    shoppingCart();
                },
                error: function(){
                    toastr.error("Opps! shoppingCart Not Decrement");
                }
            })
        }

    </script>

    <script type="text/javascript">
        //=========== apply coupon ===================
        $("#appliedCoupon").hide()
        function applyCoupon(){
            let coupon_name = $("#coupon_name").val()
            $.ajax({
                type:"POST",
                dataType:'json',
                data: { coupon_name: coupon_name},
                url: '/user/create-coupon/',
                success: function(data){
                    couponCalculationField();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        $("#coupon_area").hide()
                        $("#appliedCoupon").show()
                        $("#coupon_name").val('')
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        $("#coupon_name").val('')
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                },
            })
        }
    </script>


    <script type="text/javascript">
        //================ get coupon calculation field =======================
        function couponCalculationField(){

            $.ajax({
                type:"GET",
                dataType:'json',
                url: '/user/coupon-calculate/',
                success: function(data){
                    if(data.total){
                        $('#couponCalField').html(`
                         <tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$${data.total}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$${data.total}</span>
                                </div>
                            </th>
                        </tr>
                    `)
                    }else {
                        $('#couponCalField').html(`
                         <tr>
                            <th>
                                 <div class="cart-sub-total mt-3">
                                    Coupon<span class="inner-left-md">${data.coupon_name}</span>
                                    <span><a class="btn btn-danger" onclick="couponRemove()"><i class="fas fa-times"></i></a></span>
                                </div>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$${data.subtotal}</span>
                                </div>

                                <div class="cart-sub-total">
                                    Discount<span class="inner-left-md">${data.coupon_discount}%</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$${data.total_amount}</span>
                                </div>

                            </th>
                        </tr>
                    `)
                    }
                }
            });
        }
        couponCalculationField();
    </script>

    <script type="text/javascript">
        //================ coupon remove ===============
        function couponRemove(){
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'/user/couponRemove',
                success: function(){
                    couponCalculationField();
                    $("#coupon_area").show()
                    $("#appliedCoupon").hide()
                    toastr.success('Coupon Remove Success');
                },
                error: function(){
                    couponCalculationField();
                    $("#coupon_area").show()
                    toastr.error('Opps! Coupon not removed');
                }
            })
        }

    </script>

    <script type="text/javascript">
        //================ select District ===============
        $('select[name="district_id"]').attr('disabled','disabled');
        $('select[name="division_id"]').on('change', function (event){
            event.preventDefault();
            let division_id = $(this).val();
            $('select[name="state"]').empty();
            axios.get('/user/checkout/districtGet/ajax'+division_id)
                .then(function(response){
                    if(response.status === 200){
                        $('select[name="district_id"]').removeAttr('disabled');
                        $('select[name="district_id"]').empty();
                        $('select[name="state_id"]').empty();
                        $('select[name="district_id"]').append('<option value="" selected disabled>Choose Your Area</option>');
                        $('select[name="state_id"]').append('<option value="" selected disabled>Choose Your City</option>');
                        $.each(response.data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">'+value.district_name+'</option>'
                            );
                        });
                    }
                })
                .catch(function(){
                    toastr.error("Somthing Wrong! Please try again");
                })
        });
    </script>

    <script type="text/javascript">
        //================ select District ===============
        $('select[name="state_id"]').attr('disabled','disabled');
        $('select[name="district_id"]').on('change', function (event){
            event.preventDefault();
            let district_id = $(this).val();
            axios.get('/user/checkout/stateGet/ajax'+district_id)
                .then(function(response){
                    if(response.status === 200){
                        $('select[name="state_id"]').removeAttr('disabled');
                        $('select[name="state_id"]').empty();
                        $('select[name="state_id"]').append('<option value="" disabled selected>Choose Your City</option>');
                        $.each(response.data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">'+value.state_name+'</option>'
                            );
                        });
                    }
                })
                .catch(function(){
                    toastr.error("Somthing Wrong! Please try again");
                })
        });
    </script>

    <script type="text/javascript">
        $(".PaymentPageLoader").css("display", "none")
        $(".paymentParents").css("display", "none")
        $('#paymentForm').on('submit', function (event){
            event.preventDefault();
            let name = $("#shipping_name").val();
            let phone = $("#shipping_phone").val();
            let email = $("#shipping_email").val();
            let postCode = $("#postCode").val();
            let division_id = $("#division_id").val();
            let district_id = $("#district_id").val();
            let state_id = $("#state_id").val();
            let address = $("#shipping_address").val();
            let authID = $("#authID").val();
            let payment_method =  $('input:radio[name=payment_method]:checked').val();
            axios.post('/user/payment-store/',{
                shipping_name: name,
                shipping_phone: phone,
                shipping_email: email,
                postcode: postCode,
                division_id: division_id,
                district_id: district_id,
                state_id: state_id,
                shipping_address: address,
                authID: authID,
                payment_method: payment_method,
            })
            .then(function(response){
                if(response.status === 200){
                    $("#shipping_name").val('');
                    $("#shipping_phone").val('');
                    $("#shipping_email").val('');
                    $("#postCode").val('');
                    $("#division_id").val('');
                    $("#district_id").val('');
                    $("#state_id").val('');
                    $("#shipping_address").val('');
                    $('input:radio[name=payment_method]:checked').val('');
                    $(".PaymentPageLoader").css("display", "block")
                    $(".paymentParents").css("display", "block")
                    setInterval(function(){
                        $(".PaymentPageLoader").css("display", "none")
                        if(response.data.payment_method === "stripe"){
                            window.location.href = '/user/payment-stripe-page/';
                        }else if(response.data.payment_method === "sshost"){
                            window.location.href = '/user/SSLPayment/';
                        }
                    },2000)
                }

            })
            .catch(function(error){
                console.log(error)
            })
        })
    </script>

<script type="text/javascript">
    $("body").on("keyup", "#search", function(){
        let searchData = $("#search").val();
        if(searchData.length > 0){
            $.ajax({
                type:"POST",
                data: {  search: searchData },
                url: "{{ url('searchProductByAjax') }}",
                success: function(result){
                    $("#suggestProductSearch").html(result)
                },
            })
        }
        if( searchData.length < 1)  $("#suggestProductSearch").html("");
    })
</script>

<script type="text/javascript">

    function showSearchResult(){
        $("#suggestProductSearch").slideDown();
    }
    function hideSearchResult(){
        $("#suggestProductSearch").slideUp();
    }
</script>





