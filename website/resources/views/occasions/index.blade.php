@extends('layouts.master')

@section('content')
    <main class="grey lighten-5">
        <div class="row">
            <!-- Filter menu -->
            <div class="col s3">
                <form class="" action="/occasion/list-occasions">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="make" type="text">
                            <label for="make">Merk</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="model" type="text">
                            <label for="model">Model</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="color" type="text" >
                            <label for="color">Kleur</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="year" type="text">
                            <label for="year">Bouwjaar</label>
                        </div>
                    </div>

                    <!-- submit button -->
                    <div class="row">
                        <div class="center">
                            <button class="btn waves-effect waves-light yellow darken-2 z-depth-1" type="submit" name="submit">Add
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            
            <!-- Car listings -->
            <div class="col s9 right">
                <ul class="collection">
                    <!-- list of cars -->
                    @if(count($occasions) > 0)
                        @foreach($occasions as $occasion)
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s3">
                                <img src="{{ asset('images/Auto (1).jpg') }}" class="responsive-img z-depth-1">
                            </div>
                            <div class="col s9">
                                <div class="row">
                                    <h5 class="post_Title">{{$occasion->make}}</h5>
                                    <hr>
                                    <div class="col s2 attributes">
                                        <h8>Model:</h8><br>
                                        <h8>Kleur:</h8><br>
                                        <h8>Bouwjaar:</h8><br>
                                        <h8>Kilometerstand:</h8><br>
                                        <h8>Benzine soort:</h8><br>
                                    </div>
                                    <div class="col s2">
                                        <h8>{{$occasion->model}}</h8><br>
                                        <h8>{{$occasion->color}}</h8><br>
                                        <h8>{{$occasion->year}}</h8><br>
                                        <h8>{{$occasion->mileage}}Km</h8><br>
                                        <h8>{{$occasion->fuel}}</h8><br>
                                    </div>

                                    <div class="col s2 attributes">
                                        <h8>Aantal deuren:</h8><br>
                                        <h8>Motorinhoud:</h8><br>
                                        <h8>Gewicht:</h8><br>
                                        <h8>Versnellingsbak:</h8><br>
                                        <h8>Kenteken:</h8><br>
                                    </div>
                                    <div class="col s2">
                                        <h8>{{$occasion->doors}}</h8><br>
                                        <h8>{{$occasion->engineCapacity}}L</h8><br>
                                        <h8>{{$occasion->weight}}Kg</h8><br>
                                        <h8>{{$occasion->transmission}} {{$occasion->gears}}</h8><br>
                                        <h8>{{$occasion->plate}}</h8><br>
                                    </div>
                                    <div class="col s4">
                                        <h5>Prijs: €{{$occasion->price}}</h5><br>
                                        <a href="/occasions/{{$occasion->id}}" class="waves-effect waves-light btn-small amber"><i class="material-icons left">menu</i>Meer informatie</a>
                                    </div>     
                                </div>        
                            </div>
                        </div>  
                    </li>
                    @endforeach
                    {{ $occasions->links() }}
                    @else
                        <li>Geen occasions</li>
                    @endif
                </ul>
            </div>
        </div>
    </main>
@stop

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/materialize.js') !!}"></script>
@stop