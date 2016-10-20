<?php

require("../conn.php");
$result = pg_query($conn, "select email from usuario where email = '" . htmlspecialchars($_POST['email']) ."' and senha = '" . htmlspecialchars($_POST['senha'])). "'";

if(pg_num_rows($result)){
	console.log("Response: "+ pg_num_rows($result));
	return true;
}
	
else
	return false;
?>
