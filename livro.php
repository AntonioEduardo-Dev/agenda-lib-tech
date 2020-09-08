<?php 
session_start();
if(!isset($_POST['btlogar1'])){
    if(isset($_GET['livro'])){
        $_SESSION['livroregister']=$_GET['livro'];
        require('classes/Livros.class.php');
        $idlivro=$_GET['livro'];
        $objy=new Livros();
        $objy->pesquisalivroid($idlivro);
    }else{
        echo "<script>window.location='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="shortcut icon" href="favicon.ico" >
  <title>Opções</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
 <!-- Custom styles for button by-eduardo -->
    <link rel = "stylesheet" type = "text/css" href = "css/custom.css">

</head>
<body>
     <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(61, 201, 179, 1);">
    <div class="container">
      <a class="navbar-brand" href="index.php">Biblioteca</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="emprestimo.php">Livros</a>
          </li>
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
                        <a class='dropdown-item' href='editardados.php'>Opções</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='paginas/login.php?deslogar=1'>Sair</a>
                      </div>
                    </div>
                </li>";
                
            }else {
              echo "
                <li class='nav-item'>
                  <a class='nav-link' href='paginas/login.php'>Logar</a>
                </li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!----body-container-emprestimo---->
  <br>
  <br><br>
  <div class="container">
    <div class="row">
       <div class="col-lg-6" >
          <?php 
          if(isset($_GET['livro'])){
        $qrcode=$_GET['livro'];

          $endereco='https://projeto-biblioteca.000webhostapp.com/livro.php?livro='.$qrcode;

          $aux = 'qr_img0.50j/php/qr_img.php?';
          $aux .= 'd='.$endereco.'?'; 
          $aux .= 'e=H&';
          $aux .= 's=6p';
          $aux .= 't=P';
          
          $Dataemprestimoexibir=date('d/m/y'); 

          }else{
              echo "Selecione um livro";
          }
        ?>

        <div style="margin-top: 20px;">
          <img class="rounded mx-auto d-block" style="border: 1px solid #000;" src="<?php if(isset($_GET['livro'])){ echo $aux;} ?>">
        </div>
        <br>
       </div>

        <div class="col-lg-6" style="border:1px solid #000;">
          <table class="table table-hover" >
          <tbody>
              <tr>
                <th scope="row">Id Livro:</th>
                <td><?php echo $_SESSION['idlivro'];?></td>
                
              </tr>
              <tr>
                <th scope="row">Título:</th>
                <td><?php echo $_SESSION['titulolivro'];?></td>
                
              </tr>
              <tr>
                <th scope="row">Gênero:</th>
                <td><?php echo $_SESSION['generolivro'];?></td>
              </tr>
              <tr>
                <th scope="row">Autor:</th>
                <td><?php echo $_SESSION['autorlivro'];?></td>
              </tr>
              <tr>
                <th scope="row">Quantidade:</th>
                <td><?php echo $_SESSION['quantidadelivro'];?></td>
              </tr>
              <tr>
                <th scope="row">Disponível:</th>
                <td><?php echo $_SESSION['quantidadedisponivel'];?></td>
              </tr>
              <tr>
                <th scope="row">Data:</th>
                <td><?php echo $Dataemprestimoexibir;?></td>
              </tr>
          </tbody>
        </table>
        <div class="col-lg-14 align-self-center">
            <form action="" method="POST">
              <?php  
                if (isset($_SESSION['logado'])) {
                  
                  if (isset($_SESSION['tipo'])) {
                      echo "<input class='form-control' type='text' placeholder='Matrícula' id='btdapesqui' minlength='7' maxlength='7' name='btmatricula' required style='text-align: center;'><br>";
                    echo "<center>
                    <button class='btn btn-outline-success btn-lg-1' type='submit' id='btdapesqui' name='btinserir' style='color:grey;'>Inserir Emprestimo</button>
                    
                    <button class='btn btn-outline-success btn-lg-1' type='submit' id='btdapesqui' name='btdevolver' style='color:grey;'>Devolução de Livro</button></center><br>";
                  }else{
                    echo "<center>
                  <button class='btn btn-outline-success btn-lg-1' type='submit' id='btdapesqui' name='btagendar' style='color:grey;'>Agendar Emprestimo</button><br><br>
                  </center>";
                  }
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
        </div>
    </div>
  </div>
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>
<?php
    if(isset($_POST['btinserir'])){
        include_once('classes/Emprestimo.class.php');
        $Dataemprestimo=date('d-m-y'); 
        $Dataemprestimofinal=date('ymd')+7;
        $matriculausu=$_POST['btmatricula'];
        
        $objx=new Emprestimo();
        $objx->insertEmprestimo($idlivro,$matriculausu,$Dataemprestimo,$Dataemprestimofinal);
    }
    if(isset($_POST['btdevolver'])){
        include_once('classes/Emprestimo.class.php');
        $matricula=$_POST['btmatricula'];
        
        $objxy=new Emprestimo();
    $objxy->devolverlivro($idlivro,$matricula);
    }
    if(isset($_POST['btlogar1'])){
        include 'classes/Cruduser.class.php';
    $matricula=$_POST['bt1matricula'];
    $senha=$_POST['bt2senha'];

    $x=new Cruduser();
    $x->login($matricula,$senha);
    
    echo "<script>window.location='livro.php?livro=".$_SESSION['livroregister']."';</script>";
    }
?>