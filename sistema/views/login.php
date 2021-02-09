<?php
	//if ternário 
	// caso o indice erro exista, entao atribua a variavel $erro, caso contrário atribua o 0 ao $erro
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

	?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Livraria</title>
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
</head><!--/head-->

	<script>
		//Validação dos campos
		//Verificando se o documento foi carregado
		$(document).ready( function(){

			//verificar	se os campos de usuario e senha foram devidamente preenchidos
			$('#btn_login').click(function(){

				var campo_vazio = false;

				//Verificando se esse campo possui valor vazio
				if($('#campo_usuario').val() == ''){
					$('#campo_usuario').css({'border-color': '#A94442'});
					campo_vazio = true;
				} else{
					$('#campo_usuario').css({'border-color': '#CCC'});
				}

				//Verificando se esse campo possui valor vazio
				if($('#campo_senha').val() == ''){
					$('#campo_senha').css({'border-color': '#A94442'});
					campo_vazio = true;
				} else{
					$('#campo_senha').css({'border-color': '#CCC'});
				}

				if(campo_vazio) return false;
			});


		});
									
	</script>

<body>
	<header id="header"><!--header-->
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
								<li><a href="index-user.php	">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Produtos</a></li>
										<li><a href="product-details.html">Detalhes Produtos</a></li> 
										<li><a href="checkout.html">Compra</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html" class="active">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
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
	</header>
	<!--/header-->
	

	<!--form-->
	<section id="form" >
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Entrar na sua conta</h2>
						<form method="post" action="../controllers/loginUsuarioController.php" id="formLogin">
							<input type="text" class="form-control"  id="campo_usuario" name="usuario" placeholder="usuario" />
								<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="senha" />
								<span>
									<input type="checkbox" class="checkbox"> 
									Lembrar
								</span>
							<!--	<button type="submit" class="btn btn-default">Login</button> -->
							<button type="buttom" name="btnLogarUsuario" class="btn btn-primary" id="btn_login">Login</button>
						</form>
					</div>
					<!--/login form-->
					<?php
								if($erro == 1){
									echo '<font color="#FF0000">Usuario e ou senha inválido(s)</font>';
								}
							?>
				</div>
				<div class="col-sm-1">
					<h2 class="or">Ou</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Cadaste-se!</h2>
						<form method="post" action="../controllers/cadastroUsuarioController.php" id="formCadastrarse">
					<div class="form-group">
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="requiored">
					</div>

					<div class="form-group">
						<input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento"  required="requiored">
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required="requiored">
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
					</div>

					
					
					<button type="submit" name="btCadastrar" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
    <script src="../../js/jquery.js"></script>
	<script src="../../js/price-range.js"></script>
    <script src="../../js/jquery.scrollUp.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.prettyPhoto.js"></script>
    <script src="../../js/main.js"></script>
</body>
</html>