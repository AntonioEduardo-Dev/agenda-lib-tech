<?php
  session_start();
    include_once('../classes/Emprestimo.class.php');
    
    if(!isset($_SESSION['tipo'])){
        echo "<script>window.location='../index.php';</script>";
    }
    
    if (isset($_POST['bt1']) && isset($_POST['bt2'])) {
        $pesquisa=$_POST['bt1'];
        $objy=new Emprestimo();
        $objy->pesquisalivromatricula($pesquisa);
    }else{
        $objxy=new Emprestimo();
      $objxy->visualizaemprestimo();
    }
  
  
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Livros</title>

  <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
  
  <!-- Custom styles for button by-eduardo -->
    <link rel = "stylesheet" type = "text/css" href = "../css/custom.css">

</head>

<body onload="document.f.bt1.focus()">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(61, 201, 179, 1);">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Biblioteca</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
            if (isset($_SESSION['logado'])) {
              $tipo="ADMIN";
              echo "
                <li class='nav-item'>
                  <a class='nav-link' href='../emprestimo.php'>Livros</a>
                </li>";
            }
          ?>   
          <form name="f" class="form-inline" style="padding-right: 10px;" action="" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar Emprestimo" id="textperson" aria-label="Pesquisar" maxlength="7" name="bt1" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="bt2" id="btdapesqui">Pesquisar</button>
          
          </form>
          <?php 
            if (isset($_SESSION['logado'])) {
              echo "
                <li class='nav-item'>
                 <div class='btn-group'>
                      <button type='button' class='btn' id='buttonperson'>".$_SESSION['usuario']."
                      </button>
                      <button type='button' class='btn dropdown-toggle dropdown-toggle-split' id='buttonperson' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <span class='sr-only'>Dropdown</span>
                      </button>
                      <div class='dropdown-menu' id='dropperson'>
                        <a class='dropdown-item' href='../editarusuario/editardados.php'>Opções</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='login.php?deslogar=1'>Sair</a>
                      </div>
                    </div>
                </li>";
                
            }else {
              echo "
                <li class='nav-item'>
                  <a class='nav-link' href='login.php'>Logar</a>
                </li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <br>
    <div class="container table-responsive-lg">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Id Livro</th>
              <th scope="col">Matricula</th>
              <th scope="col">Data inicial</th>
              <th scope="col">Data Final</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $dataatual=date('d-m-20y');
                  for($i=0 ; $i < $_SESSION['numerodelinhasemprestimo'] ; $i++){
                      $data=$_SESSION['empdatefinal'.$i] - $dataatual;
                      if($data>=0){$datatipo="No Prazo";}else{$datatipo="Expirado";}
                      echo "<tr>
                              <th scope='row'>".$_SESSION['empids'.$i]."</th>
                              <td>". $_SESSION['empmatriculas'.$i]."</td>
                              <td>".$_SESSION['empdateini'.$i]."</td>
                              <td>".$_SESSION['empdatefinal'.$i]."</td>
                              <td>".$datatipo."</td>
                            </tr>";
                  }
              
              ?>
          </tbody>
        </table>
                    <form action="" method="POST">
                        <?php
                            if (isset($_SESSION['logado'])) {
                      echo "<input class='form-control' type='text' placeholder='Matrícula' id='btdapesqui' minlength='7' maxlength='7' name='btmatricula' required style='text-align: center;'><br>";
                    echo "<center>
                    <button class='btn btn-outline-success btn-lg-1' type='submit' id='btdapesqui' name='btdevolver' style='color:grey;'>Devolução de Livro</button></center><br>";
                  
                }else{
                    echo "<!-- Botão para acionar modal -->
                                    <center><button type='button' class='btn' id='btdapesquisa' data-toggle='modal' data-target='#ExemploModalCentralizado'>
                                      Login
                                    </button></center>
                                    
                                    <!-- Modal -->
                                    <div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                          <div class='modal-header'>
                                            <h5 class='modal-title' id='TituloModalCentralizado'>Entrar</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>
                                          <div class='modal-body'>
                                            <input class='form-control' type='text' placeholder='Matrícula' id='btdapesquisa' minlength='7' maxlength='7' name='bt1matricula' required><br />
                                            
                                            <input class='form-control' type='password' placeholder='Senha' id='btdapesquisa' name='bt2senha' required >
                                          </div>
                                          <div class='modal-footer'>
                                            <button type='button' class='btn' id='btdapesquisa' data-dismiss='modal'>Cancelar</button>
                                            <button type='submit' class='btn' id='btdapesquisa' name='btlogar1'>Logar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div><br />";
                }
              ?>
            </form>
    </div>
        
  <!-- Bootstrap core JavaScript -->
<!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="../js/main.js"></script>
</body>

</html>
<?php
    if(isset($_POST['btdevolver'])){
        $matricula=$_POST['btmatricula'];
        
        $objx=new Emprestimo();
    $objx->devolverlivroaluno($matricula);
    }
?>