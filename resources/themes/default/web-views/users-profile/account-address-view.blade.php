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
                    <h2 id="offcanvasRightLabel" class="pb-5">Add New Address</h2>
                </div>
                <div class="row">
                    @include('web-views.partials._profile-aside')
                    <!-- nav side bar -->

                    <div class="col-md-9">
                        <form action="{{route('address-store')}}" method="post">
                                @csrf
                            <div class="panel-area">
                                
                                <div class="row">
                                        <h5 class="mb-4">Title *</h5>

                                        <div class="col-md-2">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="ordergift" id="ordergift1"
                                                    checked>
                                                <label class="form-check-label" for="ordergift1">
                                                    MR
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="ordergift" id="ordergift2">
                                                <label class="form-check-label" for="ordergift2">
                                                    MRS
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="ordergift" id="ordergift2">
                                                <label class="form-check-label" for="ordergift2">
                                                    MISS
                                                </label>
                                            </div>
                                        </div>

                                 </div>

                                <div class="row mt-4">

                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="name" class="form-control" placeholder="First Name*" required="">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <select name="" id="" class="form-select">
                                                    <option value="" class="muted">+971</option>
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone Number*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="city" class="form-control" placeholder="City*">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="area" class="form-control" placeholder="Area*">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="text" name="address" class="form-control" placeholder="Shipping Address*">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Make this my default address
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-end">
                                        <button type="submit"
                                            class="main-btnreverse text-center pt-1 pb-1 pt-md-2 pb-md-2 mt-5">Save</button>
                                    </div>

                                </div>

                            </div>
                        </form>


                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection


