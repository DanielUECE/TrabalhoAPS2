<?php


	include_once('../usuario.php');
	
	$dados = $_POST;

	$objUsuario = new Usuario();

	if(isset($dados)){
		$objUsuario->cadastrarUsuario($dados);
	}












?>










































