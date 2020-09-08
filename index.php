<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="favicon.ico" >
  <title>Projeto biblioteca</title>

  <!-- css -->
  <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/animations.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Bocor
    Theme URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <section class="hero" id="intro">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-right navicon">
          <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center inner">
          <div class="animatedParent">
            <h1 class="animated fadeInDown">BIBLIOTECA</h1>
            <p class="animated fadeInUp">Seja bem vindo ao sistema escolar de empréstimos de livros.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <a href='emprestimo.php' class='learn-more-btn btn-scroll'>Livros</a>
          <a href="#about" class="learn-more-btn btn-scroll">Saiba mais</a>
        </div>
      </div>
    </div>
  </section>


  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="index.php" class="brand">Biblioteca</a>
            </div>
          </div>


          <div class="col-md-10">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                                <i class="fa fa-bars"></i>
                                                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#intro">Inicio</a></li>
                <li><a href="#about">Sobre nós</a></li>
                <li><a href="#service">Serviços</a></li>
                <li><a href="#works">Destaques</a></li>
                <?php 
                  if (isset($_SESSION['logado'])) {
                   echo "<li><a href='paginas/login.php?deslogar=1'>Deslogar</a></li>";
                  }else {
                    echo "<li><a href='paginas/login.php'>Logar</a></li>";
                  }
                ?>
              </ul>
            </div>
            <!-- /.Navbar-collapse -->

          </div>
        </div>
      </div>
      <!-- /.container -->
    </nav>
  </div>
  <!-- /Navigation -->

  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Sobre o projeto</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">


      <div class="row">


        <div class="col-lg-8 col-lg-offset-2 animatedParent">
          <div class="text-justify">
            <p>
              A Biblioteca especializada em disponibilizar livros educacionais e
              informativos, deseja implementar um sistema, no qual deverá ser web
              e será usufruído pelos funcionários da mesma(para organizar o
              empréstimo de livros e a catalogação deles), utilizado também pelo
              administrador (para gerenciar relatórios, e fazer a inclusão de novos
              exemplares) e Alunos (para fazer pesquisas de livros por tipo de
              material bibliográfico).

            </p>
            <center>
              <a href="#service" class="btn btn-skin btn-scroll">O que fazemos</a>
            </center>
          </div>
        </div>


      </div>
    </div>

  </section>
  <!-- /Section: about -->


  <!-- Section: services -->
  <section id="service" class="home-section color-dark bg-gray">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div>
            <div class="section-heading text-center">
              <h2 class="h-bold">O QUE PODEMOS FAZER PARA VOCÊ</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center">
      <div class="container">

        <div class="row animatedParent">
          <div class="col-md-4">
            <div class="animated rotateInDownLeft">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-code fa-2x"></span>
                </div>
                <div class="service-desc">
                  <h5>Cadastro</h5>
                  <div class="divider-header"></div>
                  <p>
                    Nesta opção você tem a opção de Realizar o cadastro.
                  </p>
                  <a href="paginas/cadastro.php" class="btn btn-skin">Cadastrar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="animated rotateInDownLeft slow">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-laptop fa-2x"></span>
                </div>
                <div class="service-desc">
                  <h5>Emprestimo de Livro</h5>
                  <div class="divider-header"></div>
                  <p>
                   Nesta opção você tem a opção de agendar um determinado exemplar.
                  </p>
                  <a href="paginas/login.php" class="btn btn-skin">Solicitar emprestimo</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="animated rotateInDownLeft slower">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-code fa-2x"></span>
                </div>
                <div class="service-desc">
                  <h5>Login</h5>
                  <div class="divider-header"></div>
                  <p>
                    Nesta opção você tem a opção de fazer login no sistema.
                  </p>
                  <a href="paginas/login.php" class="btn btn-skin">Entrar</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /Section: services -->


  <!-- Section: works -->
  <section id="works" class="home-section color-dark text-center bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div>
            <div class="animatedParent">
              <div class="section-heading text-center">
                <h2 class="h-bold animated bounceInDown">Nossos Destaques</h2>
                <div class="divider-header"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">

      <div class="row animatedParent">
        <div class="col-sm-12 col-md-12 col-lg-12">

          <div class="row gallery-item">
            <div class="col-md-3 animated fadeInUp">
              <a href="img/works/1.jpg" title="Don Quixote" data-lightbox-gallery="gallery1">
								<img src="img/works/1.jpg" class="img-responsive" alt="img">
							</a>
            </div>
            <div class="col-md-3 animated fadeInUp slow">
              <a href="img/works/2.jpg" title="Édipo Rei" data-lightbox-gallery="gallery1">
								<img src="img/works/2.jpg" class="img-responsive" alt="img">
							</a>
            </div>
            <div class="col-md-3 animated fadeInUp slower">
              <a href="img/works/3.jpg" title="Ulisses" data-lightbox-gallery="gallery1">
								<img src="img/works/3.jpg" class="img-responsive" alt="img">
							</a>
            </div>
            <div class="col-md-3 animated fadeInUp">
              <a href="img/works/4.jpg" title="O Homem sem Qualidades" data-lightbox-gallery="gallery1">
								<img src="img/works/4.jpg" class="img-responsive" alt="img">
							</a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
  <!-- /Section: works -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <ul class="footer-menu nav-item">
            <li><a href="#" class="nav-link">Inicio</a></li>
            <li><a href="#intro" class="nav-link">Subir</a></li>
          </ul>
        </div><!--
        <div class="col-lg-6 text-right copyright">
          &copy;Copyright - Bocor. All Rights Reserved
          <div class="credits">
            
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bocor
           
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div> -->
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/css3-animate-it.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>