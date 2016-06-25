<head>
    <meta charset="UTF-8">
    <title>Space Meteo - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Główny styl -->
    <link rel="stylesheet" href={{URL::asset('css/style.css') }}>
    {{--<link rel="stylesheet" type="text/css" media="screen,projection" href={{URL::asset('cssmap-poland/cssmap-poland.css') }}>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{URL::asset('fonts/font.css.min')}}    >
    <!-- jQuery -->
    <script src={{URL::asset('js/jquery-2.2.4.min.js')}}></script>
    <script src={{URL::asset('js/jqueryUI/jquery-ui.min.js')}}></script>
    <script src={{URL::asset('js/scripts.js')}}></script>
    <script src={{URL::asset('js/skycons/skycons.js')}}></script>
    <script src={{URL::asset('js/jquery.cssmap.js')}}></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
    <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>

</head>