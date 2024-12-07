<div class="col-md-3">
    <nav class="navbar sidenav navbar-expand-lg navbar-light">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item"><a class="nav-link {{Request::is('user-account*')?'cactive':''}}" href="{{route('user-account')}}">my profile</a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('user-password*')?'cactive':''}}" href="{{route('user-password')}}">Password</a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('account-oder*') || Request::is('account-order-details*') || Request::is('track-order*') ? 'cactive' :''}}" href="{{route('account-oder')}}">my orders</a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('account-address*')?'cactive':''}}" href="{{route('account-address')}}">address book</a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('payment-methods*')?'cactive':''}}" href="{{route('payment-methods')}}">payment methods</a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('wishlists*')?'cactive':''}}" href="{{route('wishlists')}}">wishlist</a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('loyalty*')?'cactive':''}}" href="{{route('loyalty')}}">joy&co loyalty</a></li>
                                <li class="nav-item"><a class="nav-link  {{Request::is('preferences*')?'cactive':''}}" href="{{route('preferences')}}">Preferences </a></li>
                                <li class="nav-item"><a class="nav-link {{Request::is('gift-cards*')?'cactive':''}}" href="{{route('gift-cards')}}">gift cards</a></li>
                            </ul>
    </nav>
    <div class="signout">
        <a href="{{route('customer.auth.logout')}}"><img src="{{asset('public/frontend/images/switch-icon.svg')}}" alt=""> sign out</a>
    </div>
</div>
