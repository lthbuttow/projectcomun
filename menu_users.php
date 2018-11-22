<?php 
include 'inc/header.php';
require 'classes/user.class.php';
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
          <li class="breadcrumb-item active" aria-current="page">Menu de usuários</li>
        </ol>
      </nav>
        <?php
        $user = $user->getUsuarios();
        ?>
        <h6>Pesquisar Usuários</h6>
        <form method="POST" id="form-pesquisa" class="form-group" >
          <input type="text" name="pesquisa" id="pesquisa" class="form-control" placeholder="Digite o nome do usuário">
        </form>

        <div class="row">
            <div class="col-md-12 text-left">
              <a class="btn btn-primary" href="add_user.php" role="button">ADICIONAR USUÁRIO</a>
            </div>
        </div>

        <div class="row justify-content-center mt-4 mb-5">
            <div class="col-md-12 ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Edição</th>
                        <th scope="col">Exclusão</th>
                        <th scope="col">Chat</th>
                        <th scope="col">Enviar - Receber</th>
                    </thead>
                    <tbody id = content>
                        <?php 
                        foreach($user as $dados){
                        $html = '
                        <tr>
                        <td>'.$dados['nome'].'</td>
                        <td>'.$dados['email'].'</td>
                        <td><button type="button" class="btn btn-secondary">Editar</button></td>
                        <td><button type="button" class="btn btn-danger">Excluir</button></td>
                        <td><a class="btn btn-warning" href="chat.php?id_para='. $dados['id_user'].'">Iniciar</a></td>                   
                        <td><a class="btn btn-primary acessa" href="caixa_arquivos_admin.php?id_user='.$dados['id_user'].'"">Arquivos</a></td>
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
