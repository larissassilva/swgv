var duplicateCPF = '02651647101';
console.log('3');
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
         
          alert('Não existe um usuário com esse CPF!');
        }
    }
});