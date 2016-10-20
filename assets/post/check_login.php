<?php

require("../../conn.php");
$result = pg_query($conn, "select email from usuario where email = '" . htmlspecialchars($_POST['email']) ."' and senha = '" . htmlspecialchars($_POST['senha'])). "'";

return response()->json(['result' => 'success']);

//if(pg_num_rows($result))
//	echo (pg_num_rows($result));

//else
//	echo null;
?>
