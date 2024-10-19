@extends('layouts.front-end.app')

@section('title', translate('my_loyalty_point'))

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>Paymetn Methods</a>
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
                                <div class="col-12 mt-2">
                                    <div class="actionss text-start">
                                        <span><a href="{{route('payment-methods')}}" class="link-reset">MY cards</a></span>
                                        <span class="ms-1 me-1 ms-md-3 me-md-3">|</span>
                                        <span><a href="#"
                                                class="link-reset fw-semibold border-bottom">Add a new
                                                payment method</a></span>
                                    </div>
                                </div>
                            </div>

                            <h6 class="sec-head mt-5 fw-semibold">Add a new payment method</h6>
                            <div class="col-12">
                                <hr class="mb-4 pb-2">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="inside-heading">Credit or debit cards</p>
                                    <p class="muted mb-4 pb-2">Joy & Co accepts major credit and debit cards.</p>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4 pb-2">
                                        <input type="text" class="form-control" placeholder="Card number*">
                                    </div>
                                    <div class="form-group mb-4 pb-2">
                                        <input type="text" class="form-control" placeholder="Name on card*">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 muted form-label pt-2">Expiration date</div>
                                        <div class="col-md-4">
                                            <select name="" id="" class="form-select mb-3 mb-md-0">
                                                <option value="" class="muted">01</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <select name="" id="" class="form-select">
                                                <option value="" class="muted">2023</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <button type="button"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">add your card</button>
                                    </div>
                                </div>
                                <div class="col-md-5 text-md-end">
                                    <img src="{{asset('public/frontend/images/payment-showing.png')}}" alt="">
                                </div>
                            </div>

                            <h6 class="sec-head mt-5 fw-semibold">Create new bank details</h6>
                            <div class="col-12">
                                <hr class="mb-4 pb-2">
                            </div>
                            <div class="row">
                                
                                <div class="col-12">
                                    <p class="inside-heading">Add a personal checking account</p>
                                    <p class="muted mb-4 pb-2">Use your bank account</p>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-4 pb-2">
                                        <input type="text" class="form-control" placeholder="Bank Identification Code/Swift">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4 pb-2">
                                        <input type="text" class="form-control" placeholder="IBAN">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4 pb-2">
                                        <input type="text" class="form-control" placeholder="Name on Account">
                                    </div>
                                </div>

                                <div class="col-12 text-start">
                                    <button type="button"
                                        class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-3">add bank account</button>
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
