<?php


session_start();

$id_usuario = $_SESSION['id'];

#echo $id_usuario;

require_once('../db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

# Dados do formulário (Estes irão para a tabela compra)
$nome_comprador = $_POST['nome_comprador'];
$telefone = $_POST['telefone'];
$endereco_entrega = $_POST['endereco_entrega'];
$forma_pagamento = $_POST['forma_pagamento'];
$cartao = $_POST['cartao'];
$codigo_cartao = $_POST['codigo_cartao'];

/*echo $nome_comprador;
echo $telefone;
echo $endereco_entrega;
echo $forma_pagamento;
echo $cartao;
echo $codigo_cartao;*/


// Recuperar os titulos dos livros comprados
$sql = "SELECT c.id_livro, c.preco, l.titulo FROM carrinho AS c, livros AS l WHERE id_usuario='$id_usuario' and c.id_livro = l.id ";

if($resultado = mysqli_query($link, $sql)){

	$titulo = "";

	while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

		$titulo = $titulo." | ".$registro['titulo'];
	}

}else{
	echo "Erro";
}


// Recuperar o valor total do carrinho.
$sql = " SELECT SUM(c.preco) AS valor_total FROM carrinho AS c WHERE id_usuario = $id_usuario ";

$resultado_id = mysqli_query($link, $sql);
$valor_total = 0;
if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
	
	if ($forma_pagamento == 'debito'){
		$valor_total = $registro['valor_total'] - ((10/100) * ($registro['valor_total']));  // Desconto de 10% no valor total
	}else{
		$valor_total = $registro['valor_total'];
	}
}else{
	echo 'Erro ao executar a query';
}

// Inserir dados na tabela compra
$sql = "INSERT INTO compra(id_usuario, tipo_pagamento, valor_total, status_compra, nome_comprador, endereco_entrega, telefone, nome_livro) values('$id_usuario', '$forma_pagamento', '$valor_total', 'Realizada', '$nome_comprador', '$endereco_entrega', '$telefone', '$titulo')";


if(mysqli_query($link, $sql)){
	echo "<script>alert('Compra realizada com sucesso !!!')</script>";
}else{
	echo 'Erro ao realizar compra !!!';
}


// Operação para recuperar dados do carrinho e colocar na tabela livros_comprados
$sql = "SELECT c.id_livro, c.preco, l.titulo FROM carrinho AS c, livros AS l WHERE id_usuario='$id_usuario' and c.id_livro = l.id ";

if($resultado = mysqli_query($link, $sql)){

	$titulo = "";

	while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

		$id_livro = $registro['id_livro'];	
		$preco = $registro['preco'];
		//$titulo = $titulo. " | " .$registro['titulo'];

		//echo $registro['titulo'];
		//echo $titulo;


		$sql = "INSERT INTO livros_comprados(id_usuario, id_livro, preco) values('$id_usuario', '$id_livro', '$preco')";

		if(mysqli_query($link, $sql)){
			// Limpar o carrinho
			$sql2 = "DELETE FROM carrinho WHERE id_usuario = '$id_usuario' ";
			mysqli_query($link, $sql2);
		}

	}

}else{
	echo "Erro";
}



/// Solução para o nome_livro -> criar uma consulta dentro de um while, e concatenar em uma 
/// string os nomes dos livros comprados.




















?>