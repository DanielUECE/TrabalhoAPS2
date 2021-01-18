<?php


require_once ('../db.class.php');

class Usuario{

	// Atributos dos usuário
	private $nome;
	private $email;
	private $senha;
	private $endereco;
	private $data_nascimento;
	private $objDb;

	public function __construct(){
		$this->objDb = new db(); 
	}	

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getDataNascimento(){
		return $this->$data_nascimento;
	}

	public function setDataNascimento($data_nascimento){
		$this->data_nascimento = $data_nascimento;
	}


	// Esse método recebe como parametro um array do POST
	public function cadastrarUsuario($dado){

		$this->nome = $dado['nome'];
		$this->email = $dado['email'];
		$this->endereco = $dado['endereco'];
		$this->senha = md5($dado['senha']);
		$this->data_nascimento = $dado['data_nascimento'];


		$link = $this->objDb->conecta_mysql();

		$nome_existe = false;
		$email_existe = false;

		//verificar se o usuario já existe
		$sql = " select * from usuarios where nome = '$this->nome'" ;
		if($resultado_id = mysqli_query($link, $sql)){

			$dados_alunos = mysqli_fetch_array($resultado_id);

			if (isset($dados_alunos['nome'])){
				$nome_existe = true;
			}
		}else{
			echo 'Erro ao tentar achar o registro do usuário';
		}

		//verificar se o email já existe 
		$sql = " select * from usuarios where email = '$this->email' ";

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


		list($ano_usuario, $mes_usuario, $dia_usuario) = explode('-', $this->data_nascimento);  // Quebrando a data do uauario

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
		$sql = " insert into usuarios(nome, email, data_nascimento, endereco, senha) values('$this->nome', '$this->email', '$this->data_nascimento', '$this->endereco', '$this->senha') ";

		 //Executar a query
		if(mysqli_query($link, $sql)){
			echo 'Usuário cadastrado com sucesso !!!';
		}else{
			echo 'Erro ao cadastrar o usuário !!!';
		}

	}


	public function login($dado){

		session_start();


		$this->nome = $dado['usuario'];
		$this->senha = md5($dado['senha']);


		$link = $this->objDb->conecta_mysql();

		// Select para buscar o nome e o email do usuario.
		$sql = " SELECT id, nome, email FROM usuarios WHERE nome = '$this->nome' AND senha = '$this->senha' ";


		$resultado_id = mysqli_query($link, $sql);

		// Teste de consulta
		if($resultado_id){

			// Retorna os dados em uma estrutura de array
			$dados_usuario = mysqli_fetch_array($resultado_id);
			
			if(isset($dados_usuario['nome'])){

				$_SESSION['id'] = $dados_usuario['id'];
				$_SESSION['nome'] = $dados_usuario['nome'];
				$_SESSION['email'] = $dados_usuario['email'];


				header('Location: ../views/home.php');
			
			} else{
				header('Location: ../index.php?erro=1');
			}



		} else{
			echo 'Erro na execução da consulta !!';
		}










	}




}



































?>