<?php
require 'banco.class.php';
class Admin extends BD{
	
	
	public function __construct() {
		parent::__construct();
	}

	public function login($email,$senha){
		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		
		if($sql->execute()){

		$result = $sql->fetch();
		
		return $result;
	} else{
		return false;
		}
	}

	public function insereUser($nome,$email,$senha){
		$sql = "INSERT INTO usuarios (nome,email,senha) VALUES (:nome,:email,:senha)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		
		if($sql->execute()){
		
		return true;

	} else{
		return false;
		}		
	}

	public function getAdmin(){
		$sql = "SELECT * FROM usuarios WHERE admin = '1'";
		$sql = $this->pdo->query($sql);
		
		if($sql->execute()){

		$result = $sql->fetch();
		
		return $result;
	} else{
		return false;
		}		
	}
}
?>
