<?php

require("../../conn.php");
$result = pg_query($conn, "select email from usuario where email = '" . pg_escape_string($_POST['email'].split("@")[0]) ."' and senha = '" . pg_escape_string($_POST['senha'].split("m")[1])). "'";
 
if(pg_num_rows($result))
	echo ("achou!");

//if(htmlspecialchars($_POST['email']) == "teste@teste.com" && htmlspecialchars($_POST['senha']) == "admin123")
//	echo "achou!";
else
	echo null;
?>
