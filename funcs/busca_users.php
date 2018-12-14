<?php
	//Incluir a conexão com banco de dados
	session_start();
    require '../classes/user.class.php';
    $user = NEW User(); 
	
	//Recuperar o valor da palavra
	$usuarios = $_POST['palavra'];
	$p = $_SESSION['p'];
	$qt_por_pag = $_SESSION['qt_por_pag'];
	
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	if($usuarios == ''){
		$result = $user->getUsuariosPagination($p,$qt_por_pag);	
		
		// $result = $result->fetchAll();
		
		foreach($result as $dados){
			$html = '
			<tr>
			<td>'.$dados['nome'].'</td>
			<td>'.$dados['email'].'</td>
			<td><a class="btn btn-secondary" href="edita_users.php?id_user='. $dados['id_user'].'">Editar</a></td>
			<td><a class="btn btn-danger excluir" href="funcs/exclui_user.php?id_user='. $dados['id_user'].'">Excluir</a></td>
			<td><a class="btn btn-warning" href="chat.php?id_para='. $dados['id_user'].'">Iniciar</a></td> 
			<td><a class="btn btn-primary" href="caixa_arquivos_admin.php?id_user='.$dados['id_user'].'">Arquivos</a></td>
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
			<td><a class="btn btn-secondary" href="edita_users.php?id_user='. $dados['id_user'].'">Editar</a></td>
			<td><a class="btn btn-danger excluir" href="funcs/exclui_user.php?id_user='. $dados['id_user'].'">Excluir</a></td>
			<td><a class="btn btn-warning" href="chat.php?id_para='. $dados['id_user'].'">Iniciar</a></td> 
			<td><a class="btn btn-primary" href="caixa_arquivos_admin.php?id_user='.$dados['id_user'].'">Arquivos</a></td>
			</tr>';
			echo $html;
			}
	}
}
?>