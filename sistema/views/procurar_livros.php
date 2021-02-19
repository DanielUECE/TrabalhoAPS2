<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	
    <title>Catalogo | Livraria</title>
   
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../bootstrap/css/prettyPhoto.css" rel="stylesheet">
    <link href="../../bootstrap/css/price-range.css" rel="stylesheet">
    <link href="../../bootstrap/css/animate.css" rel="stylesheet">
	<link href="../../bootstrap/css/main.css" rel="stylesheet">
	<link href="../../bootstrap/css/responsive.css" rel="stylesheet">     
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">

	<script>

//Validação dos campos
//Verificando se o documento foi carregado
$(document).ready( function(){

	$('#btn_inserir_categorias').click(function(){

		window.location.href = "http://localhost/Livraria1/sistema/views/inserir_categorias.php";

	});

	$('#btn_inserir_autores').click(function(){

		window.location.href = "http://localhost/Livraria1/sistema/views/inserir_autores.php";

	});

	$('#btn_inserir_autores_nos_livros').click(function(){

		window.location.href = "http://localhost/Livraria1/sistema/views/inserir_autor_livro.php";

	});

	$('#btn_inserir_editoras').click(function(){

		window.location.href = "http://localhost/Livraria1/sistema/views/inserir_editoras.php";

	});


	$('#pagina_inicial').click(function(){
		
		// Direcionando o aluno para a página inicial.
		window.location.href = "http://localhost/UECEBOOK/uecebook/pagina_inicial.php";
	});

	$('#home').click(function(){

		// Direcionando o aluno para sua página de perfil.
		window.location.href = "http://localhost/UECEBOOK/uecebook/home.php";
	});

	
	//associar o evento de click ao botão
	$('#btn_procurar_livros').click( function(){	

		if($('#nome_livro').val().length > 0){
			$.ajax({

				url: '../controllers/get_livros.php',
				method: 'post', 
				data: $('#form_procurar_livros').serialize(),
				success: function(data){
					$('#livros').html(data);
				
					$('.btn-inserir-autores').click(function(){
						window.location.href = "http://localhost/Livraria1/sistema/views/inserir_autor_livro.php";
					});
				}

			
				

			});

		}



		//Verificando se há alguma coisa no campo
		//if($('#nome_livro').val().length > 0){

			//{ texto_postagem: $('#texto_postagem').val() }
			// Enviando a mensagem do campo para o inclui_postagem.php
		//	$.ajax({
		//		url: 'get_livros.php',
		//		method: 'post', 
		//		data: $('#form_procurar_livros').serialize(),
				/*success: function(data){
					$('#livros').html(data);
					
					/*$('.btn_seguir').click( function(){
						var id_aluno = $(this).data('id_aluno');

						$('#btn_seguir_'+id_aluno).hide();
						$('#btn_deixar_seguir_'+id_aluno).show();

						$.ajax({
							url: 'seguir.php',
							method: 'post',
							data: { seguir_id_aluno: id_aluno },
							success: function(data){
								alert('Registro efetuado com sucesso');
							}
						});
					});*/

					/*$('.btn_deixar_seguir').click( function(){
						var id_aluno = $(this).data('id_aluno');

						$('#btn_seguir_'+id_aluno).show();
						$('#btn_deixar_seguir_'+id_aluno).hide();

						$.ajax({
							url: 'deixar_seguir.php',
							method: 'post',
							data: { deixar_seguir_id_aluno: id_aluno },
							success: function(data){
								alert('Registro removido com sucesso !!!');
							}
						});

					});*/
				//}
			//});
		//}
	});
});

</script>


</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/icone-livraria.png"> <span>Livraria Aps </span> </a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Teste</a></li>
								<li><a href=""><i class="fa fa-star"></i> Teste</a></li>
								<li><a href="carinho.php"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							
						</div>
					</div>
					<div class="col-md-4">


					<div class="panel panel-default">
						<div class="panel-body">
							<form id="form_procurar_livros" class="input-group">
								<input type="text" id="nome_livro" name="nome_livro" class="form-control" placeholder="Que livro você está procurando?" maxlength="200">
								<span class="input-group-btn">
									<button class="btn btn-default" id="btn_procurar_livros" type="button">
										Procurar
									</button>
								</span>
							</form>
						</div>
					</div>

					<div id="livros"></div>  <!--Essa tag conterá a listagem de livros-->


				 
</div>	


				</div>
				</div>
			</div>
	
	
	</header>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categorias</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Didáticos
										</a>
									</h4>
								</div>
		
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Contos
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Infantil</a></li>
											<li><a href="">Ficção</a></li>
											<li><a href="">Romance</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Quadrinhos</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Mangá</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Drama</a></h4>
								</div>
							</div>
						</div><!--/category-productsr-->
					</div>
				</div>
	
	
				
				<div class="col-sm-9 padding-right">
				<div id="livros" class="list-group"></div>  <!--Essa tag conterá a listagem de livros-->
					<div id = "livros"class="features_items"><!--features_items-->
						<h2 class="title text-center">Itens</h2>
						<div class="col-sm-4">
							
						</div>
						<div class="col-sm-4">
							
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">

				
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
		
		
							</div>
						</div>
						<div class="col-sm-4">
							
						</div>
						<div class="col-sm-4">
							
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								
							</div>
						</div>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								
							</div>
						</div>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
    <script src="../../bootstrap/js/jquery.js"></script>
	<script src="../../bootstrap/js/price-range.js"></script>
    <script src="../../bootstrap/js/jquery.scrollUp.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/js/jquery.prettyPhoto.js"></script>
    <script src="../../bootstrap/js/main.js"></script>
</body>
</html>