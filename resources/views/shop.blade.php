<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/shop.css">

</head>
<body>

@include("layouts.Header")

<h1>Products</h1>
<div class="container">
<a href="/shop/cart">CART</a>
</div>

<h2>Sort by type :</h2>

<div class="container" id="select">

    <select class="selectpicker" id="type-selector">
        <option value="none">None</option>
        @foreach($types as $type)
            <option value="{{$type}}">{{$type}}</option>
        @endforeach
    </select>

</div>

@if($add = true)
    <div>
        <a href="/shop/add">Add a new product</a>
    </div>
@endif

<div class="container" id="price">
    <form>
        Maximum price : <input title="max"id="max">
    </form>
</div>

<div class="container" id="products">


</div>

@include("layouts.Footer")

</body>
</html>


<script>
    $( document ).ready(function() {

        $.get( "/shop/products?type=none&max=", function( data ) {
            $("#products").replaceWith(data);
        });

    });

    $("#type-selector").change(function(){
        $.get( "/shop/products?type="+$("#type-selector").val()+"&max="+$("#max").val(), function( data ) {
            $("#products").replaceWith(data);
        });
    });

    $("#max").change(function(){
        $.get( "/shop/products?type="+$("#type-selector").val()+"&max="+$("#max").val(), function( data ) {
            $("#products").replaceWith(data);
        });
    });
</script>