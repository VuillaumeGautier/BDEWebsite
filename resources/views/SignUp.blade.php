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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

@include("layouts.Header")

<form name="signUp" id="signUp" method="POST" action="{{ route('login.post') }}"  onsubmit="return validateForm()" >

    <fieldset>

        <legend>Sign in :</legend>
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email"  name="email" value="{{ old('email') }}" >

        </div>
    </div>


    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password"  name="password">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
        </div>
    </div>

    </fieldset>

</form>

@include("layouts.Footer")

<!--

This is the code of the validation script of the form

-->

<script type="text/javascript">

    function validateForm(){





    }



</script>