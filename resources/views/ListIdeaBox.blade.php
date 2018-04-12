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

<div class="Proposed">
<h1>Proposed Events</h1>

<ul>
    @foreach($idees as $idee)
        <div>{{ $idee ->name}}</div>
        <div>{{ $idee ->proposed_date}}</div>
        <div>{{ $idee ->thumbnail}}</div>
        <div>{{ $idee ->id_users}}</div>
        <div>{{ $idee ->description}}</div>
</ul>

    @endforeach
</div>

<form>
    <input type="button" value="Propose your Event" onclick="window.location.href='http://bdewebsite/ideabox'" />
</form>

@include("layouts.Footer")
</body>