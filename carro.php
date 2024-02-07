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
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>SWGVPMJ- Carro</title>
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
<!-- bbb
 Estrutura para mensagens de Sucesso e Erro, mas não aceita sobreposição
<div class="container">
   Modal -->
  <div class="modal fade" id="myModalSucesso" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content Sucesso-->
      <div class="modal-content">
        <div class="modal-header btn-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title ">Sucesso</h4>
        </div>
        <div class="modal-body btn-success">
          <p>Cadastro realizado com sucesso!</p>
        </div>
        <div class="modal-footer btn-success">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- -- Modal -->
  <div class="modal fade" id="myModalErro" role="dialog">
    <div class="modal-dialog">
    
      <!---- Modal content Erro-->
      <div class="modal-content ">
        <div class="modal-header btn-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Erro</h4>
        </div>
        <div class="modal-body btn-danger">
          <p>Erro ao realizar o cadastro!</p>
        </div>
        <div class="modal-footer btn-danger">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- Container (Modal Usuario) -->
<div style='background-color: #fff; padding: 5px 5px;'>
<h2 style='padding-left: 1.0em; color: #060e14; text-align: center;'>Cadastro de Carro</h2>
</div>

  <!-- Trigger/Open The Modal -->
  <div class="row">
  <div class="col-lg-12">
  <button style='margin-left: 2.0em; margin-right: 100px; margin-top: 20px; margin-bottom: 20px; background-color: #224f77; color: #fff;
    ' id="novo_cadastro" type="button" onclick="limpar()" class="button2 btn btn-lg buttonCadNovo" data-target="#modalCadastrar" data-toggle="modal">Cadastrar Novo</button>
</div>
</div>

<div class="container">
  <div class="table-responsive">

    <table style='color: #060e14;width:100%;' class="table table-hover table-striped width-full display" id="tabelaCarro">
      <thead class="row header">
       <tr>
          <th colspan="1">ID</th>
          <th colspan="1">Modelo</th>
          <th colspan="1">Ano</th>
          <th colspan="1"></th>
        </tr>
      </thead>
      <tbody>
      <th colspan="1">1</th>
          <th colspan="1">Chevrolet Celta</th>
          <th colspan="1">2002</th>
          <th colspan="1"><button id="editar2" rel="'+rowData.id+'" type="button" class="button5" data-target="#modalEditar" data-toggle="modal" onclick="limpar()">Editar / Visualizar</button></th>
      </tbody>
    </table>
  </div> 

</div>

<!-- The Modal Cadastrar -->
<div class="modal fade modal-primary" id="modalCadastrar" aria-hidden="true" aria-labelledby="modalCadastrar" role="dialog">
  <div class="modal-dialog container-fluid modal-tamanho">
    <div class="modal-content modal-content2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><b>X</b></span>
        </button>
        <h4 class="modal-title"><b>Cadastrar Carro</b></h4>
      </div>
      <form id="form-cadastrar" method="POST" action="" class="form-inline col-12 tamanho-form">
        <div class="modal-body">
          <div class="form-group col-12">
            <div class="row">

                          
                  <div class="col-lg-8 col-md-8 col-xs-12">
                    <label for="fname">Nome</label>
                    <input type="text" name="nome" class="nome  form-control tamanho-form tamanho-form" placeholder="" required>
                  </div>

                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Ano Modelo</label>
                    <input type="text" name="anoModelo" class="anoModelo  form-control tamanho-form tamanho-form" placeholder="aaaa" required>
                  </div>

                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">CPF/CNPJ</label>
                    <input type="text" id="cpfCnpj" name="cpfCnpj" class="cpfCnpj form-control tamanho-form"  placeholder="Digite só números" required>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">Renavam</label>
                    <input type="text" id="renavam" name="renavam" class="renavam form-control tamanho-form" placeholder="" required>
                  </div>
           
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Placa</label>
                    <input type="text" name="placa" class="placa form-control tamanho-form"  placeholder="" required>
                  </div>
                  <div class="col-lg-8 col-md-8 col-xs-12">
                    <label for="fname">Chassi</label>
                    <input type="text" name="chassi" class="chassi form-control tamanho-form" placeholder="" required>
                  </div>
             
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">Especie Tipo</label>
                    <input type="text" name="especieTipo" class="especieTipo form-control tamanho-form" placeholder="" required>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">Marca Modelo</label>
                    <input type="text" name="marcaModelo" class="marcaModelo form-control tamanho-form" placeholder="" required>
                  </div>              
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <label for="fname">Capacidade de passageiros</label>
                    <input type="text"  name="capacidadeDePassageiros" class="capacidadeDePassageiros form-control tamanho-form" placeholder="" required>
                  </div>
              
                  <div class="col-lg-8  col-md-8 col-xs-12">
                    <label for="fname">CAP/POT/CIL</label>
                    <input type="text" name="capPotCil" class="capPotCil form-control tamanho-form" placeholder="" required>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Combustível</label>
                    <input type="text"  name="bairro" class="combustivel form-control tamanho-form" placeholder="" required>
                  </div>                 
 
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Mês de vencimento do CRLV</label>
                    <input type="text" name="mesCRLV" class="mesCRLV form-control tamanho-form" placeholder="mm" required>
                  </div>
                
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Cor Predominante</label>
                    <input type="text" name="corPredominante" class="corPredominante form-control tamanho-form" placeholder="" required>
                  </div>

                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Ano Fabricação</label>
                    <input type="text" name="anoFabricacao" class="anoFabricacao form-control tamanho-form" placeholder="aaaa"  value="" required>
                  </div>

                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <label for="fname">Observações</label>
                    <textarea type="text" name="Observacao" class="Observacao form-control tamanho-form" placeholder="" value="..."  required></textarea>
                  </div>                  
              </div>
            </div>

              <div class="row">
                <div class="modal-footer">
                  <div class="col-lg-12">
                      <button type="button" onclick="limpar()" class="button3 btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button id="salvar" type="submit" onclick="salvarDadosCarro()" class="button2 btn btn-success">Salvar</button>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div id ="mensagem"  class="alert text-center textWhite"  role="alert"> </div>
                </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- The Modal Editar -->
<div class="modal fade modal-primary" id="modalEditar" aria-hidden="true" aria-labelledby="modalEditar" role="dialog">
  <div class="modal-dialog container-fluid modal-tamanho">
    <div class="modal-content modal-content2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><b>X</b></span>
        </button>
        <h4 class="modal-title"><b>Editar / Visualizar Carro</b></h4>
      </div>
      <form id="form-editar" method="POST" action="" class="form-inline col-12 tamanho-form">
        <div class="modal-body">
          <div class="form-group col-12">
            <div class="row">

            <div class="col-lg-8 col-md-8 col-xs-12">
                    <label for="fname">Nome</label>
                    <input type="text" id="nome" name="nome" class="nome  form-control tamanho-form tamanho-form" placeholder="" required>
                  </div>

                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Ano Modelo</label>
                    <input type="text" id="anoModelo" name="anoModelo" class="anoModelo  form-control tamanho-form tamanho-form" placeholder="aaaa" required>
                  </div>

                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">CPF/CNPJ</label>
                    <input type="text" id="cpfCnpj" name="cpfCnpj" class="cpfCnpj form-control tamanho-form"  placeholder="Digite só números" required>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">Renavam</label>
                    <input type="text" id="renavam" name="renavam" class="renavam form-control tamanho-form" placeholder="" required>
                  </div>
           
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Placa</label>
                    <input type="text" id="placa" name="placa" class="placa form-control tamanho-form"  placeholder="" required>
                  </div>
                  <div class="col-lg-8 col-md-8 col-xs-12">
                    <label for="fname">Chassi</label>
                    <input type="text" id="chassi" name="chassi" class="chassi form-control tamanho-form" placeholder="" required>
                  </div>
             
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">Especie Tipo</label>
                    <input type="text" id="especieTipo" name="especieTipo" class="especieTipo form-control tamanho-form" placeholder="" required>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label for="fname">Marca Modelo</label>
                    <input type="text" id="marcaModelo" name="marcaModelo" class="marcaModelo form-control tamanho-form" placeholder="" required>
                  </div>              
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <label for="fname">Capacidade de passageiros</label>
                    <input type="text" id="capacidadeDePassageiros"  name="capacidadeDePassageiros" class="capacidadeDePassageiros form-control tamanho-form" placeholder="" required>
                  </div>
              
                  <div class="col-lg-8  col-md-8 col-xs-12">
                    <label for="fname">CAP/POT/CIL</label>
                    <input type="text" id="capPotCil" name="capPotCil" class="capPotCil form-control tamanho-form" placeholder="" required>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Combustível</label>
                    <input type="text" id="combustivel"  name="combustivel" class="combustivel form-control tamanho-form" placeholder="" required>
                  </div>                 
 
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Mês de vencimento do CRLV</label>
                    <input type="text" id="mesCRLV" name="mesCRLV" class="mesCRLV form-control tamanho-form" placeholder="mm" required>
                  </div>
                
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Cor Predominante</label>
                    <input type="text" id="corPredominante" name="corPredominante" class="corPredominante form-control tamanho-form" placeholder="" required>
                  </div>

                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <label for="fname">Ano Fabricação</label>
                    <input type="text" id="anoFabricacao" name="anoFabricacao" class="anoFabricacao form-control tamanho-form" placeholder="aaaa"  value="" required>
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <br>
                    <input type="checkbox" id="ativoInativo" name="ativoInativo" value="INATIVAR">
                    <label for="ativoInativo"> Inativar Carro</label><br>
                    <br>
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <label for="fname">Observações</label>
                    <textarea type="text" id="Observacao" name="Observacao" class="Observacao form-control tamanho-form" placeholder="" value="..."  required></textarea>
                  </div>                  
              </div>
            </div>           
                  
            <div class="row">
                        <div class="modal-footer">
                            <div class="col-lg-12">
                                <button id="excluir" onclick="" type="button" class="button4 btn btn-danger">Excluir</button>
                                <button type="button" onclick="limpar()" class="button3 btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="editar" onclick="editarDadosCarro()" type="button" class="button2 btn btn-success">Editar</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <div id ="mensagem2"  class="alert text-center textWhite"  role="alert"> </div>
                        </div>
            </div>
          </div>
        </div>
      </form>
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

<script src="js/carro.js" charset="utf-8"> </script>
<!--
Nome
Ano Modelo
CPF/CNPJ
Renavam
Placa
Chassi
Especie Tipo
Marca Modelo
Cor Predominante
Capacidade de passageiros
CAP/POT/CIL
Combustivel
Ano Fabricação
Mês de vencimento do CRLV
Proprietários de veículos com placas finais 1, 2 e 3 devem efetuar o pagamento do Licenciamento 2023 até o dia 31 de março. Para veículos com placa final 4, o pagamento será em abril; final 5, em maio; final 6, em junho; final 7, em julho; final 8, em agosto; final 9, em setembro; e final 0, em outubro
Observações-->
</body>
</html>