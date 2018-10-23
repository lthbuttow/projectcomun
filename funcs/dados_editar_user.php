<?php
session_start(); 
require '../classes/user.class.php';

$user = NEW User();
$array = array();

	$id = $_POST['id_user'];
	
	$result = $user->getDadosEditar($id);

	if ($result == true) {
		
        // $array = array('Status' => 'OK');
		$array = array('Status' => 'OK');
		$result = $result+$array;
        echo json_encode($result);

	} else{
		$array = array('Status' => 'ERRO');
		$result = $result+$array;
        echo json_encode($result);
	}



?>