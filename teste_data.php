<?php

require("conn.php");

$result = pg_query($conn, "select endereco_logradouro, endereco_numero, endereco_bairro,endereco_cidade from usuario;");



// echo ("TESTE");
if(pg_num_rows($result)){
    
    $resultArray = pg_fetch_all($result);
    
    // $decoded_array = json_decode($resultArray[]0['rua']);
    
    // echo json_encode($decoded_array, JSON_PRETTY_PRINT);
    echo json_encode([$result_array[0],$result_array[1], $result_array[2],$result_array[3]], JSON_PRETTY_PRINT);
    
}
//	echo (pg_fetch_row($result)[0]);
//	$myfile = fopen("newfile.json", "w") or die("Unable to open file!"); 
//fwrite($myfile,$result);
    
    //teste

else{
	echo json_encode(24);
    
}
?>