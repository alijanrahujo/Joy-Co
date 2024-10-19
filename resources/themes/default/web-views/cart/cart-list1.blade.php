@extends('layouts.front-end.app')

@section('title', translate('My_Shopping_Cart'))

@push('css_or_js')
    <meta property="og:image" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="og:title" content="{{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
    <meta property="twitter:card" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="twitter:title" content="{{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description"
          content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
    <link rel="stylesheet" href="{{dynamicStorage(path: 'public/assets/front-end/css/shop-cart.css')}}">
@endpush

@section('content')
@php($shippingMethod=getWebConfig(name: 'shipping_method'))
@php($cart=\App\Models\Cart::where(['customer_id' => (auth('customer')->check() ? auth('customer')->id() : session('guest_id'))])->get()->groupBy('cart_group_id'))
<div class="breadcrumbs">
    <div class="container">
        <a href="#">home</a> <span>|</span>
        <a>Shopping bag</a>
    </div>
</div>
<div class="content pt-4 product-cart">
    <div class="container">

        <div class="items-area">
            <div class="offcanvas-header">
                <h2 id="offcanvasRightLabel" class="pb-5">Your Shopping Cart (4 items)</h2>
            </div>
            <div class="">
                @foreach($cart as $group_key=>$group)
                <?php
                    $isPhysicalProductExist = false;
                    $total_shipping_cost = 0;
                    foreach ($group as $row) {
                        if ($row->product_type == 'physical' && $row->is_checked) {
                            $isPhysicalProductExist = true;
                        }
                        if ($row->product_type == 'physical' && $row->is_checked && $row->shipping_type != "order_wise") {
                            $total_shipping_cost += $row->shipping_cost;
                        }
                    }
                ?>
                @foreach($group as $cart_key=>$cartItem)
                @php($product = $cartItem->allProducts)

                <?php
                    $getProductCurrentStock = $product->current_stock;
                    if(!empty($product->variation)) {
                        foreach(json_decode($product->variation, true) as $productVariantSingle) {
                            if($productVariantSingle['type'] == $cartItem->variant) {
                                $getProductCurrentStock = $productVariantSingle['qty'];
                            }
                        }
                    }
                ?>

                <?php
                    $checkProductStatus = $cartItem->allProducts?->status ?? 0;
                    if($cartItem->seller_is == 'admin') {
                        $inhouseTemporaryClose = getWebConfig(name: 'temporary_close') ? getWebConfig(name: 'temporary_close')['status'] : 0;
                        $inhouseVacation = getWebConfig(name: 'vacation_add');
                        $vacationStartDate = $inhouseVacation['vacation_start_date'] ? date('Y-m-d', strtotime($inhouseVacation['vacation_start_date'])) : null;
                        $vacationEndDate = $inhouseVacation['vacation_end_date'] ? date('Y-m-d', strtotime($inhouseVacation['vacation_end_date'])) : null;
                        $vacationStatus = $inhouseVacation['status'] ?? 0;
                        if ($inhouseTemporaryClose || ($vacationStatus && (date('Y-m-d') >= $vacationStartDate) && (date('Y-m-d') <= $vacationEndDate))) {
                            $checkProductStatus = 0;
                        }
                    }else{
                        if (!isset($cartItem->allProducts->seller) || (isset($cartItem->allProducts->seller) && $cartItem->allProducts->seller->status != 'approved')) {
                            $checkProductStatus = 0;
                        }
                        if (!isset($cartItem->allProducts->seller->shop) || $cartItem->allProducts->seller->shop->temporary_close) {
                            $checkProductStatus = 0;
                        }
                        if(isset($cartItem->allProducts->seller->shop) && ($cartItem->allProducts->seller->shop->vacation_status && (date('Y-m-d') >= $cartItem->allProducts->seller->shop->vacation_start_date) && (date('Y-m-d') <= $cartItem->allProducts->seller->shop->vacation_end_date))) {
                            $checkProductStatus = 0;
                        }
                    }
                ?>

                    {{-- {{$cartItem}} --}}
                    <div class="car-item row">
                        <div class="col-md-3">
                            <a href="{{ $checkProductStatus == 1 ? route('product', $cartItem['slug']) : 'javascript:'}}">
                            <img src="{{ getStorageImages(path: $cartItem?->product?->thumbnail_full_url, type: 'product') }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <h4>
                                <a href="{{ $checkProductStatus == 1 ? route('product', $cartItem['slug']) : 'javascript:'}}">
                                {{$cartItem->name}}
                                </a>
                            </h4>
                            <div
                                class="d-flex flex-wrap gap-2">
                                @foreach(json_decode($cartItem['variations'], true) as $key1 => $variation)
                                    <p>
                                        <span class="__text-12px text-capitalize">
                                            <span class="text-muted">{{$key1}} </span> : <span
                                                class="fw-semibold">{{$variation}}</span>
                                        </span>
                                    </p>
                                @endforeach
                            </div>

                            @php($minimum_order=\App\Utils\ProductManager::get_product($cartItem['product_id']))
                            @if ($checkProductStatus == 1)
                            <div class="quantity-cart pb-0">
                                <div class="quantity-input">

                                        @php($minimum_order=\App\Utils\ProductManager::get_product($cartItem['product_id']))
                                        @if ($minimum_order && $checkProductStatus)

                                            <div class="qty_plus action-update-cart-quantity-list-mobile p-2"
                                            data-minimum-order="{{ $product->minimum_order_qty }}"
                                            data-cart-id="{{ $cartItem['id'] }}"
                                            data-increment="1">
                                            <i class="ti-plus"><img src="{{asset('public/frontend/images/plus-input.svg')}}"></i>
                                            </div>
                                            <input type="number" class="qty_input cartQuantity{{ $cartItem['id'] }} action-change-update-cart-quantity-list-mobile"
                                            value="{{$cartItem['quantity']}}" name="quantity[{{ $cartItem['id'] }}]"
                                            id="cart_quantity_mobile{{$cartItem['id']}}"
                                            data-minimum-order="{{ $product->minimum_order_qty }}"
                                            data-cart-id="{{ $cartItem['id'] }}"
                                            data-increment="0"
                                            data-current-stock="{{ $getProductCurrentStock }}"
                                            data-min="{{ isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1 }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            <div class="qty_minus action-update-cart-quantity-list-mobile p-2"
                                            data-minimum-order="{{ $product->minimum_order_qty }}"
                                            data-cart-id="{{ $cartItem['id'] }}"
                                            data-increment="-1"
                                            data-event="{{ $cartItem['quantity'] == $product->minimum_order_qty ? 'delete':'minus' }}">
                                            <i class="ti-minus">
                                                <img src="{{asset('public/frontend/images/minus-input.svg')}}"></i>
                                            </div>
                                        @else
                                            <div class="qty d-flex flex-column align-items-center gap-3">
                                            <span class="action-update-cart-quantity-list-mobile cursor-pointer"
                                                  data-minimum-order="{{ $product?->minimum_order_qty ?? 1}}"
                                                  data-cart-id="{{ $cartItem['id'] }}"
                                                  data-increment="-{{ $cartItem['quantity'] }}"
                                                  data-event="delete">
                                                <i class="tio-delete text-danger" data-toggle="tooltip"
                                                   data-title="{{ translate('product_not_available_right_now')}}"></i>
                                            </span>
                                            </div>
                                        @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4 text-end">
                            <h4>{{ webCurrencyConverter(amount: ($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }}</h4>
                            <div class="actions pt-5">
                                <span><button>
                                        <img src="{{asset('public/frontend/images/heart-iconssmall.svg')}}" alt=""> move to wishlist</button></span>
                                <span class="pe-4 ps-4">|</span>
                                <span><button class="action-update-cart-quantity-list cursor-pointer" data-minimum-order="{{ $product?->minimum_order_qty ?? 1 }}"
                                    data-cart-id="{{ $cartItem['id'] }}"
                                    data-increment="-{{ $cartItem['quantity'] }}"
                                    data-event="delete"><img src="{{asset('public/frontend/images/trash-icon.svg')}}" alt=""> Remove</button></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
                {{-- <div class="car-item row">
                    <div class="col-md-3">
                        <img src="{{asset('public/frontend/images/cart-item.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <h4>Vase Rectangular Medium</h4>
                        <p>Color : dark blue</p>
                        <div class="quantity-cart pb-0">
                            <div class="quantity-input">
                                <div class="quantity-down" id="quantityDown">
                                    <i class="ti-minus"><img src="{{asset('public/frontend/images/minus-input.svg')}}"></i>
                                </div>
                                <input id="quantity" type="text" value="1" name="quantity">
                                <div class="quantity-up" id="quantityUP">
                                    <i class="ti-plus"><img src="{{asset('public/frontend/images/plus-input.svg')}}"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <h4>AED 2300.00</h4>
                        <div class="actions pt-5">
                            <span><button>
                                    <img src="{{asset('public/frontend/images/heart-iconssmall.svg')}}" alt=""> move to wishlist</button></span>
                            <span class="pe-4 ps-4">|</span>
                            <span><button><img src="{{asset('public/frontend/images/trash-icon.svg')}}" alt=""> Remove</button></span>
                        </div>
                    </div>
                </div>
                <div class="car-item row">
                    <div class="col-md-3">
                        <img src="{{asset('public/frontend/images/cart-item.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <h4>Vase Rectangular Medium</h4>
                        <p>Color : dark blue</p>
                        <div class="quantity-cart pb-0">
                            <div class="quantity-input">
                                <div class="quantity-down" id="quantityDown">
                                    <i class="ti-minus"><img src="{{asset('public/frontend/images/minus-input.svg')}}"></i>
                                </div>
                                <input id="quantity" type="text" value="1" name="quantity">
                                <div class="quantity-up" id="quantityUP">
                                    <i class="ti-plus"><img src="{{asset('public/frontend/images/plus-input.svg')}}"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <h4>AED 2300.00</h4>
                        <div class="actions pt-5">
                            <span><button>
                                    <img src="{{asset('public/frontend/images/heart-iconssmall.svg')}}" alt=""> move to wishlist</button></span>
                            <span class="pe-4 ps-4">|</span>
                            <span><button><img src="{{asset('public/frontend/images/trash-icon.svg')}}" alt=""> Remove</button></span>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span><img src="{{asset('public/frontend/images/ordercart-icon.svg')}}" alt=""></span>
                                <span> This order is a gift
                                    <p>All Items in the order will be gift wrapped</p>
                                </span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form class="order-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="ordergift"
                                                    id="ordergift1" checked>
                                                <label class="form-check-label" for="ordergift1">
                                                    Add gift message
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="ordergift"
                                                    id="ordergift2">
                                                <label class="form-check-label" for="ordergift2">
                                                    No gift message
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="form-group">
                                                <textarea class="form-control" name="" id="" cols="30" rows="4"
                                                    placeholder="Type your gift message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="To">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="From">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-4">
                                        <div class="col-md-6">
                                            <div><a href="#"
                                                    class="btn-show d-block text-center pt-2 pb-2">cancel</a></div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button"
                                                class="main-btnreverse w-100 text-center pt-2 pb-2">save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                COUPON CODE
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form>
                                    <div class="row">
                                        <div class="col-8"><input type="text" class="form-control" placeholder="Ramadan 15%"></div>
                                        <div class="col-4"><button type="button"
                                            class="main-btnreverse w-100 text-center pt-1 pb-1">apply</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                REDEEM Gift Card
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                REDEEM
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                REDEEm joy&co loyalty points
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                REDEEm
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 summary">
                <div class="heading-area pt-5 mt-5 pb-4">
                            <h1>Order Summary</h1>
                </div>
                <div class="summary-body row">
                    <div class="col-6 mb-4">Subtotal</div>
                    <div class="col-6 mb-4">AED 18,140.00</div>
                    <div class="col-6 mb-4 muted">Ramadan 15%</div>
                    <div class="col-6 mb-4 muted">AED -2721.00</div>
                    <div class="col-6 mb-4">Shipping</div>
                    <div class="col-6 mb-4">free</div>
                    <div class="col-6 mb-4">VAT</div>
                    <div class="col-6 mb-4">AED 770.95</div>
                    <div class="col-6 mb-4">Grand Total
                        <p>(Vat inclusive)</p></div>
                    <div class="col-6 mb-4">AED 16,189.95</div>
                    <div class="col-12 mb-4"><img src="{{asset('public/frontend/images/gift-card.png')}}" alt="" class="me-2"> Earn 1296  JOY&CO loyalty points</div>
                </div>
                <hr>

                <div class="payment-indo p-5">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="{{asset('public/frontend/images/tamara-logo.png')}}" alt="">
                        </div>
                        <div class="col-9">
                            <h4>Split into 3 payments</h4>
                            <p>1/3 today, and the rest within 2 months without fees</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3 text-center">
                            <img src="{{asset('public/frontend/images/tabby-logo.png')}}" alt="">
                        </div>
                        <div class="col-9">
                            <h4>Split into 4 payments</h4>
                            <p>1/4 today, and the rest within 3 months without fees</p>
                        </div>
                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div><a href="#" class="btn-show d-block text-center">Continue shopping</a></div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="main-btnreverse w-100 text-center">Checkout</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <span id="route-customer-set-shipping-method" data-url="{{ url('/customer/set-shipping-method') }}"></span>
    <span id="route-action-checkout-function" data-route="shop-cart"></span>
</div>
@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/cart-details.js') }}"></script>
    {{-- <script> cartQuantityInitialize();</script> --}}
@endpush
