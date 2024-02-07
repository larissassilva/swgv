<?php
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
header('Character-Encoding: utf-8');
//session_start();
include_once("conexao.php");

	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	//$usuario = 'larissa';
	//$senha = '123456';
	$retorno=0;

	if(empty($usuario) || empty($senha)){
		//echo "3 não passei os valores!";
		$retorno=3;
		echo $retorno;
		//return json_encode($retorno);
		//return $retorno;
		
	}else{

		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id, nome, email, senha FROM usuarios WHERE usuario='$usuario'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);
		//var_dump($resultado_usuario);

		if(is_null($row_usuario)){
			
			//echo "4 Usuário não existe!";
			$retorno=4;
			echo $retorno;
			//return json_encode($retorno);
			//return $retorno;
        			        
		}else{

			//$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			//var_dump($row_usuario);
			//echo '<br>';
			$senhaBanco= $row_usuario['senha'];
			//var_dump($senhaBanco);
			//echo $senhaBanco;
			//var_dump($senha);
			$verifica = password_verify($senha , $senhaBanco);
			//echo $verifica;
			if($verifica == 1){

				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];

				/*if(!isset($_SESSION)){
					session_start();
				}*/
				//echo $_SESSION['nome'];
				//echo "1 tudo certo!";	
				$retorno=1;
				//header("Location : administrativo.php");
				echo $retorno;				
				//return json_encode($retorno);
				//return $retorno;


			}else{
				//echo "2 Senha incorreta!";
				$retorno=2;
				echo $retorno;
				//return json_encode($retorno); 
				//return $retorno; 			 
			}
   			 
		}		

	}

