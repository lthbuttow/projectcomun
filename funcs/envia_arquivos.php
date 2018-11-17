<?php
session_start();
require '../classes/arquivos.classes.php';
$arquivo = NEW Arquivo();

if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])) {
	$file = $_FILES['arquivo'];

	$id_para = $_GET['id_para'];
	$id_de = $_SESSION['id_user'];
	$comentario = $_POST['comment'];
	$nome = $_SESSION['nome_user'];
	
	$nome_arquivo = 'default.jpg';

	if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
		
		$tipo = $file['type'];

		if (in_array($tipo, array('image/jpeg', 'image/png'))) {
			
			$nm = explode(' ',$nome);
			$nm_concat = implode($nm);
			$nm_final = strtolower($nm_concat);

			$nome_arquivo = $nm_final.md5(time().rand(0,99)).'.png';
			move_uploaded_file($file['tmp_name'], '../arquivos/'.$nome_arquivo);

			$result = $arquivo->addArquivo($id_de,$id_para,$nome_arquivo,$comentario);
			if ($result == true) {
				$_SESSION['mensagem'] = '
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<strong>Sucesso!</strong> Arquivo enviado!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				header("Location: ../user.php");
			} else{
				$_SESSION['mensagem'] = '
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>ERRO!</strong> Não foi possível enviar o arquivo, tente novamente!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				header("Location: ../user.php");				
			}
		
		}
		elseif (in_array($tipo, array('application/pdf'))) {
			
			$nm = explode(' ',$nome);
			$nm_concat = implode($nm);
			$nm_final = strtolower($nm_concat);

			$nome_arquivo = $nm_final.date('Y-m-d H:i:s').'.pdf';
			move_uploaded_file($file['tmp_name'], '../arquivos/'.$nome_arquivo);

			$result = $arquivo->addArquivo($id_de,$id_para,$nome_arquivo,$comentario);
			if ($result == true) {
				$_SESSION['mensagem'] = '
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<strong>Sucesso!</strong> Arquivo enviado!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				header("Location: ../user.php");
			} else{
				$_SESSION['mensagem'] = '
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>ERRO!</strong> Não foi possível enviar o arquivo, tente novamente!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				header("Location: ../user.php");				
			}
		
		}		
		else{
			$_SESSION['mensagem'] = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Extensão inválida!</strong> Envie somente arquivos PNG, JPG ou PDF!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';
			header("Location: ../user.php");
		}
	}

} else{
	$_SESSION['mensagem'] = '
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Erro!</strong> Favor selecionar algum arquivo!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	</div>';
	header("Location: ../user.php");
}
?>