@extends('layouts.admin.admin-master')
@section('title','All SubCategory')
@section('category')menu-is-opening menu-open @endsection
@section('subcategoryActive') active @endsection
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
                            <li class="breadcrumb-item active">SubCategory</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>SubCategory Name Bn</th>
                                <th>SubCategory Name En</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subcategory as $item)
                                <tr>

                                    <td>{{  !empty($item->category->category_name_en) ? $item->category->category_name_en:'' }}</td>
                                    <td>{{ $item->subcategory_name_bn }}  <span style="color:red; font-weight:700">({{ $item->subsubcategory->count()}} )</span></td>
                                    <td>{{ $item->subcategory_name_en }}</td>
                                    <td>
                                        @if($item->created_at == NULL)
                                            <p style="color:red; font-weight:700">No Time Set</p>
                                        @else
                                            <p style="color:green; font-weight:700">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                        <a href="{{ route('subCategory.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ route('subCategory.destroy', $item->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                        </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add New SubCategory</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('subCategory.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control" name="category_id">
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
                                        <label>SubCategory Name Bn</label>
                                        <input type="text" class="form-control" value="{{ old('subcategory_name_bn') }}" name="subcategory_name_bn" placeholder="ইলেকট্রনিক্স">
                                        @error('subcategory_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>SubCategory Name En</label>
                                        <input type="text" class="form-control" value="{{ old('subcategory_name_en') }}" name="subcategory_name_en" placeholder="Electronics">
                                        @error('subcategory_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Add" class="btn btn-success btn-lg">
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
@endsection()

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endsection

