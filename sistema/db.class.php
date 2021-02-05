<?php

//Classe de conexão com o banco de dados

class db{

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $database = 'trabalho_aps';


	public function conecta_mysql(){

		//criando a conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//Ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($con, 'utf8');

		//verificando se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_errno();
		}

		return $con;
	}

}


?>