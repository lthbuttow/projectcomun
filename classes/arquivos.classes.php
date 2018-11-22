<?php
require 'banco.class.php';
class Arquivo extends BD{
	
	
	public function __construct() {
		parent::__construct();
	}
    
    public function consultaArquivo($id_de,$id_para){
        $sql = $this->pdo->prepare("SELECT * FROM (SELECT * FROM arquivos WHERE (id_de = :id_de AND id_para = :id_para) OR (id_de = :id_para AND id_para = :id_de) ORDER BY id DESC) sub ORDER BY id ASC");
        $sql->bindValue(":id_de", $id_de);
        $sql->bindValue(":id_para", $id_para);
        
        if($sql->execute()){

            $resultado = $sql;
            return $resultado;
        } else{
            return false;
        }       
    }

    public function meusArquivos($id_para){
        $sql = $this->pdo->prepare("SELECT * FROM arquivos WHERE id_para = :id_para");
        $sql->bindValue(":id_para", $id_para);
        
        if($sql->execute()){

            $resultado = $sql->fetchAll();
            return $resultado;
        } else{
            return false;
        }       
    }
    
    public function meusArquivosAdmin($id_de,$id_para){
        $sql = $this->pdo->prepare("SELECT * FROM arquivos WHERE id_de = :id_de AND  id_para = :id_para");
        $sql->bindValue(":id_de", $id_de);
        $sql->bindValue(":id_para", $id_para);
        
        if($sql->execute()){

            $resultado = $sql->fetchAll();
            return $resultado;
        } else{
            return false;
        }       
    }    

    public function addArquivo($id_de,$id_para,$link,$comentario){
        $sql = $this->pdo->prepare("INSERT INTO arquivos (id_de,id_para,link,comentario) VALUES (:id_de, :id_para, :link, :comentario)");
        $sql->bindValue(":id_de", $id_de);
        $sql->bindValue(":id_para", $id_para);
        $sql->bindValue(":link", $link);
        $sql->bindValue(":comentario", $comentario);
        
        if($sql->execute()){

            return true;
        } else{
            return false;
        }   
    }

    public function getStatus(){
		$sql = "SELECT * FROM arquivos WHERE chequed ='0' AND id_para = '1'";
		$sql = $this->pdo->query($sql);
	
		if($sql->execute()){

		$result = $sql->rowCount();
		
		return $result;
	} else{
		return false;
		}  
    }
    
    public function getStatusMsg(){

		$consulta = $this->pdo->query("SELECT * FROM contato WHERE chequed = '0'");
		$consulta->execute();

		$resultado = $consulta->rowCount();
		return $resultado;
    }
    
    public function atualizaStatus(){
        $sql = $this->pdo->query("UPDATE contato SET chequed = '1' WHERE chequed = '0'");
		if($sql->execute()){
            
            return true;
        } else{
            return false;
            }  
    }

    public function atualizaArquivos($id_de){
        $sql = $this->pdo->prepare("UPDATE arquivos SET chequed = '1' WHERE id_de = :id_de");
        $sql->bindValue(":id_de", $id_de);
		if($sql->execute()){
            
            return true;
        } else{
            return false;
            }  
    }    
    
}
?>
