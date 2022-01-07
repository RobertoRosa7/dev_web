$(document).ready(() => {
	$('#documentacao').on('click', () => {
		// request da página que está no servidor por meio da aplicação
		//$('#pagina').load('documentacao.html')
		
		/*
		$.get('documentacao.html', data => {
			$('#pagina').html(data)
			//console.log(data)
		})
		*/
		
		$.post('documentacao.html', data => {
			$('#pagina').html(data)
		})
		
		//console.log('link documentação clicado.')
	})
	$('#suporte').on('click', () => {
		//$('#pagina').load('suporte.html')
		
		/*
		$.get('suporte.html', data => {
			$('#pagina').html(data)
			//console.log(data)
		})
		*/
		
		$.post('suporte.html', data => {
			$('#pagina').html(data)
		})
		
		//console.log('link suporte clicado')
	})
	// Ajax
	$('#competencia').on('change', e => {
		let competencia = $(e.target).val()
		// lógica de requisição assincrona -  método, url, dados, sucesso, erro
		$.ajax({
			type: 'GET',
			url: 'app.php',
			dataType: 'json',
			data: `competencia=${competencia}`, //x-www-form-urlencoded
			success: dados => {
				$('#numeroVendas').html(dados.numeroVendas).addClass('text-success')
				$('#totalVendas').html(dados.totalVendas).addClass('text-success')
				$('#clientesAtivos').html(dados.clientesAtivos).addClass('text-succss')
				$('#clientesInativos').html(dados.clientesInativos).addClass('text-black-50')
				$('#totalReclamacoes').html(dados.totalReclamacoes).addClass('text-danger')
				$('#totalElogios').html(dados.totalElogios).addClass('text-primary')
				$('#totalSugestoes').html(dados.totalSugestoes).addClass('text-black')
				$('#totalDespesas').html(dados.totalDespesas).addClass('text-danger')
			},
			error: erro => {console.log(erro)}
		})
	})
})