<?php 
include 'assets/hf/header.php'; 
if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    $id_para = $_GET['id_user'];
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
    <article class="mastheads text-center text-white d-flex">
      <div class="container my-auto">
      
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php" style="color: #2c3e50;">Painel do Administrador</a></li>
            <li class="breadcrumb-item"><a href="menu_users.php" style="color: #2c3e50;">Menu de Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enviar Arquivo</li>
          </ol>
        </nav>

        <div class="row justify-content-center mt-4 mb-2">
          <div class="col-lg-6 col-md-6">
            <div id="alert">
            
            </div>
            <form action="funcs/envia_arquivos.php?id_para=<?php echo $id_para;?>" method="POST" enctype="multipart/form-data" id="form_envia_user">
                  <div class="form-group">
                    <label for="arquivo"><h3>Envie seus arquivos aqui</h3></label>
                    <input type="file" name="arquivo" class="form-control-file" id="arquivo" aria-describedby="enviodearquivos">
                  </div> 
                  <div class="form-group">
                    <label for="comment">Deixe seu comentário aqui</label>
                    <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Digite sua mensagem..."></textarea>
                  </div>                               
                  <button type="submit" class="btn btn-primary" id="envia_arquivo">Enviar</button>
              </form> 
          </div>
        </div>
      </div>
    </article>
</div>
</footer>
<div class="container-fluid bg-dark text-center text-white">
  <p class="pb-2 mb-0 pt-2">Desenvolvido por Lucas Büttow <i class="fas fa-copyright"></i></p>
</div>

<?php  
include 'assets/hf/footer.php';
} else{
    header("Location: index.php");
}
?>



