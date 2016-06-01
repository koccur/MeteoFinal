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
						Tu ma się wyświetlać miejscowość
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
				
			</div>
		</div>
	</section>

	<footer>
		@include('layouts.footer')
	</footer>
</div>

</body>
</html>