// atualização chat
function atualizar() {

	$.ajax({
		type: 'POST',
		url: 'funcs/conversa.php',
		dataType: 'html',
		success: function (html) {
			$('#lista').html(html);
		},
		error: function () {
			alert("Ocorreu um erro");
		}
	});

	$('div #lista').scrollTop(9999);
}



$(function () {
	
	// mudança de cor da barra
	$(window).bind('scroll', function () {

		if ($(this).scrollTop() > 70) {
			$('#mainNav').addClass('bg-white')
			$('nav a').css('color', '#F4511E')
			$('nav li a').css('color', '#2c3e50')
			$('nav').addClass('border')
		} else {
			$('#mainNav').removeClass('bg-white')
			$('nav a').removeAttr('style')
			$('nav').removeClass('border')
		}
	});

	// scroll suave	
	$('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		var id = $(this).attr('href'),
			targetOffset = $(id).offset().top;

		$('html, body').animate({
			scrollTop: targetOffset - 100
		}, 500);
	});

	$('nav a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		var id = $(this).attr('href'),
			targetOffset = $(id).offset().top;

		$('html, body').animate({
			scrollTop: targetOffset - 100
		}, 500);
	});

	// mudança de cor de fundo do form
	$('#formulario').bind('mouseover', function () {
		$(this).css('background-color', '#f5f5f5').css('transition', '0.5s all ease-in-out')
	});

	$('#formulario').bind('mouseout', function () {
		$(this).css('background-color', '#FFF')
	});

	//requisição ajax envio de e-mail

	$('#enviaEmail').bind('click', function (e) {
		e.preventDefault();

		var email = $('#email').val();
		var mensagem = $('#message').val();

		if (email.length > 0 && mensagem.length > 0) {
			$.ajax({
				type: "POST",
				url: "funcs/contato_enviar.php",
				data: {
					email: email,
					mensagem: mensagem
				},
				dataType: "json",
				success: function (resultado) {
					if (resultado.Status == 'OK') {
						$('div #alert').html('<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Enviado! </strong>Sua mensagem foi enviada, retornaremos em breve!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

					} else {
						$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível enviar sua mensagem,revise seus dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					}
				}
			});
		} else {
			$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível enviar sua mensagem, pelo menos um campo não foi preenchido!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		$('#email').val("");
		$('#message').val("");
	});

	//requisição ajax para cadastrar usuário

	// $('#adiciona_user').bind('click', function (e) {
	// 	e.preventDefault();

	// 	var nome = $('#nome').val();
	// 	var email = $('#email').val();
	// 	var senha = $('#senha').val();

	// 	if (email.length > 0 && nome.length > 0) {
	// 		$.ajax({
	// 			type: "POST",
	// 			url: "funcs/insere_user.php",
	// 			data: {
	// 				nome: nome,
	// 				email: email,
	// 				senha: senha
	// 			},
	// 			dataType: "json",
	// 			success: function (resultado) {
	// 				console.log(resultado.Status);
	// 				if (resultado.Status == 'OK') {
	// 					$('div #alert').html('<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Sucesso! </strong>Usuário cadastrado!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

	// 				} else {
	// 					$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível cadastrar usuário,revise os dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	// 				}
	// 			}
	// 		});
	// 	} else {
	// 		$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível cadastrar,revise os dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	// 	}
	// 	$('#email').val("");
	// 	$('#nome').val("");
	// 	$('#senha').val("");
	// });
	
	$('#add_user').bind('submit', function (e) {
		e.preventDefault();

		var form = $("#add_user");
		
		$("#add_user").validate({
			//Aqui você deve mudar os valores, para os que você deseja validar, coloquei dados fakes para você poder visualizar
			rules: {
				nome:  {
					required: true,
					minWords: 2
				},
				email: {
					required: true,
					email: true
				},
				senha: {
					required: true,
					minlength: 5,
					maxlength: 15
				}
			},
			messages: {
				nome: {
					required: "Favor preencher este campo",
					minWords: "O nome precisa ter no mínimo duas palavras"
				},
				email: {
					required: "Favor preencher este campo",
					email: "Favor preencher com um e-mail válido"
				},
				senha: {
					required: "Favor preencher este campo",
					minlength: "Digite uma senha de no mínimo 5 caracteres",
					maxlength: "Digite uma senha de no máximo 20 caracteres"
				}
			}
		});

			if (form.valid() == true) {
				var data = $("#add_user").serializeArray();
				console.log(data);

				$.ajax({
					type: "POST",
					url: "funcs/insere_user.php",
					data: data,
					dataType: "json",
					success: function(resultado) {
						if (resultado.Status == 'ok') {
							$('div #alert').html('<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Sucesso! </strong>Usuário cadastrado!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							
							$('#email').val("");
							$('#nome').val("");
						   	$('#senha').val("");
						} else {
							$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível cadastrar usuário, verifique os dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						}
					}
				});

				return false;
			} else {
				$('div #alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível cadastrar usuário, verifique os dados e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
				
	});



	// scroll edição de dados user 

	$('#edita').hide();
	$('#envia').hide();

	$('#edita_user').bind('click', function () {
		$('#envia').hide();
		$('#edita').slideToggle('slow');
	});


	$('#envia_user').bind('click', function () {
		$('#edita').hide();
		$('#envia').slideToggle('slow');
	});

	// $('#chat_enviar').bind('click',function(){;
	// 	$('#chat').slideToggle('slow');
	// });	
	//requisição para mostrar dados do usuário a ser editado
	$('#edita_user').bind('click', function (e) {
		e.preventDefault();

		var id = $('#id_user').val();

		$.ajax({
			type: "POST",
			url: "funcs/dados_editar_user.php",
			data: {
				id_user: id
			},
			dataType: "json",
			success: function (resultado) {
				if (resultado.Status == 'OK') {
					$('#nome').val(resultado.nome);
					$('#email').val(resultado.email);
					$('#senha').val(resultado.senha);
				} else {
					$('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível encontrar os dados, e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
			}
		});
	});

	//requisição para eviar os dados do usuário editado
	$('#envia_alter').bind('click', function (e) {
		e.preventDefault();

		var id = $('#id_user').val();
		var nome = $('#nome').val();
		var email = $('#email').val();
		var senha = $('#senha').val()

		$.ajax({
			type: "POST",
			url: "funcs/edita_user.php",
			data: {
				id_user: id,
				nome: nome,
				email: email,
				senha: senha
			},
			dataType: "json",
			success: function (resultado) {
				if (resultado.Status == 'OK') {
					$('#alert').html('<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Sucesso! </strong>Salvamos seus dados!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				} else {
					$('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Erro! </strong>Não foi possível encontrar os dados, e tente novamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
			}
		});
	});

	// scroll do chat

	// setInterval("atualizar()", 3000);
	console.log(window.location.pathname);
	if (window.location.pathname == '/projetocomun/chat.php') {

		setInterval("atualizar()", 3000);
	}
	$('#form-chat').bind('submit', function (e) {

		e.preventDefault();

		var txt = $(this).serialize();
		console.log(window.location.href);

		$.ajax({
			type: 'POST',
			url: 'funcs/add_mensagem.php',
			data: txt,
			success: function (result) {
				$('#status').html("tudo funcionando: " + result);
			}
		});

		$('#mensagem').val('');

	});



//busca de usuarios sem refresh
	$("#pesquisa").keyup(function(){
			
		var pesquisa = $(this).val();
		
		//Verificar se há algo digitado
		if(pesquisa == ''){
			var dados = {
				palavra : pesquisa
			}		
			$.post('funcs/busca_users.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$("#content").html(retorna);
			});
		}		
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}		
			$.post('funcs/busca_users.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$("#content").html(retorna);
			});
		}else{
			$("#content").html('');
		}		
	});

	// função para checar mensagens visualizadas
	
	if (window.location.pathname == '/projetocomun/mensagens.php') {

		$.ajax({
			type: "POST",
			url: "funcs/atualiza_status.php",
			dataType: "json",
			success: function (resultado) {
				if (resultado.Status == 'OK') {
					console.log("Status Atualizado");
				} else {
					console.log("Erro ao atualizar status");
				}
			}
		});
	}

	// função para checar arquivos visualizados
	
	$('.acessa').bind('click',function(e){

		e.preventDefault();
		var teste = $(this).attr("href");
		var repartido = teste.split('=');
		var id = repartido[1];

		console.log(id);

		$.ajax({
			type: "POST",
			url: "funcs/atualiza_arquivos.php",
			data:{ id_user : id },
			dataType: "json",
			success: function (resultado) {
				if (resultado.Status == 'OK') {
					console.log("Status Atualizado");
				} else {
					console.log("Erro ao atualizar status");
				}
			}
		});
		$(location).attr('href', 'caixa_arquivos_admin.php?id_user='+id);
	});
	
	// bloqueio do botão de envio de arquivos

	$("#arquivo").change(function(){
		$("#envia_arquivos").attr("disabled", false);
	});


	$(".excluir").bind('click', function(e){

		e.preventDefault();
		var teste = $(this).attr("href");
		var repartido = teste.split('=');
		var id_user = repartido[1];

		$.ajax({
			type: 'POST',
			url: 'funcs/exclui_user.php',
			data: {id_user:id_user},
			dataType: 'json',
			success: function (html) {
				bootbox.confirm({
					message:'Você realmente deseja excluir esse usuário?',
					callback: function(confirmacao){
				  
					  if (confirmacao)
						bootbox.alert('Usuário excluído com sucesso.');
					  else
						bootbox.alert('Operação cancelada.');
					
					},
					buttons: {
					  cancel: {label: 'Cancelar',className:'btn-default'},
					  confirm: {label: 'Excluir',className:'btn-danger'}
					  
					}
				  });
			},
			error: function () {
				alert("Ocorreu um erro");
			}
		});
	
	});	

	// $(".excluir").bind('click', function(){
	// 	confirmacao();
	// });

	// $('.excluir').click(												
	// 	function(e) {
	// 	e.preventDefault();
	// 	var object = $(this).attr('data-object');					
	// 	var location = $(this).attr('href');
	// 	bootbox.confirm("<div align='center' class='mbaixo2 mTop2'>Deseja apagar o registro "+object+"?<br />Esta operação não poderá ser desfeita!</div>", function(confirmed) {
	// 		if(confirmed) {
	// 	window.location.replace(location);
	// 	}
	// 		});
	// 	});			
	  

});

