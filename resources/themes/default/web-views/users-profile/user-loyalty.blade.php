@extends('layouts.front-end.app')

@section('title', translate('my_loyalty_point'))

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>joy&co Loyalty</a>
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
                                <h5 class="mb-4 fw-bold text-uppercase">joy&co Loyalty ACCOUNT</h5>
                                <div class="col-12">
                                    <div class="actionss text-start">
                                        <span><a href="loyalty-myaccount.html" class="link-reset fw-semibold border-bottom">MY loyalty</a></span>
                                        <span class="ms-1 me-1 ms-md-3 me-md-3">|</span>
                                        <span><a href="{{route('about-loyalty')}}" class="link-reset">about loyalty account</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-0">
                                    <h6 class="mt-4 mb-4">Please login using your phone number !</h6>
                                    <div class="row">
                                        <div class="col-4">
                                            <select name="" id="" class="form-select">
                                                <option value="" class="muted">+971</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" placeholder="Phone Number*">
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckIndeterminate">
                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                    By creating an account, you agree to the Terms and Conditions and Privacy Policy of JOY&CO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                

                                <div class="col-12 text-start">
                                    <button type="button"
                                        class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">submit query</button>
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
