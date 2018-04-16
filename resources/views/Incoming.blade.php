<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleEvent.css">
    <link rel="stylesheet" href="css/site.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script rel="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script rel="text/javascript" src="js/bootstrap.min.js"></script>
    <script rel="text/javascript" src="js/activity.js"></script>

</head>

<body>

@include("layouts.Header")


    <?php $i = 0; ?>

    <div class="allDivs">
        <div class="space"></div>
        <a href="/ideabox">Poster un événement</a>
        <div class="space"></div>

        @foreach($events as $row)

            <div class="DivEvent">

                <h1><?php echo $row['event_title']?></h1>
                <div class="description">
                    <ul id=<?php echo("\"".$i."\"") ?>>
                        <li class="listeEvent"><?php echo("<img class=\"imgEvent\" src=".$row['event_picture_url']."//>"); ?>
                            <div class="divButton">
                                <div class="like">12</div>
                                <button class="likeButton"><img src="/assets/img/Like.png" class="imgLike"></button></div></li>
                        @foreach($images as $image)

                            @if($image['id_event'] == $row['id_event'])
                                <li class="listeEvent"><?php echo("<img class=\"imgEvent\" src=".$image['picture_url']."//>"); ?>
                                    <div class="divButton">
                                        <div class="like">12</div>
                                        <button class="likeButton"><img src="/assets/img/Like.png" class="imgLike"></button></div></li>
                            @endif

                            <?php $i++ ?>
                        @endforeach
                    </ul>

                    <p>
                        <?php echo $row['event_text'] ?>
                    </p>
                    <br/><?php echo $row['event_date'] ?>
                </div>
            </div>
            <div class="space"></div>
        @endforeach
    </div>

@endsection



@include("layouts.Footer")
</body>
</html>