@extends('layouts.app')

@section('content')
    <div class="row center">
        <H1>Registreer</H1>
        <h5>Vul de juiste gegevens in</h5>
    </div>
    <div class="row">
        <div class="col s6 offset-s3 z-depth-1">
            <br><br>
            <form action="{{ route('register') }}" method="POST">
                <!-- CSRF protection -->
                @csrf
                <!-- Name -->
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" name="name" type="text" class="validate form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
                        <label for="Name">{{ __('Name') }}</label>
                    </div>
                </div>
                <!-- E-mail address -->
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                        <label for="E-mail">{{ __('E-Mail Address') }}</label>
                    </div>
                </div>
                <!-- Password -->
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">enhanced_encryption</i>
                        <input id="password" name="password" type="password" class="validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                        <label for="wachtwoord">{{ __('Password') }}</label>
                    </div>
                </div>
                <!-- Password confirm -->
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">https</i>
                        <input id="password-confirm" name="password_confirmation" type="password" class="validate" required>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    </div>
                </div>
                <!-- submit -->
                <div class="row">
                    <div class="col s6 offset-s3">
                        <button class="col s12 btn waves-effect waves-light amber" type="submit" name="submit">{{ __('Register') }}
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection
