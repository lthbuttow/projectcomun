<?php 
require 'contato.class.php';

$array = array('Status' => 'Vazio' );


$contato = new Contato();
if (!empty($_POST['email']) && !empty($_POST['mensagem'])) {

$email = $_POST['email'];
$text = $_POST['mensagem'];

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