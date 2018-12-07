<?php
session_start(); 
require '../classes/user.class.php';

$user = NEW User();
$array = array();


$id_user = $_GET['id_user'];

$result = $user->excluir($id_user);


	if ($result == true) {
		$_SESSION['mensagem'] = '
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
		  <strong>Sucesso!</strong> Usuário excluído!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
		header("Location: ../menu_users.php");		
	

	} else{
		$_SESSION['mensagem'] = '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Erro!</strong> Não foi possível excluir o usuário!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
		header("Location: ../menu_users.php");
	}



?>