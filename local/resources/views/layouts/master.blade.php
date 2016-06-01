<!DOCTYPE html>
@include('layouts.headscripts')
<body>

<div id="main-container">
	<header class="main-header">
		<div class="header-content">
			@include('layouts.header')

			@include('layouts.navbar')
		</div>
	</header>

	<section class="weather-info">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 actual-weather-bar">
					<h3> 

					</h3>
					<div id="custom-search-input">
                		<div class="input-group">
                    		<input type="text" class="form-control form-control-costum" placeholder="Wybierz miejscowość" />
                    		<span class="input-group-btn">
                        		<button class="btn btn-info" type="button">
                            	<i class="fa fa-search" aria-hidden="true"></i>
                        		</button>
                        		
                        		<button onclick="getLocation()" class="btn btn-info" type="button">
                            	<i class="fa fa-location-arrow" aria-hidden="true"></i>
                        		</button>
                    		</span>
                		</div>
            		</div>
					<div class="contents">
					@include('layouts.weather')

					<div id="weather-later" class=" col-md-12 col-lg-4">
            			<a href="{{URL::to('/forecast#godzinowa')}}"><button type="button" id="hourly" class="btn btn-success">Pogoda Godzinowa</button></a>
            			<a href="{{URL::to('/forecast#tygodniowa')}}"><button type="button" class="btn btn-success">Pogoda Tygodniowa</button></a>
            			<div class="clearfix"></div>
            		</div>
            		<div class="clearfix"></div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="master-container">
		<div class="container-fluid">
			<div class="row">
			@yield('content')
			<!-- to trzeba wrzucić do oddzielnej podstrony strony głównej -->
				<!-- <div class="col-sm-12 col-md-8 map">
					<div id="map-poland">
						 <ul class="poland">
						  <li class="pl1"><a href="#dolnoslaskie">Dolnośląskie</a></li>
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
				</div> -->
				<!-- <div class="col-sm-12 col-md-4 recent-articles no-padding">
						<div class="recent-articles-header">
							<h3> Najnowsze artykuły:</h3>
						</div>
					<div class="articles">
						{{--Tutaj uporządkowanie tego jak to ma wygladac, np stala wysokosc diva--}}
			-->

				@if(Request::path()=='/')
					@include('articles.lista')
				@endif

					</div>
				</div>
	</section>

	<footer>
		@include('layouts.footer')
	</footer>
</div>

</body>
</html>