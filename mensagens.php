<?php 
include 'assets/hf/header.php';
require 'classes/contato.class.php';
$contato = NEW Contato();
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
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

    <article class="mastheads article text-center text-white d-flex">
      <div class="container my-auto">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin.php" style="color: #2c3e50;">Painel do Administrador</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mensagens</li>
        </ol>
      </nav>

        <?php
        $contato = $contato->getAll();
        ?>
        <div class="row justify-content-center mt-4 mb-5">
            <div class="col-md-6 ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">E-mail</th>
                        <th scope="col">Mensagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($contato as $dados){
                        $html = '
                        <tr>
                        <td>'.$dados['email'].'</td>
                        <td>'.$dados['mensagem'].'</td>
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
    </article>

</div>
<div class="container-fluid bg-dark text-center text-white">
  <p class="pb-2 mb-0 pt-2">Desenvolvido por Lucas Büttow <i class="fas fa-copyright"></i></p>
</div>

<?php  
require 'assets/hf/footer.php';
} else{
    header("Location: index.php");
}
?>
