<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    @if (count($products) > 0)
        @foreach ($products as $product)
            <h2>{{$product->color_name}}</h2>  
        @endforeach
    @endif
</body>
</html>