<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Suggestion Box</title>
</head>

<body>

<form method="POST" action="ListEvent.blade.php">
    <label>Nom</label> : <input type="varchar" name="nom" /><br />
    <label>Durée</label> : <input type="text" name="duree"  /><br />
    <label>Prix</label> : <input type="double" min="0" name="prix"  /><br />
    <label>Lieu</label> : <input type="text" name="lieu"  /><br />
    <label>Date</label> : <input type="text" name="date" /><br />
    <label>Description</label> : <input type="text" name="description" /><br />
    <input type="submit" value="Envoyer" />

</form>

</body>
</html>