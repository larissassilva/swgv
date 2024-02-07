var t;
var obj;
var dadosObj = new Array();
var Obj;
var idEditar;
var ativoInativo = "ATIVO";
console.log('Comecei');


function lista () {
  //console.log('Chamei listar');
  obj = "listarUsuario.php";
  $.getJSON( obj, {
    format: "json"
  })
    .done(function( data ) {
      //console.log(data);   
      data.forEach(function (item, indice, array) {
        //console.log(item.cpf);
        dadosObj[indice]=item;
        //console.log(dadosObj);
      });
      //carregar tabela
      t=$("#tabelaUsuario").DataTable({//variavel do data table ajax reload/ incio aqui
        data: data,
        columns: [
          {"data": "id"},
          {"data": "nome"},
          {"data": "cpf"},
          {"data": null,
              "createdCell": function (td, cellData, rowData, row, col) {
                //console.log(rowData);
                  $(td).addClass('text-center');
                  $(td).html('<button id="editar2" rel="'+rowData.id+'" type="button" class="button5" data-target="#modalEditar" data-toggle="modal" onclick="limpar()">Editar / Visualizar</button>');
                  //console.log(rowData.id);
                }
          }

        ],     
        
        //order: [[ 0, 'asc' ], [ 2, 'desc' ]],       
       
      });//fim do carregar tabela
    })
    
};
lista ();
$('#tabelaUsuario').on('click', 'tr', function (e) {   
  var dado= t.row($(this)).data();//vir tudo da linha que cliquei 
  console.log(dado);
      $.each(dado,function (key, valor) {
        //preciso para editar depois vou usar o cpf quando tratar a duplicidade em cadastar um cpf
        if(key == 'id'){
          idEditar =  valor;
        }
        //setar o checkbox quando o usuário for inativo
        if(key == 'ativoInativo'){
            if(valor == 'INATIVAR'){
              document.getElementById("ativoInativo").checked = true;
            }          
        }
        /*Não consegui setar vaor para o datepicker desisti
        if(key == 'datanascimento'){
          
          console.log('datanascimento');
          var nova_data = new Date(valor);
          //para funcionar o datepicker tem que ser ano + mes + dia
          var ano = nova_data.getFullYear();
          var mes = nova_data.getMonth() + 1;
          var dia = nova_data.getDate(); 
          //tenho que transforma o tipo data em string Jesus
          var a = ano.toString();
          var m = mes.toString();
          var d = dia.toString();
          var data = a+"-"+m+"-"+d;
          console.log(data);
          $('.datanascimento').val(valor).trigger('change');
        }else{*/ //era para o datepicker
          $('.'+key).val(valor).trigger('change');  
        //}  //era para o datepicker   
      });
     // $('#modalEditar').modal('toggle'); 
      //$('#modalEditar').modal('show');
});
//JSON.stringify(dadosObj);
//console.log(dadosObj);



$(document).ready( function () {
  //document.getElementById("mensagem").style.color="white";
  //lista ();
  //console.log(dadosObj);

  //$('#tabelaUsuario').DataTable();
});



//Cadastrar login da Tela Cadastrar 
function salvar(form) {
    console.log("aqui");
      var form = $("#form-cadastrar").serialize();
      console.log(form);

      $.ajax({                    
                  url: 'cadastrarUsuario.php',
                  type: 'POST',//método
                  //dataType: 'JSON',
                  data: form,
                  //data: { nome: nome, email : email, usuario: usuario, senha : senha },
                  //data: 'nome='+nome+'&email='+email+'&usuario='+usuario+'&senha='+senha,//dados
                            
                  success:function (e) {
                      console.log("entrei no ajax");
                      
                      if(e=='1'){

                        console.log('1');
                        alert('alert btn-success text-center', 'Sucesso!');
                      // window.location.href='administrativo.php';

                      }
                      else{

                        console.log('2');
                        alert('alert btn-danger text-center', 'Erro no Login!');
                        //window.location.href='login.php';

                      }
                    }

                  
    });
     


     limpar();

  }
 //fim da tela Cadastrar
 

 //Cadastrar dados do usuário da tela usuario
function salvarDadosUsuario(form){
  console.log("aqui Salvar Dados do usuário");
  var form = $("#form-cadastrar").serialize();
  var duplicateCPF = document.getElementById("cpf").value;
  console.log(duplicateCPF);
  if(duplicateCPF!=""){
      $.ajax({                    
        type: 'POST',//método                  
        url: 'verificarDuplicidadeUsuario.php',
        cache: false,
        data: duplicateCPF,
                  
        success:function (e) {
            console.log("entrei no ajax");
                        
            if(e=='1'){
            console.log('1');
            alert('Já existe um usuário com esse CPF!');
            //setTextoNoAlert('alert btn-success text-center', 'Já existe um usuário com esse CPF!');
            //setTimeout("window.location.href='usuario.php'", 10000);

            }else{ 
              console.log('2');
             
              console.log(form);
              
              $.ajax({                    
                type: 'POST',//método                  
                url: 'cadastrarDadosUsuario.php',
                cache: false,
                data: form,
                          
                success:function (d) {
                    console.log("entrei no ajax");
                                
                    if(d=='3'){
      
                    console.log('3');
                    setTextoNoAlert('alert btn-success text-center', 'Sucesso!');
                    setTimeout("window.location.href='usuario.php'", 7000);
      
                    }
                    if(d=='2' || d=='1'){
      
                      console.log('2');
                      //window.location.href='usuario.php';
                      setTextoNoAlert('alert btn-danger text-center', 'Erro no Cadastro!');
                      setTimeout("window.location.href='usuario.php'", 10000);
      
                    }
                  }
                  
              
              });
              
      
      
              

            }
          }
          
      
      });
      
       
  }
//limpar();

}
 //fim do cadastrar  dados do usuário

//Atualizar dados do usuário da tela usuario
function editarDadosUsuario(form){
  console.log("aqui Editar Dados do usuário");
      var form = $("#form-editar").serialize();
      

      if($('#ativoInativo').is('checked')){
        console.log("INATIVAR"); 
        ativoInativo="INATIVAR";  
      }
       
      console.log(form + '&id=' + idEditar+ '&ativoInativo=' + ' ');
     
      $.ajax({                    
        type: 'POST',//método                  
        url: 'editarDadosUsuario.php',
        cache: false,
        data: form +   '&id=' + idEditar,
        

                  
        success:function (d) {
            console.log("entrei no ajax");
            console.log(d);            
            if(d=='3'){

             //console.log('3');
             setTextoNoAlert('alert btn-success text-center text-white textWhite', 'Sucesso ao Editar!');
             setTimeout("limpar()", 6000);
             setTimeout("window.location.href='usuario.php'", 7000);

            }
            if(d=='2' || d=='1'){

              //console.log('2');
              setTextoNoAlert('alert btn-danger text-center text-white textWhite', 'Erro ao Editar!');
              setTimeout("limpar()", 9000);
              setTimeout("window.location.href='usuario.php'", 10000);

            }
          }
          

        
      });



     
}
 //fim do atualizar  dados do usuário

function limpar(){
	console.log("limpei cadastrar");
	document.getElementById("form-cadastrar").reset();
  document.getElementById("form-editar").reset();
  document.getElementById("ativoInativo").checked = false;
  //$('#mensagem').text("");
  const divSalvar = $("#mensagem");
  divSalvar.empty();
  const divEditar = $("#mensagem2");
  divEditar.empty();
}



//mensagem cadastro e editar
function setTextoNoAlert(classe, message) {
  $('.alert').attr('class', classe);
  $('#mensagem').text(message);
  $('#mensagem2').text(message);
}

function modalSucesso(){
    $("#myModalSucesso").modal();
}
//modalSucesso();
function modalErro(){
      $("#myModalErro").modal();
}
//modalErro();


//Preenchimento automatico ao inserir o CEP
function limpa_formulário_cep() {
  //Limpa valores do formulário de cep.
  document.getElementById('rua').value=("");
  document.getElementById('bairro').value=("");
  document.getElementById('cidade').value=("");
  document.getElementById('uf').value=("");
  document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
  //Atualiza os campos com os valores.
  document.getElementById('rua').value=(conteudo.logradouro);
  document.getElementById('bairro').value=(conteudo.bairro);
  document.getElementById('cidade').value=(conteudo.localidade);
  document.getElementById('uf').value=(conteudo.uf);
  document.getElementById('ibge').value=(conteudo.ibge);
} //end if.
else {
  //CEP não Encontrado.
  limpa_formulário_cep();
  alert("CEP não encontrado.");//arrumar a menssagem
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

  //Expressão regular para validar o CEP.
  var validacep = /^[0-9]{8}$/;

  //Valida o formato do CEP.
  if(validacep.test(cep)) {

      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById('rua').value="...";
      document.getElementById('bairro').value="...";
      document.getElementById('cidade').value="...";
      document.getElementById('uf').value="...";

      //Cria um elemento javascript.
      var script = document.createElement('script');

      //Sincroniza com o callback.
      script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);

  } //end if.
  else {
      //cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");//arrumar a menssagem
  }
} //end if.
else {
  //cep sem valor, limpa formulário.
  limpa_formulário_cep();
}
};

//Fim CEP



$(document).ready(function(){
// Add smooth scrolling to all links in navbar + footer link
$(".navbar a, footer a[href='#topo']").on('click', function(event) {
  // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {
    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
 
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  } // End if
});

$(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
      if (pos < winTop + 600) {
        $(this).addClass("slide");
      }
  });
});
})
