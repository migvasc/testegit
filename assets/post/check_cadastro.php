<?php

require("../../conn.php");
$result = pg_query($conn, "insert into usuario values ('". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8")."','" . htmlentities($_POST['senha'], ENT_QUOTES, "UTF-8") ."','". htmlentities($_POST['nome'], ENT_QUOTES, "UTF-8") ."','". htmlentities($_POST['sobrenome'], ENT_QUOTES, "UTF-8") ."','". htmlentities($_POST['phone'], ENT_QUOTES, "UTF-8") ."'");
 
if(pg_affected_rows($result) > 0)
	echo (pg_affected_rows($result));
else
	echo null;
?>
