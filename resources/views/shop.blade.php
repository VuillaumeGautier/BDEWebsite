<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

@include("header")

<h1>Products</h1>

<div>
    Sort by <div>TYPE</div>
</div>

<div class="container" id="products">


</div>

@include("footer")

</body>
</html>


<script>
    $( document ).ready(function() {
        /*var data = {"type":""};
        $.ajax({
            type: "POST",
            url : "/shop/products",
            dataType : "json",
            data : JSON.stringify(data),
            success : function (data, status) {
                console.log(data);
                //$("#products").
            }
        });*/
        $.get( "/shop/products/", function( data ) {
            console.log(data);
        });
    });
</script>