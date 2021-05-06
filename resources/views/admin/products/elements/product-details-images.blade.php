    {{-- @if($product->main_image && $product->main_image != 'assets/images/default_product_img.jpg')
    <div class="col-3 px-2 my-2">
        <div class="view overlay zoom">
            <img src="{{config('filesystems.disks.public.url').'/products/'.$product->main_image}}" class="img-fluid " alt="zoom">
            <div class="mask flex-center waves-effect rgba-red-strong waves-light">
            <p class="white-text">
            <a href="javascript:void(0)" class="delete-img" data-url="{{route('delete-image',['path'=>$product->main_image,'product_id'=>$product->id])}}"  data-main_img="true" style="color: white"><i class="fas fa-trash fa-sm pr-2" aria-hidden="true"></i> Delete</a>
            </p>
            </div>
        </div>
    </div>
    @endif --}}
   @foreach ($product->images as $image)
    <div class="col-3 px-2 my-2">
        <div class="view overlay zoom">
            <img src="{{($image->image_url) ? PRODUCT_DISPLAY_PATH.$image->image_url : asset('assets/img/main_product_image.jpg')}}" class="img-fluid " alt="zoom">
            <div class="mask flex-center waves-effect rgba-red-strong waves-light">
            <p class="white-text">
            <a href="javascript:void(0)" class="delete-img" data-url="{{route('delete-image',['path'=>$image->image_url,'product_id'=>$product->id])}}" data-main_img="false" style="color: white"><i class="fas fa-trash fa-sm pr-2" aria-hidden="true"></i> Delete</a>
            </p>
            </div>
        </div>
    </div>
@endforeach
