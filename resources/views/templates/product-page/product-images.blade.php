
 <div class="product_images_card">
    <div class="hoz_card d-flex align-items-center" style="height: 770px;">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center w-100 text-center">
                {{-- <fieldset id="f{{$product->id}}{{$product->id/2*6}}1" class="active">
                    <div class="product-pic">
                        <img class="pic0" src="{{asset($product->main_image)}}" />
                    </div>
                </fieldset> --}}
                @foreach($product->images as $img)
                <fieldset id="f{{$img->id}}1" class="@if($loop->first) active @endif">
                    <div class="product-pic">
                        <img class="pic0" src="{{($img->image_url) ? PRODUCT_DISPLAY_PATH.$img->image_url : asset('assets/img/main_product_image.jpg')}}" />
                    </div>
                </fieldset>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex thumbnails mt-4 w-100 justify-content-center">
        {{-- <div id="f{{$product->id}}{{$product->id/2*6}}" class="tb tb-active">
            <img class="thumbnail-img fit-image" src="{{asset(config('filesystems.disks.public.url').'/products/'.$product->main_image)}}" />
        </div> --}}
        @foreach($product->images as $img)
        <div id="f{{$img->id}}" class="tb tb-active">
            <img class="thumbnail-img fit-image" src="{{($img->image_url) ? PRODUCT_DISPLAY_PATH.$img->image_url : asset('assets/img/main_product_image.jpg')}}" />
        </div>
        @endforeach
    </div>

</div>
