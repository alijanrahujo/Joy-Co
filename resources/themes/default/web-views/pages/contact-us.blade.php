@extends('layouts.front-end.app')

@section('title',translate('contact_us'))

@push('css_or_js')
    <meta property="og:image" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <meta property="twitter:card" content="{{$web_config['web_logo']['path']}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <link rel="stylesheet" href="{{theme_asset(path: 'public/assets/front-end/css/home.css')}}"/>
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/owl.theme.default.min.css') }}">
@endpush


@section('content')
<div class="breadcrumbs">
        <div class="container">
            <a href="#">home</a> <span>|</span>
            <a>contact us</a>
        </div>
    </div>
    <div class="content pt-4 contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="sec-headinin mb-5 mt-5 text-center">
                        <h3>Get In Touch</h3>
                        <p class="mt-3 mt-md-5">If you have any questions, or suggestions, please get in touch using the form. We’ll do our
                            best to get back to you asap. You can also post something to our address.</p>
                    </div>
                    <div class="row pt-2 pt-md-5">
                        <div class="col-md-6 text-center">
                            <img src="{{asset('public/frontend/images/address-icon.svg')}}" alt="">
                            <h6>Our Address</h6>
                            <p>Building 123, Sheikh Zayed Road<br>Dubai Internet City. Dubai</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{asset('public/frontend/images/contactinfo-icon.svg')}}" alt="">
                            <h6>Contact Info</h6>
                            <p>Open a chat or give us call at<br>
                                +900 333 2211</p>
                        </div>
                    </div>
                    <div class="row pt-2 pt-md-5">
                        
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="NAME*">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email*">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <textarea class="form-control" name="" id="" cols="30" rows="4"
                                    placeholder="MESSAGE"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="button"
                            class="main-btnreverse w-100 text-center">send</button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection


@push('script')

@if(isset($recaptcha) && $recaptcha['status'] == 1)
    <script type="text/javascript">
        "use strict";
        var onloadCallback = function () {
            grecaptcha.render('recaptcha_element', {
                'sitekey': '{{ getWebConfig(name: 'recaptcha')['site_key'] }}'
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
            defer></script>
    <script>
        "use strict";
        $("#getResponse").on('submit', function (e) {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                e.preventDefault();
                toastr.error($('#message-please-check-recaptcha').data('text'));
            }
        });
    </script>
@endif

<script src="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/js/intlTelInput.js') }}"></script>
<script src="{{ theme_asset(path: 'public/assets/front-end/js/country-picker-init.js') }}"></script>
@endpush

