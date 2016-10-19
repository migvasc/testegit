<?php

require("../conn.php");
$result = pg_query($conn, "select email from usuario where email = " . $_POST['email'] ." and senha = " . $_POST['senha']);

if(pg_num_rows($result))
	return true;
else
	return false;
// print "<pre>\n";
// if (!pg_num_rows($result)) {
// print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
// } else {
// print "Tables in your database:\n";
// while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
// }
// print "\n";
   
?>
