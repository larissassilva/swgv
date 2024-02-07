<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
session_start();
ob_start();
include_once 'conexao.php';

	
	//Cadastrar dados do usuário isso o usuário pode fazer
     
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $datanascimento = $_POST["datanascimento"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $whatsapp = $_POST["whatsapp"];
    $RG = $_POST["RG"];
    $orgaoExpedidor = $_POST["orgaoExpedidor"];
    $ufrg = $_POST["ufrg"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $complemento = $_POST["complemento"];
    $cnh = $_POST["cnh"];
    $categoria = $_POST["categoria"];
    $datavalidade = $_POST["datavalidade"];
    $dataprimeiracnh = $_POST["dataprimeiracnh"];
	
    /*  
    $cpf = "86349236068";
    $nome = "Luzia Martins Ribeiro";
    $datanascimento = "04/04/1999";
    $email = "rebeca-dacosta81@swgv.com.br";
    $telefone = "(65) 3553-2385";
    $whatsapp = "(65) 3553-2385";
    $RG = "15.311.543-9";
    $orgaoExpedidor = "SPTC";
    $ufrg = "BA";
    $logradouro = "Travessa G";
    $numero = "897";
    $bairro = "Jaçanã";
    $cep = "45608-544";
    $cidade = "Itabuna";
    $estado = "BA";
    $complemento = "Sem Complemento";
    $cnh = "73004065919";
    $categoria = "AB";
    $datavalidade = "20/05/2027";
    $dataprimeiracnh = "20/05/2022";
    */

	if(empty($cpf) || empty( $nome) || empty($datanascimento) || empty($email)
    || empty($telefone) || empty($whatsapp) || empty($RG) || empty($orgaoExpedidor)
    || empty($ufrg) || empty($logradouro) || empty($numero) || empty($bairro)
    || empty($cep) || empty($cidade) || empty($estado) || empty($complemento)
    || empty($cnh) || empty($categoria) || empty($datavalidade) || empty($dataprimeiracnh)){
	    //echo(1);
		//return json_encode('1');
        $d='1';
        echo json_encode($d);
	}else{
		//echo(2);



	$result_usuario = "INSERT INTO cad_usuarios (cpf, nome, datanascimento,
    email, telefone, whatsapp, RG, orgaoExpedidor, ufrg, logradouro,
    numero, bairro, cep, cidade, estado, complemento, cnh, categoria,
    datavalidade, dataprimeiracnh) 
    VALUES (
					'" .$cpf. "', '" .$nome. "', '" .$datanascimento. "',
                    '" .$email. "', '" .$telefone. "', '" .$whatsapp. "',
                    '" .$RG. "', '" .$orgaoExpedidor. "', '" .$ufrg. "',
                    '" .$logradouro. "', '" .$numero. "', '" .$bairro. "',
                    '" .$cep. "', '" .$cidade. "', '" .$estado. "',
                    '" .$complemento. "', '" .$cnh. "', '" .$categoria. "',
                    '" .$datavalidade. "', '" .$dataprimeiracnh. "'
					)";


                    $resultado_usario = mysqli_query($conn, $result_usuario);
                    //var_dump  ($resultado_usario);
        if(mysqli_insert_id($conn)){
            $d='3';
            echo json_encode($d);
            //$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
           // echo"Usuário cadastrado com sucesso";
            
        }else{
            $d='2';
            echo json_encode($d);
            //$_SESSION['msg'] = "Erro ao cadastrar o usuário";
            //echo"Erro ao cadastrar o usuário";
        }
		
	}
?>