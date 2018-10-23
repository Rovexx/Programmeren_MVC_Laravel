@extends('layouts.master')

@section('content')
    <div class="row center">
        <H1>Data wijzigen voor {{$occasion->make}} {{$occasion->model}}</H1>
        <h5>Vul de juiste gegevens in</h5>
    </div>
    <div class="row">
        <div class="col s8 offset-s2 z-depth-1">
            <br><br>
            <form class="col s12 white" action="{{ action('OccasionsController@update', $occasion->id) }}" method="POST">
                <!-- CSRF Protection -->
                @csrf
                <!-- PUT method instead of POST for the update request -->
                <input name="_method" type="hidden" value="PUT">
                <div class="row">
                    <div class="input-field col s6">
                    <input value="{{$occasion->make}}" placeholder="bv. Ferrari" name="make" type="text" class="validate">
                        <label for="make">Merk</label>
                    </div>
                    <div class="input-field col s6">
                        <input value="{{$occasion->model}}" placeholder="bv. 458 Italia" name="model" type="text" class="validate">
                        <label for="model">Model</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s3">
                        <input value="{{$occasion->color}}" placeholder="bv. Groen" name="color" type="text" class="validate">
                        <label for="color">Kleur</label>
                    </div>
                    <div class="input-field col s3">
                        <input value="{{$occasion->year}}" placeholder="bv. 2004" name="year" type="number" min="1900" max="2100" class="validate">
                        <label for="year">Bouwjaar</label>
                    </div>
                    <div class="input-field col s3">
                        <input value="{{$occasion->mileage}}" placeholder="bv. 114000" name="mileage" type="number" class="validate">
                        <label for="mileage">Kilometerstand</label>
                    </div>
                    <div class="input-field col s3">
                        <select id="fuel" name="fuel">
                            <option value="" disabled selected>Kies type</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Benzine">Benzine</option>
                        </select>
                        <label for="fuel">Benzine type</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s3">
                        <select id="doors" name="doors">
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
                        <input value="{{$occasion->engineCapacity}}" placeholder="bv. 2.3" name="engineCapacity" type="number" step="0.1" class="validate">
                        <label for="engineCapacity">Motor inhoud</label>
                    </div>
                    <div class="input-field col s3">
                        <input value="{{$occasion->weight}}" placeholder="bv. 1200" name="weight" type="number" class="validate">
                        <label for="weight">Gewicht</label>
                    </div>

                    <div class="input-field col s2">
                        <select id="transmission" name="transmission">
                            <option value="" disabled selected>Kies soort</option>
                            <option value="Automaat">Automaat</option>
                            <option value="Semi-automaat">Semi-automaat</option>
                            <option value="Handgeschakeld">handgeschakeld</option>
                        </select>
                        <label for="transmission">Versnellingsbak</label>
                    </div>
                    <div class="input-field col s1">
                        <select id="gears" name="gears">
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
                        <input value="{{$occasion->plate}}" placeholder="bv. 80-ZP-LT" name="plate" type="text" class="validate">
                        <label for="plate">Kenteken</label>
                    </div>
                    <div class="input-field col s2 offset-s4">
                        <input value="{{$occasion->price}}" placeholder="bv. 256000" name="price" type="number" class="validate">
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
    <script>
        // prefill existing select menus on update page
        $('#fuel').val('{{$occasion->fuel}}');
        $('#fuel').formSelect();

        $('#doors').val({{$occasion->doors}});
        $('#doors').formSelect();

        $('#transmission').val('{{$occasion->transmission}}');
        $('#transmission').formSelect();

        $('#gears').val({{$occasion->gears}});
        $('#gears').formSelect();
    </script>
@stop