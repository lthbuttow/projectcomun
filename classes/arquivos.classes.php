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

    public function addArquivo($id_de,$id_para,$link){
        $sql = $this->pdo->prepare("INSERT INTO arquivos (id_de,id_para,link) VALUES (:id_de, :id_para, :link)");
        $sql->bindValue(":id_de", $id_de);
        $sql->bindValue(":id_para", $id_para);
        $sql->bindValue(":link", $link);
        
        if($sql->execute()){

            return true;
        } else{
            return false;
        }   
    }
    
}
?>
