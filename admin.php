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
              <a href="#chat"><i class="fas fa-4x fa-comment-dots text-orange mb-3 sr-icon-2"></i>
              <h4 class="mb-3">Iniciar Chat</h4></a>
              <p class="text-muted mb-0">Uma opção de conversa em tempo real!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="#users_list"><i class="fas fa-4x fa-id-card text-orange mb-3 sr-icon-3"></i>
              <h4 class="mb-3">Menu de Usuários</h4></a>
              <p class="text-muted mb-0">Site preparado para ser acessado por todos tipos de dispositivos</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="mensagens.php"><i class="fas fa-4x fa-envelope text-orange mb-3 sr-icon-4"></i>
              <h4 class="mb-3">Mensagens</h4></a>
              <p class="text-muted mb-0">Verifique as mensagens recebidas em sua caixa de mensagens</p>
            </div>
          </div>
        </div>
      </div>
    </header>
</div>

<article>
    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <div class="table-responsive-md">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Primeiro</th>
                      <th scope="col">Último</th>
                      <th scope="col">Nickname</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
              </table>
            </div>
            <a class="button blue" href="#news"><span>Mais</span></a>
          </div>
        </div>
      </div>
    </section>
</article>
<div class="container-fluid" id="formulario">
  <div class="row">
    <div class="col-sm-6 mx-auto">
        <div class="well text-blue" style="margin-top: 10%;">
          <div id="alert">
          
          </div>
        <h2 class="text-center pb-2">Envie sua mensagem</h2>
        <hr class="hr-blue">
        <form role="form" id="contactForm">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="email" class="h4">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu email..." required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="h4 ">Mensagem</label>
                <textarea id="message" class="form-control" rows="5" placeholder="Digite sua mensagem..." required></textarea>
                <div class="help-block with-errors"></div>
            </div>
            <div class="text-center padding mt-4">
              <button class="button blue" type="submit" id="enviaEmail"><span>Enviar</span></button>
            </div>  
        </form>
        </div>
    </div>
  </div>
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



