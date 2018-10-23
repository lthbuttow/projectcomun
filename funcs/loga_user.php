<?php
session_start(); 
require '../classes/user.class.php';

$user = NEW User();

if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$result = $user->login($email,$senha);

	if ($result == true) {
		
		$_SESSION['id_user'] = $result['id_user'];
		$_SESSION['nome_user'] = $result['nome'];
		header("Location: ../user.php");

	} else{
		$_SESSION['mensagem'] = '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Erro!</strong> Não foi possível realizar o login!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
		header("Location: ../loginuser.php");
	}

} else{
	$_SESSION['mensagem'] = '
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <strong>Erro!</strong> Verifique suas informações!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>';	
	header("Location: ../loginuser.php");
}

?>