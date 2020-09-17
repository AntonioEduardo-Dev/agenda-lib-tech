<?php
  session_start();
    if(!isset($_SESSION['tipo'])){
        echo "<script>window.location='../index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="shortcut icon" href="favicon.ico" >
	<title>Cadastrar Livro</title>
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

	<script type="text/javascript">
		function gerarQr() {
		var aleatorio=Math.floor(Math.random() * 5);
		document.getElementById('qrcode').value = Math.floor(Math.random() * (999999 - 100000)+100000);
		}
	</script>
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
	            <a class="nav-link" href="../paginas/emprestimo.php">Livros</a>
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-33">
						Cadastrar Livro
					</span>

					<div class="wrap-input100 rs1 validate-input" data-validate="Requer título">
						<input class="input100" type="text" name="bt1" placeholder="Título">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Requer Gênero">
						<input class="input100" type="text" name="bt2" placeholder="Gênero">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Requer Autor">
						<input class="input100" type="text" name="bt3" placeholder="Autor">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Requer Quantidade">
						<input class="input100" type="number" name="bt4" placeholder="Quantidade">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Requer Qr_Code">
						<input class="input100" type="text" name="bt5" placeholder="Qr_Code" id="qrcode">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						<input type="button" class="login100-form-btn" value="Gerar Qr_code" onclick="gerarQr();" />
							
						
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" name="bt6">
							Cadastrar
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
	include_once '../classes/Livros.class.php';
	if (isset($_POST['bt6'])) {
		
		$titulo=$_POST['bt1'];
		$genero=$_POST['bt2'];
		$autor=$_POST['bt3'];
		$quantidade=$_POST['bt4'];
		$qrcode=$_POST['bt5'];

		$objcad=new Livros();
		$objcad->inserirlivros($genero,$titulo,$autor,$quantidade,$qrcode);
	}
?>