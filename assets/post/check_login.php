<?php

require("../../conn.php");
$result = pg_query($conn, "select email from usuario where email = '". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8")."' and senha = '" . htmlentities($_POST['senha'], ENT_QUOTES, "UTF-8") ."'");
 
if(pg_num_rows($result))
	echo ("email");

//if(htmlspecialchars($_POST['email']) == "teste@teste.com" && htmlspecialchars($_POST['senha']) == "admin123")
//	echo "achou!";
else
	echo null;
?>
