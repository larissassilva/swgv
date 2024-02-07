var t;
var obj;
var dadosObj = new Array();
var Obj;
var idEditar;
var ativoInativo = "ATIVO";
console.log('Comecei');


function lista () {
  //console.log('Chamei listar');
  obj = "listarCarro.php";
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
      t=$("#tabelaCarro").DataTable({//variavel do data table ajax reload/ incio aqui
        data: data,
        columns: [
          {"data": "id"},
          {"data": "marcaModelo"},
          {"data": "anoFabricacao"},
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
$('#tabelaCarro').on('click', 'tr', function (e) {   
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

//Cadastrar dados do carro da tela usuario
function salvarDadosCarro(form){
  console.log("aqui Salvar Dados do carro");
  var form = $("#form-cadastrar").serialize();
  var duplicateRenavam = document.getElementById("renavam").value;
  console.log(duplicateCPF);
  if(duplicateRenavam!=""){
      $.ajax({                    
        type: 'POST',//método                  
        url: 'verificarDuplicidadeCarro.php',
        cache: false,
        data: duplicateCPF,
                  
        success:function (e) {
            console.log("entrei no ajax");
                        
            if(e=='1'){
            console.log('1');
            alert('Já existe um carro com esse Renavam!');
            //setTextoNoAlert('alert btn-success text-center', 'Já existe um usuário com esse CPF!');
            //setTimeout("window.location.href='usuario.php'", 10000);

            }else{ 
              console.log('2');
             
              console.log(form);
              
              $.ajax({                    
                type: 'POST',//método                  
                url: 'cadastrarDadosCarro.php',
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
                      setTextoNoAlert('alert btn-danger text-center', 'Erro no Cadastro!');
                      setTimeout("window.location.href='carro.php'", 10000);
      
                    }
                  }
                  
              
              });
              
      
      
              

            }
          }
          
      
      });
      
       
  }
//limpar();

}
 //fim do cadastrar  dados do carro

//Atualizar dados do carro da tela usuario
function editarDadosCarro(form){
  console.log("aqui Editar Dados do carro");
      var form = $("#form-editar").serialize();
      

      if($('#ativoInativo').is('checked')){
        console.log("INATIVAR"); 
        ativoInativo="INATIVAR";  
      }
       
      console.log(form + '&id=' + idEditar+ '&ativoInativo=' + ' ');
     
      $.ajax({                    
        type: 'POST',//método                  
        url: 'editarDadosCarro.php',
        cache: false,
        data: form +   '&id=' + idEditar,
        

                  
        success:function (d) {
            console.log("entrei no ajax");
            console.log(d);            
            if(d=='3'){

             //console.log('3');
             setTextoNoAlert('alert btn-success text-center text-white textWhite', 'Sucesso ao Editar!');
             setTimeout("limpar()", 6000);
             setTimeout("window.location.href='carro.php'", 7000);

            }
            if(d=='2' || d=='1'){

              //console.log('2');
              setTextoNoAlert('alert btn-danger text-center text-white textWhite', 'Erro ao Editar!');
              setTimeout("limpar()", 9000);
              setTimeout("window.location.href='carro.php'", 10000);

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

/*Mês de vencimento do CRLV
Proprietários de veículos com placas finais 1, 2 e 3 
devem efetuar o pagamento do Licenciamento 2023 até o dia 31 de março.
 Para veículos com placa final 4, o pagamento será em abril; 
 final 5, em maio; final 6, em junho; final 7, em julho;
  final 8, em agosto; final 9, em setembro; 
  e final 0, em outubro*/