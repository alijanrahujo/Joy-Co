@php use App\Utils\Helpers;use App\Utils\ProductManager;use Illuminate\Support\Str; @endphp
@extends('theme-views.layouts.app')

@section('title', $web_config['name']->value.' '.translate('Online_Shopping').' | '.$web_config['name']->value.' '.translate('ecommerce'))
@push('css_or_js')
    <meta property="og:image" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <meta property="twitter:card" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
@endpush

@section('content')
<div class="content pt-4">
    <div class="container">
        <div class="row masonry-style d-none d-md-block" data-masonry='{"percentPosition": false }'
            data-rellax-speed="-3">
            @foreach ($main_banner as $banner)
                {{-- {{$banner}} --}}
                <div class="col-md-6 mb-3 px-2 wow fadeInUp" data-wow-delay=".2s">
                    <a href="{{ $banner['url'] }}">
                        <div class="detail h-600" style="background-image: url({{ getStorageImages(path:$banner['photo_full_url'], type:'banner') }});">
                            {{-- <h5>INTRODUCING luxury</h5> --}}
                            {{-- <h2>Luminous Lighting</h2> --}}

                            <div class="btn-go">
                                <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{-- <div class="col-md-6 mb-3 px-2 wow fadeInUp" data-wow-delay=".2s">
                <a href="product-listing.html">
                    <div class="detail h-600" style="background-image: url({{asset('public/frontend/images/banner-1.jpg')}});">
                        <h5>INTRODUCING luxury</h5>
                        <h2>Luminous Lighting</h2>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-3 px-2 wow fadeInUp" data-wow-delay=".4s">
                <a href="product-listing.html">
                    <div class="detail h-500" style="background-image: url({{asset('public/frontend/images/banner-2.jpg')}});">
                        <h6>curious brands</h6>
                        <h3>Brands<br>You'll Love</h3>
                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 px-2 wow fadeInUp" data-wow-delay=".5s">
                <a href="product-listing.html">
                    <div class="detail h-500" style="background-image: url({{asset('public/frontend/images/banner-3.jpg')}});">
                        <h6>collections</h6>
                        <h3>Tradition Lamp <br> Collections</h3>
                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-6 px-2 wow fadeInUp" data-wow-delay=".5s">
                <a href="product-listing.html">
                    <div class="detail h-400" style="background-image: url({{asset('public/frontend/images/banner-4.jpg')}});">
                        <h6>new arrivals</h6>
                        <h3>Chairs That<br> Speaks Design</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>

        <div class="row masonry-style d-flex d-md-none" data-rellax-speed="-3">
            <div class="col-md-6 mb-3 px-2 wow fadeIn" data-wow-delay=".2s">
                <a href="#">
                    <div class="detail h-600" style="background-image: url({{asset('public/frontend/images/banner-1.jpg')}});">
                        <h5>INTRODUCING luxury</h5>
                        <h2>Luminous Lighting</h2>
                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row bannerbot-m masonry-style d-flex d-md-none">
            <div class="col mb-3 px-2 wow fadeIn" data-wow-delay=".4s">
                <a href="#">
                    <div class="detail" style="background-image: url({{asset('public/frontend/images/banner-2.jpg')}});">
                        <h6>curious brands</h6>
                        <h3>Brands<br>You'll Love</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col px-2 wow fadeIn" data-wow-delay=".5s">
                <a href="#">
                    <div class="detail" style="background-image: url({{asset('public/frontend/images/banner-3.jpg')}});">
                        <h6>collections</h6>
                        <h3>Tradition Lamp <br> Collections</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>

                    </div>
                </a>
            </div>
            <div class="col px-2 wow fadeIn" data-wow-delay=".5s">
                <a href="#">
                    <div class="detail h-400" style="background-image: url({{asset('public/frontend/images/banner-4.jpg')}});">
                        <h6>new arrivals</h6>
                        <h3>Chairs That<br> Speaks Design</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- banner area end -->
        <section>
            <div class="heading-area wow fadeInUp" data-wow-delay=".2s">
                <div class="row align-self-center">
                    <div class="col-md-8">
                        <h1>brand you love</h1>
                        <p>Check out most promising product bought by our buyers !</p>
                    </div>
                    <div class="col-md-4 text-md-end align-self-center">
                        <a href="product-detail.html" class="btn-show">show all</a>
                    </div>
                </div>
            </div>

            <div class="row product-list">
                @foreach ($topRated as $product)
                    {{-- {{$product}} --}}
                    <div class="col-6 col-md-3">
                        <div class="products wow fadeInUp" data-wow-delay=".2s">
                            <div class="proimg">
                                <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" class="img-fluid">
                                <a href="#" class="btn-shopnow btnproduct">shop now</a>
                                @if($product->discount > 0)
                                <span class="dtags">
                                    @if ($product->discount_type == 'percent')
                                    {{'OFF'.' '.round($product->discount, $web_config['decimal_point_settings'])}}%
                                    @elseif($product->discount_type =='flat')
                                    {{'OFF'.' '.Helpers::currency_converter($product->discount)}}
                                    @endif
                                </span>
                                @endif
                            </div>
                            <div class="pro-detail">
                                <h6>{{Str::limit($product->product_type, 25)}}</h6>
                                <h4>{{Str::limit($product->name, 25)}}</h4>
                                <p class="price">{{Helpers::currency_converter($product->unit_price)}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="heading-area wow fadeInUp" data-wow-delay=".2s">
                <div class="row align-self-center">
                    <div class="col-md-12 text-center">
                        <h1>This month highlights</h1>
                        <p>Check out most promising product bought by our buyers !</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-around">
                <div class="col-md-5 wow fadeInUp" data-wow-delay=".3s">
                    <div class="month-highlight">
                        <a href="#">
                            <img src="{{asset('public/frontend/images/products/hmonth-1.jpg')}}" class="img-fluid">
                            <div class="monthly-title">GIFT GUIDE</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="month-highlight">
                        <a href="#">
                            <img src="{{asset('public/frontend/images/products/hmonth-1.jpg')}}" class="img-fluid">
                            <div class="monthly-title">Online Exclusive</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @if(count($featuredProductsList)>0)
        <section>
            <div class="heading-area wow fadeInUp" data-wow-delay=".2s">
                <div class="row align-self-center">
                    <div class="col-md-8">
                        <h1>featured products </h1>
                        <p>Check out most promising product bought by our buyers !</p>
                    </div>
                    <div class="col-md-4 text-md-end align-self-center">
                        <a href="product-listing.html" class="btn-show">show all</a>
                    </div>
                </div>
            </div>

            <div class="row product-list product-list2">
                @foreach ($featuredProductsList as $product)
                    {{-- {{$product}} --}}
                    <div class="col-6 col-md-3">
                        <div class="products wow fadeInUp" data-wow-delay=".3s">
                            <div class="proimg">
                                <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" class="img-fluid">
                                <a href="#" class="btn-shopnow btnproduct">shop now</a>
                                @if($product->discount > 0)
                                <span class="dtags">
                                    @if ($product->discount_type == 'percent')
                                    {{'OFF'.' '.round($product->discount, $web_config['decimal_point_settings'])}}%
                                    @elseif($product->discount_type =='flat')
                                    {{'OFF'.' '.Helpers::currency_converter($product->discount)}}
                                    @endif
                                </span>
                                @endif
                            </div>
                            <div class="pro-detail">
                                <h6>{{Str::limit($product->product_type, 25)}}</h6>
                                <h4>{{Str::limit($product->name, 25)}}</h4>
                                <p class="price">{{Helpers::currency_converter($product->unit_price)}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>
@endsection

