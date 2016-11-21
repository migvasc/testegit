<?php

require("conn.php");

$result = pg_query($conn, "select endereco_logradouro, endereco_numero, endereco_bairro,endereco_cidade from usuario;");



// echo ("TESTE");
if(pg_num_rows($result)){
    
    $resultArray = pg_fetch_all($result);
    
    // $decoded_array = json_decode($resultArray[]0['rua']);
    
    // echo json_encode($decoded_array, JSON_PRETTY_PRINT);
    echo response()->json([$result_array[0]['endereco_logradouro'],$result_array[0]['endereco_numero'], $result_array[0]['endereco_bairro'],$result_array[0]['endereco_cidade']]);
    
}
//	echo (pg_fetch_row($result)[0]);
//	$myfile = fopen("newfile.json", "w") or die("Unable to open file!"); 
//fwrite($myfile,$result);
    
    //teste

else{
	echo json_encode(24);
    
}
?>