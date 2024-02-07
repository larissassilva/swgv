<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
header('Content-Type: application/json');
header('Character-Encoding: utf-8');
header('Content-Type: application/json; charset=utf-8');

session_start();
ob_start();
//include_once 'conexao.php';
include_once 'BancodeDados.php';
//include_once 'Usuario.class.php';
/*
class listarUsuario{
        public function listarEspecial($query = null)
        {
                $pdo = new BancodeDados();
                $stmt = $pdo->query($query == null ? "SELECT * FROM cad_usuarios" : $query );
                
                if($stmt->rowCount() > 0):
                                while($dados = $stmt->fetch(PDO::FETCH_OBJ)){
                                        $objeto = new stdClass();
                                        foreach ($dados as $key => $dado){
                        $objeto->$key=$dado;
                        }
                                        $objetos[] = $objeto;
                                }
                                //return $objetos;
                                var_dump($objetos);
                else:
                return false;
                endif;
        }
}*/
//$pdo = new BancodeDados();
$cpf = $_POST["cpf"];
//$cpf ='20584424078';
//$cpf ='02651647101';
$username='root';
$password = '';
try {
        $conn = new PDO('mysql:host=localhost;dbname=swgvpmj', $username, $password);
        $stmt = $conn->prepare("SELECT * FROM cad_usuarios WHERE cpf= ".$cpf." ");
        $stmt->execute();
      
        $result = $stmt->fetchAll();
        
        if (count($result)) {
            $d=1;
            echo json_encode($d); 
        }
          
          //$json = json_encode($rows,  JSON_UNESCAPED_UNICODE, JSON_FORCE_OBJECT); 
         // echo $json;
         
        else {          
            $d=2;
            echo json_encode($d); 
        }
        
} catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
}


?>