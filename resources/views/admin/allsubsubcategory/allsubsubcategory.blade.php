@extends('layouts.admin.admin-master')
@section('title','Sub SubCategory')
@section('category') menu-is-opening menu-open @endsection
@section('subsubcategoryActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sub SubCategory</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Sub SubCategory Name Bn</th>
                                <th>Sub SubCategory Name En</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subsubcategory as $item)
                                <tr>
                                    <td> {{ !empty($item->category->category_name_en) ? $item->category->category_name_en: ""}}</td>
                                    <td>{{ !empty( $item->subcategory->subcategory_name_en ) ?  $item->subcategory->subcategory_name_en  : ""  }}</td>
                                    <td>{{ $item->subsubcategory_name_bn }}</td>
                                    <td>{{ $item->subsubcategory_name_en }}</td>
                                    <td>
                                        @if($item->created_at == NULL)
                                            <p style="color:red; font-weight:700">No Time Set</p>
                                        @else
                                            <p style="color:green; font-weight:700">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('SubSubCategory.edit', $item->id) }}">Edit</a>
                                                <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $item->id }}">Delete</a>
                                            </div>
                                        </div>

                                        {{-- <span class="d-flex justify-content-center">
                                            <a href="{{ route('SubSubCategory.edit', $item->id) }}" class="btn btn-info mr-3">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal__{{ $item->id }}">Delete</button>
                                        </span> --}}

                                        <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                        <p class="card-text">Are you sure you want to delete data?</p>
                                                        <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('SubSubCategory.destroy', $item->id) }}" method="POST" >
                                                            @csrf
                                                                @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add New Sub SubCategory</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('SubSubCategory.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            <option label="--Choose--"></option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Select Sub Category</label>
                                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                            <option label="--Choose--"></option>
                                        </select>
                                        @error('subcategory_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub SubCategory Name Bn</label>
                                        <input type="text" class="form-control @error('subsubcategory_name_bn') is-invalid @enderror" value="{{ old('subsubcategory_name_bn') }}" name="subsubcategory_name_bn" placeholder="ইলেকট্রনিক্স">
                                        @error('subsubcategory_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub SubCategory Name En</label>
                                        <input type="text" class="form-control @error('subsubcategory_name_en') is-invalid @enderror" value="{{ old('subsubcategory_name_en') }}" name="subsubcategory_name_en" placeholder="Electronics">
                                        @error('subsubcategory_name_en')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Save" class="btn btn-warning custom_lg_btn
                                        ">
                                    </div>
                                </form>
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

    // $('select[name="category_id"]').on('change', function(event){
    //         event.preventDefault();
    //         let category_id = $(this).val();
    //         axios.get('subsubcategory/ajax/'+ category_id)
    //         .then(function(response){
    //             if(response.status === 200){
    //                 let d = $('select[name="subcategory_id"]').empty();
    //                 $.each(response.data, function(key, value){
    //                     $('select[name="subcategory_id"]').append( '<option value="'+ value.id +'">'+ value.subcategory_name_en+'</option>')
    //                 })
    //             }
    //         })
    //         .catch(function(error){
    //             toastr.error("Somthing Wrong! Please try again");
    //         });
    // })

    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
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

    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endsection


