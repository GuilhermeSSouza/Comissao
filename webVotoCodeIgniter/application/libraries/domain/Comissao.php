<?php 
class Comissao {

	private $id;
    private $nome;
    private $date;
    private $descricao;
    private $horas;
    private $datafim;
    private $ativa;

	/**
	 * Comissao constructor.
	 */
	public function __construct(){
	}


    public function getAtiva(){
        return $this->ativa;
    }

    public function setAtiva($ativa){
        $this->ativa= $ativa;        
    }

    public function getDatefim(){
        return $this->datafim;
    }

    public function setDatafim($datafim){
        $this->datafim = $datafim;
    }


    public function getHoras(){

        return $this->horas;

    }

    public function setHoras($horas){
        $this->horas = $horas;

    } 

    public function getId(){

        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

	/**
	 * @return String
	 */
	public function getNome(){
        return $this->nome;
    }

	/**
	 * @param String $nome
	 */
    public function setNome($nome){
        $this->nome = $nome;
    }

    /**
     * @param String $date
     */

    public function setDate($date){
    	$this->date = $date;
    }

    /**
    * @param String $date
    */
    public function getDate(){
        return $this->date;

    }

    public function getDescricao(){

    	return $this->descricao;

    }

    public function setDescricao($descricao){
    	$this->descricao = $descricao;
    }







}  
?> 
