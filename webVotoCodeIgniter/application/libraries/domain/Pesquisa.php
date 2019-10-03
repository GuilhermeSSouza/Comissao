<?php 

class Pesquisa{

	private $id;
	private $nome;
	private $siape;
	private $curso;
	private $categoria;
	private $idcomissao;
	private $nomecomissao;
	private $horascomissao;
	private $descricaocomissao;



	/**
	 * Comissao pessoa.
	 */
	public function __construct(){
	}


	public function setDescricaocomissao($desc){
		$this->descricaocomissao = $desc;
	}

	public function setHorascomissao($horas){
		$this->horascomissao = $horas;
	}

	public function setNomecomissao($nome){
		$this->nomecomissao = $nome;
	}


	public function setIdcomissao($idcomissao){
		$this->idcomissao = $idcomissao;
	}

	public function getDescricaocomissao(){
		return $this->descricaocomissao;

	}

	public function getHorascomissao(){
		return $this->horascomissao;
	}


	public function getIdcomissao(){
		return $this->idcomissao;
	}


	public function getNomecomissao(){
		return $this->nomecomissao;
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
