function login() {


     // console.log("aqui");
         var dados = $("#form-login").serialize();
         console.log(dados);

         var usuario = $("#usuario").val();
         //console.log(usuario);
         
         var senha = $("#senha").val();
         //console.log(senha);

           $.ajax({  
                type: 'POST',//método                  
                url: 'valida.php',
                cache: false,
                //dataType: 'JSON',
                //data: 'usuario='+usuario+'senha='+senha,
                data: dados,
                
                           
                 success:function (e) {
                  //var r=e;
                  //console.log(r);
                    
                    console.log("entrei no ajax");
                    console.log(e);
                    
                    if(e=='1'){

                      console.log('Sucesso 1');
                      setTextoNoAlert('alert btn-success text-center', 'Sucesso!');
                      setTimeout("window.location.href='administrativo.php'", 3000);

                    }
                    else if(e=='2'){

                      console.log('erro 2');
                      setTextoNoAlert('alert btn-danger text-center', 'Erro no Login! Senha');
                      //setTimeout("window.location.href='login.php'", 5000);

                    }
                    else if(e=='4'){

                      console.log('erro 4');
                      setTextoNoAlert('alert btn-danger text-center', 'Erro no Login! Usuário');
                     // setTimeout("window.location.href='login.php'", 5000);

                    }else{

                      console.log('erro 3');
                      setTextoNoAlert('alert btn-danger text-center', 'Erro no Login!');
                      //setTimeout("window.location.href='login.php'", 5000);
                      
                    }
                  }

                 
            });
         
}


function setTextoNoAlert(classe, message) {
    $('.alert').attr('class', classe);
    $('#mensagem').text(message);
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



