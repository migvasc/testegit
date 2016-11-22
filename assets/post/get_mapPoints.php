<?php

require("../../conn.php");



$all_address = pg_query($conn, "select tipo, endereco_logradouro, endereco_numero, endereco_bairro,endereco_cidade from usuario;");

session_name("testando");
session_start();

$user_address = pg_query($conn, "select tipo, endereco_logradouro, endereco_numero, endereco_bairro,endereco_cidade from usuario where email = '"+$_SESSION['user']+"';");


// echo ("TESTE");
if(pg_num_rows($all_address) && pg_num_rows($user_address)){
    
    echo json_encode(['all' => pg_fetch_all($all_address), 'user' => pg_fetch_all($user_address)], JSON_PRETTY_PRINT);
    
   //echo json_encode(pg_fetch_all($result), JSON_PRETTY_PRINT);
    
}
//	echo (pg_fetch_row($result)[0]);
//	$myfile = fopen("newfile.json", "w") or die("Unable to open file!"); 
//fwrite($myfile,$result);
    
    //teste

else{
	echo json_encode(pg_fetch_all($user_address));
    
}
?>