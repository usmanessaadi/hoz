@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" id="main">

       <!--account menu sidebar-->
       @include('layouts.account-sidebar')
       <!-- End account menu sidebar-->

        <div class="my_account account_details p-0 m-0">
            <div class="hoz_card p-4 ">
                <h5 class="account_section_title">My Account</h5>
                <div class="cards ">
                    <div class="card mt-3 ">
                        <div class="card-header bg-white" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Personal Information
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="info">
                                    <p>
                                        Name
                                    </p>
                                    <h5>
                                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                    </h5>
                                    <div class="info">
                                        <p>
                                            Email Address
                                        </p>
                                        <h5>
                                            {{Auth::user()->email}}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white d-flex w-100 justify-content-center">
                                <a href="{{Route('account-personal-info')}}">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header bg-white" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Addresses
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="info">
                                    <p>
                                        Default Address
                                    </p>
                                    <h5>
                                    {{Auth::user()->user_default_address()->address ?? 'Please Add your Address'}}
                                    </h5>
                                </div>
                            </div>
                            <div class="card-footer bg-white d-flex w-100 justify-content-center">
                            <a href="{{Route('account-addresses')}}">{{(isset(Auth::user()->user_default_address()->address)) ? 'Edit' : 'Add'}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 ">
                        <div class="card-header bg-white" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Email Settings
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="info">
                                    <p>
                                        Name
                                    </p>
                                    <h5>
                                        You are currently subscribed to our
                                        newsletter.
                                    </h5>
                                </div>
                            </div>
                            <div class="card-footer bg-white d-flex w-100 justify-content-center">
                                <a href="{{Route('account-communication-preferences')}}">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 order-card">
                        <div class="card-header bg-white" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Orders
                                </button>
                            </h2>
                        </div>
                        <div class="card-header bg-white" id="headingOne">
                            <p class="mb-0">
                                Last Order: <span class="order-id">
                                    #W1712241645538664
                                </span>
                            </p>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="order_info">
                                    <div class="order_info-product">
                                        <div class="order_product-img hoz_card">
                                            <img src="./assets/images/product-1.png" alt="">
                                        </div>
                                        <div class="order_product-detail">
                                            <p class="order_product_brand">
                                                SAMSUNG
                                            </p>
                                            <h3 class="order_product_name">
                                                Deadbolt Lock SHP-DS510
                                            </h3>
                                            <div class="order_product_qty_and_price ">
                                                <p class="qty">
                                                    Qty: <span>1</span>
                                                </p>
                                                <p class="price">
                                                    Unit Price: <span>$359</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="order_info-product">
                                        <div class="order_product-img hoz_card">
                                            <img src="./assets/images/product-1.png" alt="">
                                        </div>
                                        <div class="order_product-detail">
                                            <p class="order_product_brand">
                                                SAMSUNG
                                            </p>
                                            <h3 class="order_product_name">
                                                Deadbolt Lock SHP-DS510
                                            </h3>
                                            <div class="order_product_qty_and_price ">
                                                <p class="qty">
                                                    Qty: <span>1</span>
                                                </p>
                                                <p class="price">
                                                    Unit Price: <span>$359</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_delivery">
                                    <div class="order_delivery_info">
                                        <p class="order_delivery_status">
                                            <img src="./assets/svg/delivered_ic.svg" alt="">
                                            Delivered
                                        </p>
                                        <p class="order_delivery_time">
                                            On <span>Jul 22, 2020</span>
                                            at <span> 16:56</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white d-flex w-100 justify-content-center">
                                <a href="{{Route('account-orders')}}">View all</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
