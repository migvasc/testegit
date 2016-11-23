<?php

require("../../conn.php");
$result = pg_query($conn, "update usuario set nome='". htmlentities($_POST['nome'], ENT_QUOTES, "UTF-8") ."', sobrenome ='". htmlentities($_POST['sobrenome'], ENT_QUOTES, "UTF-8") ."', phone = '". htmlentities($_POST['telefone'], ENT_QUOTES, "UTF-8") ."', endereco_logradouro = '".htmlentities($_POST['logradouro'], ENT_QUOTES, "UTF-8") ."', endereco_numero = '". htmlentities($_POST['numero'], ENT_QUOTES, "UTF-8") ."', endereco_complemento = '". htmlentities($_POST['complemento'], ENT_QUOTES, "UTF-8") ."', endereco_bairro = '". htmlentities($_POST['bairro'], ENT_QUOTES, "UTF-8") ."', endereco_cidade = '". htmlentities($_POST['cidade'], ENT_QUOTES, "UTF-8") ."', endereco_estado = '".htmlentities($_POST['estado'], ENT_QUOTES, "UTF-8") ."', resposta = '". htmlentities($_POST['resposta'], ENT_QUOTES, "UTF-8")."', tipo = '". htmlentities($_POST['tipo'], ENT_QUOTES, "UTF-8") . "'  where email = '". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8") ."'");
 
if(pg_affected_rows($result) > 0){
	$result = pg_query($conn, "select nome from usuario where email = '". htmlentities($_POST['email'], ENT_QUOTES, "UTF-8")."'");
	echo (pg_fetch_row($result)[0]);
}else
	echo null;
?>
