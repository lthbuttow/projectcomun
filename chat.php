<?php 
include 'inc/header.php'; 
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
    $_SESSION['id_suporte'] = $_GET['id_suporte'];
?>
<!-- topo -->
<body>
    <div class="row justify-content-center" >
    <div class="col-md-10">
		<div id="content">
			<div id="lista">

			</div>
			<hr/>
			<form id="form-chat" method="POST" enctype="multipart/form-data">
					<div class="input-group">
						<input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="form-control" />
						<span class="input-group-btn">
							<input type="submit" value="&rang;&rang;" id="envMsg" class="btn btn-success">
						</span>
					</div>
			</form>
		</div>
	</div>
	<div id="status">
		
	</div>			
		
	<br><br>
	</div>
<?php  
include 'inc/footer.php';
} else{
    header("Location: index.php");
}
?>



