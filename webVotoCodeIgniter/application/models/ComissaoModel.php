<?php 

class ComissaoModel extends CI_Model
{


	public function novo($nome, $data, $hora, $descricao,$fim){


		$data = array(
			'nomecomissao' => $nome,
			'datacomissao' => $data,
			'descricaocomissao'=>$descricao,
            'datafimcomissao'=> $fim,
			'horascomissao'=> $hora
		);

		return ($this->db->insert('comissaodb.comissao', $data)) ? $this->db->insert_id() : false;

	}


	public function editarComissao($id){

		$busca = array();

        $sql = 'SELECT*FROM comissaodb.comissao WHERE idcomissao = ? ';
        $query = $this->db->query($sql, array($id));
        $result = $query->result();


        foreach ($result as $row) {
            $comissao = new Comissao();
            $comissao->setId($row->idcomissao);
            $comissao->setNome($row->nomecomissao);
            $comissao->setDate($row->datacomissao);
            $comissao->setDescricao($row->descricaocomissao);
            $comissao->setAtiva($row->ativacomissao);
            $comissao->setHoras($row->horascomissao);
            $comissao->setDatafim($row->datafimcomissao);
            
            array_push($busca, $comissao);
        }

        return array('dadoscomissao'=>$busca);
	}


    public function salvarEditado($id, $nome, $data, $descricao, $horas, $fim){

        $data = array(
        'nomecomissao' => $nome,
        'datacomissao' => $data,
        'descricaocomissao' => $descricao,
        'horascomissao' => $horas,
        'datafimcomissao' => $fim
        );

        $this->db->where('idcomissao', $id);
        return $this->db->update('comissao', $data);

        }



    public function delete($idcomissao, $nomecomissao,$datacomissao , $descricaocomissao, $horascomissao, $datafim){

        $data = array(
        'nomecomissao' => $nomecomissao,
        'datacomissao' => $datacomissao,
        'descricaocomissao' => $descricaocomissao,
        'horascomissao' => $horascomissao,
        'datafimcomissao' => $datafim,
        'ativacomissao' => 0
        );


        $this->db->where('idcomissao', $idcomissao);
        return $this->db->update('comissao', $data);

    }


    public function reativa($idcomissao){

        $data = array(
        'ativacomissao' => 1,
        'datafimcomissao' => null

        );


        $this->db->where('idcomissao', $idcomissao);
        return $this->db->update('comissao', $data);

    }



    public function excluirPessoaComissao($idcomissao, $idpessoa){

        $data = array(
        'comissao_pessoaativo' => 0

        );


        $this->db->where('comissao_idcomissao', $idcomissao);
        $this->db->where('pessoa_idpessoa', $idpessoa);
        return $this->db->update('comissao_pessoa', $data);

    }


}




