<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE');
ini_set('display_errors', 0 );
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>SWGVPMJ- Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
  <script src="js/msgErro.js"></script>
  <script src="js/alertify.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>



  <style>

.modal-tamanho {
    width: 1100px;
    margin: 10px auto;
} 

.tamanho-form {
  min-width : 100% !important;
}

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
  .buttonCadNovo:hover{
    color: #fff;
    background-color: #296089 !important;
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
  .textWhite {
    color: #ffffff!important;;
    color: white;
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

   .modal-tamanho {
      width: 600px;
      margin: 10px auto;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }

    .modal-tamanho {
      width: 460px;
      margin: 10px auto;
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

		        
        <div class="container a">
<div class="row">
    <div class="col-sm-12 col-lg-12">

              <button class="btn btn-lg">
    <a href="#">
      <span class="glyphicon"><i class=" ab fa fa-car"> Carro</i></span>       
    </a></button>
    <button class="btn btn-lg">
        <a href="#">
      <span class="glyphicon"><i class="ab fa fa-user"> Motorista</i></span>   
    </a></button>
        <button class="btn btn-lg">
        <a href="#">
      <span class="glyphicon"><i class="ab fa fa-address-card"> Solicitar</i></span>   
    </a></button>
	</div>
	</div>
    <div class="row">
    <div class="col-sm-12 col-lg-12">
        <button class="btn btn-lg">
        <a href="#">
      <span class="glyphicon"><i class="ab fa fa-user"> Usuário</i></span>   
    </a></button>
    </a></button>
        <button class="btn btn-lg">
        <a href="#">
      <span class="glyphicon"><i class="ab fa fa-user"> Perfis</i></span>      </a></button>
              <button class="btn btn-lg">
        <a href="#">
      <span class="glyphicon"><i class="ab fa fa-address-card"> Solicitações</i></span>   
    </a></button>
</div>

</div>
</div>
</br>
<!-- Container (Final Modal Usuario) -->

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



<script src="js/tabelas.js"></script>
<script src="js/msgErro.js"></script>

<script src="js/teste.js" charset="utf-8"> </script>

</body>
</html>
