<?php

require("../../conn.php");
$result = pg_query($conn, "insert into usuario values ('". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8")."','" . htmlentities($_POST['senha1'], ENT_QUOTES, "UTF-8") ."','". htmlentities($_POST['nome'], ENT_QUOTES, "UTF-8") ."','". htmlentities($_POST['sobrenome'], ENT_QUOTES, "UTF-8") ."','". htmlentities($_POST['phone'], ENT_QUOTES, "UTF-8") ."')");
 
if(pg_affected_rows($result) > 0){
	$result = pg_query($conn, "select nome from usuario where email = '". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8")."'");
	echo (pg_fetch_row($result)[0]);
}

	
else
	echo null;
?>
