<?php

	//Abrindo a sessão
	session_start();

	include_once("../db.class.php");
	//include_once("administrador.php");

	$objDb = new db();
	$link = $objDb->conecta_mysql();

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
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<script>

//Validação dos campos
//Verificando se o documento foi carregado
$(document).ready( function(){

	$('#btn_inserir_categorias').click(function(){

		window.location.href = "http://localhost/APS/sistema/views/inserir_categorias.php";

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
								<li><a href="carinho.php"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
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
								<li class="dropdown"><a href="#">Dropdown<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<li><a href="login.php">Login</a></li> 
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
											<li><a href="cadastrar_livro.php">Cadastrar Livro</a></li>
											<li><a href="inserir_autor_livro.php">Cadastrar Autor no Livro</a></li>
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
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#entrega">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Status Entrega
										</a>
									</h4>
								</div>
								<div id="entrega" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="status_entrega.php">Mudar Status</a></li>
										</ul>
									</div>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="cadastrar_livro.php">Livros</a></h4>
								</div>
							</div>
						</div><!--/category-products-->>
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						
						<div class="col-md-4">
						<h2 class="title text-center">Cadastro de livros</h2>
						<form method="post" action="../controllers/cadastrar_livroController.php" id="formCadastrarse">
							<div class="form-group">
								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título*" required="requiored">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="preco" name="preco" placeholder="Preço*" required="requiored">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="ano_publicacao" name="ano_publicacao" placeholder="Ano de publicação">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="idioma" name="idioma" placeholder="Idioma" >
							</div>

							<div class="form-group">
								<input type="number" class="form-control" id="paginas" name="paginas" placeholder="Quantidade de páginas">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="exemplares" name="exemplares" placeholder="Exemplares">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="autor" name="autor" placeholder="Autores*">
							</div>

							<!--A categoria é selecionada a partir das categorias do banco de dados -->
							<div class="form-group">
								<select type="text" class="form-control" name="categoria" id="categoria">
									<option>Selecione uma categoria*</option>	
									<?php
										$sql = " select * from categoria";
										$result_categorias = mysqli_query($link, $sql);
										//$lista_cursos = mysqli_fetch_array($result_cursos);
										while($row_categorias = mysqli_fetch_assoc($result_categorias)){
											?>
																		<!--Ele passa no post o value, ou seja o id da categoria-->
											<option value="<?php echo $row_categorias['id_categoria']; ?>"><?php echo $row_categorias['genero']; ?>
												
											</option> <?php
										}
									?>				
								</select>
							</div>

							<!--A editora é selecionada a partir das editoras do banco de dados -->
							<div class="form-group">
								<select type="text" class="form-control" name="editora" id="editora">
									<option>Selecione uma editora*</option>	
									<?php
										$sql = " select * from editoras";
										$result_editoras = mysqli_query($link, $sql);
										//$lista_cursos = mysqli_fetch_array($result_cursos);
										while($row_editoras = mysqli_fetch_assoc($result_editoras)){
											?>
																		<!--Ele passa no post o value, ou seja o id da categoria-->
											<option value="<?php echo $row_editoras['id_editora']; ?>"><?php echo $row_editoras['nome']; ?>
												
											</option> <?php
										}
									?>				
								</select>
							</div>
							<!--A editora é selecionada a partir das editoras do banco de dados -->
							<div class="form-group">
								<select type="text" class="form-control" name="estado" id="estado">
									<option>Selecione o estado do livro*</option>	
									<?php
										$sql = " select * from estado";
										$result_estado = mysqli_query($link, $sql);
										//$lista_cursos = mysqli_fetch_array($result_cursos);
										while($row_estado = mysqli_fetch_assoc($result_estado)){
											?>
																		<!--Ele passa no post o value, ou seja o id da categoria-->
											<option value="<?php echo $row_estado['id_estado']; ?>"><?php echo $row_estado['descricao']; ?>
												
											</option> <?php
										}
									?>				
								</select>
							</div>


							<div class="form-group">
								<h1 class="form-control">Capa do livro: *</h1>
								<input type="file"  id="capa" name="capa" placeholder="Capa do livro" required="requiored">
							</div>

							<div class="form-group">
								<h1 class="form-control">Foto extra 1 (opcional): </h1>
								<input type="file"  id="foto_extra1" name="foto_extra1" placeholder="foto_extra1">
							</div>

							<div class="form-group">
								<h1 class="form-control">Foto extra 2 (opcional): </h1>
								<input type="file"  id="foto_extra2" name="foto_extra2" placeholder="foto_extra2">
							</div>



							<button type="submit" name="btCadastrar_livro" class="btn btn-primary form-control">Cadastrar</button>
						</form>
						</div>
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