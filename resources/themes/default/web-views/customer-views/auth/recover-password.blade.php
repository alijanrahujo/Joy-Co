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
                <div class="col-md-8 pe-5 ps-5">
                    <div class="login-bar pb-4"><a href="{{ route('customer.auth.login') }}" class="active">back</a></div>
                    <h1 class="pb-4">forgot your<br/> password?</h1>
                    <div class="regisbar">Enter your email address and we'll send you a link to reset your password.</div>
                    <div class="login-form pt-3 pt-md-5">
                        <form class="margin" action="{{route('customer.auth.forgot-password')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email*" name="identity" required>
                            </div>

                            <div class="form-group pt-4 pt-md-5 mt-md-4">
                                <button type="submit" class="main-btnreverse w-100 text-center fw-bold">Submit Email</button>
                            </div>

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
    </script>

</body>

</html>
