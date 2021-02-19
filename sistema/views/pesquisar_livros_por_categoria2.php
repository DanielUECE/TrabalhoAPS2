<?php

	//Abrindo a sessão
	session_start();

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Home | Livraria</title>
	
	
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
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

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
				$('#btn_pesquisar_livros').click( function(){	

					if($('#nome_livro').val().length > 0){
						$.ajax({

							url: '../controllers/get_pesquisar_livros_categoria.php',
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

				});
			});

		</script>
	
	</head>

	<body>

		<!-- Static navbar -->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
						<a href="index-user.php"><img src="../images/home/icone-livraria.png"> <span>Livraria Aps </span> </a>
						</div>

					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Teste</a></li>
								<li><a href=""><i class="fa fa-star"></i> Teste</a></li>
								<li><a href="carrinho.php"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
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
					<div class="col-sm-8">
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
					<div class="col-sm-3">
					</div>
		</div><!--/header-bottom-->

		<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Pesquisa</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Categorias
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Didática </a></li>
											<li><a href="#">Ficção </a></li>
											<li><a href="#">Auto-Ajuda </a></li>
											<li><a href="#">Romance</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Estado
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Novos</a></li>
											<li><a href="#">Semi Novos</a></li>
											<li><a href="#">Usados</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Avaliações
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#"> 5 estreas </a></li>
											<li><a href="#"> até 4 estrelas </a></li>
											<li><a href="#"> até 2 estrelas</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Infantil</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					</div>
					</div>

							<div class="container">
								<div class="col-md-4">

									<?php
										if(isset($_POST['enviar'])):
											$formatosPermitidos = array("png", "jpeg", "jpg", "gif");
										endif;
									?>
									
								</div>
								<div class="col-md-6"> 

									<h4>Pesquisar livros pela categoria: </h4>

									<div class="panel panel-default">
										<div class="panel-body">
											<form id="form_procurar_livros" class="input-group">
												<input type="text" id="nome_livro" name="nome_livro" class="form-control" placeholder="Que categoria você está procurando?" maxlength="200">
												<span class="input-group-btn">
													<button class="btn btn-default" id="btn_pesquisar_livros" type="button">
														Procurar
													</button>
												</span>
											</form>
										</div>
									</div>
									</div> 
										<div class ="col-md-6">
										<div id="livros" class="list-group"></div>  <!--Essa tag conterá a listagem de livros-->
										</div>
									
								
							</div>
							</div>
						
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>

</html>	