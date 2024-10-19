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
                                        <span><a href="{{route('loyalty')}}" class="link-reset">MY loyalty</a></span>
                                        <span class="ms-1 me-1 ms-md-3 me-md-3">|</span>
                                        <span><a href="about-loyalty-myaccount.html" class="link-reset fw-semibold border-bottom">about loyalty
                                                account</a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-5">
                                    <img src="{{asset('public/frontend/images/loyality-about.jpg')}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-7">
                                    <h5 class="mb-4 fw-bold text-uppercase">how to join
                                        our loyalty account ?</h5>
                                    <p>At JOY&CO, we believe in rewarding loyalty, and the best way to do that is by
                                        giving our customers a path to exclusive privileges.</p>
                                    <p>Join the JOY&CO Loyalty Card Program today and enjoy the treatment that comes
                                        with being one of our most valued customers.</p>
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
