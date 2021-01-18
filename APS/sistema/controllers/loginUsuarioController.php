<?php


	include_once('../models/usuario.php');
	include_once('../models/administrador.php');
	include_once('../db.class.php');


	$dados = $_POST;

	$nome = $dados['usuario'];

	if(isset($dados)){

		// Consulta para verificar se o usuário é cliente ou administrador
		$objDb = new db();
		$link = $objDb->conecta_mysql();

		echo $dados['usuario'];

		$sql1 = " select * from usuarios where nome = '$nome' ";  // Consulta na tabela usuários
		$sql2 = " select * from administrador where nome = '$nome' "; // consulta na tabela administrador

		if($resultado_id = mysqli_query($link, $sql1)){
			
			$dados_usuarios = mysqli_fetch_array($resultado_id);

			if(isset($dados_usuarios['nome'])){
				$objUsuario = new Usuario();
				$objUsuario->login($dados);
			} elseif ($resultado_id = mysqli_query($link, $sql2)) {
				
				echo 'funcionando';
				$dados_usuarios = mysqli_fetch_array($resultado_id);

				echo $dados_usuarios['nome'];

				if(isset($dados_usuarios['nome'])){


					$objAdm = new Administrador();
					$objAdm->login($dados);
				} 

			}
		}	

		
	}
























?>