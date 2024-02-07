<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
ini_set('display_errors', 0 );
error_reporting(0);
if(!isset($_SESSION)){
  session_start();   
}else{
  header("Location: login.php");
}
header('Content-Type: application/json');
header('Character-Encoding: utf-8');
header('Content-Type: application/json; charset=utf-8');

session_start();
ob_start();
//include_once 'conexao.php';
include_once 'BancodeDados.php';

	
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
    $id = $_POST["id"];
    $ativoInativo = $_POST["ativoInativo"];
    /*  
    $cpf = "86349236068";
    $nome = "Luzia Martins Ribeiro Inativa";
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
    $ativoInativo= "INATIVAR";
    $id="24";
    */

	if(empty($id) || empty($cpf) || empty( $nome) || empty($datanascimento) || empty($email)
    || empty($telefone) || empty($whatsapp) || empty($RG) || empty($orgaoExpedidor)
    || empty($ufrg) || empty($logradouro) || empty($numero) || empty($bairro)
    || empty($cep) || empty($cidade) || empty($estado) || empty($complemento)
    || empty($cnh) || empty($categoria) || empty($datavalidade) || empty($dataprimeiracnh)){

        $d='1';
        echo json_encode($d);
	}else{
		
        $username='root';
        $password = '';
        try {
            $conn = new PDO('mysql:host=localhost;dbname=swgvpmj', $username, $password);

            $sql = "UPDATE cad_usuarios SET
                cpf=?, nome=?, datanascimento=?,
                email=?, telefone=?, whatsapp=?, RG=?, orgaoExpedidor=?, ufrg=?, logradouro=?,
                numero=?, bairro=?, cep=?, cidade=?, estado=?, complemento=?, cnh=?, categoria=?,
                datavalidade=?, dataprimeiracnh=?, ativoInativo=?
                WHERE id=?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$cpf, $nome,$datanascimento,
                            $email, $telefone, $whatsapp,
                            $RG,$orgaoExpedidor,$ufrg,
                            $logradouro,$numero,$bairro,
                            $cep, $cidade, $estado,
                            $complemento, $cnh, $categoria,
                            $datavalidade, $dataprimeiracnh, 
                            $ativoInativo, $id       
        
                    ]);
        
            //$stmt->rowCount();
            if( $stmt->rowCount() > 0 ) {
                //echo 'Sucesso ao Editar!';
                $d='3';
                echo json_encode($d);
             } else {
                //echo 'Erro ao Editar!';
                $d='2';
                echo json_encode($d);
             }

        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        } 
    }



	
           
?>