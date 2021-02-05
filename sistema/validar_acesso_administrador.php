<?php  

	// Esse comando indica para o script que ele terá acesso as variáveis de sessão
	session_start();

	require_once('db.class.php');

	$administrador = $_POST['nome'];
	$senha = $_POST['senha'];

	// Select para buscar o nome e o email do usuario.
	$sql = " SELECT id, nome, email FROM administrador WHERE nome = '$administrador' AND senha = '$senha' ";


	$objDb = new db();
	$link = $objDb->conecta_mysql();


	$resultado_id = mysqli_query($link, $sql);

	// Teste de consulta
	if($resultado_id){

		// Retorna os dados em uma estrutura de array
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['nome'])){

			$_SESSION['id'] = $dados_usuario['id'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];



			header('Location: home.php');
		
		} else{
			header('Location: index.php?erro=1');
		}

	} else{
		echo 'Erro na execução da consulta !!';
		echo $administrador;
		echo $senha;
	}



































?>