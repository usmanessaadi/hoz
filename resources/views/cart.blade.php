
<ul>
    @foreach (session('cart') as $product)
        <li>
            <img src="{{$product['image']}}"><br/>
            name   :  {{$product['name']}} <br>
            price :  {{$product['price']}} <br>
            quantity :  {{$product['quantity']}} <br>
        </li>
    @endforeach
</ul>
