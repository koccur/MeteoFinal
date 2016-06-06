<script>
    $(document).ready(function($){

        var key="22d2bd3c5dab42a265e7c10415f821e3";
        var urlpath,lat,lon;
//        if(navigator.geolocation){
//            navigator.geolocation.getCurrentPosition(getLocation);
//        }
//        else{
//            urlpath="53.7442,20.4557";
//        }
        var skycons=new Skycons({"color":"pink"});

    function getLocation(position){
        lat=position.coords.latitude;
        lon=position.coords.longitude;
        urlpath= key +"/"+ lat+ "," + lon;
//        loadWeatherData();
    }
        function loadWeatherData() {
            $.ajax({
                url: "https://api.forecast.io/forecast" + "/" + urlpath + "?lang=pl&units=si",
                async: false,
                dataType: "jsonp",
                timeout: 4000,
                success: function (parsed_json) {
                    var temp = parsed_json['currently']['temperature'];
                    var tempFeel = parsed_json['currently']['apparentTemperature'];
                    var pressure = parsed_json['currently']['pressure'];
                    var rain = parsed_json['currently']['precipProbability']*100;
                    var humidity =parsed_json['currently']['humidity'];
                    var cloud = parsed_json['currently']['cloudCover'];
                    var wind = parsed_json['currently']['windSpeed'];
                    $('#temp').html("Aktualna</br>"+"<h5>"+ temp + " <sup>º C</sup>"+"</h5>");
                    $('#tempFeel').html("Odczuwalna</br>"+"<h5>"+tempFeel+ " <sup>º C</sup>"+"</h5>");
                    $('#pressure').html("Ciśnienie</br>"+"<h5>"+ pressure+ "hPa</h5>");
                    $('#rain').html("Szansa na opady</br><h5>"+(rain*100)+"%</h5>");
                    $('#humidity').html("Wilgotność</br><h5>"+(humidity*100)+"%</h5>");
                    $('#cloud').html("Zachmurzenie</br><h5>"+(cloud*100)+"%</h5>");
                    $('#wind').html("Wiatr</br><h5>"+ wind+"m/s</h5>");
                    var icons = new Skycons({
                                "color": "black"
                            }),

                    //The items in the array match the weather condiitons provided by Dark Sky.  In order to invoke the icons
                    //you must loop through the DOM to find the matching conditions
                            list = [
                                "clear-day", "clear-night", "partly-cloudy-day",
                                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                "fog"],
                            i;

                    //Loop to search through classes to find weather type names
                    for (i = list.length; i--;) {
                        var weatherType = list[i],
                                elements = document.getElementsByClassName(weatherType);
                        for (e = elements.length; e--;) {
                            icons.set(elements[e], weatherType);
                        }
                    }
                    icons.play();
                },
                error: function (request, status, err) {
                    if (status == "timeout") {
                        $('#errorZone').html("Error");
                        $('#details').html("Problem z Wczytaniem pogody");
                    }
                }
            })
        };

    })
</script>
<?php


//$lat=
//$lon=
$json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/53.7442,20.4557?lang=pl&units=si');
$obj=json_decode($json);
//echo $obj->latitude." ";
//echo $obj->longitude." </p>";
date_default_timezone_set($obj->timezone);
echo "<div id='errorZone'>
<div id='details'></div>
</div>";
echo $obj->currently->summary;
//echo "<div id='clear-day' width='64' height='64'>"."<canvas id='icon1'>".$obj->currently->icon."</div>"."</div>";
echo "<div id='temp' class='cols col-xs-6 col-lg-2'>Aktualna<h5>".intval($obj->currently->temperature)."&deg;C"."</div>";
echo "<div id='tempFeel' class='cols col-xs-6 col-lg-2'>Odczuwalna <h5>".intval($obj->currently->apparentTemperature)."&deg;C</h5>"."</div>";
echo "<div id='pressure' class='cols col-xs-6 col-lg-2'>Ciśnienie <h5>".$obj->currently->pressure." hPa "."</h5></div>";
echo "<div id='rain' class='cols col-xs-6 col-lg-2'>Szansa na opady<h5>".($obj->currently->precipProbability*100)."%"."</h5></div>";
echo "<div id='humidity' class='cols col-xs-6 col-lg-2'>Wilgotność <h5>".($obj->currently->humidity*100)."%"."</h5></div>";
echo "<div id='cloud' class='cols col-xs-6 col-lg-2'>Zachmurzenie<h5>".($obj->currently->cloudCover*100)."%"."</h5></div>";
echo "<div id='wind' class='cols col-xs-6 col-lg-2'>Wiatr <h5>".$obj->currently->windSpeed." m/s"."</h5></div>";
?>
<script>
    var icons = new Skycons({"color": "#fff"}),
            list  = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

    for(i = list.length; i--; ) {
        var weatherType = list[i],
                elements = document.getElementsByClassName( weatherType );
        for (e = elements.length; e--;){
            icons.set( elements[e], weatherType );
        }
    }

    icons.play();
</script>
