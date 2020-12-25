<?php
	require_once('db.class.php');


	$usuario = $_POST['nome'];
	$data_nascimento = $_POST['data_nascimento'];
	$endereco = $_POST['endereco'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
			//recebe um parâmetro e retorna um hash de 32 caracteres baseado no algoritmo md5



	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$nome_existe = false;
	$email_existe = false;


	//verificar se o usuario já existe
	$sql = " select * from usuarios where nome = '$usuario'" ;
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_alunos = mysqli_fetch_array($resultado_id);

		if (isset($dados_alunos['nome'])){
			$nome_existe = true;
		}
	}else{
		echo 'Erro ao tentar achar o registro do usuário';
	}

	//verificar se o email já existe 
	$sql = " select * from usuarios where email = '$email' ";

	if($resultado_id = mysqli_query($link, $sql)){


		$dados_alunos = mysqli_fetch_array($resultado_id);

		if(isset($dados_alunos['email'])){
			$email_existe = true;
		}

	}else{
		echo 'Erro ao tentar achar o registro de email';
	}

	if($nome_existe || $email_existe){

		$retorno_get = '';

		if($nome_existe){
			$retorno_get.="erro_usuario=1&";
		}

		if($email_existe){
			$retorno_get.="erro_email=1&";
		}
	
		header('Location: inscrevase.php'.$retorno_get);

		die();
	}



	// ******** Verificação se o usuário tem idade menor que 16 anos
	$dia_atual = date('d');
	$mes_atual = date('m');
	$ano_atual = date('Y');
	$data_atual = $ano_atual . "-" . $mes_atual . "-" . $dia_atual;  // Capturando a data atual


	list($ano_usuario, $mes_usuario, $dia_usuario) = explode('-', $data_nascimento);  // Quebrando a data do uauario

	// Calculando as diferencas de ano, mes e dia
	$diferenca_ano = $ano_atual - $ano_usuario;
	$diferenca_mes = $mes_atual - $mes_usuario;
	$diferenca_dia = $dia_atual - $dia_usuario;

	if($diferenca_ano < 16){
		echo "Opa !! Desculpe. Só pessoas acima de 16 anos podem se cadastrar !!!";

		die();
	
	} elseif ($diferenca_ano == 16) {
		if ($mes_atual < $mes_usuario){
			echo "Opa !! Desculpe. Só pessoas acima de 16 anos podem se cadastrar !!!";

				die();
			
		}elseif ($mes_atual == $mes_usuario) {
			if ($dia_atual > $dia_usuario){
				echo "Opa !! Desculpe. Só pessoas acima de 16 anos podem se cadastrar !!!";

				die();
			}		
		}
	}

	// Inserindo os dados do usuário no banco.	
	$sql = " insert into usuarios(nome, email, data_nascimento, endereco, senha) values('$usuario', '$email', '$data_nascimento', '$endereco', '$senha') ";

	 //Executar a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário cadastrado com sucesso !!!';
	}else{
		echo 'Erro ao cadastrar o usuário !!!';
	}

?>