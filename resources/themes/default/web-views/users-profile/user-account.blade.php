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
            <a>My Profile</a>
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
                        <div class="row panel-area myacc-area">

                            <div class="col-10 col-md-8">
                                <h5 class="fw-semibold">MY PROFILE</h5>
                                <p class="muted mb-2">First Name : {{$customerDetail['f_name']}}</p>
                                <p class="muted mb-2">Last Name : {{$customerDetail['l_name']}}</p>
                                <p class="muted mb-2">Mobile Phone : {{$customerDetail['phone']}}</p>
                                <p class="muted mb-2">Email : {{$customerDetail['email']}}</p>
                            </div>
                            <div class="col-2 col-md-4">
                                <div class="actionss text-end">
                                    <span><a href="{{route('edit-user-account')}}" class="link-reset"><img src="{{asset('public/frontend/images/edit-icon2.svg')}}" alt=""></a></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="mt-4 mb-4 pb-2">
                            </div>

                            <div class="col-10 col-md-8">
                                <h5 class="fw-semibold">Password</h5>
                                <p class="muted mb-2">********</p>

                            </div>
                            <div class="col-2 col-md-4">
                                <div class="actionss text-end">
                                    <span><a href="{{route('user-password')}}" class="link-reset"><img src="{{asset('public/frontend/images/edit-icon2.svg')}}" alt=""></a></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="mt-4 mb-4 pb-2">
                            </div>

                            <div class="col-12">
                                <h5 class="fw-semibold">MY ORDERS</h5>
                                <p class="muted mb-2">You have not placed an order yet</p>

                            </div>
                            <div class="col-12">
                                <hr class="mt-4 mb-4 pb-2">
                            </div>

                            <div class="col-10 col-md-8">
                                <h5 class="fw-semibold">MY ADDRESS BOOK</h5>
                                <p class="muted mb-2">You have not placed an order yet</p>

                            </div>
                            <div class="col-12 col-md-4 mt-3 mt-md-0">
                                <div class="actionss text-end">
                                    <span><a href="{{route('account-address')}}" class="link-reset">Add New Address</a></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="mt-4 mb-4 pb-2">
                            </div>

                            <div class="col-12">
                                <h5 class="fw-semibold">PAYMENT METHODS</h5>
                                <p class="muted mb-2">You do not have any payment methods saved.</p>

                            </div>
                            <div class="col-12">
                                <hr class="mt-4 mb-4 pb-2">
                            </div>

                            <div class="col-12">
                                <h5 class="fw-semibold">WISHLIST</h5>
                                <p class="muted mb-2">You do not have items on your wishlist.</p>

                            </div>

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
