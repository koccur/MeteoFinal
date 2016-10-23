<head>
    <meta charset="UTF-8">
    <title>Space Meteo - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Główny styl -->
    <link rel="stylesheet" href={{URL::asset('css/style.css') }}>
    <link rel="stylesheet" type="text/css" media="screen,projection" href={{URL::asset('cssmap-poland/cssmap-poland.css') }}>
{{--    <link rel="stylesheet" href={{URL::asset('fonts/font.css.min')}}    >--}}
    <!-- jQuery -->
    <script src={{URL::asset('js/jquery-2.2.4.min.js')}}></script>
    <script src={{URL::asset('js/jqueryUI/jquery-ui.min.js')}}></script>
    <script src={{URL::asset('js/scripts.js')}}></script>
    <script src={{URL::asset('js/jquery.cssmap.js')}}></script>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>
    <script src={{URL::asset('js/ckeditor.js')}}></script>
    <script src={{URL::asset('js/skycons/skycons.js')}}></script>

</head>