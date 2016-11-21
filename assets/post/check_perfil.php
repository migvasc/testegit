<?php

require("../../conn.php");
$result = pg_query($conn, "update usuario set nome='". $_POST['nome'] ."', sobrenome ='". $_POST['sobrenome'] ."', phone = '". $_POST['telefone'] ."', resposta = '". $_POST['resposta'] . "'  where email = '". $_POST['email'] ."'");
 
if(pg_affected_rows($result) > 0){
	$result = pg_query($conn, "select nome from usuario where email = '". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8")."'");
	echo (pg_fetch_row($result)[0]);
}else
	echo null;
?>
