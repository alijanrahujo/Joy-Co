@php
    use App\Utils\Helpers;
    use App\Utils\ProductManager;
    use Illuminate\Support\Str;
@endphp
@extends('layouts.front-end.app')
@section('title', $product['name'])
@push('css_or_js')
    @include(VIEW_FILE_NAMES['product_seo_meta_content_partials'], [
        'metaContentData' => $product?->seoInfo,
        'product' => $product,
    ])
    {{-- <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/product-details.css') }}"/> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> --}}
    {{-- <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'> --}}
@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a href="#">products</a> <span>|</span>
            <a>{{ $product->name }}</a>

        </div>
    </div>

    <div class="content pt-4 product-detail">
        <div class="container">
            <?php $guestCheckout = getWebConfig(name: 'guest_checkout'); ?>
            <div class="row">
                <div class="col-md-6 wow fadeIn" data-wow-delay=".2s">
                    @if ($product->images != null && json_decode($product->images) > 0)
                        @if (json_decode($product->colors) && count($product->color_images_full_url) > 0)
                            <div class="product-imageslide">
                                @foreach ($product->color_images_full_url as $key => $photo)
                                    <div class="{{ $key == 0 ? 'active' : '' }}"
                                        id="{{ $photo['color'] != null ? 'image' . $photo['color'] : 'image' . $key }}"><img
                                            src="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}"
                                            data-zoom="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}"
                                            alt="{{ translate('product') }}" class="img-fluid w-100" />
                                        <div class="cz-image-zoom-pane"></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="for-imageslide">
                                @foreach ($product->color_images_full_url as $key => $photo)
                                    <div><img src="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}" />
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="product-imageslide">
                                @foreach ($product->images_full_url as $key => $photo)
                                    <div class="{{ $key == 0 ? 'active' : '' }}" id="image{{ $key }}"><img
                                            src="{{ getStorageImages($photo, type: 'product') }}"
                                            data-zoom="{{ getStorageImages(path: $photo, type: 'product') }}"
                                            alt="{{ translate('product') }}" class="img-fluid w-100" />
                                        <div class="cz-image-zoom-pane"></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="for-imageslide">
                                @foreach ($product->images_full_url as $key => $photo)
                                    <div><img src="{{ getStorageImages($photo, type: 'product') }}" /></div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay=".2s">
                    <h2>{{ $product->name }}</h2>
                    <p class="pic-info">Baccarat - Limited Edition of 16 pieces</p>
                    <p class="code-info">Product code - 102SWG</p>
                    <div class="storename">
                        <span><img src="{{ asset('public/frontend/images/store-img-small.jpg') }}"></span> Earn 220 JOY&CO loyalty
                        points
                    </div>
                    <div class="d-flex flex-wrap align-items-center mb-2 pro">
                        <div class="star-rating me-2">
                            @for ($inc = 1; $inc <= 5; $inc++)
                                @if ($inc <= (int) $overallRating[0])
                                    <i class="tio-star text-warning"></i>
                                @elseif ($overallRating[0] != 0 && $inc <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                    <i class="tio-star-half text-warning"></i>
                                @else
                                    <i class="tio-star-outlined text-warning"></i>
                                @endif
                            @endfor
                        </div>
                        <span
                            class="d-inline-block  align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'ms-md-2 ms-sm-0' : 'me-md-2 me-sm-0' }} fs-14 text-muted">({{ $overallRating[0] }})</span>
                        <span
                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'me-1 ms-md-2 ms-1 pe-md-2 pe-sm-1 ps-md-2 ps-sm-1' : 'ms-1 me-md-2 me-1 ps-md-2 ps-sm-1 pe-md-2 pe-sm-1' }}"><span
                                class="web-text-primary">{{ $overallRating[1] }}</span> {{ translate('reviews') }}</span>
                        <span class="__inline-25"></span>
                        <span
                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'me-1 ms-md-2 ms-1 pe-md-2 pe-sm-1 ps-md-2 ps-sm-1' : 'ms-1 me-md-2 me-1 ps-md-2 ps-sm-1 pe-md-2 pe-sm-1' }}"><span
                                class="web-text-primary">{{ $countOrder }}</span> {{ translate('orders') }} </span>
                        <span class="__inline-25"> </span>
                        <span
                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'me-1 ms-md-2 ms-0 pe-md-2 pe-sm-1 ps-md-2 ps-sm-1' : 'ms-1 me-md-2 me-0 ps-md-2 ps-sm-1 pe-md-2 pe-sm-1' }} text-capitalize">
                            <span class="web-text-primary countWishlist-{{ $product->id }}"> {{ $countWishlist }}</span>
                            {{ translate('wish_listed') }} </span>

                    </div>
                    <div class="price">
                        {!! getPriceRangeWithDiscount(product: $product) !!}
                    </div>
                    <form id="add-to-cart-form" class="mb-2">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">

                        @if (count(json_decode($product->colors)) > 0)
                            <div class="color-varint">
                                {{ translate('color') }}
                                <ul class="list-inline">
                                    @foreach (json_decode($product->colors) as $key => $color)
                                        <li>
                                            <input type="radio"
                                                id="{{ str_replace(' ', '', $product->id . '-color-' . str_replace('#', '', $color)) }}"
                                                name="color" value="{{ $color }}"
                                                @if ($key == 0) checked @endif>
                                            <label
                                                for="{{ str_replace(' ', '', $product->id . '-color-' . str_replace('#', '', $color)) }}"
                                                data-toggle="tooltip" data-key="{{ str_replace('#', '', $color) }}"
                                                data-colorid="preview-box-{{ str_replace('#', '', $color) }}"
                                                data-title="{{ \App\Utils\get_color_name($color) }}"
                                                class="focus-preview-image-by-color shadow-border"><span class="red"
                                                    style="background-color: {{ $color }};"></span></label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="quantity-cart mb-25">
                            <div class="quantity-input">
                                <span class="input-group-btn">
                                    <div class="btn btn-number web-text-primary" data-type="minus" data-field="quantity"
                                        disabled="disabled">
                                        <i class="ti-minus"><img src="{{ asset('public/frontend/images/minus-input.svg') }}"></i>
                                    </div>
                                </span>
                                <input type="text" name="quantity"
                                    class="form-control input-number text-center cart-qty-field __inline-29 border-0 "
                                    placeholder="{{ translate('1') }}" value="{{ $product->minimum_order_qty ?? 1 }}"
                                    data-producttype="{{ $product->product_type }}"
                                    min="{{ $product->minimum_order_qty ?? 1 }}"
                                    max="{{ $product['product_type'] == 'physical' ? $product->current_stock : 100 }}">
                                <span class="input-group-btn">
                                    <div class="btn btn-number web-text-primary"
                                        data-producttype="{{ $product->product_type }}" data-type="plus"
                                        data-field="quantity">
                                        <i class="ti-plus"><img src="{{ asset('public/frontend/images/plus-input.svg') }}"></i>
                                    </div>
                                </span>
                                <input type="hidden" class="product-generated-variation-code" name="product_variation_code"
                                    data-product-id="{{ $product['id'] }}">
                                <input type="hidden" value="" class="in_cart_key form-control w-50" name="key">
                            </div>
                            <div class="cart-button">
                                <span
                                    data-auth-status="{{ $guestCheckout == 1 || Auth::guard('customer')->check() ? 'true' : 'false' }}"
                                    data-route="{{ route('shop-cart') }}"
                                    class="main-btn btn btn-secondary element-center btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} action-buy-now-this-product">
                                    <span class="string-limit">{{ translate('buy_now') }}</span>
                                </span>
                            </div>

                            <div class="cart-button">
                                <span
                                    class="main-btn btn btn--primary element-center btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} action-add-to-cart-form"
                                    type="button" data-update-text="{{ translate('update_cart') }}"
                                    data-add-text="{{ translate('add_to_cart') }}">
                                    <span class="string-limit">{{ translate('add_to_cart') }}</span>
                                </span>
                            </div>

                            <div class="like-button product-action-add-wishlist" data-product-id="{{ $product['id'] }}">
                                <span class="btn btn-link"> <img src="{{ asset('public/frontend/images/heart-icon.svg') }}" />
                                </span>
                            </div>
                        </div>
                        <div id="chosen_price_div">
                            <div class="d-none d-sm-flex justify-content-start align-items-center me-2">
                                <div class="product-description-label text-dark font-bold text-capitalize">
                                    <strong>{{ translate('total_price') }}</strong> :
                                </div>
                                &nbsp; <strong id="chosen_price" class="text-base"></strong>
                                <small class="ms-2 font-regular">
                                    (<small>{{ translate('tax') }} : </small>
                                    <small id="set-tax-amount"></small>)
                                </small>
                            </div>
                        </div>
                    </form>
                    <p>{!! $product->details !!}</p>
                </div>
            </div>

            <section class="discription-area pt-5 mt-5">
                <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="brand-tab" data-bs-toggle="tab" data-bs-target="#brand"
                            type="button" role="tab" aria-controls="brand" aria-selected="true">ABOUT THE
                            BRAND</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description"
                            type="button" role="tab" aria-controls="description"
                            aria-selected="false">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return"
                            type="button" role="tab" aria-controls="return" aria-selected="false">DELIVERY AND
                            RETURNS</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                        A pillar in our region’s homes - Tanagra establishes itself as the leading destination for luxury
                        lifestyle, art de vivre, decorative pieces and the ultimate gifting destination, as it celebrates
                        its 40th anniversary this 2021. Coveting some of the most exquisite luxury home brands, Tanagra is a
                        home for the finer things in life. Our brands come from all corners of the globe, where values are
                        shared.
                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                        {!! $product->details !!}
                    </div>
                    <div class="tab-pane fade" id="return" role="tabpanel" aria-labelledby="return-tab">
                        <h5>Delivery Information</h5>
                        <p>
                            We offer fast and reliable shipping to ensure you receive your items as quickly as possible. Our
                            delivery services cover both domestic and international destinations.
                        </p>
                        <ul>
                            <li><strong>Domestic Shipping:</strong> Orders within the country will typically be delivered
                                within 3-5 business days.</li>
                            <li><strong>International Shipping:</strong> For orders outside the country, delivery may take
                                7-14 business days, depending on your location.</li>
                        </ul>
                        <p><strong>Note:</strong> Shipping times may vary during peak periods or due to external factors
                            beyond our control (e.g., customs delays).</p>

                        <h5>Shipping Fees</h5>
                        <p>
                            Shipping fees are calculated based on the destination and the total weight of your order. Any
                            applicable shipping charges will be displayed at checkout before you finalize your purchase.
                        </p>

                        <h5>Returns Policy</h5>
                        <p>
                            We want you to be completely satisfied with your purchase. If for any reason you are not happy
                            with your order, you may return eligible items within 30 days of receipt for a refund or
                            exchange.
                        </p>
                        <ul>
                            <li><strong>Condition:</strong> Items must be returned in their original condition, with tags
                                attached and in their original packaging.</li>
                            <li><strong>Non-Returnable Items:</strong> Certain products (e.g., personalized items, sale
                                items) are non-returnable.</li>
                        </ul>
                        <p>
                            To initiate a return, please contact our customer service team at <a
                                href="mailto:support@example.com">support@example.com</a> with your order number and the
                            reason for the return.
                        </p>

                        <h5>Refunds</h5>
                        <p>
                            Once we receive and inspect your returned item, we will process your refund within 7-10 business
                            days. Refunds will be issued to the original payment method used at the time of purchase.
                            Shipping fees are non-refundable.
                        </p>

                        <h5>Exchanges</h5>
                        <p>
                            If you wish to exchange an item, please contact our customer service team. Exchanges are subject
                            to product availability. You will be responsible for any price differences and additional
                            shipping charges.
                        </p>

                        <h5>Contact Us</h5>
                        <p>
                            If you have any questions about our Delivery and Returns Policy, feel free to contact us at <a
                                href="tel:+123456789">+123456789</a> or via email at <a
                                href="mailto:support@example.com">support@example.com</a>.
                        </p>
                    </div>
                </div>
            </section>
            <!-- Upper area end -->
            <section>
                <div class="heading-area wow fadeInUp pb-5" data-wow-delay=".2s">
                    <div class="row align-self-center">
                        <div class="col-md-8">
                            <h1>You May Also Like</h1>
                        </div>
                    </div>
                </div>

                <div class="row product-list">
                    @foreach ($relatedProducts as $product)
                        <div class="col-6 col-md-3">
                            <div class="products wow fadeInUp" data-wow-delay=".2s">
                                <div class="proimg">
                                    <img src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}"
                                        class="img-fluid">
                                    {{-- <a href="javascript:" class="btn-shopnow btnproduct action-product-quick-view" data-product-id="{{ $product->id }}">shop now</a> --}}
                                    <a href="{{ route('product', $product->slug) }}" class="btn-shopnow btnproduct"
                                        data-product-id="{{ $product->id }}">shop now</a>
                                    @if ($product->discount > 0)
                                        <span class="dtags">
                                            @if ($product->discount_type == 'percent')
                                                {{ 'OFF' . ' ' . round($product->discount, $web_config['decimal_point_settings']) }}%
                                            @elseif($product->discount_type == 'flat')
                                                {{ 'OFF' . ' ' . Helpers::currency_converter($product->discount) }}
                                            @endif
                                        </span>
                                    @endif
                                </div>
                                <div class="pro-detail">
                                    <h6>{{ Str::limit($product->product_type, 25) }}</h6>
                                    <h4>{{ Str::limit($product->name, 25) }}</h4>
                                    <p class="price">{{ Helpers::currency_converter($product->unit_price) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/product-details.js') }}"></script>
    <script type="text/javascript" async="async"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
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
@endpush
