<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/site.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

@include("layouts.Header")

<div>
    {{$event['name']}}
</div>

<div class="row">
    <div class="col-md-6">
        <img src="/Pictures/events/{{$event['thumbnail']}}" height="300px" width="300px">
    </div>

    <div class="col-md-60">
        {{$event['description']}}
    </div>
</div>


@foreach($photos as $photo)
    <div>
        <img src="/Pictures/photos/{{$photo['path']}}">
        @foreach($photo['comments'] as $comment)
            <div>
                {{$comment['content']}}
            </div>
        @endforeach
    </div>
@endforeach

@include("layouts.Footer")

</body>
</html>