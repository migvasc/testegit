<?php

require("conn.php");
echo $url;
$result = pg_query($conn, "delete from usuario where email = 'carlos@teste.com'");
   
?>