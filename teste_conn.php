<?php

require("conn.php");
//$result = pg_query($conn, "select * from usuario");

$result = pg_query($conn, "select email from usuario where email = 'teste@teste.com' and senha = 'admin123'");


if (!pg_num_rows($result)) {
	print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
	print "Data in your database:\n";
	while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";
   
?>
