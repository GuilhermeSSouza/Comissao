<?php 

class ComissaoModel extends CI_Model
{


	public function novo($nome, $data, $hora, $descricao){


		$data = array(
			'nomecomissao' => $nome,
			'datacomissao' => $data,
			'descricaocomissao'=>$descricao,
			'horascomissao'=> $hora
		);

		return ($this->db->insert('comissaodb.comissao', $data)) ? $this->db->insert_id() : false;

	}





}




