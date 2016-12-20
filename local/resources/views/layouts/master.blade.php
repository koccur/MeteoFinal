<!DOCTYPE html>
@include('layouts.headscripts')
<body>

<div id="main-container">
	<header class="main-header">
		<div class="header-content">
			@include('layouts.navbar')
		</div>
	</header>
	<section class="weather-info">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 actual-weather-bar">
					<div class="contents">
					@include('layouts.weather')
                        <div class="clearfix"></div>
                        <div class="pogodowe">
                            <a id="hourly" href="{{URL::to('/forecast#godzinowa')}}">
							<button type="button" style="width:100%;" class="btn btn-success">Pogoda Godzinowa</button></a>
                            <a id="daily" href="{{URL::to('/forecast#tygodniowa')}}">
							<button type="button" style="width:100%;" class="btn btn-success">Pogoda Tygodniowa</button></a>

							<div class="clearfix"></div>

                        </div>

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