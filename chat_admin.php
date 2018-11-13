<?php 
include 'inc/header.php';
require('classes/user.class.php'); 
$user = NEW User(); 
if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
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
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
      <?php
      
      
      $result = $user->getUsuarios();
      ?>
    <article class="mastheads article text-center text-white d-flex">
      <div class="container my-auto">
            <div id="alert">
            </div>
        
          <!-- table -->
          <div class="row justify-content-center mt-4 mb-5">
            <div class="col-md-6 ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Mensagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($result as $usuario){
                        $html = '
                        <tr>
                        <th scope="row">'.$usuario['id_user'].'</th>
                        <td>'.$usuario['nome'].'</td>
                        <td>'.$usuario['email'].'</td>
                        <td><a href="chat.php?id_para='. $usuario['id_user'].'" class="btn btn-info">Iniciar</a></td>
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
require_once ('inc/footer.php');
} else{
    header("Location: index.php");
}
?>


