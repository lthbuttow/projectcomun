<?php
session_start(); 
require 'classes/chat.class.php';
$chat = NEW Chat();

$id_de = $_SESSION['id_user'];
$id_para = $_SESSION['id_suporte'];

	if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
		$mensagem = $_POST['mensagem'];

		if (empty($mensagem)) {
			echo "<code>Digite sua mensagem</code>";
		} else {
			$result = $chat->addMsg($id_de,$id_para,$mensagem);
			if ($result == true) {
				echo "Mensagem enviada";
			} else {
				echo "<code>Erro ao enviar sua mensagem</code>";	
			}
		}
	}
?>