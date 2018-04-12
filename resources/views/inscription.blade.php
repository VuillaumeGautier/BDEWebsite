<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">

    <title> Sign in </title>


</head>

<body>

<div class="col-lg-offset-4 col-lg-4 border">

    <form method="post" action="http://bdewebsite/inscription">
        <div class="form-group">

            <label for="Input">Name</label>
            <br>
            <input type="text" class="form-group" id="input" name="name" placeholder="name" required>

        </div>


        <div class="form-group">


            <label for="Input">First Name</label>
            <br>
            <input type="text" class="form-group" id="input" name="fname" placeholder="fname" required>


        </div>
        <div class="form-group">

            <label for="Input">Email</label>
            <br>
            <input type="email" class="form-group" id="input" name="email" placeholder="email" required autocomplete="on">


        </div>


        <div class="form-group">

            <label for="Input">Password</label>
            <br>
            <input type="password" class="form-group" id="input" name="password" placeholder="password" required minlength="8"
                   maxlength="25" autocomplete="on" >


        </div>

        <div class="form-group">

            <label for="Input">Password again</label>
            <br>
            <input type="password" class="form-group" id="input" name="password" placeholder="password" required minlength="8"
                   maxlength="25" autocomplete="on">


        </div>

        <br>

        <div><input value="Sign in" type="submit" class="btn btn-default"></div>



    </form>

</div>


</body>


</html>


