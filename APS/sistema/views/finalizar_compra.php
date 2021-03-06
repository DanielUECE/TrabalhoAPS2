<?php

	//Abrindo a sessão
	session_start();

	include_once("../db.class.php");

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	// Verificando se a variável de sessão não existe. Com isso, ele só entra na home se as variáveis de sessão estiverem autenticadas.
	if(!isset($_SESSION['id'])){
		header('Location: index.php?erro=1');
	}


	$id_usuario = $_SESSION['id'];

	// qtd de itens no carrinho
	$sql = " SELECT COUNT(*) AS qtde_itens FROM carrinho WHERE id_usuario = $id_usuario ";

	$resultado_id = mysqli_query($link, $sql);
	$qtde_itens = 0;
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_itens = $registro['qtde_itens'];
	}else{
		echo 'Erro ao executar a query';
	}


	// Valor total dos itens do carrinho
	$sql = " SELECT SUM(c.preco) AS valor_total FROM carrinho AS c WHERE id_usuario = $id_usuario ";

	$resultado_id = mysqli_query($link, $sql);
	$valor_total = 0;
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		
		$valor_total = $registro['valor_total'];
		
	}else{
		echo 'Erro ao executar a query';
	}

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

				$('#pagina_inicial').click(function(){
					
					// Direcionando o aluno para a página inicial.
					window.location.href = "http://localhost/UECEBOOK/uecebook/pagina_inicial.php";
				});

				$('#home').click(function(){

					// Direcionando o aluno para sua página de perfil.
					window.location.href = "http://localhost/UECEBOOK/uecebook/home.php";
				});

				// Direcionando o aluno para uma determinada comunidade
				/*$('#1').click(function(){

					window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/romance.php";
					
				});*/

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

				$.ajax({

							url: '../controllers/visualizarCarrinhoController.php',
							method: 'post', 
							//data: $('#form_procurar_livros').serialize(),
							success: function(data){
								$('#livros').html(data);
							
								$('.btn-remover-carrinho').click(function(){
									//url: '../controllers/inserirCarrinho.php'

									var id_livro = $(this).data('id_livro');
									

									$.ajax({
										url: '../controllers/removerCarrinho.php',
										method: 'post',
										data: {id_livro_carrinho : id_livro},
										success: function(data){
											$('#total').html(data);
											//alert('Livro inserido no carrinho com sucesso')
										
										}
									});

									
									//window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/inserir_autor_livro.php";
								});
							}

						
							

						});

				$('#finalizar_compra').click(function(){
					window.location.href = "http://localhost/TrabalhoAPS2/APS/sistema/views/finalizar_compra.php";

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
	          	<li><a href="visualizarCarrinho.php"><h3>Visualizar Carrinho</h3></a></li>
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
	    		
	    		<div class="panel panel-default">
					<div class="panel-body">
						<h2>Olá, <?=$_SESSION['nome']?> !!</h2>
						
					</div>
				</div>

				<br>

				<!--<div class="panel panel-default">
					
					<div class="col-md-6">POSTAGENS <br/><?= $qtde_postagens ?></div>
					<div class="col-md-6">SEGUIDORES <br/><?= $qtde_seguidores ?></div>
					
				</div>-->

				
	    	</div>
	    	<div class="col-md-4">
	    		<div class="panel-body">
	    			
					<h3>Formulário de pagamento: </h3>
					<br/>
					<form method="post" action="../controllers/finalizar_compraController.php" id="formCadastrarse">
					<div class="form-group">
						<h5>Nome: </h5>
						<input type="text" class="form-control" id="nome_comprador" name="nome_comprador" placeholder="Nome" required="requiored">
					</div>

					<div class="form-group">
						<h5>Telefone: </h5>
						<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="requiored">
					</div>


					<div class="form-group">
						<h5>Endereço: </h5>
						<input type="text" class="form-control" id="endereco_entrega" name="endereco_entrega" placeholder="Endereço" required="requiored">
					</div>

					<div class="form-group">
						<h5>Selecione a forma de pagamento: </h5>
						<select type="text" class="form-control" name="forma_pagamento" id="forma_pagamento">
								<option value="debito">Cartão de Débito</option><br>
								<option value="credito">Cartão de Crédito</option>	

						</select>		
					</div>

			
					<div class="form-group">
						<h5>Digite o número do seu cartão: </h5>
						<input type="text" class="form-control" id="cartao" name="cartao" placeholder="" required="requiored">
					</div>

					<div class="form-group">
						<h5>Código de segurança: </h5>
						<input type="text" class="form-control" id="codigo_cartao" name="codigo_cartao" placeholder="" required="requiored">
					</div>
					
					
					<button type="submit" name="btFinalizar" class="btn btn-primary form-control">Finalizar</button>
				</form>

					


					
				</div>
	 	    		
			</div>
			<div class="col-md-4">
				
				

				
				
				<div class="container">
				<div class="col-md-3">
				



				 
					<div class="panel panel-default">
						
						<div class="panel-body">
							<strong>
								<h1 style="color:blue;">Carrinho</h1>
								<img src="../imagens/carrinho.jpg">
							</strong>
							<div class="col-md-6" id="itens"><h3><strong>Itens: </strong></h3><?= $qtde_itens ?></div>
							<div class="col-md-6"><h3><strong>Total: </strong></h3><div id="total"></div>R$<?= $valor_total ?></div> 
						</div>

						<div> 
							<button type="button" class="btn btn btn-info btn-block" id="finalizar_compra"><h5>Finalizar Compra</h5></button> 
						</div>

					</div>
					
				 





					
					<!--<h3 class="active">Comunidades</h3>
						
					<table class="table table-condensed">
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
				
			</div>

			<div class="clearfix">

			</div>

			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
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