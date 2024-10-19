<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/plugin.css')}}">
    <link rel="stylesheet" href="https://raw.githack.com/hsynlms/zeynepjs/master/dist/zeynep.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset('public/frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/joyco.css') }}">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/back-end/css/toastr.css') }}"/>

    @stack('css_or_js')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body>
    <!--Start Preloader -->
    <div class="onloadpage" id="page_loader">
        <div class="pre-content">
            <div class="logo-pre"><img src="{{asset('public/frontend/images/logo.svg')}}" alt="Logo" class="img-fluid" /></div>
        </div>
    </div>
    <!--End Preloader -->

    <!-- Desktop header -->
    <header class="d-none d-md-block">
        <div class="container">
            <div class="row pt-40 align-self-center">
                <div class="col-lg-3 col-md-4">
                    <div class="dropdown country-drop">
                        <button class="btn btn-link pt-0 p-0 langclubs" type="button">
                            <img src="{{asset('public/frontend/images/earth-icon.svg')}}" > UAE . en
                        </button>
                    </div>
                </div> <!-- language area -->
                <div class="col-lg-6 col-md-4 text-center"><a href="/"><img src="{{asset('public/frontend/images/logo.svg')}}"></a></div> <!-- logo area -->

                <div class="col-lg-3 col-md-4 right-header" id="cart_items">
                    <ul>
                        <li><a href="#" id="searchbar"><img src="{{asset('public/frontend/images/search-icon.svg')}}" /></a></li>
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/heart-icon.svg')}}" />
                            <span class="countWishlist countcart">
                                {{session()->has('wish_list')?count(session('wish_list')):0}}
                            </span></a></li>
                        <li><a href="{{route('shop-cart')}}" class="position-relative"><img src="{{asset('public/frontend/images/cart-icon.svg')}}" /><span
                                    class="countcart cart-total-price">
                                    @php($cart=\App\Utils\CartManager::get_cart())
                                    {{$cart->count()}}
                                </span></a></li>
                        <li>
                            @if (auth('customer')->user())
                                <a href="{{Route('user-account')}}" class="text-decoration-none text-black">
                                    <span class="px-2">{{auth('customer')->user()->f_name}}</span>
                                    <img src="{{asset('public/frontend/images/user-icon.svg')}}" />
                                </a></li>
                            @else
                                <a href="{{Route('customer.auth.login')}}"><img src="{{asset('public/frontend/images/user-icon.svg')}}" /></a></li>
                            @endif
                    </ul>
                </div> <!-- cart area -->
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active"><a class="nav-link" href="#">ramadan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">new arrivals</a></li>
                    <li class="nav-item has-menu"><a class="nav-link" href="#">products</a>
                        <div class="submenu">
                            <h4>our products</h4>
                            <div class="row">
                                @php($count = 0)
                                @foreach(\App\Utils\CategoryManager::getCategoriesWithCountingAndPriorityWiseSorting() as $category)
                                    @if($count % 4 == 0)
                                        <div class="col-4">
                                            <ul>
                                    @endif
                                                <li><a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{$category['name']}}</a></li>
                                    @php($count++)
                                    @if($count % 4 == 0 || $loop->last)
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li class="nav-item has-menu"><a class="nav-link {{Request::is('products')?'cactive':''}}" href="#">brands</a>
                        <div class="submenu">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">artist</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">brands</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">joy and collections</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">...</div>
                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <div class="col-4">
                                            <ul>
                                                <li><a href="#">FEATURED BRANDS</a></li>
                                                <li><a href="#" class="btn btn-main">A-Z all Brands</a></li>
                                            </ul>
                                        </div>
                                        @php($count = 0)
                                        @foreach(\App\Utils\BrandManager::getActiveBrandWithCountingAndPriorityWiseSorting() as $brand)
                                        @if($count % 4 == 0)
                                        <div class="col-4">
                                            <ul>
                                    @endif
                                                    <li><a href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}"> {{$brand['name']}}</a></li>
                                                    @php($count++)
                                                    @if($count % 4 == 0 || $loop->last)
                                                            </ul>
                                                        </div>
                                                    @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link {{Request::is('gifts*')?'cactive':''}}" href="{{route('gifts')}}">gifts</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::is('blogs*')?'cactive':''}}" href="{{route('blogs')}}">blogs</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Desktop header end -->

    <!-- Mobile header -->
    <header class="d-block d-md-none d-lg-none">
        <div class="container">
            <div class="row pt-4 align-self-center">
                <div class="col-6 text-left pb-4"><img src="{{asset('public/frontend/images/logo.svg')}}" width="116"></div> <!-- logo area -->
                <div class="col-6 text-end pb-4"><a href="#" class="toggleMenu">
                        <img src="{{asset('public/frontend/images/hamburger-menu.svg')}}" /> </a>
                </div> <!-- logo area -->
                <div class="col-5 col-md-3">
                    <div class="dropdown country-drop">
                        <button class="btn btn-link pt-0 p-0 langclubs" type="button">
                            <img src="{{asset('public/frontend/images/earth-icon.svg')}}" > UAE . en
                        </button>
                    </div>
                </div> <!-- language area -->

                <div class="col-7 col-md-3 right-header">
                    <ul>
                        <li><a href="#"><img src="{{asset('public/frontend/images/search-icon.svg')}}" /></a></li>
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/heart-icon.svg')}}" /> <span
                            class="countcart">3</span></a></li>
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/cart-icon.svg')}}" /><span
                            class="countcart">2</span></a></li>
                        <li><a href="{{Route('login')}}"><img src="{{asset('public/frontend/images/user-icon.svg')}}" /></a></li>
                    </ul>
                </div> <!-- cart area -->
            </div>

            <div class="nav-mobile zeynep p-3 bg-light" id="navmobile">

                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#" data-submenu="stores">Stores</a>

                        <div id="stores" class="submenu">
                            <div class="submenu-header">
                                <a href="#" data-submenu-close="stores">Main Menu</a>
                            </div>

                            <label>Stores</label>

                            <ul>
                                <li>
                                    <a href="#">Istanbul</a>
                                </li>

                                <li>
                                    <a href="#">Mardin</a>
                                </li>

                                <li>
                                    <a href="#">Amed</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="has-submenu">
                        <a href="#" data-submenu="categories">Categories</a>

                        <div id="categories" class="submenu">
                            <div class="submenu-header">
                                <a href="#" data-submenu-close="categories">Main Menu</a>
                            </div>

                            <label>Categories</label>

                            <ul>
                                <li class="has-submenu">
                                    <a href="#" data-submenu="electronics">Electronics</a>

                                    <div id="electronics" class="submenu">
                                        <div class="submenu-header">
                                            <a href="#" data-submenu-close="electronics">Categories</a>
                                        </div>

                                        <label>Electronics</label>

                                        <ul>
                                            <li>
                                                <a href="#">Camera & Photo</a>
                                            </li>

                                            <li>
                                                <a href="#">Home Audio</a>
                                            </li>

                                            <li>
                                                <a href="#">Tv & Video</a>
                                            </li>

                                            <li>
                                                <a href="#">Computers & Accessories</a>
                                            </li>

                                            <li>
                                                <a href="#">Car & Vehicle Electronics</a>
                                            </li>

                                            <li>
                                                <a href="#">Portable Audio & Video</a>
                                            </li>

                                            <li>
                                                <a href="#">Headphones</a>
                                            </li>

                                            <li>
                                                <a href="#">Accessories & Supplies</a>
                                            </li>

                                            <li>
                                                <a href="#">Video Projectors</a>
                                            </li>

                                            <li>
                                                <a href="#">Office Electronics</a>
                                            </li>

                                            <li>
                                                <a href="#">Wearable Technology</a>
                                            </li>

                                            <li>
                                                <a href="#">Service Plans</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a href="#">Books</a>
                                </li>

                                <li>
                                    <a href="#">Video Games</a>
                                </li>

                                <li>
                                    <a href="#">Computers</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>

                    <li>
                        <a href="#">About</a>
                    </li>
                </ul>

                <div class="nav-foot">
                    <ul class="list-reset list-inline social mt-4 pt-2">
                        <li><a href="#"><img src="{{asset('public/frontend/images/insta-icon.svg')}}"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend/images/pinterest-icon.svg')}}"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend/images/facebook-icon.svg')}}"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend/images/linkedin-icon.svg')}}"></a></li>
                    </ul>
                    <p class="mb-md-0">© 2023 Joyandco All Rights Reserved.</p>
                </div>
                <button class="zeynep-closed"><img src="{{asset('public/frontend/images/white-close.svg')}}" alt=""></button>

            </div>

        </div>
        <div class="container-fluid search-mobile">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><img src="{{asset('public/frontend/images/search-icon.svg')}}" alt=""> </span>
                <input type="text" class="form-control" placeholder="Search products and brands I" aria-label="Username"
                    aria-describedby="addon-wrapping">
            </div>
        </div>
    </header>
    <!-- mobile header end -->
    @yield('content')

    <div class="search-bar">
        <div class="container">
            <div class="subscribe">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        placeholder="START TYPING WHAT YOUR LOOKING">
                                    <button class="btn btn-outline-secondary" type="submit">search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="language-bar">
        <div class="container">
            <div class="subscribe">
                <div class="container">
                    <div class="heading-area pt-5 pb-5">
                        <div class="row align-self-center">
                            <div class="col-md-12 text-start">
                                <h1>COUNTRY & LANGUAGE</h1>
                                <p>Be advised that changing your location while shopping will remove all the contents from your shopping bag
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center login-form">
                        <div class="col-md-6">
                            <select name="" id="" class="form-select select-control">
                                <option value="">United Arab Emirates / dirham</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="" id="" class="form-select select-control">
                                <option value="">english</option>
                            </select>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button"
                                        class="main-btnreverse text-center pt-1 pb-1 mt-5">confirm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer>
        <div class="tracking-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('public/frontend/images/return-icon.svg')}}">
                        <span>return & exchanges</span>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('public/frontend/images/trackorder.svg')}}">
                        <span>track your order</span>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('public/frontend/images/customer-care.svg')}}">
                        <span>customer care</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="subscribe">
            <div class="container">
                <div class="heading-area pb-5">
                    <div class="row align-self-center">
                        <div class="col-md-12 text-center">
                            <h1>SUBSCRIBE TO OUR NEWSLETTER</h1>
                            <p>Join the club for exclusive offers</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Input your email address in here">
                                <button class="btn btn-outline-secondary" type="submit">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <img src="{{asset('public/frontend/images/logo.svg')}}" width="104">
                        <p class="mt-4 pt-1">We attract designers who esteem a<br> minimalistic approach that explores
                            warmer</p>

                        <ul class="list-reset list-inline social mt-4 pt-2">
                            <li><a href="#"><img src="{{asset('public/frontend/images/insta-icon.svg')}}"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/pinterest-icon.svg')}}"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/facebook-icon.svg')}}"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/linkedin-icon.svg')}}"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>ABOUT US</h3>
                        <ul class="list-reset footer-menu mt-4">
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>LINKS</h3>
                        <ul class="list-reset footer-menu mt-4">
                            <li><a href="{{route('contacts')}}">Contact Us</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-strip">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-md-0">© 2023 Joyandco All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <img src="{{asset('public/frontend/images/payment-cards.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="zeynep-overlay"></div>

    <span id="message-otp-sent-again" data-text="{{ translate('OTP_has_been_sent_again.') }}"></span>
<span id="message-wait-for-new-code" data-text="{{ translate('please_wait_for_new_code.') }}"></span>
<span id="message-please-check-recaptcha" data-text="{{ translate('please_check_the_recaptcha.') }}"></span>
<span id="message-please-retype-password" data-text="{{ translate('please_ReType_Password') }}"></span>
<span id="message-password-not-match" data-text="{{ translate('password_do_not_match') }}"></span>
<span id="message-password-match" data-text="{{ translate('password_match') }}"></span>
<span id="message-password-need-longest" data-text="{{ translate('password_Must_Be_6_Character') }}"></span>
<span id="message-send-successfully" data-text="{{ translate('send_successfully') }}"></span>
<span id="message-update-successfully" data-text="{{ translate('update_successfully') }}"></span>
<span id="message-successfully-copied" data-text="{{ translate('successfully_copied') }}"></span>
<span id="message-copied-failed" data-text="{{ translate('copied_failed') }}"></span>
<span id="message-select-payment-method" data-text="{{ translate('please_select_a_payment_Methods') }}"></span>
<span id="message-please-choose-all-options" data-text="{{ translate('please_choose_all_the_options') }}"></span>
<span id="message-cannot-input-minus-value" data-text="{{ translate('cannot_input_minus_value') }}"></span>
<span id="message-all-input-field-required" data-text="{{ translate('all_input_field_required') }}"></span>
<span id="message-no-data-found" data-text="{{ translate('no_data_found') }}"></span>
<span id="message-minimum-order-quantity-cannot-less-than" data-text="{{ translate('minimum_order_quantity_cannot_be_less_than_') }}"></span>
<span id="message-item-has-been-removed-from-cart" data-text="{{ translate('item_has_been_removed_from_cart') }}"></span>
<span id="message-sorry-stock-limit-exceeded" data-text="{{ translate('sorry_stock_limit_exceeded') }}"></span>
<span id="message-sorry-the-minimum-order-quantity-not-match" data-text="{{ translate('sorry_the_minimum_order_quantity_does_not_match') }}"></span>
<span id="message-cart" data-text="{{ translate('cart') }}"></span>

<span id="route-messages-store" data-url="{{ route('messages') }}"></span>
<span id="route-address-update" data-url="{{ route('address-update') }}"></span>
<span id="route-coupon-apply" data-url="{{ route('coupon.apply') }}"></span>
<span id="route-cart-add" data-url="{{ route('cart.add') }}"></span>
<span id="route-cart-remove" data-url="{{ route('cart.remove') }}"></span>
<span id="route-cart-variant-price" data-url="{{ route('cart.variant_price') }}"></span>
<span id="route-cart-nav-cart" data-url="{{ route('cart.nav-cart') }}"></span>
<span id="route-cart-order-again" data-url="{{ route('cart.order-again') }}"></span>
<span id="route-cart-updateQuantity" data-url="{{route('cart.updateQuantity')}}"></span>
<span id="route-cart-updateQuantity-guest" data-url="{{route('cart.updateQuantity.guest')}}"></span>
<span id="route-pay-offline-method-list" data-url="{{ route('pay-offline-method-list') }}"></span>
<span id="route-customer-auth-sign-up" data-url="{{ route('customer.auth.sign-up') }}"></span>
<span id="route-searched-products" data-url="{{ url('/searched-products') }}"></span>
<span id="route-currency-change" data-url="{{ route('currency.change') }}"></span>
<span id="route-store-wishlist" data-url="{{ route('store-wishlist') }}"></span>
<span id="route-delete-wishlist" data-url="{{ route('delete-wishlist') }}"></span>
<span id="route-wishlists" data-url="{{ route('wishlists') }}"></span>
<span id="route-quick-view" data-url="{{ route('quick-view') }}"></span>
<span id="route-checkout-details" data-url="{{ route('checkout-details') }}"></span>
<span id="route-checkout-payment" data-url="{{ route('checkout-payment') }}"></span>
<span id="route-set-shipping-id" data-url="{{ route('customer.set-shipping-method') }}"></span>
<span id="route-order-note" data-url="{{ route('order_note') }}"></span>
<span id="password-error-message" data-max-character="{{translate('at_least_8_characters').'.'}}" data-uppercase-character="{{translate('at_least_one_uppercase_letter_').'(A...Z)'.'.'}}" data-lowercase-character="{{translate('at_least_one_uppercase_letter_').'(a...z)'.'.'}}"
      data-number="{{translate('at_least_one_number').'(0...9)'.'.'}}" data-symbol="{{translate('at_least_one_symbol').'(!...%)'.'.'}}"></span>
<span class="system-default-country-code" data-value="{{ getWebConfig(name: 'country_code') ?? 'us' }}"></span>
<span id="system-session-direction" data-value="{{ session()->get('direction') ?? 'ltr' }}"></span>

<span id="is-request-customer-auth-sign-up" data-value="{{ Request::is('customer/auth/sign-up*') ? 1:0 }}"></span>
<span id="is-customer-auth-active" data-value="{{ auth('customer')->check() ? 1:0 }}"></span>

<span id="storage-flash-deals" data-value="{{ $web_config['flash_deals']['start_date'] ?? '' }}"></span>


<div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="quick-view-modal">

        </div>
    </div>
</div>
    <script src="{{asset('public/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script src="{{asset('public/frontend/js/plugin.js')}}"></script>
    <script src="https://raw.githack.com/hsynlms/zeynepjs/master/dist/zeynep.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="{{asset('public/frontend/js/preloader.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/sweet_alert.js') }}"></script>
    <script src="{{ theme_asset(path: "public/assets/back-end/js/toastr.js") }}"></script>
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/custom.js') }}"></script>


    <script>
        $(function () {
            var zeynep = $('.zeynep').zeynep({
                opened: function () {
                    console.log('the side menu is opened')
                }
            })

            // dynamically bind 'closing' event
            zeynep.on('closing', function () {
                console.log('this event is dynamically binded')
            })

            // handle zeynepjs overlay click
            $('.zeynep-overlay').on('click', function () {
                zeynep.close()
            })

            // open zeynepjs side menu
            $('.toggleMenu').on('click', function () {
                zeynep.open()
            })

        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.product-imageslide').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                dots: true,
                asNavFor: '.for-imageslide'
            });
            $('.for-imageslide').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.product-imageslide',
                dots: false,
                centerMode: true,
                focusOnSelect: true
            });
        });
    </script>

    @stack('script')
</body>

</html>
