<?php
session_start(); 
require '../classes/admin.class.php';

$admin = NEW Admin();

if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$result = $admin->login($email,$senha);

	var_dump($result);
	if ($result == true) {
		
		$_SESSION['id_adm'] = $result['id_admin'];
		$_SESSION['nome_adm'] = $result['nome'];
		header("Location: ../admin.php");

	} else{
		$_SESSION['mensagem'] = '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Erro!</strong> Não foi possível realizar o login!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
		header("Location: ../loginadmin.php");
	}

} else{
	$_SESSION['mensagem'] = '
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <strong>Erro!</strong> Verifique suas informações!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>';	
	header("Location: ../loginadmin.php");
}

?>