<?php


require_once('db.class.php');

class Administrador{

	// Atributos do administrador
	private $nome;
	private $email;
	private $senha;
	private $nascimento;

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


	public function login($dado){

		session_start();

		$this->nome = $dado['nome'];
		$this->senha = $dado['senha'];

		$link = $this->objDb->conecta_mysql();

		// Select para buscar o nome e o email do usuario.
		$sql = " SELECT id, nome, email FROM administrador WHERE nome = '$this->nome' AND senha = '$this->senha' ";


		$resultado_id = mysqli_query($link, $sql);

		// Teste de consulta
		if($resultado_id){

			// Retorna os dados em uma estrutura de array
			$dados_administrador = mysqli_fetch_array($resultado_id);

			if(isset($dados_administrador['nome'])){

				$_SESSION['id'] = $dados_administrador['id'];
				$_SESSION['nome'] = $dados_administrador['nome'];
				$_SESSION['email'] = $dados_administrador['email'];

				header('Location: homeAdm.php');
			
			} else{
				header('Location: index.php?erro=1');
			}

		} else{
			echo 'Erro na execução da consulta !!';
			echo $administrador;
			echo $senha;
		}




		}










}

































?>