<?php


class PessoaModel extends CI_Model{

	public function buscar($id){

		$sql = "SELECT idpessoa, nomepessoa, siapepessoa, cursosetorpessoa, categoriapessoa FROM  comissaodb.pessoa JOIN comissaodb.comissao_pessoa ON comissao_idcomissao = ? AND pessoa_idpessoa = comissaodb.pessoa.idpessoa";

		$query = $this->db->query($sql, array($id));

		if($query->num_rows()==0){

			return null;
		}

		$busca = array();
		foreach ($query->result() as $row) {
			
			$pessoa = new Pessoa();
			$pessoa->setId($row->idpessoa);
			$pessoa->setNome($row->nomepessoa);
			$pessoa->setSiape($row->siapepessoa);
			$pessoa->setCurso($row->cursosetorpessoa);
			$pessoa->setCategoria($row->categoriapessoa);
			array_push($busca, $pessoa);

		}

		return array('dadospessoa'=> $busca);



	}


		public function buscarNomeComissao($id){


			$sql = "SELECT * FROM comissaodb.comissao WHERE idcomissao = ?";
			$query = $this->db->query($sql, array($id));

			if ($query->num_rows()==0) {
				 return null;
			}

			$result = $query->result();

			$busca = array();
	        foreach ($result as $row) {
	            $comissao = new Comissao();
	            $comissao->setId($row->idcomissao);
	            $comissao->setNome($row->nomecomissao);
	            $comissao->setDescricao($row->descricaocomissao);
	            $comissao->setDate($row->datacomissao);
	            $comissao->setHoras($row->horascomissao);
	            array_push($busca, $comissao);
	        }

	        return array('dadoscomissao'=>$busca);
		}


		public function adicionar($nome, $siape, $curso, $categoria){
			$data = array(
				'nomepessoa'=> $nome,
				'siapepessoa'=>$siape,
				'cursosetorpessoa'=>$curso,
				'categoriapessoa'=>$categoria
			);


			return ($this->db->insert('comissaodb.pessoa', $data)) ? $this->db->insert_id() : false;


		}


		public function buscaPessoa(){

			$sql = "SELECT * FROM comissaodb.pessoa";

			$query = $this->db->query($sql);

			if($query->num_rows()==0){

				return null;
			}

			$busca = array();
			foreach ($query->result() as $row) {
			
				$pessoa = new Pessoa();
				$pessoa->setId($row->idpessoa);
				$pessoa->setNome($row->nomepessoa);
				$pessoa->setSiape($row->siapepessoa);
				$pessoa->setCurso($row->cursosetorpessoa);
				$pessoa->setCategoria($row->categoriapessoa);
				array_push($busca, $pessoa);

			}

			return array('dpessoa'=> $busca);





		}








}