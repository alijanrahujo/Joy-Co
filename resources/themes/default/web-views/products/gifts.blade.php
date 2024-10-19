@php use App\Utils\Helpers;use App\Utils\ProductManager;use Illuminate\Support\Str; @endphp
@extends('layouts.front-end.app')

@section('title', $web_config['name']->value.' '.translate('online_Shopping').' | '.$web_config['name']->value.' '.translate('ecommerce'))

@push('css_or_js')
    <meta property="og:image" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <meta property="twitter:card" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <link rel="stylesheet" href="{{theme_asset(path: 'public/assets/front-end/css/home.css')}}"/>
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/owl.theme.default.min.css') }}">
@endpush

@section('content')

    @php($decimal_point_settings = getWebConfig(name: 'decimal_point_settings'))

   <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>gifts</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                <div class="offcanvas-header d-inline-block pb-5">
                    <h2 id="offcanvasRightLabel" class="pb-2">Let's Talk Gifts</h2>
                    <p>Create a moment to treasure forever. What do you need help with?</p>
                </div>
                <div class="row">
                   <div class="col-12">
                        <div class="row align-items-center border">
                            <div class="col-md-7 ps-0">
                                <img src="{{asset('public/frontend/images/giftcard-img.jpg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-md-5">
                                <div class="heading-inner text-center">
                                    <h1>GIFT GUIDE</h1>
                                    <p class="w-70 ms-auto me-auto">Give your loved ones the gift of choice with Tanagra gift cards.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center border mt-5">
                            <div class="col-md-5">
                                <div class="heading-inner text-center">
                                    <h1>Gift Cards</h1>
                                    <p class="w-70 ms-auto me-auto">Give your loved ones the gift of choice with Tanagra gift cards.</p>
                                </div>
                            </div>
                            <div class="col-md-7 pe-0">
                                <img src="{{asset('public/frontend/images/giftcard-img2.jpg')}}" alt="" class="w-100">
                            </div>
                            
                        </div>
                   </div>
                   
                </div>
            </div>

        </div>
    </div>

@endsection

@push('script')
<script src="{{ theme_asset(path: 'public/assets/front-end/js/product-view.js') }}"></script>
@endpush
