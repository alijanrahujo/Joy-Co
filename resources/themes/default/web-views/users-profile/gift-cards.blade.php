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
                    <h2 id="offcanvasRightLabel" class="pb-5">Gift Cards</h2>
                </div>
                <div class="row">
                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->
                    <div class="col-md-9">
                        <div class="panel-area">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <h2 class="mb-1 fw-bold text-uppercase">00.0 AED</h2>
                                    <p class="muted">Total balance from 0 Gift Cards</p>
                                </div>
                                <div class="col-6">
                                    <div class="actionss actions-b text-end">
                                        <span><a href="loyalty-myaccount.html" class="link-reset fw-semibold"
                                                data-bs-toggle="modal" data-bs-target="#addgifcards"><img
                                                    src="{{asset('public/frontend/images/add-gifticon.svg')}}" alt=""> ADD GIFT CARD</a></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-4">0 AED Spent</h6>
                                    <div class="progress" role="progressbar" aria-label="Success example"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                                        <div class="progress-bar bg-success" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <h6 class="mb-4">0 AED Received</h6>
                                    <div class="progress" role="progressbar" aria-label="Success example"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                                        <div class="progress-bar bg-success" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 p-4 justify-content-around month-calc">
                                <div class="col">
                                    <h6 class="fw-semibold active">1 Month</h6>
                                </div>
                                <div class="col">
                                    <h6 class="fw-semibold">3 Month</h6>
                                </div>
                                <div class="col">
                                    <h6 class="fw-semibold">6 Month</h6>
                                </div>
                                <div class="col">
                                    <h6 class="fw-semibold">12 Month</h6>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <p class="muted pt-4">You have no transactions in this period</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
