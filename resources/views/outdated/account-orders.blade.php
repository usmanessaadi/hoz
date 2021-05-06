@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" id="main">

        <!--account menu sidebar-->
         @include('layouts.account-sidebar')
        <!-- End account menu sidebar-->

        <div class="my_account account_orders p-0 m-0">
            <div class="hoz_card py-4 ">
                <h5 class="account_section_title">My Orders</h5>
                <div class="cards ">
                    <div class="card mt-3 order-card">
                        <div class="card-header order_header_title bg-white" id="headingOne">
                            <h2 class="mb-0 card_info_title">
                                Orders
                            </h2>
                            <h2 class="mb-0 card_delivery_title">
                                Status
                            </h2>
                        </div>
                        <div class="order">
                            <div class="card-header order_header_detail bg-white" id="headingOne">
                                <div class="order_details">
                                    <p class="mb-0">
                                        Order Number: <span class="order-id">
                                            W1712241645538664
                                        </span>
                                    </p>
                                    <p class="mb-0">
                                        Order Date: <span class="order-id">
                                            Jul 17, 2020
                                        </span>
                                    </p>
                                </div>

                                <a href="#0">Details
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_delivery">
                                    <div class="order_delivery_info">
                                        <img src="./assets/svg/delivered_ic.svg" class="mr-2" alt="">
                                        <p class="order_delivery_status">
                                            Delivered
                                            <span class="order_delivery_time">
                                                On <span>Jul 22, 2020</span>
                                                at <span> 16:56</span>
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order mt-3">
                            <div class="card-header order_header_detail bg-white" id="headingOne">
                                <div class="order_details">
                                    <p class="mb-0">
                                        Order Number: <span class="order-id">
                                            W1712241645538664
                                        </span>
                                    </p>
                                    <p class="mb-0">
                                        Order Date: <span class="order-id">
                                            Jul 17, 2020
                                        </span>
                                    </p>
                                </div>

                                <a href="#0">Details
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_delivery">
                                    <div class="order_delivery_info">
                                        <img src="./assets/svg/delivered_ic.svg" class="mr-2" alt="">
                                        <p class="order_delivery_status">
                                            Delivered
                                            <span class="order_delivery_time">
                                                On <span>Jul 22, 2020</span>
                                                at <span> 16:56</span>
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order mt-3">
                            <div class="card-header order_header_detail bg-white" id="headingOne">
                                <div class="order_details">
                                    <p class="mb-0">
                                        Order Number: <span class="order-id">
                                            W1712241645538664
                                        </span>
                                    </p>
                                    <p class="mb-0">
                                        Order Date: <span class="order-id">
                                            Jul 17, 2020
                                        </span>
                                    </p>
                                </div>

                                <a href="#0">Details
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
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
                                                    Qty: <span>1</span> x $359
                                                </p>
                                                <p class="price">
                                                    Price: <span>$359</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_delivery">
                                    <div class="order_delivery_info">
                                        <img src="./assets/svg/delivered_ic.svg" class="mr-2" alt="">
                                        <p class="order_delivery_status">
                                            Delivered
                                            <span class="order_delivery_time">
                                                On <span>Jul 22, 2020</span>
                                                at <span> 16:56</span>
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection