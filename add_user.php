<?php 
include 'inc/header.php'; 
if (isset($_SESSION['id_adm']) && !empty($_SESSION['id_adm'])) {
?>
<!-- topo -->
<body>
<div id="page-top" role="header">

    
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="admin.php">Comun.</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION['id_adm']) && !empty($_SESSION['id_adm'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" id="scrollSuave">Encerrar Sessão</a>
            </li>
            <?php
            } else{
            ?>
            <li class="nav-item">
              <a class="nav-link" href="loginadmin.php" id="scrollSuave">Administrador</a>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>   
    <header class="mastheads text-center text-white d-flex">
      <div class="container my-auto">
        <h2>Olá <?php echo $_SESSION['nome_adm'];  ?> !</h2>
        <div class="row justify-content-center mt-4 mb-2">
          <div class="col-lg-6 col-md-6">
            <div id="alert">
            
            </div>
            <form method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Digite o nome do usuário...">
              </div>              
              <div class="form-group">
                <label for="exampleInputEmail1">E-mail </label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite o E-mail">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite a senha...">
              </div>
              <button type="submit" class="btn btn-info" id="adiciona_user">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </header>
</div>
</footer>
<div class="container-fluid bg-dark text-center text-white">
  <p class="pb-2 mb-0 pt-2">Desenvolvido por Lucas Büttow <i class="fas fa-copyright"></i></p>
</div>

<?php  
include 'inc/footer.php';
} else{
    header("Location: index.php");
}
?>



