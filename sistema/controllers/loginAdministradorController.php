<?php


	include_once('../models/administrador.php');


	$dados = $_POST;

	$objAdm = new Administrador();

	if(isset($dados)){
		$objAdm->login($dados);
	}

?>