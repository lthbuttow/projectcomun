<?php 
require '../classes/admin.class.php';

$array = array('Status' => 'Vazio' );


$admin = new Admin();
if (!empty($_POST['email']) && !empty($_POST['nome'])) {

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha= $_POST['senha'];

} else {
	$array = array('Status' => 'ERRO' );
}


$resultado = $admin->insereUser($nome,$email,$senha);
	
	
	if ($resultado == true) {
	
	$array = array('Status' => 'ok' );
	
	} else {

	$array = array('Status' => 'ERRO' );
	}

	echo json_encode($array);

?>