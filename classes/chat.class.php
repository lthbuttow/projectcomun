<?php
require 'banco.class.php';
class Chat extends BD{
	
	
	public function __construct() {
		parent::__construct();
	}
    
    public function consultaMsg($id_de,$id_para){
        $sql = $this->pdo->prepare("SELECT * FROM (SELECT * FROM chat WHERE (id_de = :id_de AND id_para = :id_para) OR (id_de = :id_para AND id_para = :id_de) ORDER BY id DESC LIMIT 10) sub ORDER BY id ASC");
        $sql->bindValue(":id_de", $id_de);
        $sql->bindValue(":id_para", $id_para);
        
        if($sql->execute()){

            $resultado = $sql;
            return $resultado;
        } else{
            return false;
        }       
    }

    public function addMsg($id_de,$id_para,$mensagem){
        $sql = $this->pdo->prepare("INSERT INTO chat (id_de,id_para,mensagem) VALUES (:id_de, :id_para, :mensagem)");
        $sql->bindValue(":id_de", $id_de);
        $sql->bindValue(":id_para", $id_para);
        $sql->bindValue(":mensagem", $mensagem);
        
        if($sql->execute()){

            return true;
        } else{
            return false;
        }   
    }

    public function addMsgAdmin($id_de,$id_para,$mensagem){
        $sql = $this->pdo->prepare("INSERT INTO chat (id_user,id_admin,mensagem) VALUES (:id_de, :id_para, :mensagem)");
        $sql->bindValue(":id_de", $id_para);
        $sql->bindValue(":id_para", $id_de);
        $sql->bindValue(":mensagem", $mensagem);
        
        if($sql->execute()){

            return true;
        } else{
            return false;
        }   
    }    
}
?>
