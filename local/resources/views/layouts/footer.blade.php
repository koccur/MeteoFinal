<span id="copy">&copy 2016 Meteo</span>
<div id="footerPlus" style="color:cornflowerblue;font-size:1.5em;display:inline-block">+</div>
<span id="socialicons">
    <a href="https://www.facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    <a href="https://www.youtube.com/"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
    <a href="https://www.twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
</span>
@if (!Auth::guest())
    <div id="row-sign" class="row">
        <ul id="sign-part">
            <a href="{{URL::to('/logout')}}"><li>Wyloguj</li></a>
        </ul>
    </div>
@endif