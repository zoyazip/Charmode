<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    @if (count($products) > 0)
        @foreach ($products as $product)
            <h2>{{$product->name}}</h2>
        @endforeach
    @endif
    <h1>Colors</h1>
    @if (count($colors) > 0)
        @foreach ($colors as $color)
            <h2>{{$color->color_name}}</h2>
        @endforeach
    @endif
</body>
</html>