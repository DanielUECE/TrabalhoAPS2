<?php


require_once('../db.class.php');

require_once('../models/autor.php');
require_once('../models/categoria.php');
require_once('../models/livro.php');
require_once('../models/editora.php');

class Administrador{

	// Atributos do administrador
	private $nome;
	private $email;
	private $senha;
	private $nascimento;

	public function __construct(){
		$this->objDb = new db(); 
		$this->objAutor = new Autor();
		$this->objCategoria = new Categoria();
		$this->objLivro = new Livro();
		$this->objEditora = new Editora();
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

		$this->nome = $dado['usuario'];
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

				header('Location: ../views/homeAdm.php');
			
			} else{
				header('Location: ../404.php');
			}

		} else{
			echo 'Erro na execução da consulta !!';
			echo $administrador;
			echo $senha;
		}
	}

	// Essa função insere um novo autor no banco de dados
	public function inserir_autor($dado){

		$this->objAutor->getNome = $dado['nome'];
		
		$nome_autor = $this->objAutor->getNome;

		$link = $this->objDb->conecta_mysql();

		// Fazendo um verificação para saber se o autor já existe

		$autor_existe = false;

		$sql = " SELECT * FROM autores WHERE nome_autor = '$nome_autor' ";
		if($resultado_autor = mysqli_query($link, $sql)){

			$dados_autores = mysqli_fetch_array($resultado_autor);

			if (isset($dados_autores['nome_autor'])){
				$autor_existe = true;
			}
		}else{
			echo 'Erro ao tentar achar o registro do autor';
		}

		if($autor_existe){
			$retorno_get = '';

			if($autor_existe){
				$retorno_get.="erro_autor=1&";
			}

			header('Location: ../views/inserir_autores.php?'.$retorno_get);
			//echo "Autor já existe no banco de dados";
			
			die();	
		}

		$sql = " insert into autores(nome_autor) values('$nome_autor')";

		//Executar a query
		if(mysqli_query($link, $sql)){

			echo "<script>alert('Autor cadastrado com sucesso !!!')</script>";
		}else{
			echo 'Erro ao cadastrar o autor !!!';
		}

		//Adicionar um tempo para vir para esta página
		header('Location: ../views/inserir_autores.php?'.$retorno_get);

	}


	public function inserir_categoria($dado){
		$this->objCategoria->getGenero = $dado['genero'];

		$nome_genero = $this->objCategoria->getGenero;

		$link = $this->objDb->conecta_mysql();

		// Fazendo um verificação para saber se o autor já existe

		$genero_existe = false;

		$sql = " SELECT * FROM categoria WHERE genero = '$nome_genero' ";


		if($resultado_genero = mysqli_query($link, $sql)){

			$dados_genero = mysqli_fetch_array($resultado_genero);

			if (isset($dados_genero['genero'])){
				$genero_existe = true;
			}
		}else{
			echo 'Erro ao tentar achar o registro do gênero';
		}


		if($genero_existe){
			$retorno_get = '';

			if($genero_existe){
				$retorno_get.="erro_autor=1&";
			}

			header('Location: ../views/inserir_categoria.php?'.$retorno_get);
			//echo "Gênero já existe no banco de dados";
			
			die();	
		}

		$sql = " insert into categoria(genero) values('$nome_genero')";

		//Executar a query
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Gênero cadastrado com sucesso !!!')</script>";
		}else{
			echo 'Erro ao cadastrar o gênero !!!';
		}

	}

	public function inserir_editora($dado){
		$this->objEditora->getNome = $dado['nome'];
		$this->objEditora->getEndereco = $dado['endereco'];

		$nome_editora = $this->objEditora->getNome;
		$endereco_editora = $this->objEditora->getEndereco;

		$link = $this->objDb->conecta_mysql();

		// Fazendo um verificação para saber se o editora já existe

		$editora_existe = false;

		$sql = " SELECT * FROM editoras WHERE nome = '$nome_editora' ";


		if($resultado_editora = mysqli_query($link, $sql)){

			$dados_editora = mysqli_fetch_array($resultado_editora);

			if (isset($dados_editora['nome'])){
				$editora_existe = true;
			}
		}else{
			echo 'Erro ao tentar achar o registro do editora';
		}


		if($editora_existe){
			$retorno_get = '';

			if($genero_existe){
				$retorno_get.="erro_editora=1&";
			}

			header('Location: ../views/inserir_editoras.php?'.$retorno_get);
			//echo "Gênero já existe no banco de dados";
			
			die();	
		}

		$sql = " insert into editoras(nome, endereco) values('$nome_editora', '$endereco_editora')";

		//Executar a query
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Editora cadastrada com sucesso !!!')</script>";
		}else{
			echo 'Erro ao cadastrar a editora !!!';
		}

	}




	public function cadastrar_livro($dado){
		$this->objLivro->getTitulo = $dado['titulo'];
		$this->objLivro->getPreco = $dado['preco'];
		$this->objLivro->getCategoria = $dado['categoria'];
		$this->objLivro->getEditora = $dado['editora'];
		$this->objLivro->getCapa = $dado['capa'];


		$titulo_livro = $this->objLivro->getTitulo;
		$preco_livro = $this->objLivro->getPreco;
		$categoria_livro = $this->objLivro->getCategoria;
		$editora_livro = $this->objLivro->getEditora;
		$capa_livro = $this->objLivro->getCapa;

		$link = $this->objDb->conecta_mysql();


		// Fazendo um verificação para saber se o livro já existe

		$livro_existe = false;

		$sql = " SELECT * FROM livros WHERE titulo = '$titulo_livro' ";

		if($resultado_livro = mysqli_query($link, $sql)){

			$dados_livro = mysqli_fetch_array($resultado_livro);

			if (isset($dados_livro['titulo'])){
				$livro_existe = true;
			}
		}else{
			echo 'Erro ao tentar achar o registro do livro';
		}


		if($livro_existe){
			$retorno_get = '';

			if($genero_existe){
				$retorno_get.="erro_livro=1&";
			}

			header('Location: cadastrar_livro.php?'.$retorno_get);
			//echo "O livro já existe no banco de dados";
			
			die();	
		}

		$sql = " insert into livros(titulo, preco, capa,id_estado ,id_categoria, id_editora) values('$titulo_livro', '$preco_livro', '$capa_livro', '$categoria_livro', '$editora_livro')";

		//Executar a query
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Livro cadastrado com sucesso !!!')</script>";
		}else{
			echo 'Erro ao cadastrar o livro !!!';
		}

		/*echo $titulo_livro;
		echo $preco_livro;
		echo $categoria_livro;
		echo $editora_livro;
		echo $capa_livro;*/

	}




}

































?>