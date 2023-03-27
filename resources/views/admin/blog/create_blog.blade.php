@extends('layouts.admin.admin-master')
@section('title', 'Add blog')
@section('blog') menu-is-opening menu-open @endsection
@section('addBlogActive') active @endsection
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                        <div class="item_1">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                                <li class="breadcrumb-item active">Add New Blog</li>
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
                <div class="col-md-8 m-auto">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h4>Add New Blog</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Blog Title<span style="color:red">*</span></label>
                                    <input type="text" id="title"  class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" placeholder="Title">
                                    @error('title')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Blog Slug<span style="color:red">*</span></label>
                                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" name="slug" placeholder="Slug">
                                    @error('slug')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Description<span style="color:red">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="editorBlog" value="{{ old('description') }}" name="description" placeholder="Example..."></textarea>
                                    @error('description')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Thumbnail Image: (390px 215px)<span style="color:red">*</span></label>
                                    <input type="file" onchange="document.getElementById('img_id1').src=window.URL.createObjectURL(this.files[0])" name="thumbnail_image" class=" mb-3">
                                    <img id="img_id1" width="500px" height="300px" src="{{ asset('backend') }}/images/brand/default-image.jpg" alt="">
                                    @error('thumbnail_image')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Feature Image:<span style="color:red">*</span></label>
                                    <input type="file" onchange="document.getElementById('img_id2').src=window.URL.createObjectURL(this.files[0])" name="feature_image" class="mb-3">
                                    <img id="img_id2" width="500px" height="300px" src="{{ asset('backend') }}/images/brand/default-image.jpg" alt="Feature Image">
                                    @error('feature_image')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit"  name="submit" value="Save" class="btn btn-warning custom_lg_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

</div>
<!-- /.content-wrapper -->
@endsection

@section('scripts')

    <script type="text/javascript">
        CKEDITOR.replace( 'editorBlog' );

        //Slug
        $('#title').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-").replace(/\?/g, '-'));
        });

    </script>
@endsection

