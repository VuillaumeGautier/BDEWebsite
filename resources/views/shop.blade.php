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

@include("header")

<h1>Products</h1>

<div>
    Sort by TYPE
</div>

<div class="container" id="products">


</div>

@include("footer")

</body>
</html>


<script>
    $( document ).ready(function() {

        $.get( "/shop/products?type=none", function( data ) {
            $("#products").replaceWith(data);
        });

    });
</script>