<form method="POST">
    {{ csrf_field() }}
    <label>Nom</label> : <input type="Nom" name="Nom" /><br />
    <label>Date</label> : <input type="Date" name="Date" /><br />
    <label>Description</label> : <input type="Description" name="Description" /><br />
    <input type="submit" value="Envoyer" />
</form>