@extends('layouts.app')
@push('style')
    <link href="{{ asset('css/productpage.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container" id="main">

        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent px-0">
            <li class="breadcrumb-item"><a href="#">{{$product->type()}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{$product->get_product('product_name')}}
                </li>
            </ol>
        </nav>

        <!-- Details -->
        <div class="product_details" id="product-details">

            @include('templates.product-page.product-details',['product'=>$product])

        </div>

        <div class="line my-4"></div>

        <!-- Related Products -->
        <div class="related_products">
            <h3 class="mb-4">Related Products</h3>

            <div class="related_products_carouseal">
                <div class="row mx-auto my-auto">
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            <div class="carousel-item  active">
                                <div class="col-md-2 col-sm-6 mx-1 shop_card">
                                    <div class="shop_card_header">
                                        <svg class="heart_ic" xmlns="http://www.w3.org/2000/svg" width="19.597" height="16.634"
                                             viewBox="0 0 19.597 16.634">
                                            <g id="Union_3" data-name="Union 3" fill="none">
                                                <path
                                                        d="M9.385,16.536C4.878,14.064,0,9.826,0,5.44A5.673,5.673,0,0,1,5.879,0,6.135,6.135,0,0,1,9.8,1.385,6.134,6.134,0,0,1,13.719,0,5.672,5.672,0,0,1,19.6,5.44c0,4.385-4.9,8.614-9.382,11.095a.921.921,0,0,1-.829,0Z"
                                                        stroke="none" />
                                                <path
                                                        d="M 9.79613208770752 14.47210216522217 C 11.88404273986816 13.25345134735107 13.7591667175293 11.79979419708252 15.12257480621338 10.33741760253906 C 16.25152587890625 9.126507759094238 17.5972957611084 7.293867588043213 17.5972957611084 5.439817428588867 C 17.5972957611084 3.543097734451294 15.85744476318359 1.999997615814209 13.71887493133545 1.999997615814209 C 12.73459529876709 1.999997615814209 11.79545497894287 2.328667640686035 11.07445526123047 2.925457715988159 L 9.79942512512207 3.980817556381226 L 8.524205207824707 2.925677537918091 C 7.802774906158447 2.328747749328613 6.863494873046875 1.999997615814209 5.879395008087158 1.999997615814209 C 3.740294933319092 1.999997615814209 2.000005006790161 3.543097734451294 2.000005006790161 5.439817428588867 C 2.000005006790161 7.30054759979248 3.341565132141113 9.133407592773438 4.466995239257812 10.34332752227783 C 5.833985805511475 11.8129358291626 7.71008825302124 13.26448535919189 9.79613208770752 14.47210216522217 M 9.798214912414551 16.63415718078613 C 9.648554801940918 16.63415718078613 9.499025344848633 16.60168838500977 9.385375022888184 16.53625679016113 C 4.878415107727051 14.06371784210205 5.019531272409949e-06 9.825557708740234 5.019531272409949e-06 5.439817428588867 C 5.019531272409949e-06 2.436037540435791 2.632324934005737 -2.36328128266905e-06 5.879395008087158 -2.36328128266905e-06 C 7.385375022888184 -2.36328128266905e-06 8.758665084838867 0.5238076448440552 9.799195289611816 1.384767651557922 C 10.83935546875 0.5238076448440552 12.21289539337158 -2.36328128266905e-06 13.71887493133545 -2.36328128266905e-06 C 16.96557426452637 -2.36328128266905e-06 19.5972957611084 2.436037540435791 19.5972957611084 5.439817428588867 C 19.5972957611084 9.824827194213867 14.693115234375 14.05370807647705 10.21484470367432 16.53466796875 C 10.10021495819092 16.60082817077637 9.949344635009766 16.63415718078613 9.798214912414551 16.63415718078613 Z"
                                                        stroke="none" fill="#0e95ff" />
                                            </g>
                                        </svg>
                                        <img src="./assets/images/product-1.png" alt="">
                                    </div>
                                    <div class="line"></div>
                                    <div class="shop_card_bottom">
                                        <p class="product_brand">Samsung</p>
                                        <h3 class="product_name">Deadbolt Lock SHP-DS510</h3>
                                        <div class="product_price">
                                            <p>$359 <span class="original_product_price">$459</span></p>
                                            <p class="installement">
                                                or 3 installments of
                                                <span class="installement_price">$299</span>
                                                with
                                                <img src="./assets/logos/atome.png" class="ml-2" alt="atom" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="carousel-item  active">
                                <div class="col-md-2 col-sm-6 mx-1 shop_card">
                                    <div class="shop_card_header">
                                        <svg class="heart_ic" xmlns="http://www.w3.org/2000/svg" width="19.597" height="16.634"
                                             viewBox="0 0 19.597 16.634">
                                            <g id="Union_3" data-name="Union 3" fill="none">
                                                <path
                                                        d="M9.385,16.536C4.878,14.064,0,9.826,0,5.44A5.673,5.673,0,0,1,5.879,0,6.135,6.135,0,0,1,9.8,1.385,6.134,6.134,0,0,1,13.719,0,5.672,5.672,0,0,1,19.6,5.44c0,4.385-4.9,8.614-9.382,11.095a.921.921,0,0,1-.829,0Z"
                                                        stroke="none" />
                                                <path
                                                        d="M 9.79613208770752 14.47210216522217 C 11.88404273986816 13.25345134735107 13.7591667175293 11.79979419708252 15.12257480621338 10.33741760253906 C 16.25152587890625 9.126507759094238 17.5972957611084 7.293867588043213 17.5972957611084 5.439817428588867 C 17.5972957611084 3.543097734451294 15.85744476318359 1.999997615814209 13.71887493133545 1.999997615814209 C 12.73459529876709 1.999997615814209 11.79545497894287 2.328667640686035 11.07445526123047 2.925457715988159 L 9.79942512512207 3.980817556381226 L 8.524205207824707 2.925677537918091 C 7.802774906158447 2.328747749328613 6.863494873046875 1.999997615814209 5.879395008087158 1.999997615814209 C 3.740294933319092 1.999997615814209 2.000005006790161 3.543097734451294 2.000005006790161 5.439817428588867 C 2.000005006790161 7.30054759979248 3.341565132141113 9.133407592773438 4.466995239257812 10.34332752227783 C 5.833985805511475 11.8129358291626 7.71008825302124 13.26448535919189 9.79613208770752 14.47210216522217 M 9.798214912414551 16.63415718078613 C 9.648554801940918 16.63415718078613 9.499025344848633 16.60168838500977 9.385375022888184 16.53625679016113 C 4.878415107727051 14.06371784210205 5.019531272409949e-06 9.825557708740234 5.019531272409949e-06 5.439817428588867 C 5.019531272409949e-06 2.436037540435791 2.632324934005737 -2.36328128266905e-06 5.879395008087158 -2.36328128266905e-06 C 7.385375022888184 -2.36328128266905e-06 8.758665084838867 0.5238076448440552 9.799195289611816 1.384767651557922 C 10.83935546875 0.5238076448440552 12.21289539337158 -2.36328128266905e-06 13.71887493133545 -2.36328128266905e-06 C 16.96557426452637 -2.36328128266905e-06 19.5972957611084 2.436037540435791 19.5972957611084 5.439817428588867 C 19.5972957611084 9.824827194213867 14.693115234375 14.05370807647705 10.21484470367432 16.53466796875 C 10.10021495819092 16.60082817077637 9.949344635009766 16.63415718078613 9.798214912414551 16.63415718078613 Z"
                                                        stroke="none" fill="#0e95ff" />
                                            </g>
                                        </svg>
                                        <img src="./assets/images/product-1.png" alt="">
                                    </div>
                                    <div class="line"></div>
                                    <div class="shop_card_bottom">
                                        <p class="product_brand">Samsung</p>
                                        <h3 class="product_name">Deadbolt Lock SHP-DS510</h3>
                                        <div class="product_price">
                                            <p>$359 <span class="original_product_price">$459</span></p>
                                            <p class="installement">
                                                or 3 installments of
                                                <span class="installement_price">$299</span>
                                                with
                                                <img src="./assets/logos/atome.png" class="ml-2" alt="atom" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                    aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                    aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).on('change','#color-picker',function(){
            $('#color-picker-form').trigger('submit')
        })
        $(document).on('submit','#color-picker-form',function(e){
            e.preventDefault();
            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: $(this).attr('action'),
                data : $(this).serialize(),
                success: function(data){
                    //console.log(data['product_removed'])
                    $('#product-details').html(data['details'])
                    //alert('success')

                },
                error : function () {
                    swal("'Error please try again",{
                        icon: "error",
                        // timer: 1000,
                    });


                },

            });

        })

        $(document).on('click','.add-to-savedProducts',function (e) {
            e.preventDefault();
            // var selected_product = $(this).attr('href').replace('#','');
            var selected_product = $(this).data('product');
            //alert(selected_product);
            addToSavedProducts(selected_product)

        });

        function addToSavedProducts(selected_product) {
            //  don't cache ajax or content won't be fresh

            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('add_to_saved_product') }}" + '/' + selected_product,
                success: function(data){
                    //console.log(data['product_removed'])
                    if(data['product_added'] == true){
                        $('#sv_prd-'+selected_product).remove();
                        swal("added to wish list",{
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });

                        $('.is_heart,.is_border').attr('fill','#007bff')

                    }else{
                        swal("the product is already in your wish list",{
                            icon: "info",
                            timer: 3000,

                        });
                    }

                },
                error : function () {
                    swal("an error occurred while trying to add product to your wish list",{
                        icon: "error",
                        // timer: 1000,
                    });
                    alert('Error please try again');
                   // location.reload(true);

                },

            });

        // end
        }

        $(document).on('click','.add_to_cart_btn',function(e){
            e.preventDefault();
            var product_id = $(this).data('product');
            addToCart(product_id);
        })

        function addToCart(product_id) {
            //  don't cache ajax or content won't be fresh

            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('add-to-Cart') }}" + '/' + product_id,
                success: function(data){

                        swal("added to cart ",{
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });

                },
                error : function () {
                    swal("an error occurred while trying to add product to your cart list",{
                        icon: "error",
                        // timer: 1000,
                    });
                    alert('Error please try again');
                   // location.reload(true);

                },

            });


        }// end add to cart

    </script> --}}
    @endpush
