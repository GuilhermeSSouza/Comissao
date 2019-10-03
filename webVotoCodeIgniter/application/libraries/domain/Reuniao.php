<?php

class Reuniao {
	private $id;
    private $comissao;
    private $aberta;
    private $dataHora;
    private $tipo;
    private $nome;
    private $itensPauta;

	/**
	 * Reuniao constructor.
	 */
	public function __construct(){
	}

	/**
	 * @return mixed
	 */
	public function getItensPauta()
	{
		return $this->itensPauta;
	}

	/**
	 * @param mixed $itensPauta
	 */
	public function setItensPauta($itensPauta)
	{
		$this->itensPauta = $itensPauta;
	}


	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}


	/**
	 * @return mixed
	 */
	public function getNome(){
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 */
	public function setNome($nome){
		$this->nome = $nome;
	}

	/**
	 * @return Tipo_Reuniao
	 */
	public function getTipo(){
		return Tipo_Reuniao::getNome($this->tipo);
	}

	/**
	 * @param Tipo_Reuniao $tipo
	 */
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	/**
	 * @return Comissao
	 */
	public function getComissao(){
        return $this->comissao;
    }

	/**
	 * @param Comissao $comissao
	 */
    public function setComissao(Comissao $comissao){
        $this->comissao = $comissao;
    }

	/**
	 * @return mixed
	 */
    public function getDataHora(){
        return $this->dataHora->format('d/m/Y H:i:s');
    }

	/**
	 * @param mixed $dataHora
	 */
    public function setDataHora($dataHora){
        $this->dataHora = new DateTime($dataHora);
    }

	/**
	 * @return boolean
	 */
    public function getAberta(){
        return $this->aberta;
    }

	/**
	 * @param boolean $aberta
	 */
    public function setAberta($aberta){
        $this->aberta = $aberta;
    }

}  
?> 
