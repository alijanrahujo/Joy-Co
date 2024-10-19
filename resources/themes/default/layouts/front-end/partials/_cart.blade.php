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
