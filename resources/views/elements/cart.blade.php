
    <div class="nav-cart-dropdown " id="cart">
        {{-- @foreach ( Auth::user()->orders as $order ) --}}
            @if(session('cart'))
            @foreach (session('cart') as $item)
                <div class="order_info-product">
                    <div class="order_product-img hoz_card">
                        <a href="{{route('view-product', $product->slug ?? 'not_found')}}">
                            <img src="{{($item['image']) ? PRODUCT_DISPLAY_PATH.$item['image'] : asset('assets/img/main_product_image.jpg')}}" alt="" class="img-card-order">
                        </a>
                    </div>
                    <div class="order_product-detail">
                        <p class="order_product_brand">
                            {{$item['brand']}}
                        </p>
                        <a href="{{route('view-product',$product->slug ?? 'not_found')}}">
                            <h3 class="order_product_name">
                                {{$item['name']}}
                            </h3>
                        </a>
                        <div class="order_product_qty_and_price ">
                            <div>
                                <div class="color">
                                    <div>
                                        Color: <span>Silver</span>
                                    </div>
                                    <div class="item-total"  data-item-total="{{$item['price'] * $item['quantity'] }}">Total: <span>${{$item['price'] * $item['quantity'] }}</span></div>
                                </div>
                                {{-- <p class="qty">
                                    Qty: <span class="qty-controls">
                                            <span class="qty-decrease" id="minus-{{$item['id']}}" onclick="plus_minus_quantity({{$item['id']}}, 'minus')">-</span>
                                            <input type="number" class="qty-number" value="{{$item['quantity']}}" id="quantity-{{$item['id']}}" oninput="changeQuantity({{$item['id']}})"  name="quantity" min="1" max="5">
                                            <span class="qty-increase" id="plus-{{$item['id']}}" onclick="plus_minus_quantity({{$item['id']}}, 'plus')">+</span>
                                        </span>
                                        x ${{$item['price']}}
                                </p> --}}
                                <div class="qty">
                                    Qty:
                                    <div class="qty-controls">
                                        <button class="qty-decrease" id="minus-{{$item['id']}}" onclick="plus_minus_quantity({{$item['id']}}, 'minus')">
                                            -
                                        </button>
                                        <input type="text" class="qty-number" readonly value="{{$item['quantity']}}"
                                                 name="quantity" id="quantity-{{$item['id']}}" oninput="changeQuantity({{$item['id']}})">
                                        <button class="qty-increase" id="plus-{{$item['id']}}" onclick="plus_minus_quantity({{$item['id']}}, 'plus')">
                                            +
                                        </button>
                                    </div>
                                    x ${{$item['price']}}
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="delete-product">
                        <a href="javascript:void(0)" onclick="removeFromCart({{$item['id']}})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="7.13" height="7.13" viewBox="0 0 7.13 7.13">
                            <path id="Path_628" data-name="Path 628" d="M251.525,249.579l2.044-2.044a.891.891,0,1,0-1.26-1.26l-2.044,2.044-2.044-2.044a.891.891,0,1,0-1.26,1.26L249,249.579l-2.044,2.044a.891.891,0,1,0,1.26,1.26l2.044-2.044,2.044,2.044a.891.891,0,1,0,1.26-1.26Z" transform="translate(-246.7 -246.015)" fill="#fff"/>
                        </svg>
                       </a>
                    </div>
                </div>
            @endforeach
            <div class="subtotal-cart">
                <p>   Subtotal: <span class="total">$0</span> </p>
                <div class="atom-option">
                    <p>or 3 installments of <span>$80</span> with</p>
                    <img src="{{asset('/assets/logos/atome.png')}}" class="ml-1" alt="atom hoz digital lucks" />
                </div>
            </div>
            <a  href='{{route("palce-order")}}' class=" btn checkout-btn">Proceed to checkout</a>

        <p class="cart-items-count "><span class="cart_items_number_badge">0</span> Items</p>
            @else
            <p class="empty-cart-text">No items in your cart</p>
            @endif
        {{-- @endforeach --}}
    </div>
