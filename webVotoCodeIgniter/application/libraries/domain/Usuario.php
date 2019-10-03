<?php 
class Usuario {

	private $usuario;
    private $nome;
    private $id;

	/**
	 * @return mixed
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id){
		$this->id = $id;
	}


	/**
	 * @param String $nome
	 */
	public function setNome($nome){
        $this->nome = $nome;
    }

	/**
	 * @return String
	 */
    public function getNome(){
        return $this->nome;
    }

	/**
	 * @return String
	 */
	public function getUsuario(){
		return $this->usuario;
	}

	/**
	 * @param String $usuario
	 */
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}


}  
?> 
