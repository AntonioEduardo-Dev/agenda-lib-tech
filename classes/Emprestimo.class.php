<?php
include_once('Connection.class.php');
	class Emprestimo{
		//função responsavel por cadastrar o emprestimo
		public function insertEmprestimo($idlivro,$matriculausu,$Dataemprestimo,$Dataemprestimofinal){
			$con=new Connection();
			$conn=$con->conexao();
			
			//consulta de verificação de matricula de usuário 
			$consul="SELECT * FROM usuariosescola WHERE Matricula=:matriculausu";
			$consulta=$conn->prepare($consul);
			$consulta->bindValue(':matriculausu',$matriculausu);
			$consulta->execute();
			$numerosdoarray=$consulta->rowCount();
			$dadosarray=$consulta->fetchAll();
			
			//consulta para verificar se usuário ja possui emprestimo
			$consul2="SELECT * FROM emprestimos WHERE Matricula=:matriculausu";
			$consulta2=$conn->prepare($consul2);
			$consulta2->bindValue(':matriculausu',$matriculausu);
			$consulta2->execute();
			$numerosdoarray2=$consulta2->rowCount();
			
			//consulta para verificar quantidade de livros disponiveis
			$consul3="SELECT * FROM livros WHERE Id_livro=:idlivro";
			$consulta3=$conn->prepare($consul3);
			$consulta3->bindValue(':idlivro',$idlivro);
			$consulta3->execute();
			$arraylivros=$consulta3->fetchAll();
			$quantidadedelivros=$arraylivros[0][5];
			
			//verificação de quantidade de livros
			if($quantidadedelivros>0){
			    
			    //verificação de matricula disponivel
    			if($numerosdoarray2==0){
    			    
        			if($numerosdoarray>0){
        			    $usuario=$dadosarray[0][1];
        			    
        			    //verificação do tipo de usuário
            			//if(isset($_SESSION['tipo'])){
            			$pdo="INSERT INTO emprestimos values(:idlivro,:matriculausu,:usuario,:Dataemprestimo,:Dataemprestimofinal)";
            					$sql=$conn->prepare($pdo);
            					$sql->bindValue(':idlivro',$idlivro);
            					$sql->bindValue(':matriculausu',$matriculausu);
            					$sql->bindValue(':usuario',$usuario);
            					$sql->bindValue(':Dataemprestimo',$Dataemprestimo);
            					$sql->bindValue(':Dataemprestimofinal',$Dataemprestimofinal);
            					$sql->execute();
            					
            					$livrodispo=$quantidadedelivros-1;
                			    
                			    $upd="UPDATE livros SET Quantidadedisponivel=:livrodispo WHERE Id_livro=:idlivro";
                			    $update=$conn->prepare($upd);
                			    $update->bindValue(':livrodispo',$livrodispo);
                			    $update->bindValue(':idlivro',$idlivro);
                			    $update->execute();
                			    
                			    echo "<script>alert('Emprestimo Realizado!');</script>";
                			    echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
            			//}else{
            			 //   echo "<script>alert('Conta inválida para essa ação');</script>";
            			 //   echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
            			//};
        			}else{
        			    echo "<script>alert('Matricula não existente!');</script>";
        			    echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
        			}
    			}elseif($numerosdoarray2>0){
    			    echo "<script>alert('Usuário já possui um livro emprestado!');</script>";
    			    echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
    			}else{
    			    echo "<script>alert('Ocorreu um erro!');</script>";
    			    echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
    			}
			}elseif($quantidadedelivros==0){
			    echo "<script>alert('O livro não possui exemplares disponíveis');</script>";
			    echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
			}
		}
		public function devolverlivro($idlivro,$matricula){
		    $con=new Connection();
			$conn=$con->conexao();
			
			$consult="SELECT * FROM emprestimos WHERE FK_id_livro=:idlivro and Matricula=:matricula";
			$consultar=$conn->prepare($consult);
			$consultar->bindValue(':idlivro',$idlivro);
			$consultar->bindValue(':matricula',$matricula);
			$consultar->execute();
			$numerosarray=$consultar->rowCount();
			
			//consulta para verificar quantidade de livros disponiveis
			$consul3="SELECT * FROM livros WHERE Id_livro=:idlivro";
			$consulta3=$conn->prepare($consul3);
			$consulta3->bindValue(':idlivro',$idlivro);
			$consulta3->execute();
			$arraylivros=$consulta3->fetchAll();
			$quantidadedispo=$arraylivros[0][5];
			
			if($numerosarray>0){
			    $del="DELETE FROM emprestimos WHERE FK_id_livro=:idlivro and Matricula=:matricula";
			    $deletar=$conn->prepare($del);
    			$deletar->bindValue(':idlivro',$idlivro);
    			$deletar->bindValue(':matricula',$matricula);
    			$deletar->execute();
    			
    			$livrodevolvido=$quantidadedispo+1;
                			    
                $upd="UPDATE livros SET Quantidadedisponivel=:livrodevolvido WHERE Id_livro=:idlivro";
                $update=$conn->prepare($upd);
                $update->bindValue(':livrodevolvido',$livrodevolvido);
                $update->bindValue(':idlivro',$idlivro);
                $update->execute();
                
                echo "<script>alert('Emprestimo Terminado!');</script>";
                echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
			    
			}else{
			    echo "<script>alert('Não há existência desse emprestimo!');</script>";
			    echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
			}
		}
		public function devolverlivroaluno($matricula){
		    $con=new Connection();
			$conn=$con->conexao();
			
			$consult="SELECT * FROM emprestimos WHERE Matricula=:matricula";
			$consultar=$conn->prepare($consult);
			$consultar->bindValue(':matricula',$matricula);
			$consultar->execute();
			$dadosarr=$consultar->fetchAll();
			$numerosarray=$consultar->rowCount();
			
			$idlivro=$dadosarr[0][0];
			
			//consulta para verificar quantidade de livros disponiveis
			$consul3="SELECT * FROM livros WHERE Id_livro=:idlivro";
			$consulta3=$conn->prepare($consul3);
			$consulta3->bindValue(':idlivro',$idlivro);
			$consulta3->execute();
			$arraylivros=$consulta3->fetchAll();
			$quantidadedispo=$arraylivros[0][5];
			
			if($numerosarray>0){
			    $del="DELETE FROM emprestimos WHERE FK_id_livro=:idlivro and Matricula=:matricula";
			    $deletar=$conn->prepare($del);
    			$deletar->bindValue(':idlivro',$idlivro);
    			$deletar->bindValue(':matricula',$matricula);
    			$deletar->execute();
    			
    			$livrodevolvido=$quantidadedispo+1;
                			    
                $upd="UPDATE livros SET Quantidadedisponivel=:livrodevolvido WHERE Id_livro=:idlivro";
                $update=$conn->prepare($upd);
                $update->bindValue(':livrodevolvido',$livrodevolvido);
                $update->bindValue(':idlivro',$idlivro);
                $update->execute();
                
                echo "<script>alert('Emprestimo Terminado!');</script>";
                echo "<script>window.location='emprestimos.php';</script>";
			    
			}else{
			    echo "<script>alert('Não há existência desse emprestimo!');</script>";
			    //echo "<script>window.location='livro.php?livro=".$idlivro."';</script>";
			}
		}
		public function visualizaemprestimo(){
		    $con=new Connection();
			$conn=$con->conexao();
			
			
		    $consult="SELECT * FROM emprestimos order by Data_final ASC";
			$consultar=$conn->prepare($consult);
			$consultar->execute();
			$numerosarray=$consultar->rowCount();
			$arrayemprestimos=$consultar->fetchAll();
			
			$_SESSION['numerodelinhasemprestimo']=$numerosarray;
			
			for($i=0;$i<$numerosarray;$i++){
                $_SESSION['empids'.$i]=$arrayemprestimos[$i][0];
                $_SESSION['empmatriculas'.$i]=$arrayemprestimos[$i][1];
                $_SESSION['empdateini'.$i]=$arrayemprestimos[$i][3];
                $_SESSION['empdatefinal'.$i]=$arrayemprestimos[$i][4];
			}
		}
		public function pesquisalivromatricula($pesquisa){
		    $con=new Connection();
			$conn=$con->conexao();
			
			
		    $consulta="SELECT * FROM emprestimos WHERE Matricula=:pesquisa";
			$consultar2=$conn->prepare($consulta);
			$consultar2->bindValue(':pesquisa',$pesquisa);
			$consultar2->execute();
			$numerosarray=$consultar2->rowCount();
			$arrayemprestimos=$consultar2->fetchAll();
			
			$_SESSION['numerodelinhasemprestimo']=$numerosarray;
			
			for($i=0;$i<$numerosarray;$i++){
                $_SESSION['empids'.$i]=$arrayemprestimos[$i][0];
                $_SESSION['empmatriculas'.$i]=$arrayemprestimos[$i][1];
                $_SESSION['empdateini'.$i]=$arrayemprestimos[$i][3];
                $_SESSION['empdatefinal'.$i]=$arrayemprestimos[$i][4];
			}
		}
		public function editardata($matricula,$novadata,$novadatafinal){
		    $con=new Connection();
			$conn=$con->conexao();
			
			$upd="UPDATE `emprestimos` SET `Data_inicial`=:novadata WHERE `emprestimos`.`Matricula` = :matricula";
		        $atualizadata=$conn->prepare($upd);
    			$atualizadata->bindValue(':novadata',$novadata);
    			$atualizadata->bindValue(':matricula',$matricula);
    			$atualizadata->execute();
    		
    		$upd2="UPDATE `emprestimos` SET `Data_final`=:novadatafinal WHERE `emprestimos`.`Matricula` = :matricula";
		        $atualizadata2=$conn->prepare($upd2);
    			$atualizadata2->bindValue(':novadatafinal',$novadatafinal);
    			$atualizadata2->bindValue(':matricula',$matricula);
    			$atualizadata2->execute();
    			
    			echo "<script>alert('Data Atualizada!');</script>"; 
		    	echo "<script>window.location='../emprestimo.php';</script>";
		}
    }
?>