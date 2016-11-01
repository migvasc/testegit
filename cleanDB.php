<?php

require("conn.php");
$result = pg_query($conn, "delete from usuario where email = 'carlos@teste.com'");
   
?>