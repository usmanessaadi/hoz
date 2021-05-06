<div id="product-imgs">

 <div class="product_images_card">
    <div class="hoz_card d-flex align-items-center" style="height: 770px;">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center w-100 text-center">
                {{-- <fieldset id="f{{$product->id}}{{$product->id/2*6}}1" class="active">
                    <div class="product-pic">
                        <img class="pic0" src="{{asset(config('filesystems.disks.public.url').'/products/'.$product->main_image)}}" />
                    </div>
                </fieldset> --}}
                @forelse($product->images as $img)
                <fieldset id="f{{$img->id}}1" class="@if($loop->first) active @endif">
                    <div class="product-pic">
                        <img class="pic0" src="{{($img->image_url) ? PRODUCT_DISPLAY_PATH.$img->image_url : asset('assets/img/main_product_image.jpg')}}" />
                    </div>
                </fieldset>
                @empty
                <fieldset id="f1" class="active">
                    <div class="product-pic">
                        <img class="pic0" src="{{asset('assets/img/main_product_image.jpg')}}" />
                    </div>
                </fieldset>
                @endforelse
            </div>
        </div>
    </div>

    <div class="d-flex thumbnails mt-4 w-100 justify-content-center">
        {{-- <div id="f{{$product->id}}{{$product->id/2*6}}" class="tb tb-active">
            <img class="thumbnail-img fit-image" src="{{asset(config('filesystems.disks.public.url').'/products/'.$product->main_image)}}" />
        </div> --}}
        @forelse($product->images as $img)
        <div id="f{{$img->id}}" class="tb @if($loop->first) tb-active @endif ">
            <img class="thumbnail-img fit-image" src="{{($img->image_url) ? PRODUCT_DISPLAY_PATH.$img->image_url : asset('assets/img/main_product_image.jpg')}}" />
        </div>
        @empty
        <div id="f1" class="tb tb-active">
            <img class="pic0" src="{{asset('assets/img/main_product_image.jpg')}}" />
        </div>
        @endforelse
    </div>

</div>
</div>
<div class="product_details_card">
    <div class="product_basic_details hoz_card">
        <p class="product_brand">

            {{$product->get_product('brand')}}
        </p>
        <h3 class="product_title">

            {{$product->get_product('product_name')}}
        </h3>

        <div id="product-changed-details">
            <div class="product_price">
            <p>${{ number_format($product->SellingPrice, 2, ',', ' ')}} @if($product->discount > 0) <span class="original_product_price">${{number_format($product->price, 2, ',', ' ')}}</span> @endif</p>

                <p class="installement">
                    or 3 installments of
                    <span class="installement_price">$299</span>
                    with
                    <img src="{{asset('/assets/logos/atome.png')}}" class="ml-3" alt="atom" />
                </p>
            </div>

            <div class="product_colors">
                <span>current color : <b>{{$product->color->color_name}}</b></span>
                <p>Choose a colour: </p>
                <form action="{{route('view-product',$product->slug ?? 'not_found' )}}" id="color-picker-form" method="get">

                    <select class="prd-page-select" name="color_picker" id="color-picker">
                        @foreach ($colors as $color)
                        <option value="{{$color->id}}" @if($color->color_name == $product->color->color_name ) selected disabled @endif>{{$color->color_name}}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="product_cta">
                <button class="add_to_cart_btn btn mr-3" data-product="{{$product->id}}">
                    <i class="add-to-cart-icon"></i> Add To cart
                </button>
                <a class="add-to-savedProducts @if(!Auth::check()) not auth @endif" data-product="{{$product->id}}" href="javascript:void(0)">
                <svg class="fav_btn" id="Group_147" data-name="Group 147" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" width="44" height="47" viewBox="0 0 44 47">
                    <defs>
                        <filter id="Path_35" x="0" y="0" width="44" height="47" filterUnits="userSpaceOnUse">
                            <feOffset dy="3" input="SourceAlpha" />
                            <feGaussianBlur result="blur" />
                            <feFlood flood-opacity="0.051" />
                            <feComposite operator="in" in2="blur" />
                            <feComposite in="SourceGraphic" />
                        </filter>
                    </defs>
                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Path_35)">
                        <g id="Path_35-2" data-name="Path 35" fill="#fff">
                            <path
                                    d="M 39.686279296875 43 L 4.313729763031006 43 C 2.486530065536499 43 1 41.51346969604492 1 39.686279296875 L 1 4.313729763031006 C 1 2.486530065536499 2.486530065536499 1 4.313729763031006 1 L 39.686279296875 1 C 41.51346969604492 1 43 2.486530065536499 43 4.313729763031006 L 43 39.686279296875 C 43 41.51346969604492 41.51346969604492 43 39.686279296875 43 Z"
                                    stroke="none" />
                            <path class="is_border"
                                d="M 4.313720703125 2 C 3.037929534912109 2 2 3.037929534912109 2 4.313720703125 L 2 39.68627166748047 C 2 40.96207046508789 3.037929534912109 42 4.313720703125 42 L 39.68627166748047 42 C 40.96207046508789 42 42 40.96207046508789 42 39.68627166748047 L 42 4.313720703125 C 42 3.037929534912109 40.96207046508789 2 39.68627166748047 2 L 4.313720703125 2 M 4.313720703125 0 L 39.68627166748047 0 C 42.06869125366211 0 44 1.931320190429688 44 4.313720703125 L 44 39.68627166748047 C 44 42.06869125366211 42.06869125366211 44 39.68627166748047 44 L 4.313720703125 44 C 1.931320190429688 44 0 42.06869125366211 0 39.68627166748047 L 0 4.313720703125 C 0 1.931320190429688 1.931320190429688 0 4.313720703125 0 Z"
                                stroke="none" @if($product->is_savedProduct()) fill="#007bff" @else fill="#dedede" @endif />
                        </g>
                    </g>
                    <g id="Union_2" data-name="Union 2" transform="translate(11.216 12.941)" fill="none">
                        <path class="is_heart"
                            d="M10.072,17.746C5.235,15.093,0,10.545,0,5.838A6.088,6.088,0,0,1,6.31,0a6.584,6.584,0,0,1,4.207,1.486A6.583,6.583,0,0,1,14.723,0a6.087,6.087,0,0,1,6.309,5.838c0,4.706-5.263,9.244-10.069,11.907a.988.988,0,0,1-.89,0Z"
                            stroke="none"  @if($product->is_savedProduct()) fill="#007bff" @else fill="#fff" @endif />
                        <path
                                d="M 10.51323509216309 15.70016479492188 C 12.79540348052979 14.37660026550293 14.84756565093994 12.79024791717529 16.33613967895508 11.19361400604248 C 17.56562995910645 9.874863624572754 19.0312385559082 7.875204086303711 19.0312385559082 5.837853908538818 C 19.0312385559082 3.721653938293457 17.09842872619629 2.000003814697266 14.72268962860107 2.000003814697266 C 13.632399559021 2.000003814697266 12.59140968322754 2.364653825759888 11.79146957397461 3.02678394317627 L 10.51642894744873 4.082153797149658 L 9.241219520568848 3.02700400352478 C 8.440829277038574 2.364733934402466 7.399689197540283 2.000003814697266 6.30959939956665 2.000003814697266 C 3.933279275894165 2.000003814697266 1.999999284744263 3.721653938293457 1.999999284744263 5.837853908538818 C 1.999999284744263 7.882293701171875 3.461039304733276 9.882153511047363 4.686699390411377 11.19983386993408 C 6.179410457611084 12.80459880828857 8.232730865478516 14.38865280151367 10.51323509216309 15.70016479492188 M 10.51515960693359 17.85128402709961 C 10.35454940795898 17.85128402709961 10.19406890869141 17.81644439697266 10.07210922241211 17.74622344970703 C 5.235379219055176 15.09277439117432 -7.220459110612865e-07 10.54450416564941 -7.220459110612865e-07 5.837853908538818 C -7.220459110612865e-07 2.614284038543701 2.824929237365723 3.920898507203674e-06 6.30959939956665 3.920898507203674e-06 C 7.925769329071045 3.920898507203674e-06 9.39954948425293 0.5621339082717896 10.51620960235596 1.486093878746033 C 11.63247966766357 0.5621339082717896 13.10651969909668 3.920898507203674e-06 14.72268962860107 3.920898507203674e-06 C 18.20695877075195 3.920898507203674e-06 21.0312385559082 2.614284038543701 21.0312385559082 5.837853908538818 C 21.0312385559082 10.54372406005859 15.76821899414063 15.08203411102295 10.9622688293457 17.7445240020752 C 10.83925914764404 17.81552314758301 10.67733955383301 17.85128402709961 10.51515960693359 17.85128402709961 Z"
                                stroke="none" fill="#0e95ff" />
                    </g>
                </svg>
                </a>
            </div>

        </div>


        <div class="product_description">
            <p>Description</p>
            <div class="line"></div>
            <p class="product_desc_text">

                {{$product->get_product('description')}}
            </p>
        </div>
    </div>
    @if($product->type() == "digital_locks")
        <div class="product_handle_lock_door_info my-3">
            <div class="row">
                @if(isset($product->digital_lock->digital_handle_type['name']))
                    <div class="box col">
                        <div class="handle_type">
                            <img src="{{asset($product->digital_lock->digital_handle_type['icon'] )}}" alt="push pull handle type hoz" />
                            <div class="box_desc">
                                <h3>Handle Type</h3>
                                <p>{{$product->digital_lock->digital_handle_type['name']}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($product->digital_lock->digital_lock_type['name']))
                    <div class="box col">
                        <div class="lock_type">
                            <img src="{{asset($product->digital_lock->digital_lock_type['icon'] )}}" alt="Mortise Handle type hoz" />
                            <div class="box_desc">
                                <h3>Lock Type</h3>
                                <p>{{$product->digital_lock->digital_lock_type['name']}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($product->digital_lock->digital_door_type['name']))
                    <div class="box col">
                        <div class="door_type">
                            <img src="{{asset($product->digital_lock->digital_door_type['icon'] )}}" alt="Main Door type hoz" />
                            <div class="box_desc">
                                <h3>Door Type</h3>
                                <p>{{$product->digital_lock->digital_door_type['name']}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="product_unlock_methods hoz_card">
            <p>Unlock Methods <sup>(N°. of inputs)</sup></p>
            <div class="line"></div>
            <div class="unlock_methods">
                <div class="row">

                    @foreach($avialable_unlock_methodos as $unlock_method)
                        <div class="method col-3">

                        <img class="method_image" src="{{asset('assets/hmc/unlock-methods/'.$unlock_method.'.png')}}" alt="Fingerprint" />
                        <p class="method_title">{{ str_replace('_', ' ', $unlock_method)}}
                            @if( in_array($unlock_method, ['fingerprint','physical_key','bluetooth','pin','rfid_card']) )
                              <sup>{{$product->digital_lock[$unlock_method]}}</sup>
                            @endif
                        </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="product_requirements hoz_card my-3">
        <p>Requirements</p>
        <div class="line"></div>

        <div class="custom-control custom-checkbox mr-sm-2 mt-3">
            <input type="checkbox" class="custom-control-input" id="customControlAutosizing" />
            <label class="custom-control-label product_requirement pl-2" for="customControlAutosizing">
                Distance between the gate and the door is
                <span class="product_requirement_number">8 cm</span><sup><i class="text-danger">*</i></sup>
            </label>
        </div>
    </div>
    <div class="product_warranty hoz_card">
        <p>Warranty</p>
        <div class="line"></div>

        <p class="product_warranty_text">
            Two Years (First Year Parts and Labour, Second Year Parts) Applies
            to all Samsung Lock
        </p>
    </div>
</div>
