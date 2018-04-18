<!-- Code by Nicolas JEROME

    nicolas.jerome1@viacesi.fr

 This is the code of the form for the Sign in of the users

 -->



<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/form.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

@include("layouts.Header")


<div class="container">
    <div class="row main">
        <div class="main-login main-center">

            <form name="SignIn" method="POST" action="{{ route('inscription.post') }}" onsubmit="return validateForm()">



                @csrf

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="fname" class="cols-sm-2 control-label">Your First Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter your First Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password-confirm" id="password-confirm"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">

                        <button id="button" type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>


                    </div>
                </div>

            </form>

        </div>

    </div>

</div>

@include("layouts.Footer")


<!--

This is the code of the validation script of the form

-->

<script  type="text/javascript">

    function validateForm() {


        var x = document.getElementById("name").value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }

        var x = document.getElementById("fname").value;
        if (x == "") {
            alert("First name must be filled out");
            return false;
        }

        var x = document.getElementById("email").value;
        if (x == "") {
            alert("Email must be filled out");
            return false;
        }



        var x = document.getElementById("password").value;
        var y = document.getElementById("password-confirm").value;

        if (x == 0) {
            alert("Passwords must be filled out");
            return false;

        }

        if (x != y) {
            alert("Passwords not the same");
            return false;
        }


        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(document.getElementById("password").value.match(lowerCaseLetters)) {

        } else {

            alert("Password need a lowercase letter");
            return false;

        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(document.getElementById("password").value.match(upperCaseLetters)) {

        } else {

            alert("Password need a capital letter");
            return false;
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(document.getElementById("password").value.match(numbers)) {

        } else {

            alert("Passwords need a number");
            return false;
        }

        // Validate length
        if(document.getElementById("password").value.length >= 8) {

        } else {

            alert("Passwords need to be higher than 8 characters");
            return false;

        }



    }


</script>