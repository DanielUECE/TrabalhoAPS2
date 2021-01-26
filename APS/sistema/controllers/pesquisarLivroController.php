<?php

	session_start();

	include_once('../models/usuario.php');
	
	$dados = $_POST;

	
	$objUsuario = new Usuario();

	if(isset($dados)){
		$objUsuario->pesquisar_livro($dados);
	}














?>
