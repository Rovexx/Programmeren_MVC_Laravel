@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col s10 offset-s1 white z-depth-1">
            <h3 class="bold">{{auth()->user()->name}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s10 offset-s1 white z-depth-1">
            <div class="row">
                <div class="col s3">
                    <img class="responsive-img" src="{{ asset('images/default_profile.png') }}">
                </div>
                <div class="col s9">
                    <div class="row">
                        <div class="col s6">
                            <!-- personal info -->
                            <div class="row">
                                <br>
                                <div class="col s6 thin">
                                    <h5>Naam:</h5>
                                    <h5>E-mail:</h5>
                                    <br>
                                    <h5>Wachtwoord veranderen:</h5>
                                </div>
                                <div class="col s6 normal">
                                    <h5>{{auth()->user()->name}}</h5>
                                    <h5>{{auth()->user()->email}}</h5>
                                    <br>
                                    <a class="btn amber" href="{{ route('password.request') }}">Aanpassen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <br>
                            <!-- change personal info -->
                            <form action="{{ action('UsersController@update') }}" method="POST">
                                <!-- CSRF Protection -->
                                @csrf
                                <!-- PUT method instead of POST for the update request -->
                                <input name="_method" type="hidden" value="PUT">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="input-field col s12">
                                        <input value="{{auth()->user()->name}}" placeholder="Voor en Achternaam" name="name" type="text" class="validate">
                                        <label for="name">Volledige naam</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- E-mail -->
                                    <div class="input-field col s12">
                                        <input value="{{auth()->user()->email}}" placeholder="E-mail" name="email" type="email" class="validate">
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <!-- submit button -->
                                    <div class="col s12">
                                        <button class="waves-effect waves-light btn-large amber col s12" type="submit" name="submit">Bijwerken
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop