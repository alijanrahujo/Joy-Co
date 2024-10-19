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
                        <div class="row panel-area">
                            <div class="col-md-6">
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
