<?php

session_start();

	// Verificando a autenticação do usuário.
	if(!isset($_SESSION['nome'])){
		header('Location: index.php?erro=1');
	}
	
	require_once('../db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql(); 

	$id_usuario = $_SESSION['id'];


	// Obtendo a data atual
	$dia_atual = date('d');
	$mes_atual = date('m');
	$ano_atual = date('Y');
	$data_atual = $ano_atual . "-" . $mes_atual . "-" . $dia_atual;




	$sql = "SELECT c.id, c.id_usuario, c.valor_total, c.status_compra, c.data_compra, c.nome_comprador, c.nome_livro FROM compra AS c";


	$total_vendas_dia = 0;
	if($resultado_id = mysqli_query($link, $sql)){


		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			list($data_compra, $hora_compra) = explode(' ', $registro['data_compra']);

			if ($data_atual == $data_compra){

				$total_vendas_dia = $total_vendas_dia + $registro['valor_total'];
				echo '<a href"#" class="list-group-item">';

					echo '	  <strong>Número do pedido: '.$registro['id'].'</strong> </br>
							  <strong>Nome do comprador: '.$registro['nome_comprador'].'</strong> </br>
							  <strong>Livros comprados: '.$registro['nome_livro'].'</strong> </br> 
							  <strong>Valor total: '.$registro['valor_total'].'</strong> </br>
							  <strong>Data da compra: '.$registro['data_compra'].'</strong> </br>
							  <strong>Status da compra: '.$registro['status_compra'].'</strong> </br>
							  ';

					echo '<br/><br/>';			     
						//echo '<button class="btn btn btn-danger btn-block btn-remover-carrinho" data-id_livro="'.$registro['id'].'" id="btn-remover-carrinho'.$registro['id'].'"">Remover do carrinho</button>'; 
					echo '<p class="list-group-item-text pull-right">';

					echo '</p>';
					echo '<div class="clearfix"></div>';
				echo '</a>';
				echo '</br>';
			}

		}

	} else{
		echo 'Erro na consulta dos livros no banco de dados.';
	}  













?>