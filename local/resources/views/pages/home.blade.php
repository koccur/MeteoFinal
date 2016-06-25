@extends('layouts.master')
@section('content')
<!-- Mapka  -->
<script>
	var key="22d2bd3c5dab42a265e7c10415f821e3";
	var urlpath,lat,lng;
	var myArray;
	function getCoords(PosX,PosY){
		lat=PosX;
		lng=PosY;
		urlpath= key +"/"+ lat+ "," + lng;
		$.ajax({
			url: "https://api.forecast.io/forecast" + "/" + urlpath + "?lang=pl&units=si",
			async: false,
			type: "POST",
			dataType: "jsonp",
			timeout: 4000,
			success: function (parsed_json) {
				var lat=parsed_json['latitude'];
				var lon=parsed_json['longitude'];
				var temp = parsed_json['currently']['temperature'];
				var tempFeel = parsed_json['currently']['apparentTemperature'];
				var pressure = parsed_json['currently']['pressure'];
				var rain = parsed_json['currently']['precipProbability']*100;
				var humidity =parsed_json['currently']['humidity'];
				var cloud = parsed_json['currently']['cloudCover'];
				var wind = parsed_json['currently']['windSpeed'];
				var godz=parsed_json['hourly']['data'];
				var dzien=parsed_json['daily']['data'];

				$('#lat').html(lat);
				$('#godz').html(godz);
				$('#lon').html(lon);
				$('#temp').html("Aktualna</br>"+"<h5>"+ temp + " <sup>º C</sup>"+"</h5>");
				$('#tempFeel').html("Odczuwalna</br>"+"<h5>"+tempFeel+ " <sup>º C</sup>"+"</h5>");
				$('#pressure').html("Ciśnienie</br>"+"<h5>"+ pressure+ "hPa</h5>");
				$('#rain').html("Szansa na opady</br><h5>"+(rain*100)+"%</h5>");
				$('#humidity').html("Wilgotność</br><h5>"+(humidity*100)+"%</h5>");
				$('#cloud').html("Zachmurzenie</br><h5>"+(cloud*100)+"%</h5>");
				$('#wind').html("Wiatr</br><h5>"+ wind+"m/s</h5>");
				@include('forecast.zmDzien');
			},
			error: function (request, status, err) {
				if (status == "timeout") {
					$('#errorZone').html("Error");
					$('#details').html("Problem z Wczytaniem pogody");
				}
			}
		})
	};
	</script>
<div class="col-sm-12 col-md-8 map">
	<div id="map-poland">
		 <ul class="poland">
		  <li class="pl1"><a href="#dolnoslaskie" onclick="sendCoords('51.13398609999999','16.884196100000054')">Dolnośląskie</a></li>
		  <li class="pl2"><a href="#kujawsko-pomorskie">Kujawsko-pomorskie</a></li>
		  <li class="pl3"><a href="#lubelskie">Lubelskie</a></li>
		  <li class="pl4"><a href="#lubuskie">Lubuskie</a></li>
		  <li class="pl5"><a href="#lodzkie">Łódzkie</a></li>
		  <li class="pl6"><a href="#malopolskie">Małopolskie</a></li>
		  <li class="pl7"><a href="#mazowieckie">Mazowieckie</a></li>
		  <li class="pl8"><a href="#opolskie">Opolskie</a></li>
		  <li class="pl9"><a href="#podkarpackie">Podkarpackie</a></li>
		  <li class="pl10"><a href="#podlaskie">Podlaskie</a></li>
		  <li class="pl11"><a href="#pomorskie">Pomorskie</a></li>
		  <li class="pl12"><a href="#slaskie">Śląskie</a></li>
		  <li class="pl13"><a href="#swietokrzyskie">Świętokrzyskie</a></li>
		  <li class="pl14"><a href="#warminsko-mazurskie">Warmińsko-mazurskie</a></li>
		  <li class="pl15"><a href="#wielkopolskie">Wielkopolskie</a></li>
		  <li class="pl16"><a href="#zachodniopomorskie">Zachodniopomorskie</a></li>
		 </ul>
		</div>
</div>

<!-- boczny pasek z ostatnimi artykułami -->
<div class="col-sm-12 col-md-4 recent-articles no-padding">
	<div class="recent-articles-header">
		<h3> Najnowsze artykuły:</h3>
	</div>
	<div class="articles">
		@include('articles.lista')
	</div>
</div>
@stop
