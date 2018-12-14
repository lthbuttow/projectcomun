<?php
require 'banco.class.php';
class User extends BD{
	
	
	public function __construct() {
		parent::__construct();
	}

	public function login($email,$senha){
		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND admin = '0'";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', md5($senha));
		
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
		$sql->bindValue(':senha', md5($senha));
		
		if($sql->execute()){
		
		return true;

	} else{
		return false;
		}		
	}

	public function getDadosEditar($id_user){
		$sql = "SELECT * FROM usuarios WHERE id_user = :id_user";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		
		if($sql->execute()){

		$result = $sql->fetch();
		
		return $result;
	} else{
		return false;
		}
	}

	public function getDadosEdita($id_user){
		$sql = "SELECT * FROM usuarios WHERE id_user = :id_user";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		
		if($sql->execute()){

		$result = $sql->fetch();
		
		return $result;
	} else{
		return false;
		}
	}	

	public function editar($id_user,$nome,$email,$senha){
		$sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id_user = :id_user";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', md5($senha));
		
		if($sql->execute()){
		
		return true;
	} else{
		return false;
		}
	}

	public function excluir($id_user){
		$sql = "DELETE FROM usuarios WHERE id_user = :id_user";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id_user', $id_user);
		
		if($sql->execute()){
		
		return true;
	} else{
		return false;
		}
	}	
	
	public function getUsuarios(){
		$sql = "SELECT * FROM usuarios WHERE admin ='0' ORDER BY id_user desc";
		$sql = $this->pdo->query($sql);
	
		if($sql->execute()){

		$result = $sql->fetchAll();
		
		return $result;
	} else{
		return false;
		}
	}

	public function getUsuariosPagination($p,$qt_por_pag){
		$sql = "(SELECT * FROM usuarios WHERE admin ='0' LIMIT $qt_por_pag OFFSET $p) ORDER BY id_user DESC";
		$sql = $this->pdo->query($sql);
	
		if($sql->execute()){

		$result = $sql->fetchAll();
		
		return $result;
	} else{
		return false;
		}
	}	

	public function getTotalUsuarios(){
		$sql = "SELECT COUNT (id_user) as contagem FROM usuarios WHERE admin ='0'";
		$sql = $this->pdo->query($sql);
	
		if($sql->execute()){

		$result = $sql->fetch();
		
		return $result;
	} else{
		return false;
		}
	}	

	public function consultaUsers($user){
		$sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :user AND admin ='0'");
		$sql->bindValue(":user", '%'.$user.'%');
	
		if($sql->execute()){

		// $result = $sql->fetchAll();
		
		return $sql;
	} else{
		return false;
		}
	}
	
}
?>
