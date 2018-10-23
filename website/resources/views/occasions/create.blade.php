@extends('layouts.master')

@section('content')
    <div class="row center">
        <H1>Nieuwe auto aan occasion toevoegen</H1>
        <h5>Vul de juiste gegevens in</h5>
    </div>
    <div class="row">
        <div class="col s8 offset-s2 z-depth-1">
            <br><br>
            <form class="col s12 white" action="{{ action('OccasionsController@store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="bv. Ferrari" name="make" type="text" class="validate">
                        <label for="make">Merk</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="bv. 458 Italia" name="model" type="text" class="validate">
                        <label for="model">Model</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s3">
                        <input placeholder="bv. Groen" name="color" type="text" class="validate">
                        <label for="color">Kleur</label>
                    </div>
                    <div class="input-field col s3">
                        <input placeholder="bv. 2004" name="year" type="number" min="1900" max="2100" class="validate">
                        <label for="year">Bouwjaar</label>
                    </div>
                    <div class="input-field col s3">
                            <input placeholder="bv. 114000" name="mileage" type="number" class="validate">
                            <label for="mileage">Kilometerstand</label>
                    </div>
                    <div class="input-field col s3">
                        <select name="fuel">
                            <option value="" disabled selected>Kies type</option>
                            <option value="diesel">Diesel</option>
                            <option value="benzine">Benzine</option>
                        </select>
                        <label for="fuel">Benzine type</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s3">
                        <select name="doors">
                            <option value="" disabled selected>Kies aantal</option>
                            <option value="2">2 Deurs</option>
                            <option value="3">3 Deurs</option>
                            <option value="4">4 Deurs</option>
                            <option value="5">5 Deurs</option>
                            <option value="6">6 Deurs</option>
                            <option value="7">7 Deurs</option>
                        </select>
                        <label for="doors">Aantal Deuren</label>
                    </div>
                    <div class="input-field col s3">
                        <input placeholder="bv. 2.3" name="engineCapacity" type="number" step="0.1" class="validate">
                        <label for="engineCapacity">Motor inhoud</label>
                    </div>
                    <div class="input-field col s3">
                            <input placeholder="bv. 1200" name="weight" type="number" class="validate">
                            <label for="weight">Gewicht</label>
                    </div>

                    <div class="input-field col s2">
                        <select id="1" name="transmission">
                            <option value="" disabled selected>Kies soort</option>
                            <option value="automaat">Automaat</option>
                            <option value="semi-automaat">Semi-automaat</option>
                            <option value="handgeschakeld">handgeschakeld</option>
                        </select>
                        <label for="transmission">Versnellingsbak</label>
                    </div>
                    <div class="input-field col s1">
                        <select id="2" name="gears">
                            <option value="" disabled selected></option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <label for="gears">Versnellingen</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s2">
                            <input placeholder="bv. 80-ZP-LT" name="plate" type="text" class="validate">
                            <label for="plate">Kenteken</label>
                    </div>
                    <div class="input-field col s2 offset-s4">
                            <input placeholder="bv. 256000" name="price" type="number" class="validate">
                            <label for="price">Prijs</label>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="center">
                        <button class="btn waves-effect waves-light yellow darken-2 z-depth-1" type="submit" name="submit">Add
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/materialize.js') !!}"></script>
@stop