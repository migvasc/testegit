<?php

require("../../conn.php");
$result = pg_query($conn, "select email from usuario where email = '" . htmlspecialchars($_POST['email']) ."' and senha = '" . htmlspecialchars($_POST['senha'])). "'";

if(pg_num_rows($result)){
	$row = pg_fetch_row($result);
	echo ($row[]0);
}
	

//if(htmlspecialchars($_POST['email']) == "teste@teste.com" && htmlspecialchars($_POST['senha']) == "admin123")
//	echo "achou!";
else
	echo null;
?>
