@extends('layouts.app')

@section('content')
<div class="row center">
    <H1>{{ __('Reset Password') }}</H1>
    <h5>Vul de juiste gegevens in</h5>
</div>
<div class="row">
    <div class="col s6 offset-s3 z-depth-1">
        <br><br>
        <form action="{{ route('password.email') }}" method="POST">
            <!-- CSRF protection -->
            @csrf
            <!-- E-mail address -->
            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <i class="material-icons prefix">email</i>
                    <input id="email" name="email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                    <label for="E-mail">{{ __('E-Mail Address') }}</label>
                </div>
            </div>
            <!-- submit -->
            <div class="row">
                <div class="col s6 offset-s3">
                    <button class="col s12 btn waves-effect waves-light amber" type="submit" name="submit">{{ __('Send Password Reset Link') }}
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection
