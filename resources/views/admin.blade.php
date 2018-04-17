

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

        <button id="show-users">Show users</button>
        <button id="show-orders">Show orders</button>
        <br>

        <form method="post" action="/Admin/ChangeRight">


                <p>Email : <input type="text" id="email"></p>

                <p>Right : <input type="text" id="right"></p>

                <button id="change-right" type="submit" >Change Right</button>



        </form>




    </div>


    <div class="container" id="container-table">




    </div>


@include("layouts.Footer")


</html>


<script>


    $("#show-orders").click(function(){
        $.get( "/Admin/ShowOrder", function( data ) {
            $("#container-table").replaceWith(data);
        });
    });

    $("#show-users").click(function(){
        $.get( "/Admin/ShowUser", function( data ) {
            $("#container-table").replaceWith(data);
        });
    });

</script>
