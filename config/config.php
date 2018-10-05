<?php
session_start();

global $pdo;

try {
	$pdo = new PDO("pgsql:dbname=projeto;host=localhost","postgres","12345");
} catch(PDOException $e){
	echo "Falhou: ".$e->getMessage();
	exit;
}
?>