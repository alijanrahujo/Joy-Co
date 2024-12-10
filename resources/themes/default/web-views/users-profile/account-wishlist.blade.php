@extends('layouts.front-end.app')

@section('title', translate('my_Wishlists'))

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="#">home</a> <span>|</span>
            <a>Wish list</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                <div class="offcanvas-header">
                    <h2 id="offcanvasRightLabel" class="pb-5">Wishlist</h2>
                </div>
                <div class="row">
                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->
                    <div class="col-md-9">
                        @php($decimal_point_settings = getWebConfig(name: 'decimal_point_settings'))
                        @if($wishlists->count()>0)
                        <div class="row panel-area">
                            @foreach($wishlists as $key=>$wishlist)
                            @php($product = $wishlist->productFullInfo)
                            @if( $wishlist->productFullInfo)
                            <div class="col-md-6" id="row_id{{$product->id}}">
                                <div class="car-item wishlist-item row border-0">
                                    <div class="col-3 col-md-3">
                                        <a href="{{route('product',$product->slug)}}" class="d-block h-100">
                                        <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}" alt="{{ translate('wishlist') }}" class="img-fluid">
                                        </a>
                                        
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <h4> 
                                            <a class="fs-12 font-semibold line-height-16" href="{{route('product',$product['slug'])}}">{{$product['name']}}</a>
                                        </h4>
                                        @if($brand_setting)
                                            <p>{{translate('brand')}} : {{$product->brand?$product->brand['name']:''}}</p>
                                        @endif
                                        <h4>{!! getPriceRangeWithDiscount(product: $product) !!}</h4>
                                        <a href="{{route('product',$product['slug'])}}">
                                            <button type="button"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-md-3 action-add-to-cart-form" data-update-text="{{ translate('update_cart') }}"
                                            data-add-text="{{ translate('add_to_cart') }}">add to
                                            cart</button>
                                        </a>

                                    </div>
                                    <div class="col-1 ps-0 ps-md-3 text-end">
                                        <div class="">
                                            <span><button class="btn btn-link w-100 p-0"><img
                                                        src="{{asset('public/frontend/images/black-close.svg')}}" alt=""
                                                        class="img-fluid function-remove-wishList" data-id="{{ $product['id'] }}"></button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <span class="badge badge-danger">{{ translate('item_removed') }}</span>
                            @endif
                            @endforeach

                            {{-- <div class="col-md-6">
                                <div class="car-item wishlist-item row border-0">
                                    <div class="col-3 col-md-3">
                                        <img src="{{asset('public/frontend/images/wishlist-thumb.jpg')}}" class="img-fluid">
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <h4>Vase Rectangular Medium</h4>
                                        <p>Color : dark blue</p>
                                        <h4>AED 2300.00</h4>
                                        <button type="button"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-md-3">add to
                                            cart</button>

                                    </div>
                                    <div class="col-1 ps-0 ps-md-3 text-end">
                                        <div class="">
                                            <span><button class="btn btn-link w-100 p-0"><img
                                                        src="{{asset('public/frontend/images/black-close.svg')}}" alt=""
                                                        class="img-fluid"></button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car-item wishlist-item row border-0 p-0 mb-0">
                                    <div class="col-3 col-md-3">
                                        <img src="{{asset('public/frontend/images/wishlist-thumb.jpg')}}" class="img-fluid">
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <h4>Vase Rectangular Medium</h4>
                                        <p>Color : dark blue</p>
                                        <h4>AED 2300.00</h4>
                                        <button type="button"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-md-3">add to
                                            cart</button>

                                    </div>
                                    <div class="col-1 ps-0 ps-md-3 text-end">
                                        <div class="">
                                            <span><button class="btn btn-link w-100 p-0"><img
                                                        src="{{asset('public/frontend/images/black-close.svg')}}" alt=""
                                                        class="img-fluid"></button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car-item wishlist-item row border-0 p-0 mb-0">
                                    <div class="col-3 col-md-3">
                                        <img src="{{asset('public/frontend/images/wishlist-thumb.jpg')}}" class="img-fluid">
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <h4>Vase Rectangular Medium</h4>
                                        <p>Color : dark blue</p>
                                        <h4>AED 2300.00</h4>
                                        <button type="button"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-md-3">add to
                                            cart</button>

                                    </div>
                                    <div class="col-1 ps-0 ps-md-3 text-end">
                                        <div class="">
                                            <span><button class="btn btn-link w-100 p-0"><img
                                                        src="{{asset('public/frontend/images/black-close.svg')}}" alt=""
                                                        class="img-fluid"></button></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="login-card w-100 border-0 shadow-none">
                                    <div class="text-center py-3 text-capitalize">
                                        <img src="{{ theme_asset(path: 'public/assets/front-end/img/icons/wishlist.png') }}" alt="" class="mb-4" width="70">
                                        <h5 class="fs-14">{{ translate('no_product_found_in_wishlist') }}!</h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
