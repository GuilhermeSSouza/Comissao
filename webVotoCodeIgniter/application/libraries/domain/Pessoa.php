<?php 

class Pessoa{

	private $id;
	private $nome;
	private $siape;
	private $curso;
	private $categoria;


	/**
	 * Comissao pessoa.
	 */
	public function __construct(){
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}



	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}



	public function getSiape(){
		return $this->siape;
	}
	public function setSiape($siape){
		$this->siape = $siape;
	}



	public function getCurso(){
		return $this->curso;
	}
	public function setCurso($curso){
		$this->curso = $curso;
	}


	public function getCategoria(){
		return $this->categoria;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
}?>
