<?php
	//Abrindo a sessão
	session_start();
	
	include_once("../models/administrador.php");

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	// Verificando se a variável de sessão não existe. Com isso, ele só entra na home se as variáveis de sessão estiverem autenticadas.
	/*if(!isset($_SESSION['id'])){
		header('Location: index.php?erro=1');
	}


	$id_usuario = $_SESSION['id'];

	$objAdm = new Administrador();

	if(isset($_POST['btInserir_Categorias'])){
		$objAdm->inserir_categoria($_POST);
	}*/
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Home | Livraria</title>
    
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../bootstrap/css/prettyPhoto.css" rel="stylesheet">
    <link href="../../bootstrap/css/price-range.css" rel="stylesheet">
    <link href="../../bootstrap/css/animate.css" rel="stylesheet">
	<link href="../../bootstrap/css/main.css" rel="stylesheet">
	<link href="../../bootstrap/css/responsive.css" rel="stylesheet">  
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<script>

//Validação dos campos
//Verificando se o documento foi carregado
$(document).ready( function(){

	$('#btn_inserir_categorias').click(function(){

		window.location.href = "http://localhost/APS/sistema/views/inserir_categorias.php";

	});

	$('#btn_inserir_autores').click(function(){

		window.location.href = "http://localhost/APS/sistema/views/inserir_autores.php";

	});

	$('#btn_inserir_autores_nos_livros').click(function(){

		window.location.href = "http://localhost/APS/sistema/views/inserir_autor_livro.php";

	});

	$('#btn_inserir_editoras').click(function(){

		window.location.href = "http://localhost/APS/sistema/views/inserir_editoras.php";

	});

	$('#pagina_inicial').click(function(){
		
		// Direcionando o aluno para a página inicial.
		window.location.href = "http://localhost/UECEBOOK/uecebook/pagina_inicial.php";
	});

	$('#home').click(function(){

		// Direcionando o aluno para sua página de perfil.
		window.location.href = "http://localhost/UECEBOOK/uecebook/home.php";
	});

	// Direcionando o aluno para uma determinada comunidade
	$('#1').click(function(){

		window.location.href = "http://localhost/UECEBOOK/uecebook/comunidade_ced.php";
		
	});

	$('#2').click(function(){

		window.location.href = "http://localhost/UECEBOOK/uecebook/comunidade_cct.php";

	});

	$('#3').click(function(){

		window.location.href = "http://localhost/UECEBOOK/uecebook/comunidade_ch.php";

	});

	$('#4').click(function(){

		window.location.href = "http://localhost/UECEBOOK/uecebook/comunidade_cesa.php";

	});

	$('#5').click(function(){

		window.location.href = "http://localhost/UECEBOOK/uecebook/comunidade_ccs.php";

	});
});
</script>

<?php
	if(isset($_POST['enviar'])):
		$formatosPermitidos = array("png", "jpeg", "jpg", "gif");
	endif;
?>

<body>
	
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
						<a href="homeAdm.php"><img src="../images/home/icone-livraria.png"> <span>Livraria Aps </span> </a>
						</div>

					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Teste</a></li>
								<li><a href=""><i class="fa fa-star"></i> Teste</a></li>
								<li><a href="carrinho.php"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
								<li class="dropdown"><a href="#"><?=$_SESSION['nome']?><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="../controllers/sair.php">Sair</a></li> 
                                    </ul>																					
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
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="homeAdm.php" class="active">Inicio</a></li>
								<li class="dropdown"><a href="#">Produtos<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Produto1</a></li> 
										<li><a href="cart.html">Produto2</a></li> 
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Teste</a></li>
								<li><a href="contact-us.html">Teste</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Funções</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#autor">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Autor
										</a>
									</h4>
								</div>
								<div id="autor" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="inserir_autores.php">cadastrar</a></li>
											<li><a href="visualizar_autores.php">visualizar</a></li>
											<li><a href="#">Editar Autores</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#categoria">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Categoria
										</a>
									</h4>
								</div>
								<div id="categoria" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="inserir_categorias.php">Cadastrar</a></li>
											<li><a href="#">Visualizar</a></li>
											<li><a href="#">Editar</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#relatorio">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Relatórios
										</a>
									</h4>
								</div>
								<div id="relatorio" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vendas</a></li>
											<li><a href="#">Usuários</a></li>
										</ul>
									</div>
								</div>
							
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#livro">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Livros
										</a>
									</h4>
								</div>
								<div id="livro" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="cadastrar-livro.php">Cadastrar</a></li>
											<li><a href="#">Visualizar</a></li>
											<li><a href="#">Editar</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#editora">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Editora
										</a>
									</h4>
								</div>
								<div id="editora" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="inserir_editoras.php">Cadastrar</a></li>
											<li><a href="#">Visualizar</a></li>
											<li><a href="#">Editar</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="cadastrar-livro.php">Livros</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					</div>
				</div>
				<div class="col-sm-4 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Inserir Categoria</h2>
						<form method="post" action="../controllers/inserir_categoriasController.php" id="formCadastrarse">
							<div class="form-group">
								<input type="text" class="form-control" id="nome" name="genero" placeholder="Gênero" required="requiored">
							</div>

						<button type="submit" name="btInserir_Categorias" class="btn btn-primary form-control">Inserir</button>
						</form>	
						
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	
    <script src="../../bootstrap/js/jquery.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script src="../../bootstrap/js/jquery.scrollUp.min.js"></script>
	<script src="../../bootstrap/js/price-range.js"></script>
    <script src="../../bootstrap/js/jquery.prettyPhoto.js"></script>
    <script src="../../bootstrap/js/main.js"></script>
</body>
</html>