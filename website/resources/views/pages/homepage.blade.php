@extends('layouts.app')

@section('content')
    <!-- transparant background for parallax -->
    <style>main {background-color: #ffffff00;}</style>
    <!-- Parallax photo 1 -->
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('images/Parallax (1).jpg') }}"></div>
    </div>
    <!-- Text segment -->
    <div class="row">
        <div class="col s10 offset-s1">
            <h2>Autohandel 'De Voorbijgang'</h2>
            <h5>Al meer dan 35 Jaar met plezier gevestigd</h5>
            <h6 class="grey-text text-darken-3">
                Autohandel de voorbijgang is reeds meer dan 35 jaar een vertrouwd adres voor in- en verkoop van gebruikte auto's in Hardinxveld-Giessendam 
                en heeft een ruim en gevarieerd aanbod van occasions in iedere prijsklasse.
                <br><br>
                Bent u specifiek op zoek naar een bepaald model en is de de auto van uw keuze niet voorradig, 
                dan is het bijna altijd mogelijk op korte termijn de occasion van uw wens te vinden.
                Ook kunt u uw auto aan ons aanbieden; u kunt ons altijd een e-mail sturen met uw vraag of aanbod.
                <br><br>
                Heeft u gekozen voor een nieuwe auto? Ook deze willen wij u graag leveren.
                Inruil en financiering zijn mogelijk.
                <br><br>
                Ook voor onderhoud, reparatie, de verzorging van de APK-keuring en het herstellen van schade bent u aan het goede adres. 
                Tevens leveren en monteren wij accessoires als lichtmetalen velgen, trekhaken etc.
                <br><br>
                Autohandel "de Voorbijgang" is door het RDW erkend voor de afgifte van originele vrijwaringbewijzen..
            </h6>
        </div>
    </div>
    <!-- Parallax photo 2 -->
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('images/Parallax (2).jpg') }}"></div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.parallax').parallax();
        });
    </script>
@endsection