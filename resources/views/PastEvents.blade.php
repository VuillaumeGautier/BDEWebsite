<!DOCTYPE html>
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

<?php $i = 0; ?>

<div class="allDivs">
    <div class="space"></div>
    <a href="/ideabox">Poster un événement</a>
    <div class="space"></div>

    <div class="container">
        @foreach($events as $row)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href=<?php echo("/eventPicture".$row['id_events']) ?> class="MakaleYazariAdi"><?php echo $row['name']?> </a>
                    <div class="btn-group" style="float:right;">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <a class="media-object" id="imageevent" href=<?php echo("/eventPicture".$row['id_events']) ?>  > <?php echo("<img class=\"imgEvent\" src=".$row['event_picture_url']."//>"); ?>
                                </a>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"> <?php echo $row['event_date'] ?></h4>
                            <?php echo $row['event_text'] ?>
                            <div class="clearfix"></div>
                            <div class="button">
                                <button type="button" class="btn btn-default"> S'inscrire </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include("layouts.Footer")

</body>
</html>