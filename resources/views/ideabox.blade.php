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

<form method="POST">
    {{ csrf_field() }}
    <label>Nom</label> : <input type="Nom" name="Nom" /><br />
    <label>Date</label> : <input type="Date" name="Date" /><br />
    <label>Description</label> : <input type="Description" name="Description" /><br />
    <input type="submit" value="Envoyer" />
</form>

@include("layouts.Footer")
</body>