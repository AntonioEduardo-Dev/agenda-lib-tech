<?php
  session_start();
  if (isset($_SESSION['logado'])) {
    echo "<script>window.location='../index.php';</script>";
  }
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
              <a class="nav-link" href="cadastro.php">Cadastrar</a>
            </li>
          </ul>
        </div>
      </div>
   </nav>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
        <form class="login100-form validate-form" action="" method="POST">
          <span class="login100-form-title p-b-33">
            Conta Login
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Insira uma Matricula valida">
            <input class="input100" type="text" name="bt1" placeholder="Matricula">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="wrap-input100 rs1 validate-input" data-validate="Requer Senha">
            <input class="input100" type="password" name="bt2" placeholder="Password">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="container-login100-form-btn m-t-20">
            <button class="login100-form-btn" name="bt4">
              Login
            </button>
          </div><br>

          <div class="text-center">
            <span class="txt1">
              Crie a sua conta aqui?
            </span>

            <a href="cadastro.php" class="txt2 hov1">
              Cadastrar
            </a>
          </div>
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
if (isset($_GET['deslogar'])) {
  session_unset();
  echo "<script>window.location='../emprestimo.php';</script>";
} 
include_once '../classes/Cruduser.class.php';
  if (isset($_POST['bt4'])) {
    $matricula=$_POST['bt1'];
    $senha=$_POST['bt2'];

    $x=new Cruduser();
    $x->login($matricula,$senha);
    echo "<script>window.location='../emprestimo.php';</script>";
  }
?>
