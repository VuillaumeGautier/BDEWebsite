<!-- Code by Nicolas JEROME

    nicolas.jerome1@viacesi.fr

 This is the code of the form for the connexion of the users to they account

 -->

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
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

            <form name="signUp" id="signUp" method="POST" action="{{ route('login.post') }}"  onsubmit="return validateForm()" >


                        @csrf

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



                    <div class="form-group row mb-0">



                        <div class="form-group ">


                            <button id="button" type="submit" class="btn btn-primary">

                                {{ __('Login') }}


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

<script type="text/javascript">

    function validateForm(){

        var x = document.getElementById("email").value;
        if (x == "") {
            alert("Email must be filled out");
            return false;
        }



        var x = document.getElementById("password").value;

        if (x == 0) {
            alert("Password must be filled out");
            return false;

        }



    }



</script>