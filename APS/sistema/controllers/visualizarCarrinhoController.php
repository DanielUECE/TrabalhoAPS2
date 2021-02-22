<?php

session_start();

	// Verificando a autenticação do usuário.
	if(!isset($_SESSION['nome'])){
		header('Location: index.php?erro=1');
	}
	
	//echo $_SESSION['id'];
	require_once('../db.class.php');

	//$nome_livro = $_POST['nome_livro'];  // post da pesquisa do usuário


	$objDb = new db();
	$link = $objDb->conecta_mysql(); 

	$id_usuario = $_SESSION['id'];


	$sql = "SELECT l.*, c.genero, e.nome FROM livros AS l, categoria AS c, editoras AS e, carrinho AS ca WHERE l.id_categoria = c.id and l.id_editora = e.id and ca.id_usuario = '$id_usuario' and ca.id_livro = l.id ";  // Faz uma busca pelos livros inseridos no carrinho do usuário da sessão.


	if($resultado_id = mysqli_query($link, $sql)){



		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			//echo $registro['nome_autor'];
			
			$id_livro = $registro['id'];
			//echo $id_livro;
			//Procurando os autores de cada livro
			$sql2 = "SELECT la.*, a.nome_autor FROM livros AS l, autores AS a, livro_autor AS la WHERE la.id_livro = '$id_livro' and la.id_autor = a.id ";


			echo '<a href"#" class="list-group-item">';

					echo ' <strong><img src="../fotos/'.$registro['capa'].'" width="100%" height="50%"></strong> </br></br>
						  <strong>Título: '.$registro['titulo'].'</strong> </br>
						  <strong>Preço: '.$registro['preco'].'</strong> </br> 
						  <strong>Editora: '.$registro['nome'].'</strong> </br>
						  <strong>Categoria: '.$registro['genero'].'</strong> </br>
						  ';
	 
					// Verificação na consulta dos autores.	  
		  			if($resultado_id2 = mysqli_query($link, $sql2)){

		  				echo '<strong>Autores: </strong>';

		  				$lista_autores = array();

		  				while ($registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC)) {

		  					//$id_livro_autor = $registro2['nome_autor'];
		  					//echo $id_livro_autor;
		  					
		  					// Verificação de autores no array
	  						if(in_array($registro2['nome_autor'], $lista_autores)){

		  						break;
		  					}

  							//print_r($lista_autores);
  							
  							echo '<strong>'.$registro2['nome_autor'].'</strong>';
  							echo '; ';
	  						
		  					$lista_autores[] = $registro2['nome_autor'];  // Incrementando meu array de autores.
 					
		  				}

		  			}	
		  			echo '<br/><br/>';			     
					echo '<button class="btn btn btn-danger btn-block btn-remover-carrinho" data-id_livro="'.$registro['id'].'" id="btn-remover-carrinho'.$registro['id'].'"">Remover do carrinho</button>'; 
					echo '<p class="list-group-item-text pull-right">';



						//echo '<h1> Aqui conterá a lista de livros </h1>';


					echo '</p>';
				echo '<div class="clearfix"></div>';
			echo '</a>';
			echo '</br>';
		}


	} else {
		echo 'Erro na consulta dos livros no banco de dados.';
	}






?>