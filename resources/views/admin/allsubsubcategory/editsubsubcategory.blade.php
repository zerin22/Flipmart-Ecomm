@extends('layouts.admin.admin-master')
@section('title','Update Sub SubCategory')
@section('category') menu-is-opening menu-open @endsection
@section('subsubcategoryActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('SubSubCategory.index') }}">Sub SubCategory</a></li>
                                    <li class="breadcrumb-item active">Update Sub SubCategory</li>
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
                                <h4>Update Sub SubCategory</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('SubSubCategory.update', $subsubcategories->id ) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">

                                        <label>Select Category</label>
                                        <select class="form-control" name="category_id">
                                            <option label="--Choose--"></option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $subsubcategories->category_id == $cat->id ? 'selected' : " " }} >{{ $cat->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Select Sub Category</label>
                                        <select class="form-control" name="subcategory_id">
                                            <option label="--Choose--"></option>
                                            @foreach($subcategories as $SubCat)
                                                <option value="{{ $SubCat->id }}" {{ $subsubcategories->subcategory_id == $SubCat->id ? 'selected' : " " }} >{{ $SubCat->subcategory_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub SubCategory Name Bn</label>
                                        <input type="text" class="form-control" value="{{ $subsubcategories->subsubcategory_name_bn }}" name="subsubcategory_name_bn">
                                        @error('subsubcategory_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub SubCategory Name En</label>
                                        <input type="text" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en  }}" name="subsubcategory_name_en">
                                        @error('subsubcategory_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-success btn-lg">
                                        <a href="{{ route('SubSubCategory.index') }}" class="btn btn-primary btn-lg ml-3">Back</a>
                                    </div>
                                </form>

                            </div>
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
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
        toastr.error("Somthing Wrong! Please try again");
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ route('SubSubCategoryAjaxShow') }}",
                    type:"GET",
                    data:{
                        category_id:category_id
                    },
                    dataType:"json",
                    success:function(data) {
                        console.log(data);
                    var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });

</script>
@endsection
