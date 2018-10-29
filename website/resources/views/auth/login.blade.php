@extends('layouts.app')

@section('content')
    <div class="row center">
        <H1>Log in</H1>
        <h5>Vul de juiste gegevens in</h5>
    </div>
    <div class="row">
        <div class="col s6 offset-s3 z-depth-1">
            <br><br>
            <form action="{{ route('login') }}" method="POST">
                <!-- CSRF protection -->
                @csrf
                <!-- E-mail address -->
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                    </div>
                </div>
                <!-- Password -->
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">https</i>
                        <input id="password" name="password" type="password" class="validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                        <label for="password">{{ __('Password') }}</label>
                    </div>
                </div>
                <!-- remember me -->
                <div class="row">
                    <div class="col s10 offset-s1">
                        <label for="remember" class="rememberMe">
                            <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} class="filled-in"/>
                            <span>{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <!-- submit -->
                    <div class="col s6 offset-s3">
                        <button class="col s12 btn waves-effect waves-light amber" type="submit" name="submit">{{ __('Login') }}
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <br><br>
                    <!-- forgot password -->
                    <div class="col s6 offset-s3">
                        <a class="grey-text" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection