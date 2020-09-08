<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="shortcut icon" href="favicon.ico">
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="../img/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<!-- Custom styles for button by-eduardo -->
    <link rel = "stylesheet" type = "text/css" href = "../css/custom.css">
    
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(61, 201, 179, 1);">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Biblioteca</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../emprestimo.php">Livros</a>
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
                        <a class='dropdown-item' href='./editardados.php'>Opções</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='../paginas/login.php?deslogar=1'>Sair</a>
                      </div>
                    </div>
                </li>";
                
            }else {
              echo "
                <li class='nav-item'>
                  <a class='nav-link' href='../paginas/login.php'>Logar</a>
                </li>";
            }
          ?>
          </ul>
        </div>
      </div>
   </nav>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
        <form class="login100-form validate-form" action="" method="POST">
          <span class="login100-form-title p-b-33">
            Editar Nome
          </span>
          <div class="wrap-input100 validate-input" data-validate = "Insira uma matricula válida">
            <input class="input100" type="number" min="1000000" max="9999999" name="bt1" placeholder="Matricula">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Insira um nome válido">
            <input class="input100" type="text" name="bt2" placeholder="Novo nome">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="wrap-input100 rs1 validate-input" data-validate="Requer Senha">
            <input class="input100" type="password" name="bt3" placeholder="Senha">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="container-login100-form-btn m-t-20">
            <button class="login100-form-btn" name="bt4">
              Mudar
            </button>
          </div><br>
        </form>
      </div>
    </div>
  </div>
  

  
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
    if(isset($_POST['bt4'])){
        include_once('../classes/Cruduser.class.php');
        $matricula=$_POST['bt1'];
        $nome=$_POST['bt2'];
        $senha=$_POST['bt3'];
        
        $objatualiza=new Cruduser();
        $objatualiza->editarnome($matricula,$nome,$senha);
    }

?>
