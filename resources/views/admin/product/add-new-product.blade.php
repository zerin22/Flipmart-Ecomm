@extends('layouts.admin.admin-master')
@section('title', 'Add Product')
@section('product') menu-is-opening menu-open @endsection
@section('addproductActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                                    <li class="breadcrumb-item active">Add Product</li>
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
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                       {{-- all categories  --}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select Category <span style="color:red">*</span> </label>
                                                <select class="form-control" name="category_id">
                                                    <option label="--choose--"></option>
                                                    @foreach($categorys as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>
                                                        @endforeach
                                                </select>
                                                @error('category_id')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select SubCategory <span style="color:red">*</span></label>
                                                <select class="form-control" name="subcategory_id">
                                                    <option label="--choose--"></option>

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
                                                <input type="text" class="form-control"  id="title" value="{{ old('product_name_en') }}" name="product_name_en" placeholder="Dell Laptop ...">
                                                @error('product_name_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Name Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="title2" value="{{ old('product_name_bn') }}" name="product_name_bn" placeholder="ডেল ল্যাপটপ ...">
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
                                                <input type="text" class="form-control" id="slug" value="{{ old('product_slug_en') }}" name="product_slug_en" placeholder="Dell-Laptop ...">
                                                @error('product_slug_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Slug Name Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="slug2" value="{{ old('product_slug_bn') }}" name="product_slug_bn" placeholder="ডেল-ল্যাপটপ ...">
                                                @error('product_slug_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Slug Name --}}

                                        {{-- Product Tags --}}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Tags English<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="product_tags_en" value="{{ old('product_tags_en') }}" data-role="tagsinput" placeholder="Dell, Walton, Hp ...">
                                                @error('product_tags_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Tags Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control"  value="{{ old('product_tags_bn') }}" name="product_tags_bn" data-role="tagsinput" placeholder="ডেল, ওয়ালটন, এইচপি ...">
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
                                                <input type="text" class="form-control"  value="{{ old('product_title_en') }}" name="product_title_en" placeholder="Top 10 Hp laptop. ...">
                                                @error('product_title_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Title Bangle<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('product_title_bn') }}" name="product_title_bn" placeholder="শীর্ষ 10 এইচপি ল্যাপটপ। ...">
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
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ old('product_size_en') }}" name="product_size_en" placeholder=" 30, 40, 50,...">
                                                @error('product_size_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Size Bangle</label>
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ old('product_size_bn') }}" name="product_size_bn" placeholder="৩০, ৪০, ৫০ ...">
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
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ old('product_color_en') }}" name="product_color_en" placeholder="Red , Green ...">
                                                 @error('product_size_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Color Bangla</label>
                                                <input type="text" class="form-control" data-role="tagsinput" value="{{ old('product_color_bn') }}" name="product_color_bn" placeholder="লাল , সবুজ...">
                                                 @error('product_color_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Color --}}

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Code<span style="color:red">*</span></label>
                                                <input type="text" class="form-control"  value="{{ old('product_code') }}" name="product_code" placeholder="100">
                                                @error('product_code')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Code Quantity<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('product_qty') }}" name="product_qty" placeholder="200">
                                                @error('product_qty')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Selling Price<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('selling_price') }}" name="selling_price" placeholder="200Tk">
                                                 @error('selling_price')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                 @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Discount Price</label>
                                                <input type="text" class="form-control" value="{{ old('discount_price') }}" name="discount_price" placeholder="100Tk">
                                            </div>
                                        </div>

                                        {{-- Product Description --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Product Description English<span style="color:red">*</span></label>
                                                {{-- <textarea class="form-control" rows="3" name="product_desc_en" placeholder="Example..."></textarea> --}}
                                                <textarea class="form-control" id="editorEn" name="product_desc_en" placeholder="Example..."></textarea>
                                                @error('product_desc_en')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Product Description Bangle<span style="color:red">*</span></label>
                                                {{-- <textarea class="form-control" rows="3"  name="product_desc_bn" placeholder="উদাহরণ ..." ></textarea> --}}
                                                <textarea class="form-control" id="editorBn" name="product_desc_bn" placeholder="উদাহরণ ..." ></textarea>
                                                @error('product_desc_bn')
                                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Product Description --}}

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" name="hot_deals">
                                                    <label class="form-check-label">Hot Deals</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" name="featured">
                                                    <label class="form-check-label">Featured</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" name="spacial_offer">
                                                    <label class="form-check-label">Spacial Offer</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  value="1" name="spacial_deals">
                                                    <label class="form-check-label">Spacial Deals</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="row mt-5 text-center">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Product Thumbnail<span style="color:red">*</span></label>
                                                    <div class="custom-file">
                                                        <img class="mb-3" width="200px" height="200px" src="{{ asset('backend') }}/images/default/profile_img.png" alt="image" id="single_img">
                                                        <input type="file" id="imageInput" name="product_thumbnail" class="m-auto">
                                                        @error('product_thumbnail')
                                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Multiple Product Thumbnail<span style="color:red">*</span></label>
                                                    <div class="custom-file">
                                                        <div id="previewimg"  ></div>
                                                        <input type="file" name="MultiImage[]" id="multiImageInput" class="m-auto" multiple >
                                                        @error('MultiImage')
                                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center mt-3">
                                        <input type="submit"  name="submit" value="Save" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')

    <script type="text/javascript">

        CKEDITOR.replace( 'editorBn' );
        CKEDITOR.replace( 'editorEn' );

        // SubCategory ajax show
        $('select[name="category_id"]').on('change', function(event){
            event.preventDefault();
            let category_id = $(this).val();
            axios.get('changeProduct/ajax/'+ category_id)
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
            axios.get('SubSubCategory/ajax/'+ subcategory_id)
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
        // image

        $("#imageInput").on("change", function (){
            let Reader = new FileReader();
                Reader.readAsDataURL(this.files[0]);
                Reader.onload = function(event){
                    let imgSrc = event.target.result;
                    $("#single_img").attr('src', imgSrc);
                }
        })

        // multiple image

        $("#multiImageInput").on("change", function (){
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(150)
                                    .height(150); //create image element
                                $('#previewimg').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        })


        // tags
        $('#title').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
        $('#title2').keyup(function() {
            $('#slug2').val($(this).val().split(',').join('').replace(/\s/g,"-"));
        });
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection



