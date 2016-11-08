<!-- TO DO: zmienic jakos czesc rozwijanych rzeczy -->
<nav class="main">
    <ul class="main-list">
        <!-- Menu widoczne przy mniejszych rozdzielczosciach -->
		<span id="menu-mobile">
			<span id="logo-menu">
				<a href="{{URL::to('/')}}">
                    <img src="{{URL::asset('img/logo_main.png')}}" alt=""/></a>
			</span>
            @if (Auth::guest())
            @else
			<li>
                <button class="navbar-toggler bb" type="button" data-target="#exCollapsingNavbar2">
                    <i class="fa fa-user"></i></button>
            </li>
            @endif
			<li class="menu-mobile-button">
                <button id="aa" class="navbar-toggler" type="button" data-target="#exCollapsingNavbar1">
                    <i class="fa fa-bars"></i></button>
            </li>
		</span>
        <!-- Menu widoczne przy większych rozdzielczosciach -->
		<span id="menu">
			<li><a href="{{URL::to('/')}}">Strona Główna</a></li>
{{--			<li><a href="{{URL::to('/users')}}">Użytkownicy</a></li>--}}
			<li><a href="{{URL::to('/articles')}}">Wiadomości</a></li>
			<li><a href="{{URL::to('/about')}}">O nas</a></li>
{{--            <li><a href="{{URL::to('/images')}}">Rysunki</a></li>--}}
            <li><a href="{{URL::to('/forecast')}}">Pogoda</a></li>

            @if (Auth::guest())
                <li style="float:right"><a href="{{URL::to('/login')}}">Zaloguj</a></li>
            @else
                    <li style="float:right">
                 <a href="{{URL::to('/users',Auth::user()->id)}}">Witaj {{Auth::user()->username}}!</a>

                    </li>

            @endif
		</span>
    </ul>
</nav>

<!-- Częśc rozwijana przy rozdzielczosciach mobilnych -->
<div class="menu-mobile-list">
    <!-- Kontener z menu mobilnym -->
    <div class="collapse" id="exCollapsingNavbar1">
        <ul>
            <li><a href="{{URL::to('/')}}">Strona Główna</a></li>
{{--            <li><a href="{{URL::to('/users')}}">Użytkownicy</a></li>--}}
            <li><a href="{{URL::to('/articles')}}">Wiadomości</a></li>
            <li><a href="{{URL::to('/about')}}">O nas</a></li>
{{--            <li><a href="{{URL::to('/images')}}">Rysunki</a></li>--}}
            <li><a href="{{URL::to('/forecast')}}">Pogoda</a></li>
            <li><a href="{{URL::to('/login')}}">Zaloguj</a></li>
            <li><a href="{{URL::to('/register')}}">Zarejestruj</a></li>
        </ul>
    </div>
    <!-- Kontener z profilem uzytkownika -->
    <div class="collapse" id="exCollapsingNavbar2">
        @if (Auth::guest())
        
        @else
        <div class="col-xs-6">
            Witaj {{Auth::user()->username}}!
        </div>
        <div id="logout" class="col-xs-6">
            <a href={{url('/logout')}}>Wyloguj się <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
        <div class="col-xs-12">
            <a href={{url('/users',Auth::user()->id)}}>Zobacz mój profil</a>
        </div>
        <div class="clearfix"></div>
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--@if (Auth::user()->can_post())--}}
        {{--<li>--}}
        {{--<a href="{{ url('articles.create') }}">Add new post</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--<li>--}}
        {{--<a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="{{ url('/auth/logout') }}">Logout</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        @endif
    </div>
</div>