@extends('layouts.front-end.app')

@section('title', translate('order_Complete'))

@section('content')
<div class="content pt-4 product-cart thanks">
    <div class="container">
        <div class="steps-count">
            <ul>
                <li class="">
                    <span class="steps-count1">1</span>
                    <span class="steps-label">Delivery</span>
                </li>
                <li class="">
                    <span class="steps-count1">2</span>
                    <span class="steps-label">Payment</span>
                </li>
                <li class="current">
                    <span class="steps-count1">3</span>
                    <span class="steps-label">THANK YOU</span>
                </li>
            </ul>
        </div>

        <div class="row pt-5">
            @if(auth('customer')->check() || session('guest_id'))
            <div class="col-12 text-center">

                <img src="{{asset('public/frontend/images/check-thank.svg')}}" alt="" width="134">

                <h1 class="mt-4">Thank you</h1>
                <p class="mt-3">
                    @if(isset($isNewCustomerInSession) && $isNewCustomerInSession)
                        {{ translate('Order_Placed_&_Account_Created_Successfully') }}!
                    @else
                        {{ translate('Order_Placed_Successfully') }}!
                    @endif
                </p>
                @if (isset($order_ids) && count($order_ids) > 0)
                <p class="mt-3">
                    {{ translate('your_payment_has_been_successfully_processed_and_your_order') }} -
                    <span class="fw-bold text-primary">
                        @foreach ($order_ids as $key => $order)
                            {{ $order }}
                        @endforeach
                    </span>
                    {{ translate('has_been_placed.') }}
                </p>
                @else
                <p class="mt-3">
                    {{ translate('your_order_is_being_processed_and_will_be_completed.') }}
                    {{ translate('You_will_receive_an_email_confirmation_when_your_order_is_placed.') }}
                </p>
                @endif
                <div> <a href="{{ route('track-order.index') }}" class="btn btn-link link-reset">take me to my profile</a> </div>
                <div> <a href="{{route('home')}}" class="btn btn-link link-reset">{{ translate('Continue_Shopping') }}</a> </div>

            </div>
            @endif
        </div>

    </div>
</div>
@endsection
