<?php

	//Abrindo a sessão
	session_start();

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
	          	<li><a href="home.php"><h3>Home</h3></a></li>
	          	<li><a href="pesquisar_livros_por_categoria.php"><h3>Pesquisar livros por categoria</h3></a></li>
	          	<li><a href="visualizarCarrinho.php"><h3>Visualizar carrinho</h3></a></li>
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
	    		
				<br>


				
	    	</div>
	    	<div class="col-md-4">

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

	    		<div id="livros" class="list-group"></div>  <!--Essa tag conterá a listagem de livros-->

	    		
	    		 	    		
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
				
					
												

						<!--<table class="table table-condensed">
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
						</table>-->
						
						
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

</html>	