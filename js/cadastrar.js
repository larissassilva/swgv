
 function cadastrar(form) {
    console.log("aqui");
      var form = $("#form-cadastrar").serialize();
      console.log(form);

      $.ajax({                    
                  url: 'cadastrar2.php',
                  type: 'POST',//método
                  //dataType: 'JSON',
                  data: form,
                  //data: { nome: nome, email : email, usuario: usuario, senha : senha },
                  //data: 'nome='+nome+'&email='+email+'&usuario='+usuario+'&senha='+senha,//dados
                            
                  success:function (e) {
                      console.log("entrei no ajax");
                      console.log(e);
                      
                      if(e=='3'){

                        console.log('3');
                        alert('alert btn-success text-center', 'Sucesso!');
                      // window.location.href='administrativo.php';

                      }
                      else{

                        console.log('2');
                        alert('alert btn-danger text-center', 'Erro no Cadastro!');
                        //window.location.href='login.php';

                      }
                    }

                  
    });
     


     limpar();

  }
  
function limpar(){
	console.log("limpei");
	document.getElementById("form-cadastrar").reset();

}