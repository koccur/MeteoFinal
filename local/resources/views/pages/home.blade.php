@extends('layouts.master')
@section('content')
<!-- Mapka  -->
<div class="col-sm-12 col-md-8 map">

	<div class="container-fluid">

				<!-- Logo -->
				<div class="logo-wrapper pull-left">

					<a href="{{URL::to('/forecast')}}" class="main-logo">
						<img class="img-fluid" src="{{URL::asset('img/logo_main.jpg')}}" alt="" />
					Sprawdz pogodę w swojej miejscowości
					</a>
				</div>
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
