<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>

@include("layouts.Header")

<div class="Description, col-6-md" id="Descritpion">
    Welcome to the website of the BDE of CESI.Exia Nancy, feel free to browse our shop or our incoming and passed events =)
</div>

<div class="Separation1" id="Separation1"></div>
<div class="row">

<div class="titIn"><h2>Incoming Events</h2></div>
<div class="container">
    <div class="row">
        @foreach($inc as $event)
            <a href="">
                <div class="col-md-4">
                <div>{{$event['name']}}</div>
                <div>
                    <img src="/Pictures/events/{{$event['thumbnail']}}">
                </div>


                </div>
            </a>
        @endforeach

    </div>
</div>
</div>

<div class="Separation2" id="Separation2"></div>

<div class="Even2">
    <div class="titPa"><h2>Past Events</h2></div>

</div>

<div class="Separation3" id="Separation3"></div>

<div class="Shop">
    <div class="titSh"><h2>Best Sells</h2></div>
</div>
<div id="my_carousel" class="carousel slide" data-ride="carousel">
    <!-- Bulles -->
    <ol class="carousel-indicators">
        <li data-target="#my_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my_carousel" data-slide-to="1"></li>
        <li data-target="#my_carousel" data-slide-to="2"></li>
    </ol>
    <!-- Slides -->
    <div class="carousel-inner">
        <!-- Page 1 -->
        <div class="item active">
            <div class="carousel-page">
                <img src="/Pictures/LAN_2.jpg" class="img-responsive" style="margin: auto;" />
            </div>
        </div>
        <!-- Page 2 -->
        <div class="item">
            <div class="carousel-page"><img src="" class="img-responsive img-rounded"
          style="margin: auto;"  /></div>
        </div>
        <!-- Page 3 -->
        <div class="item">
            <div class="carousel-page">
                <img src="/Pictures/IM_1.jpg" class="img-responsive"
                     style="margin: auto; "  />
            </div>
        </div>
    </div>
    <!-- Contrôles -->
    <a class="left carousel-control" href="#my_carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#my_carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

@include("layouts.Footer")

</body>

</html>
