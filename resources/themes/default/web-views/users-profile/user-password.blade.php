@php use App\Utils\Helpers;use App\Utils\ProductManager;use Illuminate\Support\Str; @endphp
@extends('layouts.front-end.app')

@section('title', auth('customer')->user()->f_name.' '.auth('customer')->user()->l_name)

@push('css_or_js')
    <link rel="stylesheet" href="{{asset('public/frontend/css/zeynep.min.css') }}">
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>Password</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                <div class="offcanvas-header">
                    <h2 id="offcanvasRightLabel" class="pb-5">My Account</h2>
                </div>
                <div class="row">

                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->
                    <div class="col-md-9">
                        <div class="panel-area">
                            <form class="mt-3 px-sm-2 pb-2" action="{{route('user-password-update')}}" method="post"
                                  id="profile_form"
                                  enctype="multipart/form-data">
                                @csrf

                            <div class="row mt-4">

                                <div class="col-md-6 mb-4">
                                    <input type="password" name="current_password" class="form-control" placeholder="Current Password *">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="password" name="new_password" class="form-control" placeholder="New Password *">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password *">
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit"
                                        class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">Update</button>
                                </div>

                            </div>
                        </form>

                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/js/intlTelInput.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/country-picker-init.js') }}"></script>
@endpush
