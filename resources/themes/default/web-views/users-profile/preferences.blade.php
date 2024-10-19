@extends('layouts.front-end.app')

@section('title', translate('my_Wishlists'))

@section('content')
   <div class="breadcrumbs">
        <div class="container">
            <a href="#">home</a> <span>|</span>
            <a>Preferences</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                <div class="offcanvas-header">
                    <h2 id="offcanvasRightLabel" class="pb-5">Preferences</h2>
                </div>
                <div class="row">
                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->
                    <div class="col-md-9">
                        <div class="row panel-area">
                            <h5>Subscribe to be the first with our new arrivals, exclusive collections, offers and more.
                            </h5>
                            <p class="muted mt-2 mb-5">Subscribe to Tanagra newsletters.</p>

                            <div class="col-md-2">
                                <div class="form-check form-group">
                                    <input class="form-check-input" type="radio" name="ordergift" id="ordergift1"
                                        checked>
                                    <label class="form-check-label" for="ordergift1">
                                        Email
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-group">
                                    <input class="form-check-input" type="radio" name="ordergift" id="ordergift2">
                                    <label class="form-check-label" for="ordergift2">
                                        Sms
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-group">
                                    <input class="form-check-input" type="radio" name="ordergift" id="ordergift2">
                                    <label class="form-check-label" for="ordergift2">
                                        Telephone
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-group">
                                    <input class="form-check-input" type="radio" name="ordergift" id="ordergift2">
                                    <label class="form-check-label" for="ordergift2">
                                        Whatsapp
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button"
                                    class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">Save</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
