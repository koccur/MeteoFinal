@extends('layouts.master')
@section('content')

    <div class="col-sm-12">
        <h1>Nazwa miejscowości</h1>
        <div class="content">
            <ul>
                {{--<li><a href="{{action('Forecasts@Olsztyn')}}">Olsztyn</a></li>--}}
                {{--<li><a href="{{action('Forecast@London')}}">Londyn</a></li>--}}
{{--                <li><a href="{{action('Forecast@Rzeszow')}}">Rzeszow</a></li>--}}
                {{--<li><a href="#">Olsztyn<?php $json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/53.78,20.47?lang=pl&units=si');?></a></li>--}}
                {{--<li><a href="#">Londyn<?php $json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/51.50,0?lang=pl&units=si');?></a></li>--}}
                {{--<li><a href="#">Rzeszów<?php $json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/50.03,22.00?lang=pl&units=si');?></a></li>--}}
            </ul>
            <?php
            $json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/51.50,0?lang=pl&units=si');
            $obj=json_decode($json);
            echo $obj->latitude." ";
            echo $obj->longitude." ";
            date_default_timezone_set($obj->timezone);

            echo "ogólnie:".$obj->currently->summary."<br>";
            echo date('Y-m-d H:i:s', $obj->currently->time)."<br>";

            echo "temperatura:".intval($obj->currently->temperature)."&deg;C<br>";
            //                        echo "temperatura:".intval($obj->currently->summary->nearestStormDistance)."<br>";
            echo "temperatura odczuwalna:".intval($obj->currently->apparentTemperature)."&deg;C<br>";
            echo "wilgotność:".$obj->currently->humidity."<br>";
            echo "prawdopodobienśtwo opadów:".$obj->currently->precipProbability."<br>";
            echo "zachmurzenie".$obj->currently->cloudCover."<br>";
            echo "wiaterek:".$obj->currently->windSpeed."m/s"."<br>";
            echo "cisnienie:".$obj->currently->pressure."hPa"."<br>";
            echo "<br><br><br><br><br>";
            echo "co nas czeka w najbliższych godzinach?".$obj->hourly->summary;
            for ($i = 1; $i <= 48; $i++) {
                echo $obj->hourly->data[1]->time;
                echo date('Y-m-d H:i:s', $obj->hourly->data[$i]->time)."<br>";
                echo "temperatura:".intval($obj->hourly->data[$i]->temperature)."&deg;C<br>";
                echo "temperatura odczuwalna:".intval($obj->hourly->data[$i]->apparentTemperature)."&deg;C<br>";
                echo "wilgotność:".$obj->hourly->data[$i]->humidity."<br>";
                echo "zachmurzenie".$obj->hourly->data[$i]->cloudCover."<br>";
                echo "wiaterek:".$obj->hourly->data[$i]->windSpeed."m/s"."<br>";
                echo "cisnienie:".$obj->hourly->data[$i]->pressure."hPa"."<br>";
            }
            for ($i = 1; $i <= 6; $i++) {
                echo $obj->daily->data[$i]->time."<br>";
                echo $obj->daily->data[$i]->sunriseTime."<br>";
                echo $obj->daily->data[$i]->sunsetTime."<br>";

                echo date('Y-m-d H:i:s', $obj->daily->data[$i]->time)."<br>";
                echo "temperatura:".intval($obj->daily->data[$i]->temperatureMin)."&deg;C<br>";
                echo "temperatura:".intval($obj->daily->data[$i]->temperatureMax)."&deg;C<br>";
                echo "wilgotność:".$obj->daily->data[$i]->humidity."<br>";
                echo "zachmurzenie".$obj->daily->data[$i]->cloudCover."<br>";
                echo "wiaterek:".$obj->daily->data[$i]->windSpeed."m/s"."<br>";
                echo "cisnienie:".$obj->daily->data[$i]->pressure."hPa"."<br>";
            }

            ?>
            <br>
            <br>
            <?php
            $address = 'olsztyn';
            $coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true');
            $coordinates = json_decode($coordinates);
            echo 'Latitude:' . $coordinates->results[0]->geometry->location->lat;
            echo 'Longitude:' . $coordinates->results[0]->geometry->location->lng;
            $lat = $coordinates->results[0]->geometry->location->lat;
            $lng = $coordinates->results[0]->geometry->location->lng;
            ?>
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div id="mapka"></div>
        </div>

    </div>

    <script>
        function initAutocomplete() {

            var map = new google.maps.Map(document.getElementById('mapka'), {
                center: {lat: 53.776193, lng: 20.473594},
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });



            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
//                        console.log(map.getCurrentPosition());
                places.forEach(function(place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location

                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                });
                map.fitBounds(bounds);
            });

        };
        function initialize() {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng('<?php echo $lat ?>', '<?php echo $lng ?>')
            };
            var map = new google.maps.Map(document.getElementById('mapka'),
                    mapOptions);
        }
        document.getElementById('mapka').addEventListener('click');
        google.maps.event.addDomListener(map, 'click', initialize);


    </script>

@stop
