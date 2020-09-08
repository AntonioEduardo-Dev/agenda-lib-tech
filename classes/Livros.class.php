<?php 
include_once('Connection.class.php');
	class Livros{
		public function consultalivros(){
			$con=new Connection();
			$conn=$con->conexao();

			$sql="SELECT * FROM livros order by Titulo ASC";
			$consulta=$conn->prepare($sql);
			$consulta->execute();
			$numusers=$consulta->rowCount();
			$todoslivros=$consulta->fetchAll();

			$sql2="SELECT DISTINCT Genero FROM livros order by Genero ASC";
			$consulta2=$conn->prepare($sql2);
			$consulta2->execute();
			$generos=$consulta2->fetchAll();
			$numgeneros=$consulta2->rowCount();

			for ($g=0; $g < $numgeneros; $g++) { 
				$_SESSION['todosgeneros'.$g]=$generos[$g][0];
			}
			
			for ($i=0; $i < $numusers; $i++) { 
			    $_SESSION['idlivro'.$i]=$todoslivros[$i][0];
				$_SESSION['nomeslivros'.$i]=$todoslivros[$i][2];
				$_SESSION['generolivros'.$i]=$todoslivros[$i][1];
				$_SESSION['quantidade'.$i]=$todoslivros[$i][5];
				
			}
			$_SESSION['totalgeneros']=$numgeneros;
			$_SESSION['totallivros']=$numusers;
			
		}
		public function pesquisalivro($pesquisa){
			$con=new Connection();
			$conn=$con->conexao();

			$sql="SELECT * FROM livros where Titulo LIKE :pesquisa order by Titulo ASC";
			$consulta=$conn->prepare($sql);
			$consulta->bindValue(':pesquisa','%'.$pesquisa.'%');
			$consulta->execute();
			$numlivrosnome=$consulta->rowCount();
			$todoslivros=$consulta->fetchAll();

			$sql2="SELECT * FROM livros where Id_livro=:pesquisa order by Titulo ASC";
			$consultar=$conn->prepare($sql2);
			$consultar->bindValue(':pesquisa',$pesquisa);
			$consultar->execute();
			$numlivrosid=$consultar->rowCount();
			$livro=$consultar->fetchAll();
			
			if($numlivrosnome>0){
			    $valor=1;
			}elseif($numlivrosid>0){
			    $valor=2;
			}else{
			    $valor=3;
			}
			

			if ($valor==1) {
				for ($i=0; $i < $numlivrosnome; $i++) { 
			    $_SESSION['idlivro'.$i]=$todoslivros[$i][0];
				$_SESSION['nomeslivros'.$i]=$todoslivros[$i][2];
				$_SESSION['generolivros'.$i]=$todoslivros[$i][1];
				$_SESSION['quantidade'.$i]=$todoslivros[$i][4];
				}
				$_SESSION['totallivros']=$numlivrosnome;

			}elseif ($valor==2) {
				for ($x=0; $x < $numlivrosid; $x++) { 
				$_SESSION['idlivro'.$x]=$livro[$x][0];
				$_SESSION['nomeslivros'.$x]=$livro[$x][2];
				$_SESSION['generolivros'.$x]=$livro[$x][1];
				$_SESSION['quantidade'.$x]=$livro[$x][4];
				}
				$_SESSION['totallivros']=$numlivrosid;

			}
			elseif($valor==3){
				echo "<script>alert('Livro não encontrado!');</script>"; 
				echo "<script>window.location='./emprestimo.php';</script>";
			}else{
			    echo "<script>alert('Erro na consulta!');</script>"; 
				echo "<script>window.location='./emprestimo.php';</script>";
			}
			
		}
		public function pesquisagenero($genero){
    		$con=new Connection();
    		$conn=$con->conexao();
            
            $sql="SELECT * FROM livros where Genero=:genero order by Titulo ASC";
			$consulta=$conn->prepare($sql);
			$consulta->bindValue(':genero',$genero);
			$consulta->execute();
			$numlivrosnome=$consulta->rowCount();
			$todoslivros=$consulta->fetchAll();
			
			if ($numlivrosnome!=0) {
				for ($i=0; $i < $numlivrosnome; $i++) { 
				$_SESSION['idlivro'.$i]=$todoslivros[$i][0];
				$_SESSION['nomeslivros'.$i]=$todoslivros[$i][2];
				$_SESSION['generolivros'.$i]=$todoslivros[$i][1];
				$_SESSION['quantidade'.$i]=$todoslivros[$i][4];
				}
				$_SESSION['totallivros']=$numlivrosnome;

			}else{
				echo "<script>alert('Pesquisa não encontrou resultados');</script>"; 
				echo "<script>window.location='./emprestimo.php';</script>";
			}
		}
		public function pesquisalivroid($idlivro){
		$con=new Connection();
		$conn=$con->conexao();

		$sql="SELECT * FROM livros where Id_livro=:idlivro";
			$consulta=$conn->prepare($sql);
			$consulta->bindValue(':idlivro',$idlivro);
			$consulta->execute();
			$numlivrosnome=$consulta->rowCount();
			$livro=$consulta->fetchAll();
            
            $_SESSION['idlivro']=$livro[0][0];
			$_SESSION['titulolivro']=$livro[0][2];
			$_SESSION['generolivro']=$livro[0][1];
			$_SESSION['autorlivro']=$livro[0][3];
			$_SESSION['quantidadelivro']=$livro[0][4];
			$_SESSION['quantidadedisponivel']=$livro[0][5];

	    }

		public function inserirlivros($genero,$titulo,$autor,$quantidade){
			$con=new Connection();
			$conn=$con->conexao();
            $quantidadedis=$quantidade;
            
			$pdo="INSERT INTO livros VALUES(null,:genero,:titulo,:autor,:quantidade,:quantidadedis)";
			$insercao=$conn->prepare($pdo);
			$insercao->bindValue(':genero',$genero);
			$insercao->bindValue(':titulo',$titulo);
			$insercao->bindValue(':autor',$autor);
			$insercao->bindValue(':quantidade',$quantidade);
			$insercao->bindValue(':quantidadedis',$quantidadedis);
			$insercao->execute();
			
			echo "<script>alert('Livro Cadastrado');</script>"; 
			echo "<script>window.location='inserirlivro.php';</script>";
		}
		public function editatitulo($qrcode,$nome){
			$con=new Connection();
			$conn=$con->conexao();
			echo $qrcode.$nome;
			
			
			    $upd2="UPDATE `livros` SET `Titulo`=:nome WHERE `livros`.`Id_livro` = :qrcode";
		        $atualizatitulo=$conn->prepare($upd2);
		      	$atualizatitulo->bindValue(':nome',$nome);
		      	$atualizatitulo->bindValue(':qrcode',$qrcode);
    			$atualizatitulo->execute();
    			echo "<script>alert('Nome Atualizado!');</script>"; 
		}
		public function editagenero($qrcode,$genero){
			$con=new Connection();
			$conn=$con->conexao();
			
			 $upd="UPDATE `livros` SET `Genero`=:genero WHERE `livros`.`Id_livro` = :qrcode";
		        $atualizanome=$conn->prepare($upd);
    			$atualizanome->bindValue(':genero',$genero);
    			$atualizanome->bindValue(':qrcode',$qrcode);
    			$atualizanome->execute();
    			
    			echo "<script>alert('Gênero Atualizado!');</script>"; 
		    	echo "<script>window.location='../emprestimo.php';</script>";
		}
		public function editaautor($qrcode,$autor){
			$con=new Connection();
			$conn=$con->conexao();
			
			$upd="UPDATE `livros` SET `Autor`=:autor WHERE `livros`.`Id_livro` = :qrcode";
		        $atualizanome=$conn->prepare($upd);
    			$atualizanome->bindValue(':autor',$autor);
    			$atualizanome->bindValue(':qrcode',$qrcode);
    			$atualizanome->execute();
    			
    			echo "<script>alert('Autor Atualizado!');</script>"; 
		    	echo "<script>window.location='../emprestimo.php';</script>";
		}
		public function editaquantidade($qrcode,$quant){
			$con=new Connection();
			$conn=$con->conexao();
			
			$upd="UPDATE `livros` SET `Quantidade`=:quant WHERE `livros`.`Id_livro` = :qrcode";
		        $atualizanome=$conn->prepare($upd);
    			$atualizanome->bindValue(':quant',$quant);
    			$atualizanome->bindValue(':qrcode',$qrcode);
    			$atualizanome->execute();
    			
    			echo "<script>alert('Quantidade Atualizada!');</script>"; 
		    	echo "<script>window.location='../emprestimo.php';</script>";
		}
		public function apagarlivro($qrcode,$quantidade){
			$con=new Connection();
			$conn=$con->conexao();
			
			$pdo="SELECT * FROM `livros` WHERE Id_livro = :qrcode";
			$consulta=$conn->prepare($pdo);
			$consulta->bindValue(':qrcode',$qrcode);
			$consulta->execute();
			$visualizalinha=$consulta->rowCount();
			$visualizadados=$consulta->fetchAll();
			
			$quant=$visualizadados[0][4];
			$quantidadedisp=$visualizadados[0][5]-$quantidade;
			$quantdisp=$quant-$quantidade;
			
			if($visualizalinha>0){
			    if($quant>1 && $quantidade<$quant){
				    $upd="UPDATE `livros` SET `Quantidade`=:quantdisp WHERE `livros`.`Id_livro` = :qrcode";
			        $atualizaq=$conn->prepare($upd);
	    			$atualizaq->bindValue(':quantdisp',$quantdisp);
	    			$atualizaq->bindValue(':qrcode',$qrcode);
	    			$atualizaq->execute();
	    			
	    			$upd2="UPDATE `livros` SET `Quantidadedisponivel`=:quantidadedisp WHERE `livros`.`Id_livro` = :qrcode";
			        $atualizaquan=$conn->prepare($upd2);
	    			$atualizaquan->bindValue(':quantidadedisp',$quantidadedisp);
	    			$atualizaquan->bindValue(':qrcode',$qrcode);
	    			$atualizaquan->execute();
    			
    			echo "<script>alert('Quantidade Atualizada!');</script>"; 
		    	echo "<script>window.location='../emprestimo.php';</script>";
			    }elseif($quant==1 || $quantidade>=$quant){
    			    $sql="DELETE FROM `livros` WHERE Id_livro = :qrcode";
    			    $deletar=$conn->prepare($sql);
        			$deletar->bindValue(':qrcode',$qrcode);
        			$deletar->execute();
        			
        			echo "<script>alert('Livro Deletado!');</script>"; 
    		    	echo "<script>window.location='../emprestimo.php';</script>";
			    }
			   
			}else{
			        echo "<script>alert('Livro Não encontrado!');</script>"; 
    		    	echo "<script>window.location='../emprestimo.php';</script>";
			}
		}
	}
?>