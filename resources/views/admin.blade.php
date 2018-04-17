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
    <link rel="stylesheet" href="css/form.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

@include("layouts.Header")


@section('Admin-board')




    <div id="Board-vision" class="container">

        <div id="Order-board" class="table-responsive">




        </div>

        <div id="UserBoard" class="table-responsive">





        </div>


    </div>

    <div>




    </div>

@endsection


@include("layouts.Footer")


</html>
