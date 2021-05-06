@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{asset('css/shop.css')}}" />
    <style>
        .shop_container{
            grid-area:unset;
        }
    </style>
@endpush
@section('content')
<div class="container" id="main">
        @if(isset($shop_type))

            @include('elements.shop-filter.'.$shop_type)

         @else

            @include('elements.shop-filter')

        @endif

        <div class="hoz_card shop_header p-4 d-flex align-items-center">
            <div class="hoz_displayer d-flex">
                <a href="#0"  class="mx-2 shop_display" >
                    <svg id="list_ic" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <rect id="Rectangle_472" data-name="Rectangle 472" width="4" height="4" rx="1" transform="translate(0 0)" fill="#aaa"/>
                        <rect id="Rectangle_474" data-name="Rectangle 474" width="9" height="4" rx="1" transform="translate(7 0)" fill="#aaa"/>
                        <rect id="Rectangle_475" data-name="Rectangle 475" width="9" height="4" rx="1" transform="translate(7 6)" fill="#aaa"/>
                        <rect id="Rectangle_477" data-name="Rectangle 477" width="4" height="4" rx="1" transform="translate(0 6)" fill="#aaa"/>
                        <rect id="Rectangle_478" data-name="Rectangle 478" width="4" height="4" rx="1" transform="translate(0 12)" fill="#aaa"/>
                        <rect id="Rectangle_480" data-name="Rectangle 480" width="9" height="4" rx="1" transform="translate(7 12)" fill="#aaa"/>
                    </svg>
                </a>
                <a href="#0"  class="mx-2 shop_display" >
                    <svg id="grid_ic" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <rect id="Rectangle_472" data-name="Rectangle 472" width="4" height="4" rx="1" transform="translate(0 0)" fill="#0e95ff"/>
                        <rect id="Rectangle_473" data-name="Rectangle 473" width="4" height="4" rx="1" transform="translate(6 0)" fill="#0e95ff"/>
                        <rect id="Rectangle_474" data-name="Rectangle 474" width="4" height="4" rx="1" transform="translate(12 0)" fill="#0e95ff"/>
                        <rect id="Rectangle_475" data-name="Rectangle 475" width="4" height="4" rx="1" transform="translate(12 6)" fill="#0e95ff"/>
                        <rect id="Rectangle_476" data-name="Rectangle 476" width="4" height="4" rx="1" transform="translate(6 6)" fill="#0e95ff"/>
                        <rect id="Rectangle_477" data-name="Rectangle 477" width="4" height="4" rx="1" transform="translate(0 6)" fill="#0e95ff"/>
                        <rect id="Rectangle_478" data-name="Rectangle 478" width="4" height="4" rx="1" transform="translate(0 12)" fill="#0e95ff"/>
                        <rect id="Rectangle_479" data-name="Rectangle 479" width="4" height="4" rx="1" transform="translate(6 12)" fill="#0e95ff"/>
                        <rect id="Rectangle_480" data-name="Rectangle 480" width="4" height="4" rx="1" transform="translate(12 12)" fill="#0e95ff"/>
                    </svg>
                </a>
            </div>
            <div class="mb-0 hoz_ranger form-group d-flex align-items-center">
                <p class="mr-2">Price:</p>

                <input class="form-control ranger_min" placeholder="$0" type="number" min="0"
                       name="price[1]" id="rang_min" form="form-filter"
                       @if(array_key_exists("price",$query_request ?? []))
                          value='{{ $query_request['price'][0]}}'
                       @endif
                       >

                <input type="range" class="custom-range the_ranger mx-2" min="0" max="100" name="range" id="slider-range"
                      @if(array_key_exists("price",$query_request ?? []))
                          value='{{ $query_request['price'][1]/100}}'
                       @endif>

                <input class="form-control ranger_max" placeholder="$1,0000" type="number"
                       min="0" name="price[2]" id="rang_max" form="form-filter"
                       @if(array_key_exists("price",$query_request ?? []))
                          value='{{ $query_request['price'][1]}}'
                       @endif
                       >

                <a href="javascript:void(0)"  class="mx-2 shop_display" onclick="runFiter()"
                    style="
                    background: #007bff;
                    color: white;
                    padding: 1px 6px 1px 5px;
                    border-radius: 5px;
                    font-size: 15px;
                    ">
                    OK
                </a>
            </div>

            <div class="hoz_sorter d-flex align-items-center">
                <p class="w-50">Sort By: </p>
                <select class="ml-2 form-control ">
                    <option><span style="color:#AAAAAA;">Price: </span>High to Low</option>
                    <option>Electronics</option>
                    <option>Home Items</option>
                    <option>Foods</option>
                </select>
            </div>
        </div>

        <div class="shop_container p-0 m-0">

             @forelse ($products as $product)
             <?php
                $product = \App\Product_detail::find($product->id);
              ?>
             @include('elements.product-card',['product'=>$product])
             @empty
             <div class="content text-center" style="position: absolute;left: 40%;">
                <img src="{{asset('assets/images/saved_product_not_added.jpg')}}"  class="img-responsive w-20" alt="no saved products were added" >
                <h5 class="mt-4">we haven't found any products that fit your filter</h5>
                <p>if you can't find the lock that you're looking for please contact us </p>
                <a href="{{route('clear-filter', $shop_type)}}" class="btn btn-primary save-btn  mt-4 back-to-shop-btn" type="submit"
                   style="">Clear Filter</a>
            </div>
             @endforelse

        </div>
    </div>

@endsection

@push('script')

{{-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
 $(document).ready(function() {
 $( "#mySlider" ).slider({
   range: true,
   min: 10,
   max: 999,
   values: [ 200, 500 ],
   slide: function( event, ui ) {
  $( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
  }
});

$( "#price" ).val( "$" + $( "#mySlider" ).slider( "values", 0 ) +
        " - $" + $( "#mySlider" ).slider( "values", 1 ) );

 });
</script> --}}

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>

    $(document).on('mousemove', '#slider-range', function() {

        $('#rang_min').val(($('#rang_min').val() <= 0) ? 20 : $('#rang_min').val() )
        if($(this).val() > $('#rang_min').val()){

           $('#rang_max').val( parseFloat($(this).val())*100 );
           console.log($(this).val());
        }else if($(this).val() <= $('#rang_min').val()){
            $(this).val($('#rang_min').val())
        }

    });

  </script>
@endpush
