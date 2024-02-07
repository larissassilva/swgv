<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
header('Character-Encoding: utf-8');
ini_set('display_errors', 0 );
error_reporting(0);
if(!isset($_SESSION)){
  session_start();   
}else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>SWGV PMJ - Cadastrar</title>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
div.a {
  text-align: center;
   margin-bottom: 30px;
	font-size: 50px;
    text-transform: uppercase;
    font-weight: 600;
}
i.ab {
  text-align: center;
	font-size: 40px;
    font-weight: 600;
}
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #224f77;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #224f77;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #224f77;
  }
  .carousel-indicators li {
    border-color: #224f77;
  }
  .carousel-indicators li.active {
    background-color: #224f77;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #224f77; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #224f77;
    background-color: #fff !important;
    color: #224f77;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #224f77 !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #224f77;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #224f77;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #224f77 !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #224f77;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }

</style>
	</head>
	<body id="topo" data-spy="scroll" data-target=".navbar" data-offset="60">

	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">SWGV</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="sobre.php">SOBRE</a></li>
        <li><a href="contato.php">CONTATO</a></li>
        <li><a href='sair.php'>SAIR</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
  <h1>SWGV</h1> 
  <p>Software Web de Gestão Veicular</p> 
</div>
	<div class="container text-center">
		<h2>Cadastro</h2>

		<form id="form-cadastrar" method="POST" action="">
    <div class="input-group">
			<label class="input-group-addon" >CPF</label>
			<input type="text" class="form-control" name="cpf" id="cpf"  placeholder="Digite somente números">
		</div>
		<div class="input-group">
			<label class="input-group-addon" >Nome</label>
			<input type="text" class="form-control" name="nome" id="nome"  placeholder="Digite o nome e o sobrenome">
		</div>
		<div class="input-group">	
			<label class="input-group-addon">E-mail</label>
			<input type="text"  class="form-control"  name="email" id="email" placeholder="Digite o seu e-mail">
		</div>
		<div class="input-group">	
			<label class="input-group-addon" >Usuário</label>
			<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite o usuário">
		</div>
		<div class="input-group">	
			<label class="input-group-addon">Senha</label>
			<input type="password"  class="form-control"  name="senha" id="senha"  placeholder="Digite a senha">
		</div>	
		<br>
			<button id="btnCadUsuario" type="submit" onclick="cadastrar()" class="btn btn-primary btn-block">Cadastrar</button>
			
			<!--Lembrou? <a href="login.php">Clique aqui</a> para logar-->
			<br>
			Área Administrativa <a href="administrativo.php">Clique aqui</a> para retornar.
		
		</form>
	</div>
  	<br>
	<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTATO</h2>
  <div class="row">
    <div class="col-sm-12">
      <p style="text-align: justify;">Software Desenvolvido para o TCC - Trabalho de Conclusão de Curso, do Curso de Tecnologia em Análise e Desenvolvimento de Sistemas, IFG Câmpus Jataí. Sob a orientação do Professor Me. Renato Oliveira Abreu. </p>
  </div>
  <div class="col-sm-4">
      <p><span class="glyphicon glyphicon-map-marker"></span> Jataí, GO</p>
      <p><span class="glyphicon glyphicon-phone"></span> +55 64981299470</p>
      <p><span class="glyphicon glyphicon-envelope"></span> larissa.ssilva@gmail.com</p>
    </div>
    
  </div>
</div>

<!-- Image of location/map -->
<img src="image/jataiJK.jpg" class="w3-image w3-greyscale-min" style="width:100%">

<footer class="container-fluid text-center">
  <a href="#topo" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Bootstrap Tema Desenvolvido por <a href="https://larissasilvaoficial.com.br" title="Visite Larissa" target="_blank">Larissa Soares Silva</a></p>
</footer>
		<script charset="utf-8" src="js/cadastrar.js"></script>
	</body>
</html>
