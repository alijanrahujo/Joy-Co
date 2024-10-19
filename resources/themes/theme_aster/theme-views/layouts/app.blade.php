<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/plugin.css')}}">
    <link rel="stylesheet" href="https://raw.githack.com/hsynlms/zeynepjs/master/dist/zeynep.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('public/frontend/css/main.css')}}">
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
                <div class="col-lg-6 col-md-4 text-center"><img src="{{asset('public/frontend/images/logo.svg')}}"></div> <!-- logo area -->
                <div class="col-lg-3 col-md-4 right-header">
                    <ul>
                        <li><a href="#" id="searchbar"><img src="{{asset('public/frontend/images/search-icon.svg')}}" /></a></li>
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/heart-icon.svg')}}" /><span
                                    class="countcart">2</span></a></li>
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/cart-icon.svg')}}" /><span
                                    class="countcart">2</span></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend/images/user-icon.svg')}}" /></a></li>
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
                                <div class="col-4">
                                    <ul>
                                        <li><a href="#">Candle Holders</a></li>
                                        <li><a href="#">Mirrors</a></li>
                                        <li><a href="#">tableware</a></li>
                                        <li><a href="#">decorative objects</a></li>
                                        <li><a href="#">Furniture</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul>
                                        <li><a href="#">Home accessories</a></li>
                                        <li><a href="#">Lighting</a></li>
                                        <li><a href="#">Vases</a></li>
                                        <li><a href="#">Scented Candles</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul>
                                        <li><a href="#">POUFS & STOOLS</a></li>
                                        <li><a href="#">DECORATIVE BOWLS</a></li>
                                        <li><a href="#">BATH ACCESSORIES</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item has-menu"><a class="nav-link" href="#">brands</a>
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
                                        <div class="col-4">
                                            <ul>
                                                <li><a href="#">BAOBAB COLLECTION</a></li>
                                                <li><a href="#">FORNASETTI</a></li>
                                                <li><a href="#">BACCARAT</a></li>
                                                <li><a href="#">ATELIER HOURIA TAZI</a></li>
                                                <li><a href="#">NASHI HOME</a></li>
                                                <li><a href="#">VOLUSPA</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <ul>
                                                <li><a href="#">RALPH LAUREN HOME</a></li>
                                                <li><a href="#">TALIANNA</a></li>
                                                <li><a href="#">VILLARI</a></li>
                                                <li><a href="#">LAETITIA ROUGET</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">gifts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">blogs</a></li>
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
                        <!-- <li><a href="#"><img src="{{asset('public/frontend/images/search-icon.svg')}}" /></a></li> -->
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/heart-icon.svg')}}" /> <span
                            class="countcart">2</span></a></li>
                        <li><a href="#" class="position-relative"><img src="{{asset('public/frontend/images/cart-icon.svg')}}" /><span
                            class="countcart">2</span></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend/images/user-icon.svg')}}" /></a></li>
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
                            <li><a href="#">Contact Us</a></li>
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

    <script src="{{asset('public/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script src="{{asset('public/frontend/js/plugin.js')}}"></script>
    <script src="https://raw.githack.com/hsynlms/zeynepjs/master/dist/zeynep.min.js"></script>
    <script src="{{asset('public/frontend/js/preloader.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

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
            $('.zeynep-closed').on('click', function () {
                zeynep.close()
            })

            // open zeynepjs side menu
            $('.toggleMenu').on('click', function () {
                zeynep.open()
            })

        })
    </script>

</body>

</html>
