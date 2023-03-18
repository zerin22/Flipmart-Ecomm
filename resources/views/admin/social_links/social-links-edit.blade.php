@extends('layouts.admin.admin-master')
@section('title','Social Links')
@section('socialLinks')menu-is-opening menu-open @endsection
@section('allSocialLinksActive') active @endsection
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12 m-auto">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Social Links</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('social-links.update', $socialLink->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="url" class="form-control" value="{{ $socialLink->facebook }}" name="facebook" placeholder="Facebook">
                    @error('facebook')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Twitter</label>
                    <input type="url" class="form-control" value="{{  $socialLink->twitter }}" name="twitter" placeholder="Twitter">
                    @error('twitter')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Inastagram</label>
                    <input type="url" class="form-control" value="{{  $socialLink->instagram }}" name="instagram" placeholder="Instagram">
                    @error('instagram')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>LinkedIn</label>
                    <input type="url" class="form-control" value="{{  $socialLink->linkedin }}" name="linkedin" placeholder="LinkedIn">
                    @error('linkedin')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Youtube</label>
                    <input type="url" class="form-control" value="{{  $socialLink->youtube }}" name="youtube" placeholder="Youtube">
                    @error('youtube')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pinterest</label>
                    <input type="url" class="form-control" value="{{  $socialLink->pinterest }}" name="pinterest" placeholder="Pinterest">
                    @error('pinterest')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Google Plus</label>
                    <input type="url" class="form-control" value="{{  $socialLink->google_plus}}" name="google_plus" placeholder="Google Plus">
                    @error('google_plus')
                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group text-center mt-4">
                    <input type="submit"  name="submit" value="Update" class="btn btn-warning btn-lg">
                </div>
            </form>
        </div>

    </div>

@endsection
