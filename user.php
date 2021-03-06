<?php 
include 'assets/hf/header.php'; 
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
      <?php
      require 'classes/admin.class.php';

      $id_user = $_SESSION['id_user'];
      $admin = NEW Admin(); 
      $result = $admin->getAdmin();
      $res = $admin->getSenhaPadrao($id_user);
      ?>
    <article class="mastheads article text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
            <div class="col-md-6 mx-auto">
            <?php
              $html='<div class="alert alert-warning" role="alert">
              Atenção! Sua senha padrão é 12345, recomendamos a troca da senha para maior segurança!
              </div>';
              
              if($res['senha'] == md5('12345')){
                echo $html;
              }
              
              if (isset($_SESSION['mensagem'])) {
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
              }
            ?>            
            </div>
        </div>
            <div id="alert">
            </div>
        <h3 class="mb-4 nm_user">Olá <?php echo $_SESSION['nome_user'];  ?> !</h3>
        <div class="row justify-content-center">
          <div class="col-md-4 col-sm-4 col-xl-2 mt-2">
            <a class="btn btn-md btn-outline-info btam" id="edita_user" role="button" data-toggle="tooltip" data-placement="top" title="atualize suas informações, como e-mail e nome" ><span class="fas fa-user-edit" style="margin-right:.2em;"></span>ALTERAR DADOS</a>
          </div>
          <div class="col-md-4 col-sm-4 col-xl-2 mt-2">
            <a class="btn btn-md btn-outline-success btam" id="envia_user"  role="button" data-toggle="tooltip" data-placement="top" title="Envie seus arquivos"><span class="fas fa-upload" style="margin-right:.2em;"></span>ARQUIVOS</a>
          </div>
          <div class="col-md-4 col-sm-4 col-xl-2 mt-2">
            <a class="btn btn-md btn-outline-secondary btam" href="caixa_arquivos.php?id_user=<?php echo $_SESSION['id_user']; ?>"  role="button" data-toggle="tooltip" data-placement="top" title="Verifique aqui novos arquivos recebidos"><span class="fas fa-download" style="margin-right:.2em;"></span>RECEBIDOS</a>
          </div>          
          <div class="col-md-4 col-sm-4 col-xl-2 mt-2">
            <a class="btn btn-md btn-outline-warning btam " id="chat_enviar" href="chat.php?id_para=<?php echo $result['id_user'];?>" role="button" data-toggle="tooltip" data-placement="top" title="Tire suas dúvidas com um operador em tempo real"><span class="fas fa-headset" style="margin-right:.2em;"></span>SUPORTE</a>
          </div>          
        </div>
          <!-- editar dados -->
          <div class="row justify-content-center mt-4 mb-5" id="edita">
            <div class="col-md-6 ">
              <form method="POST" id=form_editar>
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Digite o nome do usuário...">
                </div>              
                <div class="form-group">
                  <label for="email">E-mail </label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite o E-mail" required>
                </div>
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite a senha..." required>
                </div>
                <button type="submit" class="btn btn-info" id="envia_alter">Enviar</button>
              </form> 
            </div>         
          </div>
          <!-- envio de arquivos-->
          <div class="row justify-content-center mt-4 mb-5" id="envia">
            <div class="col-md-6">
              <form action="funcs/envia_arquivos.php?id_para=<?php echo $result['id_user'];?>" method="POST" enctype="multipart/form-data" id="form_envia_arquivos_user">
                  <div class="form-group">
                    <label for="arquivo">Envie seus arquivos aqui</label>
                    <input type="file" name="arquivo" class="form-control-file" id="arquivo" aria-describedby="enviodearquivos">
                  </div> 
                  <div class="form-group">
                    <label for="comment">Deixe seu comentário aqui</label>
                    <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Digite sua mensagem..."></textarea>
                  </div>                               
                  <button type="submit" class="btn btn-primary" id="envia_arquivos">Enviar</button>
              </form> 
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


