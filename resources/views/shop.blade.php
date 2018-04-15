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

<a href="/shop/basket">CART</a>

<div>
    Sort by type :
    <select class="selectpicker" id="type-selector">
        <option value="none">None</option>
        <option value="cloth">Cloth</option>
        <option value="goodies">Goodies</option>
    </select>

</div>

<div class="container" id="products">


</div>

@include("layouts.Footer")

</body>
</html>


<script>
    $( document ).ready(function() {

        $.get( "/shop/products?type=none", function( data ) {
            $("#products").replaceWith(data);
        });

    });

    $("#type-selector").change(function(){
        $.get( "/shop/products?type="+$("#type-selector").val(), function( data ) {
            $("#products").replaceWith(data);
        });
    });
</script>