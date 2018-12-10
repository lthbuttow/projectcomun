<?php 
include 'assets/hf/header.php';
include 'funcs/function.php';
include 'classes/arquivos.class.php';
$arquivo = NEW Arquivo();  
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
    $id_de = $_GET['id_user'];
    $id_para = $_SESSION['id_user'];
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
      $total_arquivos = $arquivo->getTotalArquivos($id_de);
      $total_arquivos = $total_arquivos['contagem'];
      $qt_por_pag = 4;
      $paginas = $total_arquivos / $qt_por_pag;
      $pg = 1;
      if(isset($_GET['p']) && !empty($_GET['p'])){
        $pg = $_GET['p'];
      }

      $p = ($pg-1) * $qt_por_pag;      
      $result = $arquivo->meusArquivosAdminPag($id_de,$id_para,$p,$qt_por_pag);
      ?>
    <article class="mastheads article text-center text-white d-flex">
      <div class="container my-auto">
      <?php 
    	if (isset($_SESSION['mensagem'])) {
    		echo $_SESSION['mensagem'];
    		unset($_SESSION['mensagem']);
    	}
    	?> 
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php" style="color: #2c3e50;">Painel do Administrador</a></li>
            <li class="breadcrumb-item"><a href="menu_users.php" style="color: #2c3e50;">Menu de Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Arquivos</li>
          </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 text-left mb-1">
              <a class="btn btn-success" href="envia.php?id_user=<?php echo $id_de; ?>" role="button">ENVIAR ARQUIVO</a>
            </div>
        </div>          
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
                        <td>'.data_br($arquivo['dt_envio']).'</td>
                        <td><a href="arquivos/'. $arquivo['link'].'" download class="btn btn-info">Baixar</a></td>
                        </tr>';
                        echo $html;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
              echo '<ul class="pagination justify-content-center mb-4>';
              for($q=0; $q<$paginas; $q++){
              $paginacao = '  
                  <li class="page-item"><a class="page-link" style="color: #2c3e50;" href="caixa_arquivos_admin.php?id_user='.$id_de.'&p='.($q+1).'">'.($q+1).'</a></li>';
              echo $paginacao;
              }
              echo '</ul>';
            ?>
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
require 'assets/hf/footer.php';
} else{
    header("Location: index.php");
}
?>



