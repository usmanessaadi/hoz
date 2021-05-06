
<div id="sp-c" style="display: none;">
    @forelse ($saved_products as $saved_product)
        <div class="order_info-product saved_product" id="sv_prd-{{$saved_product->id}}">
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
                            avb stock: <span>1</span> x ${{$saved_product->stock}}
                        </p>
                        <p class="price">
                            Price: <span>${{$saved_product->price}}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="saved_product_actions ">
                <a class="viewProduct" href="{{Route('view-product',$saved_product->slug ?? 'not_found')}}">View Product</a>
                <a class="remove-from-savedProducts" href="javascript:void(0)" data-product="{{$saved_product->id}}"> <i class="fa fa-trash mr-2"
                                                                            aria-hidden="true"></i>Remove</a>
                {{--<a class="deleteProduct" href="{{ route('remove_product',$saved_product->id) }}"--}}
                   {{--onclick="event.preventDefault(); document.getElementById('remove_product-form-{{$saved_product->id}}').submit();">--}}
                    {{--<i class="fa fa-trash mr-2"aria-hidden="true"></i>--}}
                    {{--Remove--}}
                {{--</a>--}}
                {{--<form id="remove_product-form-{{$saved_product->id}}" action="{{ route('remove_product',$saved_product->id) }}" method="POST" style="display: none;">--}}
                    {{--@csrf--}}
                {{--</form>--}}
            </div>
        </div>
        <div class="line"></div>
    @empty

        <div class="content text-center">
            <img src="{{asset('assets/images/saved_product_not_added.jpg')}}"  class="img-responsive w-20" alt="no saved products were added" >
            <h5 class="mt-4">You haven't saved any product yet!</h5>
            <p>Did you find a product you like, tap the heart icon to save it here.</p>
            <a href="#0" class="btn btn-primary save-btn  mt-4 back-to-shop-btn" type="submit"
               style="">Back to Shopping</a>
        </div>

    @endforelse
</div>
