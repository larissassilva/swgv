<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "swgvpmj";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected successfully";
	}
?>
