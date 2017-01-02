<head>
    <meta charset="UTF-8">
    <title>Space Meteo - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Główny styl -->
    <link rel="stylesheet" href={{URL::asset('css/style.css') }}>
{{--    <link rel="stylesheet" href={{URL::asset('fonts/font.css.min')}}    >--}}
    <!-- jQuery -->
    <script src={{URL::asset('js/jquery-2.2.4.min.js')}}></script>
    <script src={{URL::asset('js/jqueryUI/jquery-ui.min.js')}}></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YourApiKey&libraries=places"
            async defer></script>
    <script src={{URL::asset('js/ckeditor.js')}}></script>
    <script src={{URL::asset('js/skycons/skycons.js')}}></script>
    <script src={{URL::asset('js/progressbar.js')}}></script>


</head>
