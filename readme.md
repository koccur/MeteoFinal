<h1> meteoplus 1</h1>
change .env.example to .env in local folder
<p> database name : meteo
<p> login: admin, pass: admin
<p> in local/views/layouts/headscripts insert your goolge api key
<p> .env change from CACHE_DRIVER=file to CACHE_DRIVER=array, because Laravel file and database drivers doesn't support tags
