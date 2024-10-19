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
            <a>products</a>
        </div>
    </div>
    <div class="content pt-4 product-listing">
        <div class="container">

            <div class="heading-inner">
                <h1>All New Products</h1>
            </div>

            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                    <div class="section-head">
                        <h3><img src="{{asset('public/frontend/images/filters-icon.svg') }}"> Filters</h3>

                        <div class="colaps-sec">
                            <a class="btn btn-link" data-bs-toggle="collapse" href="#filter1" role="button"
                                aria-expanded="true" aria-controls="filter1">Collection</a>

                            <div class="collapse multi-collapse show" id="filter1">
                                <ul>
                                    @foreach($categories as $category)
                                        <li class="for-hover-label cursor-pointer get-view-by-onclick"
                                                       data-link="{{ route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1]) }}">
                                            <input type="radio" id="{{$category['id']}}" name="gender" /><label for="{{$category['id']}}">{{$category['name']}}
                                                 ({{ $category['category_products_count'] }})</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="colaps-sec">
                            <a class="btn btn-link" data-bs-toggle="collapse" href="#filter2" role="button"
                                aria-expanded="false" aria-controls="filter2">BRANDS</a>

                            <div class="collapse multi-collapse" id="filter2">
                                <ul>
                                    @foreach($activeBrands as $brand)
                                        <li class="flex-between __inline-39 get-view-by-onclick"
                                                data-link="{{ route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1]) }}">
                                            <input type="radio" id="{{$brand['id']}}" name="gender" /><label for="{{$brand['id']}}"> {{ $brand['name'] }}
                                                ({{ $brand['brand_products_count'] }})</label>
                                        </li>
                                    @endforeach



                                </ul>
                            </div>
                        </div>
                        <div class="colaps-sec">
                            <a class="btn btn-link" data-bs-toggle="collapse" href="#filter3" role="button"
                                aria-expanded="false" aria-controls="filter3">SUB-CATEGORY</a>

                            <div class="collapse multi-collapse" id="filter3">
                                <ul>
                                    @foreach($categories as $category)
                                        @foreach($category->childes as $child)
                                            <li class="cursor-pointer get-view-by-onclick"
                                                                   data-link="{{ route('products',['id'=> $child['id'],'data_from'=>'category','page'=>1]) }}">
                                                <input type="radio" id="{{$child['id']}}" name="gender" /><label for="{{$child['id']}}">{{$child['name']}}
                                                    ({{$child->childes->count()>0}})</label>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="colaps-sec">
                            <a class="btn btn-link" data-bs-toggle="collapse" href="#filter4" role="button"
                                aria-expanded="false" aria-controls="filter4">PRODUCT TYPE</a>

                            <div class="collapse multi-collapse" id="filter4">
                                <ul>
                                    <li>
                                        <input type="radio" id="female" name="gender" /><label for="female">{{ translate('digital') }}
                                             ()</label>
                                    </li>
                                    <li><input type="radio" id="Ultimate" name="gender" /><label
                                            for="Ultimate">{{ translate('physical') }} ()</label> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="colaps-sec">
                            <a class="btn btn-link" data-bs-toggle="collapse" href="#filter5" role="button"
                                aria-expanded="false" aria-controls="filter5">PRICE</a>

                            <div class="collapse multi-collapse" id="filter5">
                                <div class="range-slider">
                                    <span>
                                        <span><input type="number" value="0 " min="0" max="6400" /> aed</span>
                                        <span><input type="number" value="6400" min="0" max="6400" /> aed</span>
                                    </span>
                                    <input value="0" min="0" max="6400" step="500" type="range" />
                                    <input value="6400" min="0" max="6400" step="500" type="range" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row productlist-info">
                        <div class="col-6">
                            <p>{{$products->total()}} Products Found</p>
                        </div>
                        <div class="col-6 text-end">
                            <select name="" id="">
                                <option value="">Sort by</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>

                    <div class="row product-list">
                        @foreach($products as $product)
                            <div class="col-6 col-md-4">
                                <div class="products wow fadeInUp" data-wow-delay=".2s">
                                    <div class="proimg">
                                        <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'backend-product') }}" class="img-fluid">
                                        <a href="{{route('product',$product->slug)}}" class="btn-shopnow btnproduct">shop now</a>
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

                        <div class="col-12 text-center mt-5">
                            <a href="#" class="btn-show">view more</a>
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
