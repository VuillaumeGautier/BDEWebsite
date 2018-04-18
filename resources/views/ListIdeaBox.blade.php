<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

</head>

<body>
@include("layouts.Header")

<h1>Proposed Events</h1>
<div class="Proposed">

<ul>
    @foreach($ideas as $idea)
        <li>
            <div>{{ $idea ->name}}</div>
            <div>{{ $idea ->proposed_date}}</div>
            <div>{{ $idea ->thumbnail}}</div>
            <div>{{ $idea ->id_users}}</div>
            <div>{{ $idea->description}}</div>
            <form action="/idea/vote" method="post">
                {{ csrf_field()}}
                <input name="id" value = "{{$idea['id_proposed_events']}}" type="hidden">
                <button type="submit"
                        @if($idea['voted'] == true)
                        disabled
                        @endif
                        id="buttonIns" class="btn btn-default"> Voter </button>
            </form>

        </li>
    @endforeach
</ul>
</div>

<a href='http://bdewebsite/ideabox' >
    <input type="button" value="Propose your Event"/>
</a>

<a href='http://bdewebsite'/>
    <input type="button" value="BACK"/>
</a>

@include("layouts.Footer")
</body>