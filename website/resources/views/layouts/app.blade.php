<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Info for the browser -->
        <meta charset="utf-8">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Import Google Icon Font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- My CSS -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">

        <!-- Website Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body>
        <!-- navbar -->
        @include('inc.navbar')      
        <!-- content -->
        <main class="grey lighten-5">
            @yield('content')
        </main>

        <!-- footer -->
        @include('inc.footer')

        <!-- Jquery and verify it has not been tampered with -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!-- script for navbar -->
        <script type="text/javascript" src="{!! asset('js/navbar.js') !!}"></script>
        @yield('scripts')
        <!-- error messages -->
        @include('inc.messages')
    </body>
</html>