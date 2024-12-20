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
     <!--Start Preloader -->
     <div class="onloadpage" id="page_loader">
        <div class="pre-content">
            <div class="logo-pre"><img src="{{ theme_asset(path: 'public/frontend/images/logo.svg') }}" alt="Logo" class="img-fluid" /></div>
        </div>
    </div>
    <!--End Preloader -->

    <div class="login vh-100">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-4 d-none d-md-block login-bg h-100"
                    style="background-image: url({{ theme_asset(path: 'public/frontend/images/register_bg.jpg') }});"></div>
                <div class="col-md-8 pe-5 ps-5 overflow-auto h-100">
                    <div class="login-bar pb-4 pt-5"><a href="{{ route('customer.auth.login') }}">log in</a> | <a href="{{ route('customer.auth.sign-up') }}" class="active">Register
                            Now</a></div>
                    <h1 class="pb-4">Register Now and<br /> Start Rolling</h1>
                    <div class="regisbar">Already have an account? <a href="{{ route('customer.auth.login') }}">log in</a></div>
                    <div class="login-form pt-3 pt-md-5 pb-5">
                        <form class="register-form needs-validation_" id="customer-register-form" action="{{ route('customer.auth.sign-up')}}"
                        method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ old('f_name')}}" placeholder="first name*" name="f_name"
                                            required>
                                            @if ($errors->has('f_name'))
                                                <small class="text-danger">{{ $errors->first('f_name') }}</small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  value="{{old('l_name') }}" placeholder="LASt name" name="l_name">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="region" id="" class="form-select select-control">
                                            <option value="">SELECT REGION</option>
                                            <option value="Abu Dhabi">Abu Dhabi</option>
                                            <option value="Dubai">Dubai</option>
                                            <option value="Sharjah">Sharjah</option>
                                            <option value="Ajman">Ajman</option>
                                            <option value="Umm Al-Quwain">Umm Al-Quwain</option>
                                            <option value="Fujairah">Fujairah</option>
                                            <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select name="" id="" class="form-select select-control w-20">
                                                <option value="971*">+971</option>
                                                <option value="972*">+972</option>
                                                <option value="973*">+973</option>
                                                <option value="971*">+971</option>
                                            </select>
                                            <input type="text" class="form-control pt-0 w-60"
                                                aria-label="Text input with dropdown button" value="{{ old('phone') }}" name="phone">
                                                @if ($errors->has('phone'))
                                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                                @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" value="{{old('email') }}" placeholder="Email*" name="email"
                                            required>
                                            @if ($errors->has('email'))
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pass position-relative">
                                        <input type="password" class="form-control" placeholder="Password*" name="password"
                                            id="passwordField1" required>
                                            @if ($errors->has('password'))
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @endif
                                        <button type="button" class="togglePassword" data-target="passwordField1"><img src="{{ theme_asset(path: 'public/frontend/images/eye-icon-closed.svg') }}" alt="" id="eyeIcon1"></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pass position-relative">
                                        <input type="password" class="form-control" placeholder="re-enter password*" name="password_confirmation"
                                            id="passwordField2" required>
                                            @if ($errors->has('password_confirmation'))
                                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @endif
                                        <button type="button" class="togglePassword" data-target="passwordField2"><img src="{{ theme_asset(path: 'public/frontend/images/eye-icon-closed.svg') }}" alt="" id="eyeIcon2"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-5 pb-5 d-none d-md-flex">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            may keep me informed with personalized emails about products and services. See our <a href="#">Privacy Policy</a> for more details.
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group pt-4 pt-md-0">
                                <button type="submit" class="main-btnreverse w-100 text-center fw-bold">Register Now</button>
                            </div>

                            <div class="continu-line pt-3 pt-md-5"><span>Or Continue with</span></div>
                            <ul class="list-reset list-inline d-md-flex pt-5 justify-content-between">
                                <li><a href="#" class="btn-show"><img src="{{ theme_asset(path: 'public/frontend/images/google-icon.svg') }}" alt=""> Google</a>
                                </li>
                                <li><a href="#" class="btn-show"><img src="{{ theme_asset(path: 'public/frontend/images/mobile-message.svg') }}" alt=""> Sign in
                                        with OTP</a></li>
                                <li><a href="#" class="btn-show"><img src="{{ theme_asset(path: 'public/frontend/images/facebook.svg') }}" alt=""> Facebook</a>
                                </li>
                            </ul>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ theme_asset(path: 'public/frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
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

         document.querySelectorAll('.togglePassword').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target'); // Get the target input field ID
                const passwordField = document.getElementById(targetId); // Get the password input field
                const eyeIcon = this.querySelector('img'); // Get the image element inside the button

                // Paths for icons (use unescaped Blade output)
                const openEyeIcon = "{!! theme_asset(path: 'public/frontend/images/eye-icon.svg') !!}";
                const closedEyeIcon = "{!! theme_asset(path: 'public/frontend/images/eye-icon-closed.svg') !!}";

                // Toggle password visibility and icon
                if (passwordField.type === 'password') {
                    passwordField.type = 'text'; // Show password
                    eyeIcon.src = openEyeIcon; // Open eye icon
                } else {
                    passwordField.type = 'password'; // Hide password
                    eyeIcon.src = closedEyeIcon; // Closed eye icon
                }
            });
        });

    </script>

</body>

</html>
