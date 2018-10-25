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
                <h6 class="bold">€{{$occasion->price}}</h6>
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
    </div>

    <!-- buttons voor admin -->
    @if(!Auth::guest())
        @if(Auth::user()->id == 1)
        <!-- edit button -->
        <a href="/occasions/{{$occasion->id}}/edit" class="waves-effect waves-light btn-small amber"><i class="material-icons left">edit</i>Bijwerken</a>
        <!-- delete button -->
        <form class="" action="{{ action('OccasionsController@destroy', $occasion->id) }}" method="POST">
            <!-- CSRF Protection -->
            @csrf
            <!-- DELETE method instead of POST for the update request -->
            <input name="_method" type="hidden" value="DELETE">                
            <button class="waves-effect waves-light btn-small amber" type="submit" name="submit">Verwijderen
                <i class="material-icons right">delete</i>
            </button>
        </form>
        @endif
    @endif
@stop