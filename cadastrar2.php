<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
header('Content-Type: application/json');
header('Character-Encoding: utf-8');
header('Content-Type: application/json; charset=utf-8');
session_start();
ob_start();
include_once 'conexao.php';

	
	//$dados = $_POST['nome=Larissa%20Soares%20Silva&email=larissa.ssilva%40gmail.com&usuario=larissa&senha=979097'];
	$cpf = $_POST["cpf"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$usuario = $_POST["usuario"];
	$s = $_POST["senha"];
	
	/*
	$nome = "Sophia";
	$email = "sophia@gmail.com";
	$usuario = "sophia";
	$s = "123456";*/
	$senha = password_hash($s, PASSWORD_DEFAULT);
	//$senha = $_POST["senha"];//password_hash($dados['senha'], PASSWORD_DEFAULT);

	if(empty($cpf) || empty($nome) || empty($email) || empty($usuario) || empty($senha)){
		//echo(1);
		return json_encode('1');
	}else{
		//echo(2);



	$result_usuario = "INSERT INTO usuarios (cpf, nome, email, usuario, senha) VALUES (
					'" .$cpf. "',
					'" .$nome. "',
					'" .$email. "',
					'" .$usuario. "',
					'" .$senha. "'
					)";


	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		return json_encode('3');
		//$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		//echo"Usuário cadastrado com sucesso /n Senha" . $senha;
		//header("Location: login.php");
	}else{
		return json_encode('2');
		//$_SESSION['msg'] = "Erro ao cadastrar o usuário";
		//echo"Erro ao cadastrar o usuário /n Senha" . $senha;
	}
		
	}
?>