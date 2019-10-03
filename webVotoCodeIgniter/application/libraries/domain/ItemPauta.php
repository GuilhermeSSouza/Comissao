<?php
/**
 * Created by PhpStorm.
 * User: guilh
 * Date: 20/10/2018
 * Time: 10:50
 */

class ItemPauta{

	private $id;
	private $descricao;
	private $relator;
	private $opcoesVoto;
	private $estaSegundoTurno;
    private $estaEmVotacao;
    private $doisTurnos;


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
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * @param mixed $descricao
	 */
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	/**
	 * @return mixed
	 */
	public function getRelator()
	{
		return $this->relator;
	}

	/**
	 * @param mixed $relator
	 */
	public function setRelator($relator)
	{
		$this->relator = $relator;
	}

    /**
     * @return mixed
     */
    public function getOpcoesVoto()
    {
        return $this->opcoesVoto;
    }

    /**
     * @param mixed $relator
     */
    public function setOpcoesVoto($opcoesVoto)
    {
        $this->opcoesVoto = $opcoesVoto;
    }

    /**
     * @return mixed
     */
    public function getEstaSegundoTurno()
    {
        return $this->estaSegundoTurno;
    }

    /**
     * @param mixed $relator
     */
    public function setEstaSegundoTurno($estaSegundoTurno)
    {
        $this->estaSegundoTurno = $estaSegundoTurno;
    }

    /**
     * @return mixed
     */
    public function getEstaEmVotacao()
    {
        return $this->estaEmVotacao;
    }

    /**
     * @param mixed $relator
     */
    public function setEstaEmVotacao($estaEmVotacao)
    {
        $this->estaEmVotacao = $estaEmVotacao;
    }


    public function getPossuiDoisTurnos(){
        return $this->doisTurnos;
    }

    public function setPossuiDoisTurnos($doisTurnos){
        $this->doisTurnos = $doisTurnos;
    }
}
