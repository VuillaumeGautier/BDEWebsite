<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/site.css">
    <link rel="stylesheet" href="../../css/shop.css">

</head>
<body>
@include("layouts.Header")

<div>
    <a href="/shop">Back</a>
</div>

<div>
    <a href="/shop/basket">CART</a>
</div>

<div>
    {{$name}}
</div>

<div class="row">


    <div class="col-sm-12 col-md-6">
        <img src="../../Pictures/products/{{$img}}">
    </div>

    <div class="col-sm-12 col-md-6">
        {{$desc}}
    </div>
</div>

<div>
    <form action="/add-to-cart" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="product" value="{{$id}}">
        Number of products
        <input type="text" name="number">
        <input type="submit" value="Add to cart">
    </form>
</div>



@include("layouts.Footer")
</body>
</html>
