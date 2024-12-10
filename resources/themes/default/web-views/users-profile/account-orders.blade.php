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
                                    <div class="searchboxx">
                                        <form onsubmit="return false;">
                                            <div class="input-group mb-3">
                                                <input type="text" id="searchOrders" class="form-control" placeholder="Search your orders here">
                                                <button class="btn btn-outline-secondary" type="submit">search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if($orders->count()>0)
                                @foreach($orders as $order)
                                <div class="car-item row mt-5">
                                    <div class="col-md-3 col-7">
                                        <a href="{{ route('account-order-details', ['id'=>$order->id]) }}" class="d-block position-relative">
                                            @if($order->seller_is == 'seller')
                                                <img alt="{{ translate('shop') }}"
                                                     src="{{ getStorageImages(path: $order?->seller?->shop->image_full_url, type: 'shop') }}" class="img-fluid">
                                            @elseif($order->seller_is == 'admin')
                                                <img alt="{{ translate('shop') }}"
                                                     src="{{ getStorageImages(path: $web_config['fav_icon'], type: 'shop') }}" class="img-fluid">
                                            @endif
                                            </a>
                                    </div>
                                    <div class="col-md-5 border-end mt-3 mt-md-0">
                                        <h4>
                                             <a href="{{ route('account-order-details', ['id'=>$order->id]) }}"
                                                        class="fs-14 font-semibold">
                                                        {{ translate('order') }}  #{{$order['id']}}
                                                    </a>
                                        </h4>
                                        <p class="pt-3">
                                            {{ $order->order_details_sum_qty }} {{ translate('items') }}
                                        </p>
                                        <p>
                                            @if($order['order_status']=='failed' || $order['order_status']=='canceled')
                                                <span class="status-badge rounded-pill __badge badge-soft-danger fs-12 font-semibold text-capitalize">
                                                    {{ translate($order['order_status'] =='failed' ? 'failed_to_deliver' : $order['order_status']) }}
                                                </span>
                                            @elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered')
                                                <span class="status-badge rounded-pill __badge badge-soft-success fs-12 font-semibold text-capitalize">
                                                    {{ translate($order['order_status']=='processing' ? 'packaging' : $order['order_status']) }}
                                                </span>
                                            @else
                                                <span class="status-badge rounded-pill __badge badge-soft-primary fs-12 font-semibold text-capitalize">
                                                    {{ translate($order['order_status']) }}
                                                </span>
                                            @endif
                                        </p>
                                        {{-- <div class="btn-group mt-3">
                                            <a href="#" class="main-btnreverse py-2 px-4">exchange</a>
                                            <a href="#" class="main-btnreverse py-2 px-4 ms-2 ms-md-5">return</a>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <p class="text-uppercase">
                                            expected deliverY<br>
                                            <strong>{{date('d M, Y h:i A',strtotime('7 days'.$order['created_at'])) }}</strong>
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

@push('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchOrders');
        const orderItems = document.querySelectorAll('.car-item');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            orderItems.forEach(order => {
                const orderText = order.textContent.toLowerCase();
                if (orderText.includes(searchTerm)) {
                    order.style.display = ''; // Show the order
                } else {
                    order.style.display = 'none'; // Hide the order
                }
            });
        });
    });
</script>
    
@endpush