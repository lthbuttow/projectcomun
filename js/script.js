$(function() {

// mudança de cor da barra
	$(window).bind('scroll',function(){

		if ($(this).scrollTop() > 70){
			$('#mainNav').addClass('bg-white')
			$('nav a').css('color','#F4511E')
			$('nav li a').css('color','#2c3e50')
			$('nav').addClass('border')
		} else {
			$('#mainNav').removeClass('bg-white')
			$('nav a').removeAttr('style')
			$('nav').removeClass('border')
		}
	});
	
// scroll suave	
	$('a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  var id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	$('nav a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  var id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});	

// mudança de cor de fundo do form
	$('#formulario').bind('mouseover', function(){
		$(this).css('background-color','#ecf0f1').css('transition','0.5s all ease-in-out')
	});

	$('#formulario').bind('mouseout', function(){
		$(this).css('background-color','#FFF')
	});

//requisição ajax envio de e-mail

	$('#enviaEmail').bind('click', function(e){
		e.preventDefault();
		
		console.log('teste');

		var email = $('#email').val();
		var mensagem = $('#message').val();

		if (email.length > 0 && mensagem.length > 0){
		$.ajax({
   		type:"POST",
    	url:"classes/teste.php",
    	data:{email:email, mensagem:mensagem},
    	dataType:"json",
    	success: function(resultado) {
		if (resultado.Status == 'OK'){
			$('div #alert').html('<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Enviado! </strong>Sua mensagem foi enviada, retornaremos em breve!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

		} else {
			 $('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível enviar sua mensagem,revise seus dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		}
		});
	} else {
		$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível enviar sua mensagem,revise seus dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
	});
});
