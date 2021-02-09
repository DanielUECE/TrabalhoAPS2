<?php

	//Abrindo a sessão
	session_start();

	include_once("../models/administrador.php");

	$dados = $_POST;

	$objAdm = new Administrador();

	if(isset($dados)){
		$objAdm->inserir_editora($dados);
	}

	
	
	
	
	
	
	




?>