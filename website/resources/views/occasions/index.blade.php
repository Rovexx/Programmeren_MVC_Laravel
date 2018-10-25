@extends('layouts.app')

@section('content')
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
                                <div class="col s2 thin">
                                    <h6>Model:</h6>
                                    <h6>Kleur:</h6>
                                    <h6>Bouwjaar:</h6>
                                    <h6>Kilometerstand:</h6>
                                    <h6>Benzine soort:</h6>
                                </div>
                                <div class="col s2 normal">
                                    <h6>{{$occasion->model}}</h6>
                                    <h6>{{$occasion->color}}</h6>
                                    <h6>{{$occasion->year}}</h6>
                                    <h6>{{$occasion->mileage}}Km</h6>
                                    <h6>{{$occasion->fuel}}</h6>
                                </div>

                                <div class="col s2 thin">
                                    <h6>Aantal deuren:</h6>
                                    <h6>Motorinhoud:</h6>
                                    <h6>Gewicht:</h6>
                                    <h6>Versnellingsbak:</h6>
                                    <h6>Kenteken:</h6>
                                </div>
                                <div class="col s2 normal">
                                    <h6>{{$occasion->doors}}</h6>
                                    <h6>{{$occasion->engineCapacity}}L</h6>
                                    <h6>{{$occasion->weight}}Kg</h6>
                                    <h6>{{$occasion->transmission}} {{$occasion->gears}}</h6>
                                    <h6>{{$occasion->plate}}</h6>
                                </div>
                                <div class="col s4 thin">
                                    <h5>Prijs: €{{$occasion->price}}</h5><br><br>
                                    <a href="/occasions/{{$occasion->id}}" class="waves-effect waves-light btn-small amber"><i class="material-icons left">menu</i>Meer informatie</a>
                                </div>
                            </div>        
                        </div>
                    </div>  
                </li>
                @endforeach
                {{ $occasions->links() }}
                @else
                    <li><h6>Geen occasions</h6></li>
                @endif
            </ul>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/materialize.js') !!}"></script>
@stop