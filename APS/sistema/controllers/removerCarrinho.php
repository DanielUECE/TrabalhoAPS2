<?php

	session_start();

	include_once('../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$id_livro = $_POST['id_livro_carrinho'];
	$id_usuario = $_SESSION['id'];


	$sql = " DELETE FROM carrinho WHERE id_livro = '$id_livro' ";

	//Executar a query
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Livro removido do carrinho com sucesso !!!')</script>";
	}else{
		echo "<script>alert('Erro ao remover livro do carrinho !!!')</script>";
	}







	//echo '<strong>'.$id_livro.'</strong>';

	/*$sql = "SELECT l.* FROM livros AS l WHERE l.id = $id_livro";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_livros = mysqli_fetch_array($resultado_id);

		$preco_livro = $dados_livros['preco'];

		//echo '<strong>'.$preco_livro.'</strong></br>';
		//echo '<strong>'.$id_livro.'</strong></br>';
		//echo '<strong>'.$id_usuario.'</strong>';

		
		//$preco_livro = $dados_livros['preco'];

		//$sql = " insert into carrinho(id_usuario, id_livro, preco) values('$id_usuario', '$id_livro', '$preco_livro')";

		$sql = " DELETE FROM carrinho WHERE id_livro = '$id_livro' ";

		//Executar a query
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Livro removido do carrinho com sucesso !!!')</script>";
		}else{
			echo "<script>alert('Erro ao remover livro do carrinho !!!')</script>";
		}

	}else{
		echo 'Erro ao tentar achar o registro do usuário';
	}*/


	


	


	












?>