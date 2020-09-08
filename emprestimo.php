<?php
  session_start();
  include_once 'classes/Livros.class.php';
  if (isset($_POST['bt1']) && isset($_POST['bt2'])) {
    $pesquisa=$_POST['bt1'];
    $objy=new Livros();
    $objy->pesquisalivro($pesquisa);
    
  }elseif(isset($_GET['genero'])){
    $genero=$_GET['genero'];
    
    $objgenero=new Livros();
    $objgenero->pesquisagenero($genero);
    
  }else{
    $y=new Livros();
    $y->consultalivros();
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
  
  <!-- Custom styles for button by-eduardo -->
    <link rel = "stylesheet" type = "text/css" href = "css/custom.css">

</head>

<body onload="document.f.bt1.focus()">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(61, 201, 179, 1);">
    <div class="container">
      <a class="navbar-brand" href="index.php">Biblioteca</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
            if (isset($_SESSION['logado'])) {
              $tipo="ADMIN";
              if (isset($_SESSION['tipo'])) {
                echo "
                <li class='nav-item'>
                  <a class='nav-link' href='paginas/emprestimos.php'>Emprestimos</a>
                </li>";
              }
              echo "
                <li class='nav-item'>
                  <a class='nav-link' href='editar.php'>Opções</a>
                </li>";
            }
          ?>
          
          
          <form name="f" class="form-inline" style="padding-right: 10px;" action="" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar exemplar" id="textperson" aria-label="Pesquisar" name="bt1">
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
                        <a class='dropdown-item' href='editarusuario/editardados.php'>Opções</a>
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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Gêneros</h1>
        <div class="list-group">
            <a href="emprestimo.php" class="list-group-item" id="textperson" style='color: rgba(61, 201, 179, 1);'>Todos</a>
          <?php 
          $totalgeneros=$_SESSION['totalgeneros'];
            for ($g=0; $g < $_SESSION['totalgeneros']; $g++) { 
            $generostotais[$g]=$_SESSION['todosgeneros'.$g];

              echo "<a href='emprestimo.php?genero=".$generostotais[$g]."' class='list-group-item' id='textperson' style='color: rgba(61, 201, 179, 1);'>".$generostotais[$g]."</a>";
            }
          ?>

        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/pj-biblioteca.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/pj-biblioteca2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/pj-biblioteca3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php 
          $totallivros=$_SESSION['totallivros'];
          if ($totallivros>24) {
            for ($i=0; $i < 24; $i++) { 
              $livros[$i]=$_SESSION['nomeslivros'.$i];
              $generolivros[$i]=$_SESSION['generolivros'.$i];
              $quantidadelivros[$i]=$_SESSION['quantidade'.$i];
              $idlivro[$i]=$_SESSION['idlivro'.$i];
                echo "
                <div class='col-lg-4 col-md-6 mb-4'>
                  <div class='card h-100'>
                    <a href='livro.php?livro=".$idlivro[$i]."'><img class='card-img-top' src='img/livroopcone.jpg' alt=''></a>
                    <div class='card-body'>
                      <h4 class='card-title'>
                        <a href='livro.php?livro=".$idlivro[$i]."' style='color: black;'>".$livros[$i]."</a>
                      </h4>
                      <p class='card-text'>".$generolivros[$i]."</p>
                    </div>
                    <div class='card-footer'>
                      <small class='text-muted'>Disponiveis: ".$quantidadelivros[$i]."</small>
                    </div>
                  </div>
                </div>";
            }
          }else{
            for ($i=0; $i < $totallivros; $i++) { 
              $livros[$i]=$_SESSION['nomeslivros'.$i];
              $generolivros[$i]=$_SESSION['generolivros'.$i];
              $quantidadelivros[$i]=$_SESSION['quantidade'.$i];
              $idlivro[$i]=$_SESSION['idlivro'.$i];
                echo "
                <div class='col-lg-4 col-md-6 mb-4'>
                  <div class='card h-100'>
                    <a href='livro.php?livro=".$idlivro[$i]."'><img class='card-img-top' src='img/livroopcone.jpg' alt=''></a>
                    <div class='card-body'>
                      <h4 class='card-title'>
                        <a href='livro.php?livro=".$idlivro[$i]."' style='color: black;'>".$livros[$i]."</a>
                      </h4>
                      <p class='card-text'>".$generolivros[$i]."</p>
                    </div>
                    <div class='card-footer'>
                      <small class='text-muted'>Disponiveis: ".$quantidadelivros[$i]."</small>
                    </div>
                  </div>
                </div>";
            }
          }
          ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
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