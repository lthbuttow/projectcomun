<?php
session_start(); 
require '../classes/user.class.php';

$user = new User();
$array = array();


$id_user = $_POST['id_user'];

$result = $user->excluir($id_user);
	
	
	if ($result == true) {
	
	$array = array('Status' => 'OK' );
	
	} else {

	$array = array('Status' => 'ERRO' );
	}

	echo json_encode($array);
?>