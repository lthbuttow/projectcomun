<?php
session_start(); 
require 'classes/arquivos.classes.php';

$arquivo = new Arquivo();
$array = array();

$id_de = $_POST['id_user'];

$result = $arquivo->atualizaArquivos($id_de);
	
	
	if ($result == true) {
	
	$array = array('Status' => 'OK' );
	
	} else {

	$array = array('Status' => 'ERRO' );
	}

	echo json_encode($array);
?>