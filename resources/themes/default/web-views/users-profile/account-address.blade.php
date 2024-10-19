@extends('layouts.front-end.app')

@section('title', translate('my_Address'))



@section('content')
   <div class="breadcrumbs">
        <div class="container">
            <a href="/">home</a> <span>|</span>
            <a>Address Book</a>
        </div>
    </div>
    <div class="content pt-4 product-cart">
        <div class="container">

            <div class="items-area">
                <div class="offcanvas-header">
                    <h2 id="offcanvasRightLabel" class="pb-5">Address Book</h2>
                </div>
                <div class="row">
                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->
                    <div class="col-md-9">
                        <div class="row panel-area">

                            @foreach($shippingAddresses as $shippingAddress)
                            <div class="col-md-8">
                                <p class="muted mb-2">First Name : {{$shippingAddress['contact_person_name']}}</p>
                                <p class="muted mb-2">Last Name : {{$shippingAddress['last_name']}}</p>
                                <p class="muted mb-2">Mobile Phone : +971 {{$shippingAddress['phone']}}</p>
                                <p class="muted mb-2">Email : {{$customer_detail['email']}}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="actionss">
                                    <span><a href="#" class="link-reset"><img src="images/delete-icon.svg" alt=""> delete</a></span>
                                    <span class="ms-4 me-4">|</span>
                                    <span><a href="#" class="link-reset"><img src="images/edit-icon2.svg" alt=""> edit</a></span>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-check form-group mt-5">
                                    <input class="form-check-input" type="radio" name="ordergift" id="ordergift1"
                                        checked>
                                    <label class="form-check-label" for="ordergift1">
                                        Default address
                                    </label>
                                </div>

                                <input type="text" name="address" class="form-control border-top-0 border-s-0 addressf">
                            </div>
                            @endforeach

                            <div class="col-12">
                                <a href="{{route('account-address-view')}}">
                                <button type="button"
                                    class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">add new address</button></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection


