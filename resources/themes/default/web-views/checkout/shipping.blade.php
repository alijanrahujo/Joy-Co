@extends('layouts.front-end.app')

@section('title',translate('shipping_Address'))

@push('css_or_js')
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/css/intlTelInput.css') }}">
@endpush

@section('content')
@php($billingInputByCustomer=getWebConfig(name: 'billing_input_by_customer'))
@php($defaultLocation = getWebConfig(name: 'default_location'))
@php($shippingAddresses= \App\Models\ShippingAddress::where(['customer_id'=>auth('customer')->id(), 'is_guest'=>0])->get())

<div class="content pt-4 product-cart product-payment">
    <div class="container">
        <div class="steps-count">
            <ul>
                <li class="current">
                    <span class="steps-count1">1</span>
                    <span class="steps-label">Delivery</span>
                </li>
                <li>
                    <span class="steps-count1">2</span>
                    <span class="steps-label">Payment</span>
                </li>
                <li>
                    <span class="steps-count1">3</span>
                    <span class="steps-label">THANK YOU</span>
                </li>
            </ul>
        </div>
        @if(!auth())
        <div class="wizard-content">
            <div class="penel border p-3 p-md-5 mt-5">
                <form>
                    <div class="sec-headinin mb-5">
                        <h3>Have an account? log in</h3>
                        <p>Log in now for a faster checkout</p>
                    </div>
                    <div class="row mb-2">
                        <div class="col-10 text-end"><a href="forget-pass.html" class="link-reset">Forgot your
                                password?</a></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email*" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-5">

                            <div class="form-group pass position-relative">
                                <input type="password" class="form-control" placeholder="Password*" name="password"
                                    id="passwords" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group pt-4 pt-md-0">
                                <button type="submit" class="main-btnreverse w-100 text-center fw-bold">LOG
                                    In</button>
                            </div>
                        </div>
                    </div>

                    <div class="continu-line pt-3 pt-md-5"><span class="fw-bold">Or Continue with</span></div>
                    <ul class="list-reset list-inline d-md-flex pt-5 justify-content-between social-login">
                        <li><a href="#" class="btn-show"><img src="{{asset('public/frontend/images/google-icon.svg')}}" alt="">
                                Google</a></li>
                        <li><a href="#" class="btn-show"><img src="{{asset('public/frontend/images/mobile-message.svg')}}" alt="">
                                Sign in with OTP</a></li>
                        <li><a href="#" class="btn-show"><img src="{{asset('public/frontend/images/facebook.svg')}}" alt="">
                                Facebook</a></li>
                    </ul>
                </form>
            </div>
        </div>
        @endif

        @if($physical_product_view)
        <input type="hidden" id="physical_product" name="physical_product" value="{{ $physical_product_view ? 'yes':'no'}}">
        <div class="panel border p-3 p-md-5 mt-5">
            <div class="sec-headinin mb-5">
                <div class="row">
                    <div class="col-md-8">
                        <h3>{{ translate('shipping_address')}}</h3>
                    </div>
                    <div class="col-md-4">



                        @if ($shippingAddresses->count() > 0)
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <div class="dropdown">
                                    <button class="form-control dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{translate('saved_address')}}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end saved-address-dropdown scroll-bar-saved-address" aria-labelledby="dropdownMenuButton" style="min-width: 300px;"> <!-- Adjust width here -->
                                        @foreach($shippingAddresses as $key => $address)
                                            <li class="dropdown-item select_shipping_address {{$key == 0 ? 'active' : ''}}" id="shippingAddress{{$key}}">
                                                <input type="hidden" class="selected_shippingAddress{{$key}}" value="{{$address}}">
                                                <input type="hidden" name="shipping_method_id" value="{{$address['id']}}">
                                                <div class="d-flex gap-2">
                                                    <div>
                                                        <i class="tio-briefcase"></i>
                                                    </div>
                                                    <div>
                                                        <div class="mb-1 text-capitalize">{{$address->address_type}}</div>
                                                        <div class="fs-12 text-capitalize text-wrap">{{$address->address}}</div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <form method="post" id="address-form">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ translate('contact_person_name')}}*" name="contact_person_name" {{$shippingAddresses->count()==0?'required':''}} id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control phone-input-with-country-picker-3" placeholder="Phone Number*" id="phone" {{$shippingAddresses->count()==0?'required':''}}>
                        <input type="hidden" id="shipping_phone_view" class="country-picker-phone-number-3 w-50" name="phone" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control form-select" name="address_type" id="address_type">
                            <option value="">{{ translate('address_type')}}*</option>
                            <option value="permanent">{{ translate('permanent')}}</option>
                            <option value="home">{{ translate('home')}}</option>
                            <option value="others">{{ translate('others')}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control form-select" name="country" id="country" data-live-search="true" required>
                            <option value="">{{ translate('country')}}*</option>
                            @forelse($countries as $country)
                                <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                            @empty
                                <option value="">{{ translate('no_country_to_deliver') }}</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ translate('city')}}*" name="city" id="city" {{$shippingAddresses->count()==0?'required':''}}>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        @if($zip_restrict_status == 1)
                            <select name="zip" class="form-control selectpicker" data-live-search="true" id="select2-zip-container" required>
                                @forelse($zip_codes as $code)
                                <option value="{{ $code->zipcode }}">{{ $code->zipcode }}</option>
                                @empty
                                    <option value="">{{ translate('no_zip_to_deliver') }}</option>
                                @endforelse
                            </select>
                        @else
                        <input type="text" class="form-control"
                                name="zip" id="zip" {{$shippingAddresses->count()==0?'required':''}}>
                        @endif
                    </div>
                </div>
                @if(!auth('customer')->check())
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email*" name="email" id="email" {{$shippingAddresses->count()==0?'required':''}}>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ translate('address')}}*" id="address" name="address" {{$shippingAddresses->count()==0?'required':''}}>
                        <span class="fs-14 text-danger font-semi-bold opacity-0 map-address-alert">
                            {{ translate('note') }}: {{ translate('you_need_to_select_address_from_your_selected_country') }}
                        </span>
                    </div>
                </div>

                @if(getWebConfig('map_api_status') ==1 )
                    <div class="form-group location-map-canvas-area map-area-alert-border">
                        {{-- <input id="pac-input" class="controls rounded __inline-46 location-search-input-field" title="{{translate('search_your_location_here')}}" type="text" placeholder="{{translate('search_here')}}"/> --}}
                        <input id="pac-input" class="form-control location-search-input-field" title="{{translate('search_your_location_here')}}" type="text" placeholder="{{translate('search_here')}}"/>
                        <div class="__h-200px" id="location_map_canvas"></div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Any Note For Billing" rows="4"></textarea>
                    </div>
                </div>

                <div class="col-12">
                    {{-- <label class="form-check-label d-flex gap-2 align-items-center" id="save_address_label">
                        <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="0">
                        @if(auth('customer')->check())
                            <input type="checkbox" class="form-check-input" name="save_address" id="save_address">
                            {{ translate('save_this_Address') }}
                        @endif
                    </label> --}}
                    <div class="form-check">
                        <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="0">
                        @if(auth('customer')->check())
                        <input class="form-check-input" type="checkbox" name="save_address" id="save_address">
                        <label class="form-check-label" for="save_address">
                            Save your details and delivery address for faster checkout next time.
                        </label>
                        @endif
                    </div>
                </div>
                <input type="hidden" id="latitude"
                        name="latitude" class="form-control d-inline"
                        placeholder="{{ translate('ex')}} : -94.22213"
                        value="{{$defaultLocation?$defaultLocation['lat']:0}}" required
                        readonly>
                <input type="hidden"
                        name="longitude" class="form-control"
                        placeholder="{{ translate('ex')}} : 103.344322" id="longitude"
                        value="{{$defaultLocation?$defaultLocation['lng']:0}}" required
                        readonly>

                <button type="submit" class="btn btn--primary d--none" id="address_submit"></button>
            </div>
            </form>
        </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="panel border p-3 p-md-5 mt-5">
                    <div class="items-area">
                        <div class="sec-headinin mb-5">
                            <h3>Shipping Details</h3>
                        </div>
                        <div class="">
                            @php($cart=\App\Models\Cart::where(['customer_id' => (auth('customer')->check() ? auth('customer')->id() : session('guest_id'))])->get()->groupBy('cart_group_id'))
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
                            <div class="car-item row">
                                <div class="col-md-3 col-4">
                                    <img src="{{ getStorageImages(path: $cartItem?->product?->thumbnail_full_url, type: 'product') }}" class="img-fluid">
                                </div>
                                <div class="col-md-6 col-8">
                                    <h4>{{$cartItem->name}}</h4>
                                    <p>Quantity : {{$cartItem['quantity']}}</p>
                                    <h4 class="d-block d-md-none"></h4>
                                    <p class="text-uppercase"><img src="{{asset('public/frontend/images/shipping-icon.svg')}}" alt=""> est
                                        shipping : </p>

                                </div>
                                <div class="col-md-3 text-end d-none d-md-block">
                                    <h4>{{ webCurrencyConverter(amount: ($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }}</h4>

                                </div>
                            </div>
                            {{-- <div class="car-item row">
                                <div class="col-md-3 col-4">
                                    <img src="{{asset('public/frontend/images/cart-item.jpg')}}" class="img-fluid">
                                </div>
                                <div class="col-md-6 col-8">
                                    <h4>Vase Rectangular Medium</h4>
                                    <p>Quantity : 1</p>
                                    <h4 class="d-block d-md-none">AED 2300.00</h4>
                                    <p class="text-uppercase"><img src="{{asset('public/frontend/images/shipping-icon.svg')}}" alt=""> est
                                        shipping : March 26, 2023 </p>

                                </div>
                                <div class="col-md-3 text-end d-none d-md-block">
                                    <h4>AED 2300.00</h4>

                                </div>
                            </div>
                            <div class="car-item row">
                                <div class="col-md-3 col-4">
                                    <img src="{{asset('public/frontend/images/cart-item.jpg')}}" class="img-fluid">
                                </div>
                                <div class="col-md-6 col-8">
                                    <h4>Vase Rectangular Medium</h4>
                                    <p>Quantity : 1</p>
                                    <h4 class="d-block d-md-none">AED 2300.00</h4>
                                    <p class="text-uppercase"><img src="{{asset('public/frontend/images/shipping-icon.svg')}}" alt=""> est
                                        shipping : March 26, 2023 </p>

                                </div>
                                <div class="col-md-3 text-end d-none d-md-block">
                                    <h4>AED 2300.00</h4>

                                </div>
                            </div>
                            <div class="car-item row">
                                <div class="col-md-3 col-4">
                                    <img src="{{asset('public/frontend/images/cart-item.jpg')}}" class="img-fluid">
                                </div>
                                <div class="col-md-6 col-8">
                                    <h4>Vase Rectangular Medium</h4>
                                    <p>Quantity : 1</p>
                                    <h4 class="d-block d-md-none">AED 2300.00</h4>
                                    <p class="text-uppercase"><img src="{{asset('public/frontend/images/shipping-icon.svg')}}" alt=""> est
                                        shipping : March 26, 2023 </p>

                                </div>
                                <div class="col-md-3 text-end d-none d-md-block">
                                    <h4>AED 2300.00</h4>

                                </div>
                            </div> --}}
                            @endforeach
            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="sec-headinin mb-5 mt-5">
                    <h3>your delivery options</h3>
                    <p>Choose a delivery method with one fee for everything in order</p>
                </div>
                <div class="row option-flex">
                    <div class="custom-radio">
                        <div class="radio-item">
                            <input type="radio" value="1" name="group[274634]" id="mce-group[274634]-274634-0"
                                required>
                            <label class="label-icon option1" for="mce-group[274634]-274634-0">standard delivery
                                <span>free</span>
                            </label>
                        </div>

                        <div class="radio-item">
                            <input type="radio" value="2" name="group[274634]" id="mce-group[274634]-274634-1">
                            <label class="label-icon option2" for="mce-group[274634]-274634-1">
                                express delivery
                                <span>aed 50.00</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel border p-3 p-md-5 mt-5">
                    <div class="row">
                        <div class="col-9">
                            <div class="sec-headinin mb-4">
                                <h5>delivery ADDRESS</h5>
                            </div>

                            <p class="mb-0">Avenue Gaomi City, Dubai</p>
                            <p class="mb-0">Phone : 971-04-3405789</p>
                            <p class="mb-0">Zip code : 60287</p>

                        </div>
                        <div class="col-3 text-end">
                            <a href="#"><img src="{{asset('public/frontend/images/edit-icon.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>

                @include('web-views.partials._order-summary-step2')
            </div>
        </div>


    </div>
</div>

<span id="message-update-this-address" data-text="{{ translate('Update_this_Address') }}"></span>
<span id="route-customer-choose-shipping-address-other" data-url="{{ route('customer.choose-shipping-address-other') }}"></span>
<span id="default-latitude-address" data-value="{{ $defaultLocation ? $defaultLocation['lat']:'-33.8688' }}"></span>
<span id="default-longitude-address" data-value="{{ $defaultLocation ? $defaultLocation['lng']:'151.2195' }}"></span>
<span id="route-action-checkout-function" data-route="checkout-details"></span>
<span id="system-country-restrict-status" data-value="{{ $country_restrict_status }}"></span>
@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/js/intlTelInput.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/country-picker-init.js') }}"></script>
    <script>
        "use strict";
        const deliveryRestrictedCountries = @json($countriesName);
        function deliveryRestrictedCountriesCheck(countryOrCode, elementSelector, inputElement) {
            const foundIndex = deliveryRestrictedCountries.findIndex(country => country.toLowerCase() === countryOrCode.toLowerCase());
            if (foundIndex !== -1) {
                $(elementSelector).removeClass('map-area-alert-danger');
                $(inputElement).parent().find('.map-address-alert').removeClass('opacity-100').addClass('opacity-0')
            } else {
                $(elementSelector).addClass('map-area-alert-danger');
                $(inputElement).val('')
                $(inputElement).parent().find('.map-address-alert').removeClass('opacity-0').addClass('opacity-100')
            }
        }

        $('#is_check_create_account').on('change', function() {
            if($(this).is(':checked')) {
                $('.is_check_create_account_password_group').fadeIn();
            } else {
                $('.is_check_create_account_password_group').fadeOut();
            }
        });
    </script>

    <script src="{{ theme_asset(path: 'public/assets/front-end/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/shipping.js') }}"></script>



    @if(getWebConfig('map_api_status') ==1 )
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{getWebConfig('map_api_key')}}&callback=mapsShopping&loading=async&libraries=places&v=3.56"
            defer>
        </script>
    @endif
@endpush
