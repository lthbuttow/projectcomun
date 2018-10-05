<?php

class BD {

    // private $host = "localhost";
    // private $usuario = "postgres";
    // private $senha = "12345";
    // private $banco = "projeto";
    // // private $porta = "5432";

	// private $pdo;
  
    public function __construct() {

     try {
            $this->pdo = new PDO("pgsql:host=localhost; dbname=projeto;  user=postgres;  password=12345");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
            } catch (PDOException  $e) {
                 print $e->getMessage();
            }
        }
    
 }
