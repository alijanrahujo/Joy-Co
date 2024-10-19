@extends('layouts.front-end.app')

@section('title', translate('my_loyalty_point'))

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>Payment Methods</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                <div class="offcanvas-header">
                    <h2 id="offcanvasRightLabel" class="pb-5">joy&co Loyalty</h2>
                </div>
                <div class="row">

                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->
                    <div class="col-md-9">
                        <div class="panel-area">
                            <div class="row">
                                <h5 class="mb-4 fw-bold text-uppercase">Wallet Cards and accounts</h5>
                                <div class="col-12">
                                    <div class="actionss text-start">
                                        <span><a href="payment-myaccount.html"
                                                class="link-reset fw-semibold border-bottom">MY cards</a></span>
                                        <span class="ms-1 me-1 ms-md-3 me-md-3">|</span>
                                        <span><a href="{{route('new-payment-methods')}}" class="link-reset">Add a new
                                                payment method</a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="{{asset('public/frontend/images/debitcards.svg')}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-6 mycards-text">
                                            <h6 class="fw-semibold">Visa Card</h6>
                                            <p class="muted mb-0 mt-3">Alaxander<br>
                                                Debit card ending in •••• 1872</p>
                                                <div class="actions-pay mt-1">
                                                    <a href="#" class="link-reset me-5">Edit</a>
                                                    <a href="#" class="link-reset text-red">Remove</a>
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
    </div>

@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/user-loyalty.js') }}"></script>
@endpush
