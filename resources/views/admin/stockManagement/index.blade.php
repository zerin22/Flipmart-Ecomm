@extends('layouts.admin.admin-master')
@section('title', 'Stock Management')
@section('stock') menu-is-opening menu-open @endsection
@section('stockActive') active @endsection
@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Stock Management</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('searchBySubCategory') }}"  method="post" >
                    @csrf
                    <div class="card p-4">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h5 style="margin-bottom:15px" class="card-title">Search By Category</h5>
                                <select name="category_id" id="" class="form-control">
                                    <option label="Search"></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h5 style="margin-bottom:15px" class="card-title">SubCategory</h5>
                                <select name="subcategory_id" id="" class="form-control">
                                    <option label="Search"></option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->subcategory_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h5 style="margin-bottom:15px" class="card-title">Sub SubCategory</h5>
                                <select name="subsubcategory_id" id="" class="form-control">
                                    <option label="Search"></option>
                                    @foreach ($subSubCategories as $subSubCategory)
                                        <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->subcategory_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-auto text-center" style="margin-top: 35px">
                                <button type="submit" class="btn  btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Product Show Table --}}
                <div class="row">
                    <div class="col-md-12 m-auto">

                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name English</th>
                                <th>Product Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <th><img width="100px" height="100px" src="{{ asset($item->product_thumbnail) }}" alt=""></th>
                                    <td><a href="{{ route('products.show', $item->id) }}">{{ $item->product_name_en }}</a></td>
                                    <td>{{ $item->product_qty }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{ route('StockSubCategoryAjaxShow') }}",
                        type:"GET",
                        data:{
                            category_id:category_id
                        },
                        dataType:"json",
                        success:function(data) {
                            console.log(data);
                            var d =$('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append('<option value="">-- Select Subcategory --</option>');
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

        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{ route('StockSubSubCategoryAjaxShow') }}",
                        type:"GET",
                        data:{
                            subCategory_id:subcategory_id
                        },
                        dataType:"json",
                        success:function(data) {
                            console.log(data);
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $('select[name="subsubcategory_id"]').append('<option value="">-- Select Sub Subcategory --</option>');
                                $.each(data, function(key, value){
                                    $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                                });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });



        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection


