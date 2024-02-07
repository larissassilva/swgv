<?php

     $dsn = 'mysql:dbname=swgvpmj;host=localhost;';
     $user =	'root';
     $password =	'';

   
		try{
			$pdo= new PDO($dsn, $user, $password);
		}catch(PDOException $ex){
			echo 'Erro: '.$ex->getMessage();
		}
    
		
 
 ?>