<?php
require 'banco.class.php';
class Contato extends BD{
	
	
	public function __construct() {
		parent::__construct();
		
		// $this->db = new BD();

	}

	public function insere($email,$text){
		addslashes($email);
		addslashes($text);
		$sql = "INSERT INTO contato (email, mensagem) VALUES (:email, :mensagem)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':mensagem', $text);
		
		if($sql->execute()){

		return true;
	} else{
		return false;
		}
	}
	public function listar(){

	 	$consulta = $this->pdo->query("SELECT * FROM contato");

		//$consulta->execute();
	 	return $consulta->fetchAll();
	 }
}
?>
