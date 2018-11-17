<?php
	//Incluir a conexão com banco de dados
    require 'classes/user.class.php';
    $user = NEW User(); 
	
	//Recuperar o valor da palavra
	$usuarios = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	if($usuarios == ''){
		$result = $user->getUsuarios($usuarios);	
		
		// $result = $result->fetchAll();
		
		foreach($result as $dados){
			$html = '
			<tr>
			<td>'.$dados['nome'].'</td>
			<td>'.$dados['email'].'</td>
			<td><button type="button" class="btn btn-secondary">Editar</button></td>
			<td><button type="button" class="btn btn-danger">Excluir</button></td>
			<td><button type="button" class="btn btn-primary">Arquivos</button></td>
			</tr>';
			echo $html;
			}		
	}
	else{
	$result = $user->consultaUsers($usuarios);
	
	if($result->rowCount() <= 0){
		echo "Nenhum usuário encontrado...";
	}else{
        $result = $result->fetchAll();
		
		foreach($result as $dados){
			$html = '
			<tr>
			<td>'.$dados['nome'].'</td>
			<td>'.$dados['email'].'</td>
			<td><button type="button" class="btn btn-secondary">Editar</button></td>
			<td><button type="button" class="btn btn-danger">Excluir</button></td>
			<td><button type="button" class="btn btn-primary">Arquivos</button></td>
			</tr>';
			echo $html;
			}
	}
}
?>