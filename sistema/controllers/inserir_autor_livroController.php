<?php


	//Abrindo a sessão
	session_start();

	include_once("../db.class.php");

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$id_livro = $_POST['livro'];
	$id_autor = $_POST['autor'];


	$sql = " insert into livro_autor(id_livro, id_autor) values('$id_livro', '$id_autor')";

	if(mysqli_query($link, $sql)){
		echo "<script>alert('Autor inserido no livro com sucesso !!!')</script>";
	}else{
		echo 'Erro ao inserir o autor no livro !!!';
	}
	



?>