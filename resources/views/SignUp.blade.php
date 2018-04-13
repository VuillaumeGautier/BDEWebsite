<?php

?>
<form name="signUp" id="signUp" method="POST" action="{{ route('login.post') }}"  onsubmit="return validateForm()" >


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
</form>

<script type="text/javascript">

    function validateForm{





    }



</script>