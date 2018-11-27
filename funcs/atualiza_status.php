<?php
session_start(); 
require '../classes/arquivos.class.php';

$arquivo = new Arquivo();
$array = array();


$result = $arquivo->atualizaStatus();
	
	
	if ($result == true) {
	
	$array = array('Status' => 'OK' );
	
	} else {

	$array = array('Status' => 'ERRO' );
	}

	echo json_encode($array);
?>