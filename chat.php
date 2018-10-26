<?php 
include 'inc/header.php';
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) || isset($_SESSION['id_adm']) && !empty($_SESSION['id_adm']) ) {
	$_SESSION['id_para'] = $_GET['id_para'];
?>
<!-- topo -->
<body>
    <div class="row justify-content-center" >
    <div class="col-md-10 mt-5">
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



