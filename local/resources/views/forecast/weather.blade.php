@extends('layouts.master')
@section('content')
    <script>
        var key="22d2bd3c5dab42a265e7c10415f821e3";
        var urlpath,lat,lng;
        var myArray;
        var skycons=new Skycons({"color":"black"}); //icons from darkSky
        function initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
                lat=place.geometry.location.lat();
                lng=place.geometry.location.lng();
                urlpath= key +"/"+ lat+ "," + lng;
                $.ajax({
                    url: "https://api.forecast.io/forecast" + "/" + urlpath + "?lang=pl&units=si",
                    async: false,
                    type: "POST",
                    dataType: "jsonp",
                    timeout: 4000,
                    success: function (parsed_json) {
                        var timeZone=parsed_json['offset'];
                        var currentTimeZone= new Date().getTimezoneOffset()/60;
                        var lat=parsed_json['latitude'];
                        var lon=parsed_json['longitude'];
                        var city=place.name;
                        var summary=parsed_json['currently']['summary'];
                        var temp = parsed_json['currently']['temperature'];
                        var tempFeel = parsed_json['currently']['apparentTemperature'];
                        var pressure = parsed_json['currently']['pressure'];
                        var rain = parsed_json['currently']['precipProbability'];
//                        var rainInt = parsed_json['currently']['precipIntensity'];
                        var humidity =parsed_json['currently']['humidity'];
                        var cloud = parsed_json['currently']['cloudCover'];
                        var wind = parsed_json['currently']['windSpeed'];
                        var godz=parsed_json['hourly']['data'];
                        var dzien=parsed_json['daily']['data'];
                        $('#lat').html(lat);
                        $('#godz').html(godz);
                        $('#opis').html("<div id='opis'>" + summary + "<div id='temp'><h4><br>" + temp + "º C</h4></div></div>");
                        $('#lon').html(lon);
                        $('#city').html("<h2>" + city + "</h2>");
                        $('#timeZone').html(timeZone);
//                        $('#temp').html("temp" + " <sup>º C</sup>"+"</h5>");
                        $('#tempFeel').html("Odczuwalna</br>" + "<h5>" + tempFeel + "º C</h5>");
                        $('#pressure').html("Ciśnienie</br>"+"<h5>"+ pressure+ "hPa</h5>");
                        $('#rain').html("Opady</br><h5>" + Math.round(rain * 100) + "%</h5>");
//                        $('#rainInt').html("Opady</br><h55>"+Math.round(rainInt*100)+"mm/h</h55>");
                        $('#humidity').html("Wilgotność</br><h5>"+Math.round(humidity*100)+"%</h5>");
                        $('#cloud').html("Zachmurzenie</br><h5>"+Math.round(cloud*100)+"%</h5>");
                        $('#wind').html("Wiatr</br><h5>" + wind + " m/s</h5>");
                        var y=0;
                        var yzx=1;
                        var i;
                        var td= document.getElementsByTagName("td");
                        function ChangeTimeFromDatestamp(time){
                            var date = new Date(time*1000);
                            var day= date.getDate();
                            var hours= date.getHours();
                            var minutes = "0"+date.getMinutes();
                            return hours+' :'+minutes.substr(-2);
                        }
                        function checkHours(time){
                            var date=new Date(time*1000);
                            var hours = Math.round(date.getHours()+timeZone-1);
                            if(hours>23){
                                hours=hours-24;
                                day++;
                            }
                            if(hours<0){
                                hours=hours+24;
                                day++;
                            }
                        }
                        function checkMonth(time){
                            var date=new Date(time*1000);
                            if(date.getMonth()+1<10){
                                month='0'+(date.getMonth()+1);
                            }
                            else{
                                month=date.getMonth()+1;
                            }
                            return month;
                        }
                        function daysAndMonths(time){
                            var date=new Date(time*1000);
                            var day=date.getDate();
                            var month=checkMonth(time);
                            return day+"-"+month;
                        }
                        for (i=0;i<48*5;i+=5,y++){
                            var date = new Date(godz[y]['time']*1000);
                            var day = date.getDate();
                            var month = checkMonth(godz[y]['time']);
                            var hours = Math.round(date.getHours()+timeZone-1);
                            if(hours>23){
                                hours=hours-24;
                                day++;
                            }
                                if(hours<0){
                                    hours=hours+24;
                                    day++;
                                }
                            var formattedTime = day+'-'+ month+ ' '+hours + ':00';
                            document.getElementById(td[i].innerHTML=formattedTime);
                            document.getElementById(td[i+1].innerHTML=godz[y]['temperature']+'℃'+' / '+godz[y]['apparentTemperature']+'℃');
                            document.getElementById(td[i+2].innerHTML=Math.round(godz[y]['precipIntensity'])+' mm/h' + ' / '+Math.round(godz[y]['cloudCover']*100) +'%');
                            document.getElementById(td[i+3].innerHTML=godz[y]['windSpeed']+'m/s'+' / '+godz[y]['pressure']+'hPa');
                            var iconNumber="icon"+yzx;
                            skycons.set(iconNumber,godz[yzx]['icon']);
                            yzx++;

                        }
                        y=0;
                        yzx=0;
                        for(i=240;i<290;i+=5,y++){
                            document.getElementById(td[i].innerHTML=dzien[y]['summary']+"<br> Wschód: "+ChangeTimeFromDatestamp(dzien[y]['sunriseTime'])+" <br>"+"Zachód: "+ChangeTimeFromDatestamp(dzien[y]['sunsetTime'])+
                            " <br>"+daysAndMonths(dzien[y]['time']));
                            document.getElementById(td[i+1].innerHTML=dzien[y]['temperatureMin']+'℃'+' / '+ dzien[y]['temperatureMax']+'℃');
                            document.getElementById(td[i+2].innerHTML=Math.round(dzien[y]['precipIntensityMax'])+' mm/h'+ ' / '+ Math.round(dzien[y]['cloudCover']*100) + '%');
                            document.getElementById(td[i+3].innerHTML=dzien[y]['windSpeed']+'m/s'+' / '+dzien[y]['pressure']+'hPa');
                            iconNumber="icon"+yzx;
                            skycons.set(iconNumber,dzien[yzx]['icon']);
                            yzx++;
                        }
                    },
                    error: function (request, status, err) {
                        if (status == "timeout") {
                            $('#errorZone').html("Error");
                            $('#details').html("Problem z Wczytaniem pogody");
                        }
                    }
                })
            });
            }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<div class="col-xs-12">
    <h1>Nazwa miejscowości</h1>
    <div class="content">
        <ul>
            <div class="input-group">
                <input id="searchTextField" class="form-control form-control-costum" type="text" size="50" placeholder="Wpisz miejscowość" autocomplete="on" runat="server" />
            </div>
            <input type="hidden" id="city2" name="city2" />
                <input type="hidden" id="cityLat" name="cityLat" />
                <input type="hidden" id="cityLng" name="cityLng" />
        </ul>

        <?php

        $ip = $_SERVER['REMOTE_ADDR'];
        //        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        //        if($details->loc != '::1'){
        //        $ip=$details->loc;}
        //            else{
        $ip = '51.0115,19.769';
        //            }
        $json=file_get_contents("https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/{$ip}?lang=pl&units=si");
        $obj=json_decode($json);
        date_default_timezone_set($obj->timezone);
    echo "<p id='godzinowa'>Pogoda na najbliższe 48 godzin </p>";
    echo "<table class='table table-weather'><thead><tr>";
    echo "<th class='tableInfo'>Data i godzina</th><th class='tableInfo'>Temperatura / Odczuwalna</th><th class='tableInfo'>Opady/ Zachmurzenie</th><th class='tableInfo'>Wiatr / Ciśnienie</th></tr></thead><tbody>";
        for ($i = 1; $i <= 48; $i++) {
        echo "<tr><td class='timeHourly'>";
        echo date('d-m H:i', $obj->hourly->data[$i]->time)."</th><td>";
        echo floatval($obj->hourly->data[$i]->temperature)."&deg;C / ";
        echo floatval($obj->hourly->data[$i]->apparentTemperature)."&deg;C</td>";
        echo "<td>".floatval($obj->hourly->data[$i]->precipIntensity*100)." mm/godz / ".($obj->hourly->data[$i]->cloudCover*100)."%"."</td>";
        echo "<td>".$obj->hourly->data[$i]->windSpeed."m/s"." / ".$obj->hourly->data[$i]->pressure."hPa"."</td>";
        echo "<td>"?>
        <canvas id="<?php echo "icon".$i?>" width="64" height="64"></canvas>
        <script>
            skycons.add("<?php echo "icon".$i?>","<?php echo $obj->hourly->data[$i]->icon;?>");
        </script>

<?php
        }
    echo "</tbody></table> <br>";

    echo "<p id='tygodniowa'>Pogoda na najbliższe 7 dni </p>";
    echo "<table class='table table-weather'> <thead><tr>";
    echo "<th class='tableInfo'>Data i godzina</th><th class='tableInfo'>Min Temp / Max Temp</th><th class='tableInfo'>Maksymalne Opady / Zachmurzenie</th><th class='tableInfo'>Wiatr / Ciśnienie</th></tr></thead><tbody>";
    for ($i = 0; $i <= 7; $i++) {
        echo "<tr><td scope='row' class='timeDaily'>";
        echo $obj->daily->data[$i]->summary;
        echo "<div id='sunrise'>Wschód ".date('H:i',$obj->daily->data[$i]->sunriseTime)."<br></div>";
        echo "<div id='sunset'>Zachód ".date('H:i',$obj->daily->data[$i]->sunsetTime)."<br></div>";
        echo date('d-m', $obj->daily->data[$i]->time)."</th><td>";
        echo floatval($obj->daily->data[$i]->temperatureMin)."&deg;C / ";
        echo ($obj->daily->data[$i]->temperatureMax)."&deg;C</td>";
        echo "<td>" . floatval($obj->daily->data[$i]->precipIntensityMax * 10) . " mm/12h / " . ($obj->daily->data[$i]->cloudCover * 100) . "%" . "</td>";
        echo "<td>".$obj->daily->data[$i]->windSpeed."m/s"." / ".$obj->daily->data[$i]->pressure."hPa"."</td>";
        echo "<td>"?>
        <canvas id="<?php echo "icon_daily".$i?>" width="64" height="64"></canvas>
        <script>
            skycons.add("<?php echo "icon_daily".$i?>","<?php echo $obj->daily->data[$i]->icon;?>");
        </script>

<?php
    }
    echo "</tbody></table>";
    ?>
    </div>
</div>
    <script>
        skycons.play();
    </script>
    @stop
