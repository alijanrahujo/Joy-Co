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
                        <div class="panel-area">
                            
                            <form class="mt-3 px-sm-2 pb-2" action="{{route('user-update')}}" method="post"
                                  id="profile_form"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="f_name" class="form-control" value="{{$customerDetail['f_name']}}" placeholder="First Name*">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="l_name" class="form-control" value="{{$customerDetail['l_name']}}" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <select name="" id="" class="form-select">
                                                    <option value="" class="muted">+971</option>
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" name="phone" class="form-control" value="{{$customerDetail['phone']}}" placeholder="Phone Number*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="city" class="form-control" value="{{$customerDetail['city']}}" placeholder=" City*">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="area" class="form-control" value="{{$customerDetail['area']}}" placeholder="Area*">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="shipping_address" class="form-control" value="{{$customerDetail['shipping_address']}}" placeholder="Shipping Address*">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Subscribe me to Joy&co newsletters
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-end">
                                        <button type="submit"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">update</button>
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
