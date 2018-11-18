@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- Filter menu -->
        <div class="col s3 white z-depth-1">
            <form action="/occasions/search" method="POST">
                <!-- CSRF Protection -->
                @csrf
                <!-- Searchbar -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input value="{{ old('searchBar') }}" placeholder="bv. Ford focus" name="searchBar" type="text" class="validate">
                        <label for="icon_prefix2">Zoeken</label>
                    </div>
                </div>
                <!-- Make -->
                <div class="row">
                    <div class="input-field col s12">
                        <input value="{{ old('make') }}" placeholder="bv. Opel" name="make" type="text" class="validate">
                        <label for="make">Merk</label>
                    </div>
                </div>
                <!-- Color -->
                <div class="row">
                    <div class="input-field col s12">
                        <input value="{{ old('color') }}" placeholder="bv. Groen" name="color" type="text" class="validate">
                        <label for="color">Kleur</label>
                    </div>
                </div>
                <!-- Year -->
                <div class="row">
                    <div class="input-field col s12">
                        <input value="{{ old('year') }}" placeholder="bv. 2004" name="year" type="number" min="1900" max="2100" class="validate">
                        <label for="year">Bouwjaar</label>
                    </div>
                </div>
                <!-- Transmission type -->
                <div class="row">
                    <div class="col s12">
                        <label>
                            <input {{ (old('transmission') == 'on') ? "checked" : "" }} id="transmission" name="transmission" type="checkbox" class="filled-in"/>
                            <span>Alleen Automaat</span>
                        </label>
                    </div>
                </div>
                <!-- Price range -->
                <div class="row">
                    <div class="col s12">
                        <h5>Prijs</h5>
                        <div class="col s5">
                            <input value="{{ old('priceMin') }}" placeholder="Min" name="priceMin" type="number" class="validate">
                        </div>
                        <h5 class="col s2 center"> - </h5>
                        <div class="col s5">
                            <input value="{{ old('priceMax') }}" placeholder="Max" name="priceMax" type="number" class="validate">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- submit button -->
                    <div class="col s12">
                        <div class="center">
                            <button class="waves-effect waves-light btn-large amber col s12" type="submit" name="submit">Zoeken
                                <i class="material-icons right">search</i>
                            </button>
                        </div>
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
                            @foreach($image = json_decode($occasion->image_name) as $image)
                                <img src="/storage/car_images/{{$image}}" class="responsive-img z-depth-1">
                                @break
                            @endforeach
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
                                    <h5>{{ ($occasion->price > 0) ? "Prijs: € ".number_format($occasion->price, 0, '', '.') : "Verkocht"}}</h5><br><br>
                                    <a href="/occasions/{{$occasion->id}}" class="waves-effect waves-light btn-small amber"><i class="material-icons left">menu</i>Meer informatie</a>
                                @if(!Auth::guest())
                                    <!-- toggle favorite as user -->
                                    <form action="/occasions/favorite" method="POST">
                                        <!-- CSRF Protection -->
                                        @csrf
                                        <br>
                                        <label>
                                            <!-- check box that represents favorite status -->
                                            <input @if(in_array($occasion->id, json_decode(auth()->user()->favorites))) checked @endif id="favoriteCarId" type="checkbox" class="filled-in" onChange="this.form.submit()"/>
                                            <span>Favoriet</span>
                                        </label>
                                        <!-- send car id -->
                                        <input type="hidden" name="favoriteCarId" value="{{$occasion->id}}">
                                    </form>
                                @endif
                                </div>
                            </div>        
                        </div>
                    </div>  
                </li>
                @endforeach
                @else
                <li class="collection-item">
                    <div class="row">
                        <div class="col s12">
                            <h4>Geen zoekresulaten</h4>
                            <hr>
                            <h3>Helaas, Uw zoekopdracht heeft geen resultaten opgeleverd</h3>
                            <h5>Probeer het nog een keer met andere zoektermen</h5>
                        </div>
                    </div>
                </li>
                @endif
                {{$occasions->links()}}
            </ul>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/forms.js') !!}"></script>
@stop