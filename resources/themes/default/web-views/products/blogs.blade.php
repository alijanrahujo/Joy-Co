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
            <a>blogs</a>
        </div>
    </div>
    <div class="content pt-4">
        <div class="container">
            <div class="sec-headinin mb-5 mt-5 text-start">
                <h3>STORIES our Products</h3>
            </div>

            <!-- banner area end -->
            <section>
                <div class="row product-list">
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".2s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list1.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>home accessories</h6>
                                    <h4>Golden Pillow</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".3s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list2.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>tableware</h6>
                                    <h4>Golden Brothers Bob</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".4s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list3.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>Vases</h6>
                                    <h4>Golden Brothers Bob</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".2s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list1.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>home accessories</h6>
                                    <h4>Golden Pillow</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".3s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list2.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>tableware</h6>
                                    <h4>Golden Brothers Bob</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".4s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list3.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>Vases</h6>
                                    <h4>Golden Brothers Bob</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".2s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list1.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>home accessories</h6>
                                    <h4>Golden Pillow</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".3s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list2.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>tableware</h6>
                                    <h4>Golden Brothers Bob</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="products wow fadeInUp mb-5" data-wow-delay=".4s">
                            <a href="#" class="link-reset">
                                <div class="proimg">
                                    <img src="{{asset('public/frontend/images/blog-list3.jpg')}}" class="img-fluid">
                                </div>
                                <div class="pro-detail">
                                    <h6>Vases</h6>
                                    <h4>Golden Brothers Bob</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </section>

        </div>
    </div>

@endsection

@push('script')
<script src="{{ theme_asset(path: 'public/assets/front-end/js/product-view.js') }}"></script>
@endpush
