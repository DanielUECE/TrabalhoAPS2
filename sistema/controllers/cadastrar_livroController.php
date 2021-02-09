<?php

	//Abrindo a sessão
	session_start();

	include_once("../models/administrador.php");

	$dados = $_POST;
	$files = $_FILES;

	/*$nome_arquivo = $_FILES['capa']['name'];
	$tamanho = $_FILES['capa']['size'];
	$arquivo_tmp = $_FILES['capa']['tmp_name'];
	
	// Upload das imagens dos livros
	// Onde a foto vai ser salva
	$destino = "../fotos/";

	$movefile = move_uploaded_file($arquivo_tmp , $destino .$nome_arquivo);

	if($movefile){
		echo "Arquivo movido com sucesso";
	}else{
		echo "Falha";
	}

	echo '<img src="../fotos/Uma terra prometida.jpg">';*/

	$objAdm = new Administrador();

	if(isset($dados)){
		$objAdm->cadastrar_livro($dados, $files);
	}







?>