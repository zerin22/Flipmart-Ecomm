@extends('layouts.admin.admin-master')
@section('title', 'Multiple Image Store')
@section('storeroom') menu-is-opening menu-open @endsection
@section('multistoreActive') active @endsection
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid" style="padding: 0px 100px">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Multiple Image Store</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid" style="padding: 0px 100px">
                <div class="row">
                    @if ($multiImageTrashCount <= 0)
                        <p style="color:red; font-weight:700; font-size:20px">No Data Found</p>
                    @else
                        @foreach($multiImageTrash as $item)
                            <div class="col-md-3">
                                <div class="card p-4">
                                    <img width="100%" height="100%" src="{{ asset($item->photo_name) }}" alt="">
                                    {{-- <div class="card-body text-center">
                                        <a onclick="return confirm('are you sure to restore this item?'); " href="{{ route('multiImage.restore', ['id' => $item->id])  }}" class="btn btn-warning mr-3">Re-Store</a>
                                        <a onclick="return confirm('are you sure to permanently delete this item?'); " href="{{ route('multipleImage.premanentDelete', ['id' => $item->id]) }}" class="btn btn-danger">Permanent Delete</a>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection





