@extends('admin.layouts.app')

@push('order-styles')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">


     <style>
         #main{
            grid-template-columns: 1fr 0fr;
         }
         .img-card-prd{
         height: 120px;
         object-fit: cover;
        }
        .img-card-order{
            height: 50px;
           object-fit: contain;
        }
        .hoz_card{background: unset}
     </style>
@endpush

@section('content')

<div class="card-columns mb-5">

    <div class="card"></div>
    <!-- Panel -->
    <div class="card info-color mb-4 white-text">
        <div class="card-body">
          <div class="pull-right">
            <i class="fas fa-chart-line"></i>
          </div>
        <p>
            Manage Orders
        </p>
          <h4>{{$orders->count()}}</h4>
        </div>
        <div class="progress md-progress">
          <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
      <!-- Panel -->
    <div class="card"></div>
</div>
    <div class="container" id="main">
        <div class="my_account account_orders p-0 m-0">
            <div class="hoz_card py-4 ">
                {{-- <h5 class="account_section_title">My Orders</h5> --}}
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
                        @foreach ( $orders as $order )
                        <div class="order mt-3">
                            <div class="card-header order_header_detail bg-white" id="headingOne">
                                <div class="order_details">
                                    <p class="mb-0">
                                        Order Number: <span class="order-id">
                                           #{{$order->order_number}}
                                        </span>
                                    </p>
                                    <p class="mb-0">
                                        Order Date: <span class="order-id">
                                            {{$order->created_at }}
                                        </span>
                                    </p>
                                </div>
                                @if(!in_array($order->status, [ORDER_STATUS['canceled'], ORDER_STATUS['delivered']]))
                                <a onclick="return askyesno('Delete this record?');" href="{{Route('change-order-status',['order'=> $order->order_number, 'status'=>'delivered'])}}" type="button" class="btn btn-success px-3"><i class="far fa-thumbs-up text-white" aria-hidden="true"></i></a>
                                <a  onclick="return askyesno('Delete this record?');" href="{{Route('change-order-status',['order'=> $order->order_number, 'status'=>'canceled'])}}" type="button" class="btn btn-danger px-3"><i class="fas fa-power-off text-white" aria-hidden="true"></i></a>
                                @endif
                                <a href="#0">Colappse
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="order_info">
                                    @foreach ( $order->orderItems as $item)
                                    <div class="order_info-product">
                                        <div class="order_product-img hoz_card">

                                            <img src="{{($item->product->first_image) ? PRODUCT_DISPLAY_PATH.$item->product->first_image['image_url'] : asset('assets/img/main_product_image.jpg')}}" alt="" class="img-card-order">
                                        </div>
                                        <div class="order_product-detail">
                                            <p class="order_product_brand">
                                                {{$item->brand}}
                                            </p>
                                            <h3 class="order_product_name">
                                                {{$item->name}}
                                            </h3>
                                            <div class="order_product_qty_and_price ">
                                                <p class="qty">
                                                Qty: <span>{{$item->quantity}}</span> x ${{$item->price}}
                                                </p>
                                                <p class="price">
                                                    Price: <span>${{$item->price}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    @endforeach
                                </div>
                                <div class="order_delivery">
                                    <div class="order_delivery_info">
                                        <img src="./assets/svg/delivered_ic.svg" class="mr-2" alt="">
                                        <p class="order_delivery_status {{$order->orderStatus(false)}}">
                                            {{$order->orderStatus()}}
                                            <span class="order_delivery_time">
                                                On <span>{{$order->updated_at}}</span>
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
