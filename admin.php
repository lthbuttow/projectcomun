<?php 
include 'inc/header.php';
require 'classes/arquivos.classes.php';
$arquivo = NEW Arquivo();
if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
?>
<!-- topo -->
<body>
<div id="page-top" role="header">

    
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Comun.</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
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
    </div>    
    <article class="mastheads text-center text-white d-flex">
      <div class="container my-auto">
        <h2>Olá <?php echo $_SESSION['nome'];  ?> !</h2>
        <a class="btn btn-primary" href="add_user.php" role="button">ADICIONAR USUÁRIO</a>
        <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="#send"><i class="fas fa-4x fa-file-upload text-orange mb-3 sr-icon-1"></i>
              <h4 class="mb-3">Enviar Arquivos</h4></a>
              <p class="text-muted mb-0">Envie e receba arquivos, interaja com seus clientes</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="chat_admin.php"><i class="fas fa-4x fa-comment-dots text-orange mb-3 sr-icon-2"></i>
              <h4 class="mb-3">Iniciar Chat</h4></a>
              <p class="text-muted mb-0">Uma opção de conversa em tempo real!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="menu_users.php"><i class="fas fa-4x fa-id-card text-orange mb-3 sr-icon-3"></i>
              <h4 class="mb-3">Menu de Usuários</h4></a>
              <?php 
                $qtd_arquivos = $arquivo->getStatus();
                $qtd_mensagem = $arquivo->getStatusMsg();
              ?>
              <p class="text-muted mb-0">Atualmente você tem <?php echo $qtd_arquivos; ?> arquivos que ainda não foram visualizados</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="mensagens.php"><i class="fas fa-4x fa-envelope text-orange mb-3 sr-icon-4"></i>
              <h4 class="mb-3">Mensagens</h4></a>
              <p class="text-muted mb-0">Você tem <?php echo $qtd_mensagem; ?> mensagens a serem visualizadas</p>
            </div>
          </div>
        </div>
      </div>
    </article>


<div class="container-fluid bg-dark text-center text-white">
  <p class="pb-2 mb-0 pt-2">Desenvolvido por Lucas Büttow <i class="fas fa-copyright"></i></p>
</div>

<?php  
include 'inc/footer.php';
} else{
    header("Location: index.php");
}
?>



