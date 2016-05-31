<span id="copy">&copy 2016 SpaceMeteo</span>
<span id="socialicons">
    <a href="https://www.facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    <a href="https://www.youtube.com/"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
    <a href="https://www.twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
</span>
<script>

    var x = document.getElementById("lokalizuj");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        var lon=position.coords.latitude;
        var lat=position.coords.longitude;
        return array(lon,lat);

    }
    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
    }
</script>