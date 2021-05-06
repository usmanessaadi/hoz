<html>
    <head>
        <title>test</title>
    </head>
    <body>
    <form action="{{route('search-filter')}}" method="get">
        <input type="checkbox" name="fire_rated[1]" value="" id="">
        <input type="text" name="dimensions[3]" value="12x12" id="">
        <input type="text" name="dimensions[1]" value="80x80" id="">
        <input type="number" name="price[1]" value="20">
        <input type="number" name="price[2]" value="200">
        <input type="text" name="brand[1]" value="said brand" id="">
        <input type="text" name="brand[2]" value="hoz brand" id="">
        <input type="submit" name="submit" value="submit" id="">
    </form>

    </body>
</html>
