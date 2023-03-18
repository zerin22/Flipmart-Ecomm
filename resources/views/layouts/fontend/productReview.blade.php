

@extends('layouts.fontend.fontend-master')
@section('title', 'Single Page')
@section('content')

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>Floral Print Buttoned</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
           <div class="sign-in-page" style="margin: 50px 0px 100px">
            <div class='row'>
                <div class='col-md-9'>

                    <div class="product-add-review">
                        <h4 class="title">Write your own review</h4>
                        <div class="review-table">
                            <div class="table-responsive">
                                <form action="{{ route('review.store') }}" method="post">
                                    @csrf
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cell-label">&nbsp;</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="cell-label">Quality</td>
                                        <td><input type="radio" name="rating" class="radio" value="1"></td>
                                        <td><input type="radio" name="rating" class="radio" value="2"></td>
                                        <td><input type="radio" name="rating" class="radio" value="3"></td>
                                        <td><input type="radio" name="rating" class="radio" value="4"></td>
                                        <td><input type="radio" name="rating" class="radio" value="5"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.review-table -->

                        <div class="review-form">
                            <div class="form-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" value="{{ $id}}" name="product_id">
                                            <div class="form-group">
                                                <label>Review <span class="astk">*</span></label>
                                                <textarea class="form-control txt txt-review"  rows="5" name="comment"></textarea>
                                            </div>
                                            @error('comment')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div><!-- /.row -->
                                    <div class="action">
                                        <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW NOW</button>
                                    </div><!-- /.action -->
                            </div><!-- /.form-container -->
                        </div><!-- /.review-form -->
                    </div><!-- /.product-add-review -->
                    </form><!-- /.cnt-form -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>



@endsection()



