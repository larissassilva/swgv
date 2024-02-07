$("#btnEnviar").on('click', function(form) {    
  function setTextoNoAlert(classe, message) {
    $('.alert').attr('class', classe);
    $('#mensagem').text(message);
}    
         console.log("aqui");
         var form = $("#form-contato").serializeArray();
         console.log(form);
         var email=$("#email").val();
         console.log(email);
           $.ajax({                    
                url: 'emailContato.php',
                type: 'POST',//método
                data: form,//dados

                           
                 success:function (e) {
                  console.log("fiz");
                  if(e=1){
                    console.log("1");
                    setTextoNoAlert('alert btn-success text-center', 'Sucesso ao Enviar o Email!');
                    //window.location.href='contato.php';
                  }else{
                    setTextoNoAlert('alert btn-danger text-center', 'Erro ao Enviar o Email!');
                    console.log("2");
                  }
                }
                  

                 
   });
         
});

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