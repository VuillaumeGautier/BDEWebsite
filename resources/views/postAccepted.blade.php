@extends('template')
@section('head')
    <link rel="stylesheet" href="/../../assets/css/styleEvent.css">
@endsection
@section('sousimage')
    <div class="space"></div>
    <h1>Evénement créé avec succès !</h1>
    <div class="space"></div>
    <div class="DivEvent">

        <h1><?php echo $event['event_title']?></h1>
        <div class="description">

            <?php echo("<img class=\"imgEvent\" src=".$event['event_picture_url']."//>"); ?>









            <p class="textEvent">
                <?php echo $event['event_text'] ?>
            </p>
            <br/><?php echo $event['event_date'] ?>
        </div>
    </div>
    <div class="space"></div>

@endsection