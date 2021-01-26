<?php

	//Abrindo a sessão
	session_start();

	include_once("../db.class.php");
	//include_once("administrador.php");

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	// Verificando se a variável de sessão não existe. Com isso, ele só entra na home se as variáveis de sessão estiverem autenticadas.
	/*if(!isset($_SESSION['id'])){
		header('Location: index.php?erro=1');
	}

	$id_usuario = $_SESSION['id'];


	$objAdm = new Administrador();

	if(isset($_POST['btCadastrar_livro'])){
		$objAdm->cadastrar_livro($_POST);
	}*/


?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

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

				$('#btn_inserir_categorias').click(function(){

					window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/inserir_categorias.php";

				});

				$('#btn_inserir_autores').click(function(){

					window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/inserir_autores.php";

				});

				$('#btn_inserir_autores_nos_livros').click(function(){

					window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/inserir_autor_livro.php";

				});

				$('#btn_inserir_editoras').click(function(){

					window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/inserir_editoras.php";

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
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top navbar-cor">
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
	          	<li><a href="homeAdm.php"><h3>Home</h3></a></li>
	          	<li><a href="cadastrar_livro.php"><h3>Cadastrar novos livros</h3></a></li>
	          	<li><a href="procurar_livros.php"><h3>Procurar livros</h3></a></li>
	            <li><a href="../controllers/sair.php"><h3>Sair</h3></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	    <div class="container">
	    	
	    	<br /><br />

	        <div class="col-md-4">

	    		<?php
	    			if(isset($_POST['enviar'])):
	    				$formatosPermitidos = array("png", "jpeg", "jpg", "gif");
	    			endif;
	    		?>
	    		<!--<form method="post" action="foto2.php" enctype="multipart/form-data">
	    			<label for="foto">Insira sua foto de perfil:</label>
	    			<input name="imagem" type="file">
	    			<br>

	    			<button type="submit" class="btn btn-primary" name="enviar">Inserir Foto</button> 
	    		</form>-->

	    		<br>
	    		<br>
	    		<br>
	    		<br>
	    		<br>
	    		<br>
	    		<div class="panel panel-default">
					<div class="panel-body">
						<h2><?=$_SESSION['nome']?></h2>
						
					</div>
				</div>

				<br>

				<!--<div class="panel panel-default">
					
					<div class="col-md-6">POSTAGENS <br/><?= $qtde_postagens ?></div>
					<div class="col-md-6">SEGUIDORES <br/><?= $qtde_seguidores ?></div>
					
				</div>-->

				
	    	</div>
	    	<div class="col-md-4">

	    		<h3>Cadastro de livros</h3>
	    		<br />
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
									<option value="<?php echo $row_categorias['id']; ?>"><?php echo $row_categorias['genero']; ?>
										
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
									<option value="<?php echo $row_editoras['id']; ?>"><?php echo $row_editoras['nome']; ?>
										
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
			<div class="col-md-4">
				
				

				
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div class="col-md-3">
				
					
						

						<table class="table table-condensed">
							<ul>
								<li>
									<button type="button" id="btn_inserir_autores" class="btn btn-warning">Inserir novos autores</button>
								</li> <br/>
								<li>
									<button type="button" id="btn_inserir_autores_nos_livros" class="btn btn-warning">Inserir autores nos livros </button>
								</li> <br/>
								<li>
									<button type="button" id="btn_inserir_categorias" class="btn btn-warning">Inserir novas categorias</button>
								</li> <br/>
								<li>
									<button type="button" id="btn_inserir_editoras" class="btn btn-warning">Inserir novas editoras</button>
								</li>
							</ul>
						</table>
						
						
						<!--<h3 class="active">Comunidades</h3>-->

					<!--<table class="table table-condensed">
						<ul>
							<?php
								$sql = " select * from centro";
								$result_centros = mysqli_query($link, $sql);

								while($row_centros = mysqli_fetch_assoc($result_centros)){
									?>
									<li>
									<?php 
										$id_centro = $row_centros['id'];
									?>
									<button type="button" class="btn btn-warning" id="<?php echo $id_centro ?>" value="<?php echo $row_centros['id']; ?>"><?php echo $row_centros['nome']; ?><?php echo " - "?><?php echo $row_centros['sigla']; ?>
										
									</button> </li> <br> <?php 
								}

							?>							
							
						</ul>
  					</table>-->

  						<!--<li><button type="button" class="btn btn-warning"></button></li><br>-->
				</div>
				
			</div>

			<div class="clearfix">

			</div>

			<br />
			<div class="col-md-4"></div>
			<!--<div class="col-md-4">Repositório de Trabalhos</div>-->
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>


	<!--<div class="form-group">
						<select class="form-control" name="cursos" id="cursos">
							<option value>Selecione seu Curso</option>
							<option value="Pedagogia">Pedagogia</option>
							<option value="Ciencia da Computacao">Ciencia da Computacao</option>
							<option value="Fisica">Fisica</option>
							<option value="Matematica">Matematica</option>
							<option value="Geografia">Geografia</option>
							<option value="Quimica">Quimica</option>
							<option value="Historia">Historia</option>
							<option value="Letras">Letras</option>
							<option value="Filosofia">Filosofia</option>
							<option value="Musica">Musica</option>
							<option value="Psicologia">Psicologia</option>
							<option value="Servico Social">Servico Social</option>
							<option value="Administracao">Administracao</option>
							<option value="Ciencias Contabeis">Ciencias Contabeis</option>
							<option value="Nutricao">Nutricao</option>
							<option value="Educacao Fisica">Educacao Fisica</option>
							<option value="Medicina">Medicina</option>
							<option value="Ciencias Biologicas">Ciencias Biologicas</option>
							<option value="Enfermagem">Enfermagem</option>
						</select>
					</div>-->
</html>	