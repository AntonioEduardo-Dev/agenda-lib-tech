<?php 
	class Connection{
		public function conexao(){
			try {
				$pdo=new PDO('mysql:host=localhost;dbname=bancobiblioteca',"root","");
				return $pdo;	
			} catch (Exception $e) {
				echo 'ERRO'.$e->getMessage();
			}
		}
		
	}
?>