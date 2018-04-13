<?php

?>

<form name="SignIn" method="POST" action="{{ route('inscription.post') }}" onsubmit="return validateForm()">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text"  name="name" value="{{ old('name') }}" >

        </div>
    </div>


    <div class="form-group row">
        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

        <div class="col-md-6">
            <input id="fname" type="text"  name="fname" value="{{ old('fname') }}" >

        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="mail" type="mail"  name="mail" value="{{ old('email') }}" >

        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password"  name="password">
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm"  type="password" name="password_confirmation">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>


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

        var x = document.forms("email").value;
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


    }


</script>