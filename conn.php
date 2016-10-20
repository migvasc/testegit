<?php

extract(parse_url($_ENV["DATABASE_URL"]));

$url = "user=$user password=$pass host=$host sslmode=require dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too

$conn = pg_connect($url);

?>