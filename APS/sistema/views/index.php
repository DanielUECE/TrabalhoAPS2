<?php
	//if ternário 
	// caso o indice erro exista, entao atribua a variavel $erro, caso contrário atribua o 0 ao $erro
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

	//include_once("db.class.php");
	//include_once("usuario.php");
	//include_once("administrador.php");

	/*$objUsuario = new Usuario();
	$objAdm = new Administrador();

	if(isset($_POST['btnLogarUsuario'])){
		$objUsuario->login($_POST);
	}

	if(isset($_POST['btnLogarAdm'])){
		$objAdm->login($_POST);
	}*/



?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>COMPRA DE LIVROS</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/estilo.css">


	
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
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top  navbar-cor">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="../imagens/imagem1.jpg" width=60%/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	          				<!--Se o erro for igual a 1 ele atribui a class o open -->
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h3>Login</h3></a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="../controllers/loginUsuarioController.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control"  id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" name="btnLogarUsuario" class="btn btn-primary" id="btn_login">Login</button>

								<br /><br />
								
							</form>

							<!--<p>Login para o administrador</p>
							
							<form method="post" action="../controllers/loginAdministradorController.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_administrador" name="nome" placeholder="Administrador" />			
								</div>

								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" name="btnLogarAdm" class="btn btn-primary" id="btn_login">Login</button>

								<br /><br />

							</form> -->

							<?php
								if($erro == 1){
									echo '<font color="#FF0000">Usuario e ou senha inválido(s)</font>';
								}
							?>

						</form>
				  	</ul>
	            </li>
	            <li><a href="inscrevase.php" width=20%><h3>Cadastrar-se</h3></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron cor-fundo">
	        <h2 id="subtitulo">SISTEMA DE COMPRA DE LIVROS</h2>
	        <!--<img src="imagens/imagem2.jpg" width= 60%/>-->
	        <h3 id="subtitulo"></h3>
	        <p></p>
	      </div>

	      <div class="jumbotron cor-fundo">
	        <img src="../imagens/imagem2.jpg" width= 90%/>
	        <h3 id="subtitulo"></h3>
	        <p></p>
	      </div>

	      <div class="clearfix"></div>
		</div>

	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>