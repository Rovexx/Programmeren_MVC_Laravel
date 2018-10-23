@extends('layouts.master')

@section('content')
    <main class="grey lighten-5">
        <div class="row">
            <div class="col s2">
                <h2>{{$occasion->make}}</h2>
            </div>
        </div>
        <!-- back button -->
        <a href="/occasions" class="waves-effect waves-light btn-small amber"><i class="material-icons left">arrow_back</i>Terug</a>
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
    </main>
@stop