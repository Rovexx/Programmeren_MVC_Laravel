@extends('layouts.master')

@section('content')
    <main class="grey lighten-5">
        <div class="row">
            <div class="col s2">
                <h2>{{$occasion->make}}</h2>
            </div>
        </div>
        <a href="/occasions" class="waves-effect waves-light btn-small amber"><i class="material-icons left">arrow_back</i>Terug</a>
    </main>
@stop