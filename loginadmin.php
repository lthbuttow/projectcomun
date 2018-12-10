<?php 
include 'assets/hf/header.php'; 
?>
<body class="form">
    <form method="POST" action="funcs/loga_adm.php" class="form-signin text-center">
    	<?php 
    	if (isset($_SESSION['mensagem'])) {
    		echo $_SESSION['mensagem'];
    		unset($_SESSION['mensagem']);
    	}
    	?>
      <a href="index.php" data-toggle="tooltip" data-placement="top" title="Clique para voltar para a página principal">
      <img class="mb-3" src="assets/img/gerente.png" alt="gerente" width="72" height="72"></a>
      <h3 class="h3 text-center font-weight-normal mb-4">FAÇA SEU LOGIN</h3>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Digite seu e-mail..." required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Digite sua senha..." required>
      <button class="btn btn-lg btdark btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">Lucas Büttow&copy; 2018</p>
    </form>    
<?php  
include 'assets/hf/footer.php';
?>