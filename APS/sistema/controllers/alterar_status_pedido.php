<?php

session_start();

	// Verificando a autenticação do usuário.
	if(!isset($_SESSION['nome'])){
		header('Location: index.php?erro=1');
	}
	
	require_once('../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql(); 

	$numero_pedido = $_POST['numero_pedido'];
	$status = $_POST['status'];

	$sql = "UPDATE compra SET status_compra = '$status' WHERE id = '$numero_pedido' ";

	if($resultado = mysqli_query($link, $sql)){
		echo "<script>alert('Status alterado com sucesso !!!')</script>";
	} else{
		echo "Erro ao alterar o status";
	}
	
?>