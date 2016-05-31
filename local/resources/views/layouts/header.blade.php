<div class="container-fluid">
@if (Auth::guest())
<div id="row-sign" class="row">
        <ul id="sign-part">
            <a href="{{URL::to('/login')}}"><li>Zaloguj</li></a>
            <a href="{{URL::to('/register')}}"><li>Zarejestruj</li></a>
        </ul>
</div>
@endif
	<div class="row no-padding">
		<div class="col-xs-6 no-padding">
			<!-- Logo -->
			<div class="logo-wrapper pull-left">
				<a href="{{URL::to('/')}}" class="main-logo">
					<img class="img-fluid" src="{{URL::asset('img/logo_main.png')}}" alt="" />
				</a>
			</div>
		</div>
	</div>

</div>

