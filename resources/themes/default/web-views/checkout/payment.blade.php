@extends('layouts.front-end.app')

@section('title', translate('choose_Payment_Method'))

@push('css_or_js')
    {{-- <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/payment.css') }}"> --}}
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@section('content')
<div class="content pt-4 product-cart product-payment payment-detail">
    <div class="container">
        <div class="steps-count">
            <ul>
                <li class="">
                    <span class="steps-count1">1</span>
                    <span class="steps-label">Delivery</span>
                </li>
                <li class="current">
                    <span class="steps-count1">2</span>
                    <span class="steps-label">Payment</span>
                </li>
                <li>
                    <span class="steps-count1">3</span>
                    <span class="steps-label">THANK YOU</span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="sec-headinin mb-5 mt-5">
                    <h3>payment method</h3>
                </div>
                <div class="row option-flex option-flex2">
                    @if($cashOnDeliveryBtnShow && $cash_on_delivery['status'] || $digital_payment['status']==1)
                    <div class="custom-radio">
                        <div class="radio-item">
                            <input type="radio" value="1" name="group[274634]" id="mce-group[274634]-274634-0"
                                required>
                            <label class="label-icon option1" for="mce-group[274634]-274634-0">
                                <img src="{{asset('public/frontend/images/paypal1.png')}}" alt="">
                            </label>
                        </div>

                        <div class="radio-item">
                            <input type="radio" value="2" name="group[274634]" id="mce-group[274634]-274634-1">
                            <label class="label-icon option2" for="mce-group[274634]-274634-1">
                                <img src="{{asset('public/frontend/images/debitcard-icon.svg')}}" alt=""> debit / credit card
                            </label>
                        </div>
                        @if($cashOnDeliveryBtnShow && $cash_on_delivery['status'])
                        <div class="radio-item">
                            <form action="{{route('checkout-complete')}}" method="get" class="needs-validation" id="cash_on_delivery_form">
                            <input type="hidden" name="payment_method" value="cash_on_delivery">
                            <input type="radio" id="cash_on_delivery">
                            <label class="label-icon option2" for="cash_on_delivery">
                                <img src="{{asset('public/frontend/images/cash-icon.svg')}}" alt=""> {{ translate('cash_on_Delivery') }}
                            </label>
                        </form>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="sec-headinin mt-5">
                    <h5>card details</h5>
                </div>
                <div class="order-form mt-2">
                    <div class="row">

                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="card holder name">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="card number">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="MM/YY">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="CVC*">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Save the details for next purchase
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row border-top pt-4 mt-4">
                        <div class="col-md-6">
                            <div class="form-check form-group">
                                <input class="form-check-input" type="radio" name="ordergift" id="ordergift1"
                                    checked>
                                <label class="form-check-label" for="ordergift1">
                                    <img src="{{asset('public/frontend/images/tamara-logo.png')}}" alt="">
                                    <span>TAMARA INSTALLMENTS
                                        <strong>Pay In 3 Installments</strong>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-group">
                                <input class="form-check-input" type="radio" name="ordergift" id="ordergift2">
                                <label class="form-check-label" for="ordergift2">
                                    <img src="{{asset('public/frontend/images/tabby-logo.png')}}" alt="">
                                    <span>4 interest-free payments </span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-6">
                @include('web-views.partials._order-summary-step3')
            </div>
        </div>


    </div>
</div>





    <span id="route-action-checkout-function" data-route="checkout-payment"></span>
@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/payment.js') }}"></script>
@endpush
