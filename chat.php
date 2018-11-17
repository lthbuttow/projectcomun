<?php 
include 'inc/header.php';
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) || isset($_SESSION['id_adm']) && !empty($_SESSION['id_adm']) ) {
	$_SESSION['id_para'] = $_GET['id_para'];
?>
<!-- topo -->
<body>
    <div class="row justify-content-center" >
    <div class="col-md-6 mt-5">
	
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin.php" style="color: #2c3e50;">Painel do Administrador</a></li>
		<li class="breadcrumb-item"><a href="chat_admin.php" style="color: #2c3e50;">Lista de Usuários</a></li>
		<li class="breadcrumb-item active" aria-current="page">Chat</li>
		</ol>
    </nav>
		<h1 class="text-center">CHAT - SUPORTE</h1>
		<div id="content">
			<div id="lista">

			</div>
			<hr/>
			<form id="form-chat" method="POST">
					<div class="input-group">
						<input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="form-control" />
						<span class="input-group-btn">
							<input type="submit" value="&rang;&rang;" id="envMsg" class="btn btn-info">
						</span>
					</div>
			</form>
		</div>
	</div>		
	</div>
</body>	
<?php  
 include_once ('inc/footer.php');
} else{
    header("Location: index.php");
}
?>



