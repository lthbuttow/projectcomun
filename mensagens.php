<?php 
include 'inc/header.php';
require 'classes/contato.class.php'; 
if (isset($_SESSION['id_adm']) && !empty($_SESSION['id_adm'])) {
$contato = NEW Contato();
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
    <header class="mastheadss text-white d-flex">
      <div class="container my-auto">
        <?php
        $contato = $contato->getAll();
        ?>
        <div class="row">
        </div>
      </div>  
    </header>
</div>

<footer class="bg-darks text-white" id="news">
  <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-comments-dollar text-orange mb-3 sr-icon-1"></i>
              <h3 class="mb-3">Comunique-se</h3>
              <p class="text-muted mb-0">A solução para você melhorar sua relação com o cliente</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fab fa-4x fa-js-square text-orange mb-3 sr-icon-2"></i>
              <h3 class="mb-3">Avançando</h3>
              <p class="text-muted mb-0">Usamos sempre as melhores tecnologias para facilitar suas atividades!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-mobile-alt text-orange mb-3 sr-icon-3"></i>
              <h3 class="mb-3">Responsividade</h3>
              <p class="text-muted mb-0">Site preparado para ser acessado por todos tipos de dispositivos</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-heart text-orange mb-3 sr-icon-4"></i>
              <h3 class="mb-3">Feito para você</h3>
              <p class="text-muted mb-0">Sempre pensando na melhor experiência para o usuário</p>
            </div>
          </div>
        </div>
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



