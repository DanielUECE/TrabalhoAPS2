<?php


class Livro{


	private $titulo;
	private $preco;
	private $ano_publicacao;
	private $idioma;
	private $paginas;
	private $exemplares;
	private $edicao;
	private $capa;
	private $foto_extra1;
	private $foto_extra2;


	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getAno_publicacao(){
		return $this->ano_publicacao;
	}

	public function setAno_publicacao($ano_publicacao){
		$this->ano_publicacao = $ano_publicacao;
	}

	public function getIdioma(){
		return $this->idioma;
	}

	public function setIdioma($idioma){
		$this->idioma = $idioma;
	}

	public function getPaginas(){
		return $this->paginas;
	}

	public function setPaginas($paginas){
		$this->paginas = $paginas;
	}

	public function getExemplares(){
		return $this->exemplares;
	}

	public function setExemplares($exemplares){
		$this->exemplares = $exemplares;
	}

	public function getEdicao(){
		return $this->edicao;
	}

	public function setEdicao($edicao){
		$this->edicao = $edicao;
	}

	public function getCapa(){
		return $this->capa;
	}

	public function setCapa($capa){
		$this->capa = $capa;
	}

	public function getFoto_extra1(){
		return $this->foto_extra1;
	}

	public function setFoto_extra2($foto_extra2){
		$this->foto_extra2 = $foto_extra2;
	}



}






















?>
















