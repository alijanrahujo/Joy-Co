@php use App\Utils\Helpers;use App\Utils\ProductManager;use Illuminate\Support\Str; @endphp
@extends('layouts.front-end.app')

@section('title', translate('my_Order_List'))

@section('content')

   <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>My Orders</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                    <div class="offcanvas-header">
                        <h2 id="offcanvasRightLabel" class="pb-5">my orders</h2>
                    </div>
                    <div class="row">
                        @include('web-views.partials._profile-aside')
                        <!-- nav side bar -->
                        <div class="col-md-9">
                            <div class="panel-area myorder p-4 p-md-5">
                                <div class="row">
                                    <div class="col-12 searchboxx">
                                        <form>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Search your orders here">
                                                <button class="btn btn-outline-secondary" type="submit">search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if($orders->count()>0)
                                @foreach($orders as $order)
                                <div class="car-item row mt-5">
                                    <div class="col-md-3 col-7">
                                        <img src="{{asset('public/frontend/images/cart-item.jpg')}}" class="img-fluid">
                                    </div>
                                    <div class="col-md-5 border-end mt-3 mt-md-0">
                                        <h4>
                                             <a href="{{ route('account-order-details', ['id'=>$order->id]) }}"
                                                        class="fs-14 font-semibold">
                                                        {{ translate('order') }}  #{{$order['id']}}
                                                    </a>
                                        </h4>
                                        <p class="pt-3">Color : dark blue</p>
                                        <div class="btn-group mt-3">
                                            <a href="#" class="main-btnreverse py-2 px-4">exchange</a>
                                            <a href="#" class="main-btnreverse py-2 px-4 ms-2 ms-md-5">return</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <p class="text-uppercase">
                                            expected deliverY<br>
                                            <strong>2023 Sun, 23 Aug</strong>
                                        </p>
                                        <div class="actions pt-md-4">
                                            <div class="rateproduct">
                                                Rate Product
                                                <form>
                                                    <fieldset>
                                                        <input type="radio" name="rating" id="rating-1" value="1">
                                                        <label for="rating-1">1 Star</label>
                                                        <input type="radio" name="rating" id="rating-2" value="2">
                                                        <label for="rating-2">2 Stars</label>
                                                        <input type="radio" name="rating" id="rating-3" value="3">
                                                        <label for="rating-3">3 Stars</label>
                                                        <input type="radio" name="rating" id="rating-4" value="4">
                                                        <label for="rating-4">4 Stars</label>
                                                        <input type="radio" name="rating" id="rating-5" value="5">
                                                        <label for="rating-5">5 Stars</label>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <a href="#" class="link-reset text-underline">review product</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                                            <img src="{{ theme_asset(path: 'public/assets/front-end/img/empty-icons/empty-orders.svg') }}" alt="" width="100">
                                            <h5 class="text-muted fs-14 font-semi-bold text-center">{{ translate('You_have_not_any_order_yet') }}!</h5>
                                        </div>
                                    </div>
                                @endif




                            </div>
                        </div>

                    </div>
            </div>

        </div>
    </div>

@endsection
