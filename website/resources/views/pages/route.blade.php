@extends('layouts.app')

@section('content')
    <div class="row">
        <br>
        <div class="col s10 offset-s1 z-depth-1 white">
            <h3 class="bold center">Route</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s10 offset-s1 z-index-1 white">
            <div class="col s6">
                <h5 class="bold">Afrit 26 vanaf Gorinchem</h5><br>
                <h6 class="flow-text">Als u op rijksweg A15/E31 komend vanuit de richting Gorinchem afrit 26 naar Hardinxveld-Giessendam/Giessenburg neemt, 
                    dan bevindt u zich aan het einde van de afrit al op de Nieuweweg.<br>
                    Sla onder aan de afslag rechtsaf. Na ± 500m vindt u de autohandel aan uw linkerzijde.
                </h6>
                <br>
                <hr>
                <br>
                <h5 class="bold">Afrit 26 vanaf Rotterdam</h5>
                <h6 class="flow-text">Als u op rijksweg A15/E31 komend vanuit de richting Rotterdam afrit 26 naar Hardinxveld-Giessendam/Giessenburg neemt, 
                    dan bevindt u zich aan het einde van de afrit al op de Nieuweweg.<br>
                    Sla vervolgens onder aan de afslag linkssaf. Na ± 500m vindt u de autohandel aan uw linkerzijde.<br>
                    Afrit 25 (Hardinxveld-Giessendam west/Sliedrecht oost) vanaf Gorinchem
                    Aan het einde van de afslag komt u op een rotonde.<br>
                    Neem hier de eerste afslag.  zie verder (*)
                </h6>
                <br>
                <hr>
                <br>
                <h5 class="bold">Afrit 25 (Hardinxveld-Giessendam west/Sliedrecht oost) vanaf Rotterdam</h5>
                <h6 class="flow-text">Ga aan het einde van de afslag (verkeerslichten) linksaf;<br>
                    het viaduct over en bij de verkeerslichten rechtsaf. U komt dan op een rotonde, waarvan u de tweede afslag neemt (rechtdoor).<br>
                    U bevindt zich nu op de Peulenlaan.<br>
                    Rij ongeveer 3km rechtdoor tot de verkeerslichten en sla daar  linksaf.<br>
                    U bevindt zich dan op de Nieuweweg. Na ±400 m vindt u de autohandel aan uw linkerzijde.
                </h6>
                <br>
            </div>
            <br>
            <div class="col s6">
                @include('inc.maps')
            </div>
        </div>
    </div>
@stop