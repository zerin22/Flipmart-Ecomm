@extends('layouts.admin.admin-master')
@section('title', 'Update Product')
@section('product') menu-is-opening menu-open @endsection
@section('allproductActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                                    <li class="breadcrumb-item active">Update Product</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Update Product</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('products.update', $products->id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    {{-- all categories  --}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select Category<span style="color:red">*</span></label>
                                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                    <option label="--choose--"></option>
                                                    @foreach($categorys as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $products->category_id ? "selected" : "" }} >{{ $item->category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select SubCategory<span style="color:red">*</span></label>
                                                <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                                    <option label="--choose--"></option>
                                                    @foreach($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $products->subcategory_id ? "selected" : "" }} >{{ $subcategory->subcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select Sub SubCategory</label>
                                                <select class="form-control" name="subsubcategory_id">
                                                    <option label="--choose--"></option>
                                                    @foreach($subsubcategories as $subsubcategory)
                                                        <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $products->subsubcategory_id? "selected" : "" }} >{{ $subsubcategory->subsubcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subsubcategory_id')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- all categories --}}

                                        {{-- Product Name --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Name English<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('product_name_en') is-invalid @enderror"  id="title" value="{{ $products->product_name_en }}" name="product_name_en" placeholder="Dell Laptop ...">
                                                @error('product_name_en')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Name Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('product_name_bn') is-invalid @enderror" id="title2" value="{{  $products->product_name_bn }}" name="product_name_bn" placeholder="ডেল ল্যাপটপ ...">
                                                @error('product_name_bn')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Name --}}

                                        {{-- Product Slug Name --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Slug Name English<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="slug"  value="{{ $products->product_slug_en }}" name="product_slug_en" placeholder="Dell-Laptop ...">
                                                @error('product_slug_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Slug Name Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="slug2" value="{{ $products->product_slug_bn }}" name="product_slug_bn" placeholder="ডেল-ল্যাপটপ ...">
                                                @error('product_slug_bn')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Slug Name --}}

                                        {{-- Product Tags --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Tags English <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="product_tags_en" value="{{ $products->product_tags_en }}" data-role="tagsinput" placeholder="Dell, Walton, Hp ...">
                                                @error('product_tags_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Tags Bangle <span style="color:red">*</span></label>
                                                <input type="text" class="form-control"  value="{{ $products->product_tags_bn }}" name="product_tags_bn" data-role="tagsinput" placeholder="ডেল, ওয়ালটন, এইচপি ...">
                                                @error('product_tags_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Tags --}}

                                        {{-- Product Title --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Title English<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('product_title_en') is-invalid @enderror" value="{{ $products->product_title_en }}" name="product_title_en" placeholder="Top 10 Hp laptop. ...">
                                                @error('product_title_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Title Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('product_title_bn') is-invalid @enderror" value="{{ $products->product_title_bn }}" name="product_title_bn" placeholder="শীর্ষ 10 এইচপি ল্যাপটপ। ...">
                                                @error('product_title_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Title --}}

                                        {{-- Product Size --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Size English</label>
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ $products->product_size_en }}" name="product_size_en" placeholder=" 30, 40, 50,...">
                                                @error('product_size_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Size Bangle</label>
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ $products->product_size_bn }}" name="product_size_bn" placeholder="৩০, ৪০, ৫০ ...">
                                                @error('product_size_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Size --}}

                                        {{-- Product Color --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Color English</label>
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ $products->product_color_en }}" name="product_color_en" placeholder="Red , Green ...">
                                                @error('product_size_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Color Bangle</label>
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ $products->product_color_bn }}" name="product_color_bn" placeholder="লাল , সবুজ...">
                                                @error('product_color_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Color --}}

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Code<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('product_code') is-invalid @enderror"  value="{{ $products->product_code }}" name="product_code" placeholder="100">
                                                @error('product_code')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Code Quantity<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('product_qty') is-invalid @enderror" value="{{ $products->product_qty }}" name="product_qty" placeholder="200">
                                                @error('product_qty')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Selling Price<span style="color:red">*</span></label>
                                                <input type="text" class="form-control @error('selling_price') is-invalid @enderror" value="{{ $products->selling_price  }}" name="selling_price" placeholder="200Tk">
                                                @error('selling_price')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Discount Price</label>
                                                <input type="text" class="form-control" value="{{ $products->discount_price }}" name="discount_price" placeholder="100Tk">
                                                @error('discount_price')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Product Description --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Product Description English</label>
                                                <textarea class="form-control" id="editorEn" name="product_desc_en" placeholder="Example...">{{ $products->product_desc_en }}</textarea>
                                                @error('product_desc_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Product Description Bangle</label>
                                                <textarea class="form-control" id="editorBn"  name="product_desc_bn" placeholder="উদাহরণ ..." >{{ $products->product_desc_bn }}</textarea>
                                                @error('product_desc_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Description --}}

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" {{ $products->hot_deals == 1 ? 'checked' : "" }} name="hot_deals">
                                                    <label class="form-check-label">Hot Deals</label>
                                                    @error('hot_deals')
                                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" {{ $products->featured == 1 ? 'checked' : "" }} name="featured">
                                                    <label class="form-check-label">Featured</label>
                                                    @error('featured')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" {{ $products->spacial_offer == 1 ? 'checked' : "" }} name="spacial_offer">
                                                    <label class="form-check-label">Spacial Offer</label>
                                                    @error('spacial_offer')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" {{ $products->spacial_deals == 1 ? 'checked' : "" }} name="spacial_deals">
                                                    <label class="form-check-label">Spacial Deals</label>
                                                    @error('spacial_deals')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center mt-3">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-warning custom_lg_btn">
                                    </div>
                                </form>
                                <div class="multiple_img_section" style="border-top:1px solid #ddd; margin-top: 50px">
                                    <div class="row no-gutters" style="margin-top: 50px">
                                        <div class="col-md-4">
                                            <h2 style="font-size: 20px;
                                            font-weight: 700;
                                            margin-bottom: 20px;
                                            background: #dddddd36;
                                            padding: 10px;
                                            border-radius: 4px">Product Thumbnail</h2>
                                            <form action="{{ route('single-Image', ['id' => $products->id ]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card p-3">
                                                    <img width="100%" height="100%" id="single_img" src="{{ asset($products->product_thumbnail) }}" alt="">
                                                    <div class="card-body">
                                                        <div class="card-body mt-2">
                                                            <div class="multipleBodyWrapper d-flex justify-content-between">
                                                                <div class="deleteBtn" style="margin-right: 40px;">
                                                                    <input type="submit" class="btn btn-warning custom_lg_btn" value="Update">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="file" style="color:transparent; padding:3px" id="imageInput" name="singleImage">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="multipleSection" style="padding-left:30px">
                                                <h2 style="font-size: 20px;
                                                font-weight: 700;
                                                margin-bottom: 20px;
                                                background: #dddddd36;
                                                padding: 10px;
                                                border-radius: 4px;
                                            }">Product Multiple Image</h2>
                                                <form action="{{ route('edit-multipleImage') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        @foreach($multiimages as $img)
                                                            <div class="col-md-4">
                                                                <div class="card p-3">
                                                                    <div class="multi_img">
                                                                        <div class="imgoverlay"></div>
                                                                        <div class="imgarea">
                                                                            <img width="100%" height="100%" src="{{ asset($img->photo_name) }}" alt="">
                                                                        </div>

                                                                        <div class="multi_img_icon">
                                                                            <a onclick="return confirm('Are you sure?');" href="{{ route('products.delete', ['id' => $img->id])  }}"><i class="fas fa-trash-alt"></i></a>

                                                                            {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal__{{ $img->id }}"><i class="fas fa-trash-alt"></i></button> --}}

                                                                            <!-- Modal For Delete -->
                                                                            {{-- <div class="modal fade" id="exampleModal__{{ $img->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                                                            <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                                                            <p class="card-text">Are you sure, you want to delete data?</p>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            <a  href="{{ route('products.delete', ['id' => $img->id])  }}" class="btn btn-danger">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-body mt-2">
                                                                        <div class="multipleBodyWrapper d-flex justify-content-between">
                                                                            <div class="deleteBtn" style="margin-right: 40px;">
                                                                                <input type="submit" class="btn btn-warning" value="Update">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="file" style="color:transparent; padding:3px" name="multiImage[{{ $img->id }}]">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        CKEDITOR.replace( 'editorBn' );
        CKEDITOR.replace( 'editorEn' );
        // SubCategory ajax show
        $('select[name="category_id"]').on('change', function(event){
            event.preventDefault();
            let category_id = $(this).val();
            axios.get('products/edit/updateChangeSubcategory/'+ category_id)
                .then(function(response){
                    if(response.status === 200){
                        $('select[name="subsubcategory_id"]').html(" ");
                        $('select[name="subcategory_id"]').empty();
                        $.each(response.data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_en +'</option>')
                        })
                    }
                })
                .catch(function(error){
                    toastr.error("Something is wrong")
                })
        });

        // SubSub category ajax show
        $('select[name="subcategory_id"]').on('change', function(event){
            event.preventDefault();
            let subcategory_id = $(this).val();
            axios.get('products/edit/updateChangeSubSubcategory/'+ subcategory_id)
                .then(function(response){
                    if(response.status === 200){
                        let d = $('select[name="subsubcategory_id"]').empty();
                        $.each(response.data, function(key, value){
                            $('select[name="subsubcategory_id"]').append( '<option value="'+ value.id +'">'+ value.subsubcategory_name_en+'</option>')
                        })
                    }
                })
                .catch(function(error){
                    toastr.error("Somthing Wrong! Please try again");
                });
        })

        $("#imageInput").on("change", function (){
            let Reader = new FileReader();
            Reader.readAsDataURL(this.files[0]);
            Reader.onload = function(event){
                let imgSrc = event.target.result;
                $("#single_img").attr('src', imgSrc);
            }
        })

        // tags
        $('#title').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
        $('#title2').keyup(function() {
            $('#slug2').val($(this).val().split(',').join('').replace(/\s/g,"-"));
        });

    </script>
@endsection




