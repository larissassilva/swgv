<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
header('Content-Type: application/json');
header('Character-Encoding: utf-8');
header('Content-Type: application/json; charset=utf-8');
session_start();
ob_start();
include_once 'conexao.php';

//cadastrar o login e senha do usuário
	
	//$dados = $_POST['nome=Larissa%20Soares%20Silva&email=larissa.ssilva%40gmail.com&usuario=larissa&senha=979097'];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$usuario = $_POST["usuario"];
	
	$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
					'" .$nome. "',
					'" .$email. "',
					'" .$usuario. "',
					'" .$senha. "'
					)";


	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		return json_encode('1');
		
	}else{
		return json_encode('2');
		
	}
		
	
?>