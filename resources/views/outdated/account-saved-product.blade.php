@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" id="main">

        <!--account menu sidebar-->
         @include('layouts.account-sidebar')
        <!-- End account menu sidebar-->

        <div class="my_account account_saved_products p-0 m-0">
            <div class="hoz_card py-4 ">
                <h5 class="account_section_title">Saved Products</h5>
                <div class="saved_products_types">
                    <a href="#0" id="all_types" class="btn filter_product_type all active_type">All Types</a>
                    <a href="#0" id="digital_locks" class="btn filter_product_type digital_locks">Digital Lock</a>
                    <a href="#0" id="doors" class="btn filter_product_type doors">Doors</a>
                    <a href="#0" id="gates" class="btn filter_product_type gates">Gates</a>
                    <a href="#0" id="accessories" class="btn filter_product_type accessories">Accessories</a>
                    <div class="line mt-3"></div>
                </div>
                <div class="card order-card">
                    <div class="card-body">
                        <div class="order_info saved_products" id="saved-products-container">
                            @foreach($saved_products as $saved_product)
                            <div class="order_info-product saved_product">
                                <div class="saved_product_details">
                                    <div class="order_product-img hoz_card">
                                        <img src="{{($saved_product->first_image) ? PRODUCT_DISPLAY_PATH.$saved_product->first_image['image_url'] : asset('assets/img/main_product_image.jpg')}}" alt="">
                                    </div>
                                    <div class="order_product-detail">
                                        <p class="order_product_brand">
                                            {{-- {{$saved_product->door['brand']}}
                                            {{$saved_product->gate['brand']}}
                                            {{$saved_product->digital_lock['brand']}}
                                            {{$saved_product->Accessory['brand']}} --}}
                                            {{$saved_product->get_product('brand')}}
                                        </p>
                                        <h3 class="order_product_name">
                                            {{-- {{$saved_product->door['product_name']}}
                                            {{$saved_product->gate['product_name']}}
                                            {{$saved_product->digital_lock['product_name']}}
                                            {{$saved_product->Accessory['product_name']}} --}}
                                            {{$saved_product->get_product('product_name')}}
                                        </h3>
                                        <div class="order_product_qty_and_price ">
                                            <p class="qty">
                                                Qty: <span>1</span> x ${{$saved_product->price}}
                                            </p>
                                            <p class="price">
                                                Price: <span>${{$saved_product->price}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="saved_product_actions ">
                                    <a class="viewProduct" href="#0">View Product</a>
                                    <a class="deleteProduct" href="#0"> <i class="fa fa-trash mr-2"
                                                                           aria-hidden="true"></i>Remove</a>
                                </div>
                            </div>
                            <div class="line"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>s
@endsection

@push('script')
    <script>
        $('.filter_product_type').click(function (e) {
            e.preventDefault();
            var selected_product_type = $(this).attr('id');
            getSavedProductByType(selected_product_type);
            $(this).addClass('active_type');
            $(this).siblings().removeClass('active_type')
        });

        function getSavedProductByType(selected_product_type) {
          //  don't cache ajax or content won't be fresh
            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "{{Route('filter-saved-product')}}",
                data:{ product_type : selected_product_type },
                beforeSend: function(){
                    $("#saved-products-container").html("<div class=\"preloader text-center py-5\" id=\"preloader\">\n" +
                        "    <img src=\"/assets/loader/preloader_x128.gif\"  class=\"w-10\" alt=\"no saved products were added\" >\n" +
                        "    <p>Loading...</p>\n" +
                        "</div>");
                 // console.log('before')
                },
                success: function(data){
                 //   console.log('success');
                    $("#saved-products-container #preloader").fadeOut(700, function () {
                        $("#saved-products-container").html(data['html']);
                        $("#saved-products-container > #sp-c").fadeIn(200);
                    });

                },
                error : function () {

                    $("#saved-products-container").load("{{asset('templates/preloader.html')}}");

                    alert('Error please try again')

                },
                complete:function (data) {
                    $("#saved-products-container").html(data['html']);
                 //   console.log('compete')
                }
            });

// end
        }

        // $.ajax({
        //     url: 'ajax/test.html',
        //     success: function(data) {
        //         $('.result').html(data);
        //     },
        //     complete: function() {
        //         // Schedule the next request when the current one's complete
        //         setTimeout(worker, 5000);
        //     }
        // });

    </script>
@endpush
