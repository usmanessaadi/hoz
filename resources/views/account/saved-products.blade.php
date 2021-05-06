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
                    <a href="javascript:void(0)" id="all_types" class="btn filter_product_type all active_type">All Types</a>
                    <a href="javascript:void(0)" id="digital_locks" class="btn filter_product_type digital_locks">Digital Lock</a>
                    <a href="javascript:void(0)" id="doors" class="btn filter_product_type doors">Doors</a>
                    <a href="javascript:void(0)" id="gates" class="btn filter_product_type gates">Gates</a>
                    <a href="javascript:void(0)" id="accessories" class="btn filter_product_type accessories">Accessories</a>
                    <div class="line mt-3"></div>
                </div>
                <div class="card order-card">
                    <div class="card-body">
                        <div class="order_info saved_products" id="saved-products-container">
                            {{--Saved Products Will loaded here--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>s
@endsection

@push('script')
    <script>

        //Action will run auto after page loaded
        $(document).ready(function() {
            getSavedProductByType('all_types');
        });

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

        $(document).on('click','.remove-from-savedProducts',function (e) {
            e.preventDefault();
            // var selected_product = $(this).attr('href').replace('#','');
            var selected_product = $(this).data('product');

            swal({
                title: "Are you sure you want to delete it?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        removeFromSavedProducts(selected_product)
                    } else {
                        swal("Your saved product is safe!",{
                            icon: "info",
                            timer: 1000,
                            buttons: false,
                        });
                    }
                });



        });
        function removeFromSavedProducts(selected_product) {
            //  don't cache ajax or content won't be fresh

            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                $.ajax({
                    type: "delete",
                    url: "{{ route('remove_from_saved_product') }}" + '/' + selected_product,
                    success: function(data){
                       //console.log(data['product_removed'])
                        if(data['product_removed'] == true){
                            $('#sv_prd-'+selected_product).remove();
                            swal("the product has been deleted!",{
                                icon: "success",
                                timer: 1000,
                                buttons: false,
                            });
                        }else{
                            swal("an error occurred while trying to delete your saved product",{
                                icon: "error",
                                 timer: 3000,
                            });
                        }

                    },
                    error : function () {
                        swal("an error occurred while trying to delete your saved product",{
                            icon: "error",
                            timer: 3000,
                        });
                        alert('Error please try again');
                        location.reload(true);

                    },

                });

// end
        }

    </script>
@endpush
