<?php

require("conn.php");

$result = pg_query($conn, "select row_to_json(usuario_teste) from usuario_teste;");




if(pg_num_rows($result)){
    $resultArray = pg_fetch_all($result);
    $decoded_array = json_decode($resultArray);
    echo json_encode($decoded_array, JSON_PRETTY_PRINT);
    
}
//	echo (pg_fetch_row($result)[0]);
//	$myfile = fopen("newfile.json", "w") or die("Unable to open file!"); 
//fwrite($myfile,$result);
    
    //teste

else{
	echo json_encode(24);
    
}
?>