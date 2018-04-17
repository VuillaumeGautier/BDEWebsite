<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 17/04/2018
 * Time: 08:57
 */

?>


<html>


<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

@include("layouts.Header")


@csrf


    <div id="button-container" class="container">



    </div>


@include("layouts.Footer")


</html>


<script>


    $("#show-users").change(function(){
        $.get( "/shop/products?type="+$("#show-users").val(), function( data ) {
            $("#products").replaceWith(data);
        });
    });

    $("#show-orders").change(function(){
        $.get( "/shop/products"+$("#show-orders").val(), function( data ) {
            $("#products").replaceWith(data);
        });
    });
</script>
