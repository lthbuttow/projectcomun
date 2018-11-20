<?php 
include 'inc/header.php'; 
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
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
            if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" id="scrollSuave">Encerrar Sessão</a>
            </li>
            <?php
            } else{
            ?>
            <li class="nav-item">
              <a class="nav-link" href="loginuser.php" id="scrollSuave">Área do Cliente</a>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
      <?php
      require('classes/arquivos.classes.php');
      $arquivo = NEW Arquivo(); 
      $result = $arquivo->meusArquivos($id_para);
      ?>
    <article class="mastheads article text-center text-white d-flex">
      <div class="container my-auto">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="user.php" style="color: #2c3e50;">Painel do Usuário</a></li>
              <li class="breadcrumb-item active" aria-current="page">Arquivos Recebidos</li>
            </ol>
          </nav>	
        <div class="row">
        <div class="col-md-12 ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Arquivo</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Data</th>
                        <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($result as $arquivo){
                        $html = '
                        <tr>
                        <th scope="row">'.$arquivo['link'].'</th>
                        <td>'.$arquivo['comentario'].'</td>
                        <td>'.$arquivo['dt_envio'].'</td>
                        <td><a href="arquivos/'. $arquivo['link'].'" download class="btn btn-info">Baixar</a></td>
                        </tr>';
                        echo $html;
                        }
                        ?>
                    </tbody>
                </table>
            </div> 
            </div>         
          </div>
        </div>
        </div>       
    </article>

</div>
<div class="container-fluid bg-dark text-center text-white">
  <p class="pb-2 mb-0 pt-2">Desenvolvido por Lucas Büttow <i class="fas fa-copyright"></i></p>
</div>

<?php  
require_once ('inc/footer.php');
} else{
    header("Location: index.php");
}
?>



