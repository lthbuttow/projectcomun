<?php
session_start(); 
require '../classes/user.class.php';

$user = new User();
$array = array();

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
$id = $_POST['id_user'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];



$result = $user->editar($id,$nome,$email,$senha);
	
	
	if ($result == true) {
	
	$array = array('Status' => 'OK' );
	
	} else {

	$array = array('Status' => 'ERRO' );
	}
} else {
	$array = array('Status' => 'ERRO' );
}
	echo json_encode($array);
?>