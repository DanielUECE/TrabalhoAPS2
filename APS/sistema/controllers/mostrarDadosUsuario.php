<?php

	session_start();

	// Verificando a autenticação do usuário.
	if(!isset($_SESSION['nome'])){
		header('Location: index.php?erro=1');
	}
	
	require_once('../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql(); 

	$id_usuario = $_SESSION['id'];


	$sql = "SELECT * FROM usuarios WHERE id = '$id_usuario' ";

	if($resultado_id = mysqli_query($link, $sql)){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){


			echo '<a href"#" class="list-group-item">';

				echo '	  <strong>Nome: '.$registro['nome'].'</strong> </br>
						  <strong>Email: '.$registro['email'].'</strong> </br>
						  <strong>Data Nascimento: '.$registro['data_nascimento'].'</strong> </br> 
						  <strong>Endereço: '.$registro['endereco'].'</strong> </br>
						  
						  ';

				echo '<br/><br/>';			     
					//echo '<button class="btn btn btn-danger btn-block btn-remover-carrinho" data-id_livro="'.$registro['id'].'" id="btn-remover-carrinho'.$registro['id'].'"">Remover do carrinho</button>'; 
				echo '<p class="list-group-item-text pull-right">';
				echo '<br/><br/>';			     
				echo '<button class="btn btn btn-primary btn-block btn-editar-dados" data-id_livro="'.$registro['id'].'" id="btn-remover-carrinho'.$registro['id'].'"">Editar dados</button>';

				echo '</p>';
				echo '<div class="clearfix"></div>';
			echo '</a>';
			echo '</br>';

		}

	} else{
		echo 'Erro na consulta dos livros no banco de dados.';
	}  










?>