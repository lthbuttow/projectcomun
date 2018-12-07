<?php 
require '../classes/contato.class.php';

$array = array('Status' => 'Vazio' );


$contato = new Contato();
if (!empty($_POST['email']) && !empty($_POST['message'])) {

$email = $_POST['email'];
$text = $_POST['message'];

} else {
	$array = array('Status' => 'ERRO' );
}


$result = $contato->insere($email,$text);
	
	
	if ($result == true) {
	
	$array = array('Status' => 'OK' );
	
	} else {

	$array = array('Status' => 'ERRO' );
	}

	echo json_encode($array);

?>