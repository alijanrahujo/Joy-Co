<div class="col-md-6 summary">

    @php($shippingMethod=getWebConfig(name: 'shipping_method'))
    @php($subTotal=0)
    @php($totalTax=0)
    @php($totalShippingCost=0)
    @php($orderWiseShippingDiscount=\App\Utils\CartManager::order_wise_shipping_discount())
    @php($totalDiscountOnProduct=0)
    @php($coupon_dis=0)
    @php($cart=\App\Utils\CartManager::get_cart(type: 'checked'))
    @php($cartGroupIds=\App\Utils\CartManager::get_cart_group_ids())
    @php($getShippingCost=\App\Utils\CartManager::get_shipping_cost(type: 'checked'))
    @php($getShippingCostSavedForFreeDelivery=\App\Utils\CartManager::get_shipping_cost_saved_for_free_delivery(type: 'checked'))
    @if($cart->count() > 0)
        @foreach($cart as $key => $cartItem)
            @php($subTotal+=$cartItem['price']*$cartItem['quantity'])
            @php($totalTax+=$cartItem['tax_model']=='exclude' ? ($cartItem['tax']*$cartItem['quantity']):0)
            @php($totalDiscountOnProduct+=$cartItem['discount']*$cartItem['quantity'])
        @endforeach

        @if(session()->missing('coupon_type') || session('coupon_type') !='free_delivery')
            @php($totalShippingCost=$getShippingCost - $getShippingCostSavedForFreeDelivery)
        @else
            @php($totalShippingCost=$getShippingCost)
        @endif
    @endif

    @php($totalSavedAmount = $totalDiscountOnProduct)

    @if(session()->has('coupon_discount') && session('coupon_discount') > 0 && session('coupon_type') !='free_delivery')
        @php($totalSavedAmount += session('coupon_discount'))
    @endif

    @if($getShippingCostSavedForFreeDelivery > 0)
        @php($totalSavedAmount += $getShippingCostSavedForFreeDelivery)
    @endif

    <div class="heading-area pt-5 mt-5 pb-4">
                <h1>Order Summary</h1>
    </div>
    <div class="summary-body row">
        <div class="col-6 mb-4">Subtotal</div>
        <div class="col-6 mb-4">{{ webCurrencyConverter(amount: $subTotal) }}</div>
        <div class="col-6 mb-4 muted">Discount of product</div>
        <div class="col-6 mb-4 muted"> - {{ webCurrencyConverter(amount: $totalDiscountOnProduct) }}</div>
        <div class="col-6 mb-4">Shipping</div>
        <div class="col-6 mb-4">{{ webCurrencyConverter(amount: $totalShippingCost) }}</div>
        <div class="col-6 mb-4">VAT</div>
        <div class="col-6 mb-4">{{ webCurrencyConverter(amount: $totalTax) }}</div>
        <div class="col-6 mb-4">Grand Total
            <p>(Vat inclusive)</p></div>
        <div class="col-6 mb-4">{{ webCurrencyConverter(amount: $subTotal+$totalTax+$totalShippingCost-$coupon_dis-$totalDiscountOnProduct-$orderWiseShippingDiscount) }}</div>
        <div class="col-12 mb-4"><img src="{{asset('public/frontend/images/gift-card.png')}}" alt="" class="me-2"> Earn 1296  JOY&CO loyalty points</div>
    </div>
    <hr>

    <div class="payment-indo p-5">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('public/frontend/images/tamara-logo.png')}}" alt="">
            </div>
            <div class="col-9">
                <h4>Split into 3 payments</h4>
                <p>1/3 today, and the rest within 2 months without fees</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 text-center">
                <img src="{{asset('public/frontend/images/tabby-logo.png')}}" alt="">
            </div>
            <div class="col-9">
                <h4>Split into 4 payments</h4>
                <p>1/4 today, and the rest within 3 months without fees</p>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div><a href="{{route('home')}}" class="btn-show d-block text-center">Continue shopping</a></div>
        </div>
        <div class="col-md-6">
            <button type="button" class="main-btnreverse w-100 text-center proceed_to_next_button {{$cart->count() <= 0 ? 'disabled' : ''}} action-checkout-function">Checkout</button>
        </div>
    </div>

</div>
@push('script')
    <script>
        "use strict";
        $(document).ready(function () {
            orderSummaryStickyFunction()
        });
    </script>
@endpush
