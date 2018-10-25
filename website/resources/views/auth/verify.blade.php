@extends('layouts.app')

@section('content')
<div class="row center">
    <H1>{{ __('Verify Your Email Address') }}</H1>
    <h5>Vul de juiste gegevens in</h5>
</div>
<div class="row">
    <div class="col s6 offset-s3 z-depth-1">
        <br><br>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        <br>
    </div>
</div>
@endsection