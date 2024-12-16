@section('title', translate('sign_in'))

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Joy & Co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/frontend/css/plugin.css') }}">
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/frontend/css/zeynep.min.css') }}">

    <link rel='stylesheet' type='text/css' media='screen' href="{{ theme_asset(path: 'public/frontend/css/main.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body>

    <div class="login vh-100">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-4 d-none d-md-block login-bg h-100"></div>
                <div class="col-md-8 pe-7 ps-7 login-contain">
                    <div class="login-bar pb-4 pt-5"><a href="#" class="active">log in</a> | <a href="{{ route('customer.auth.sign-up') }}">Register Now</a></div>
                    <h1 class="pb-4">Hey, Welcome</h1>
                    <div class="regisbar">Still don’t have an account? <a href="{{ route('customer.auth.sign-up') }}">Register now</a></div>
                    <div class="login-form pt-3 pt-md-5 pb-5">

                        <form class="needs-validation mt-2" autocomplete="off" action="{{route('customer.auth.login')}}"
                        method="post" id="customer-login-form">
                            @csrf

                             <!-- Display errors -->
                            <div class="">
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email*" name="user_id" required>
                            </div>
                            <div class="form-group pass position-relative">
                                <input type="password" class="form-control" placeholder="Password*" name="password" id="passwords" required>
                                <button type="button" class="eye-icon-btn position-absolute" id="togglePassword"><img src="{{ theme_asset(path: 'public/frontend/images/eye-icon-closed.svg') }}" alt="" id="eyeIcon"></button>
                            </div>

                            <div class="row pt-5 pb-5 d-none d-md-flex">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            Keep log me in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('customer.auth.recover-password') }}">Forgot your password?</a>
                                </div>
                            </div>
                            <div class="form-group pt-4 pt-md-0">
                                <button type="submit" class="main-btnreverse w-100 text-center fw-bold">LOG In</button>
                            </div>
                            <div class="col-12 text-center d-block d-md-none">
                                <a href="forget-pass.html">Forgot your password?</a>
                            </div>
                            <div class="continu-line pt-3 pt-md-5"><span>Or Continue with</span></div>
                            <ul class="list-reset list-inline d-md-flex pt-5 justify-content-between">
                                <li><a href="#" class="btn-show"><img src="{{ theme_asset(path: 'public/frontend/images/google-icon.svg') }}" alt=""> Google</a></li>
                                <li><a href="#" class="btn-show"><img src="{{ theme_asset(path: 'public/frontend/images/mobile-message.svg') }}" alt=""> Sign in with OTP</a></li>
                                <li><a href="#" class="btn-show"><img src="{{ theme_asset(path: 'public/frontend/images/facebook.svg') }}" alt=""> Facebook</a></li>
                            </ul>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="{{ theme_asset(path: 'public/frontend/js/vendor/modernizr-3.5.0.min.js') }} "></script>
    <script src="{{ theme_asset(path: 'public/frontend/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script src="{{ theme_asset(path: 'public/frontend/js/plugin.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/frontend/js/vendor/zeynep.min.js') }}"></script>

    <script src="{{ theme_asset(path: 'public/frontend/js/preloader.js') }}"></script>
    <script src="{{ theme_asset(path: 'public/frontend/js/main.js') }}"></script>

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
        
        document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('passwords');
        const eyeIcon = document.getElementById('eyeIcon');
        const isPassword = passwordField.getAttribute('type') === 'password';

        const eyeClosed = "{!! theme_asset(path: 'public/frontend/images/eye-icon-closed.svg') !!}";
        const eyeOpen = "{!! theme_asset(path: 'public/frontend/images/eye-icon.svg') !!}";

        // Toggle input type and icon
        passwordField.setAttribute('type', isPassword ? 'text' : 'password');
        eyeIcon.src = isPassword ? decodeURIComponent(eyeOpen) : decodeURIComponent(eyeClosed);
    });

    </script>

</body>

</html>
