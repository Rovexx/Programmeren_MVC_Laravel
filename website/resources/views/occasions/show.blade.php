@extends('layouts.app')

@section('content')
    <div class="row white z-depth-1">
        <div class="col s12 center">
            <h2>{{$occasion->make}} {{$occasion->model}}</h2>
        </div>
        
        <div class="col s2 offset-s1">
            <!-- back button -->
            <a href="/occasions" class="waves-effect waves-light btn-large amber col s12"><i class="material-icons left">arrow_back</i>Terug</a>
        </div>
        <div class="col s8">
            <div class="col s2">
                <h6 class="thin">Prijs</h6>
                <h6 class="bold">{{ ($occasion->price > 0) ? "€ $occasion->price" : "Verkocht" }}</h6>
            </div>
            <div class="col s2">
                <h6 class="thin">Kilometerstand</h6>
                <h6 class="bold">{{$occasion->mileage}}KM</h6>
            </div>
            <div class="col s2">
                <h6 class="thin">Bouwjaar</h6>
                <h6 class="bold">{{$occasion->year}}</h6>
            </div>
            <div class="col s2">
                <h6 class="thin">Brandstof</h6>
                <h6 class="bold">{{$occasion->fuel}}</h6>
            </div>
            <div class="col s2">
                <h6 class="thin">Versnellingsbak</h6>
                <h6 class="bold">{{$occasion->transmission}} {{$occasion->gears}}</h6>
            </div>
            <div class="col s2">
                <h6 class="thin">Kleur</h6>
                <h6 class="bold">{{$occasion->color}}</h6>
                <br>
            </div>
        </div>
        <!-- buttons voor admin -->
@if(!Auth::guest())
    @if(Auth::user()->id == 1)
        <div class="row">
            <div class="col s12">
                <hr>
                <h6 class="bold center">Advertentie instellingen</h6>
                <br>
            </div>
            <!-- edit button -->
            <div class="col s2 offset-s4">
                <a href="/occasions/{{$occasion->id}}/edit" class="waves-effect waves-light btn-large green col s12"><i class="material-icons left col s2">edit</i>Bijwerken</a>
            </div>
            <!-- delete button -->
            <div class="col s2">
                <form action="{{ action('OccasionsController@destroy', $occasion->id) }}" method="POST">
                    <!-- CSRF Protection -->
                    @csrf
                    <!-- DELETE method instead of POST for the update request -->
                    <input name="_method" type="hidden" value="DELETE">                
                    <button class="waves-effect waves-light btn-large red col s12" type="submit" name="submit">Verwijderen
                        <i class="material-icons right">delete</i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Advertisement active status -->
        <div class="row">
            <!-- toggle occasion status -->
            <div class="switch col s2 offset-s5 center">
                <form action="{{ action('OccasionsController@changeStatus', $occasion->id) }}" method="POST">
                    <!-- CSRF Protection -->
                    @csrf
                    <label>
                        Onbeschikbaar
                        <input {{ ($occasion->price > 0) ? "checked" : "" }} type="checkbox" name="status" onChange="this.form.submit()">
                        <span class="lever"></span>
                        Beschikbaar
                    </label>
                    <!-- send ID -->
                    <input type="hidden" name="id" value="{{$occasion->id}}">
                </form>
            </div>
        </div>
    @endif
@endif
    </div>
    <div class="row">
        <!-- Photos -->
        <div class="slider col s4 offset-s1 white z-depth-1">
            <ul class="slides">
                <!-- list of cars -->
                @foreach($image = json_decode($occasion->image_name) as $image)
                <li class="collection-item">
                    <img src="/storage/car_images/{{$image}}" class="materialboxed img-responsive responsive-img">
                </li>
                @endforeach
            </ul><br>
        </div>
        <div class="col s5 offset-s1">
            <div class="row">
                <div class="col s3 thin">
                    <h5>Model:</h5>
                    <h5>Kleur:</h5>
                    <h5>Bouwjaar:</h5>
                    <h5>Kilometerstand:</h5>
                    <h5>Benzine soort:</h5>
                    <h5>Aantal deuren:</h5>
                    <h5>Motorinhoud:</h5>
                    <h5>Gewicht:</h5>
                    <h5>Versnellingsbak:</h5>
                    <h5>Kenteken:</h5>
                </div>
                <div class="col s4 normal">
                    <h5>{{$occasion->model}}</h5>
                    <h5>{{$occasion->color}}</h5>
                    <h5>{{$occasion->year}}</h5>
                    <h5>{{$occasion->mileage}}Km</h5>
                    <h5>{{$occasion->fuel}}</h5>
                    <h5>{{$occasion->doors}}</h5>
                    <h5>{{$occasion->engineCapacity}}L</h5>
                    <h5>{{$occasion->weight}}Kg</h5>
                    <h5>{{$occasion->transmission}} {{$occasion->gears}}</h5>
                    <h5>{{$occasion->plate}}</h5>
                </div>
                <div class="col s5">
                    <h5>Extra's</h5>
                    <h5>{{$occasion->extras}}</h5>
                </div>       
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script >
        // Initialize photo slider
        $(document).ready(function(){
            $('.slider').slider({
                fullwidth: true,
                height: 500,
                interval: 5000
            });
        });
        // Initialize enlarge image function
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
    </script>
@stop