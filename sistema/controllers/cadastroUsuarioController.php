<?php


	include_once('../models/usuario.php');
	
	$dados = $_POST;

	$objUsuario = new Usuario();

	if(isset($dados)){
		$objUsuario->cadastrarUsuario($dados);
	}


?>










































