<html>
<head>
   <title>hi</title>
</head>
<body>
<table>

      @foreach($products->chunk(3) as $product)
        <tr>
        {{$product}}
        </tr>
       @endforeach

</table>
</body>
</html>