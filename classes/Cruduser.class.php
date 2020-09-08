<?php
	include('Connection.class.php');
	class Cruduser{
		//função responsavel por cadastrar o usuario
		public function insertUsuario($matricula,$nome,$senha){
			//criação de objeto e chamada de metodo
			$con=new Connection();
			$conn=$con->conexao();
			
			$pdo1="SELECT * FROM usuariosescola WHERE Matricula=:matricula";
				$consulta1=$conn->prepare($pdo1);
				$consulta1->bindValue(':matricula',$matricula);
				$consulta1->execute();
				$numusers=$consulta1->rowCount();

			if ($numusers!=0) {
				$pdo="SELECT * FROM usuario WHERE Matricula=:matricula";
				$consulta=$conn->prepare($pdo);
				$consulta->bindValue(':matricula',$matricula);
				$consulta->execute();
				$visualizalin=$consulta->rowCount();

				if ($visualizalin==0) {
					$pdo="INSERT INTO usuario values(null,:matricula,:nome,:senha,null)";
					$sql=$conn->prepare($pdo);
					$sql->bindValue(':matricula',$matricula);
					$sql->bindValue(':nome',$nome);
					$sql->bindValue(':senha',$senha);
					$sql->execute();
					echo "<script>alert('Cadastro Realizado!');</script>"; 
					echo "<script>window.location='./login.php';</script>";
					
				}elseif ($visualizalin!=0) {
					echo "<script>alert('Dados já cadastrados!');</script>"; 
					echo "<script>window.location='./cadastro.php';</script>";
				}else{
					echo "<script>alert('Erro tente novamente!');</script>"; 
					echo "<script>window.location='./cadastro.php';</script>";
				}
			}elseif ($numusers==0) {
				echo "<script>alert('Matricula não existente!');</script>"; 
					echo "<script>window.location='./cadastro.php';</script>";
			}
			
			
		}
		//função responsavel por verificar o usuario
		public function login($matricula,$senha){
			
			$con=new Connection();
			$conn=$con->conexao();

			$pdo="SELECT * FROM usuario WHERE Matricula=:matricula and Senha=:senha";
			$consulta=$conn->prepare($pdo);
			$consulta->bindValue(':matricula',$matricula);
			$consulta->bindValue(':senha',$senha);
			$consulta->execute();
			$visualizalinha=$consulta->rowCount();
			$viewdados=$consulta->fetchAll();

			if ($visualizalinha!=0) {
			$_SESSION['logado']=1;
			$_SESSION['usuario']=$viewdados[0][2];
			$_SESSION['tipo']=$viewdados[0][4];
			
			}elseif ($visualizalinha==0) {
				echo "<script>alert('Dados incorretos');</script>";
				echo "<script>window.location='./login.php';</script>"; 
			}else{
				echo "<script>window.location='./login.php';</script>";
			}
			
		}
		public function deletarusuario($matricula,$senha){
		    $con=new Connection();
			$conn=$con->conexao();
			
			$pdo="SELECT * FROM usuario WHERE Matricula=:matricula and Senha=:senha";
			$consulta=$conn->prepare($pdo);
			$consulta->bindValue(':matricula',$matricula);
			$consulta->bindValue(':senha',$senha);
			$consulta->execute();
			$visualizalinha=$consulta->rowCount();
			
			if($visualizalinha>0){
			    $sql="DELETE FROM usuario WHERE Matricula=:matricula and Senha=:senha";
			    $deletar=$conn->prepare($sql);
    			$deletar->bindValue(':matricula',$matricula);
    			$deletar->bindValue(':senha',$senha);
    			$deletar->execute();
    			
    			echo "<script>alert('Usuário Deletado!');</script>";
    			echo "<script>window.location='../login.php?deslogar=1';</script>";
			}
			
		}
		public function editarnome($matricula,$nome,$senha){
		    $con=new Connection();
		    $conn=$con->conexao(); 
		    
		    $upd="UPDATE usuario SET Nome=:nome WHERE Matricula=:matricula and Senha=:senha";
		        $atualizanome=$conn->prepare($upd);
    			$atualizanome->bindValue(':matricula',$matricula);
    			$atualizanome->bindValue(':nome',$nome);
    			$atualizanome->bindValue(':senha',$senha);
    			$atualizanome->execute();
    			
    			echo "<script>alert('Nome Atualizado!');</script>";
    			echo "<script>window.location='../emprestimo.php';</script>";
		}
		public function editarsenha($matricula,$senha,$senhanova){
		    $con=new Connection();
			$conn=$con->conexao();
			
			$upd="UPDATE usuario SET Senha=:senhanova WHERE Matricula=:matricula and Senha=:senha";
		        $atualizanome=$conn->prepare($upd);
    			$atualizanome->bindValue(':matricula',$matricula);
    			$atualizanome->bindValue(':senhanova',$senhanova);
    			$atualizanome->bindValue(':senha',$senha);
    			$atualizanome->execute();
    			
    			echo "<script>alert('Senha Editada');</script>";
    			echo "<script>window.location='../emprestimo.php';</script>";
		}
	}
?> 