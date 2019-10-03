<?php

class PesquisaModel extends CI_Model{

	public function pesquisarMembro($nome){

		$sql = "SELECT idcomissao, nomecomissao, datacomissao, descricaocomissao, horascomissao, idpessoa, nomepessoa, siapepessoa, cursosetorpessoa, categoriapessoa FROM comissaodb.comissao JOIN comissaodb.comissao_pessoa JOIN comissaodb.pessoa ON comissaodb.pessoa.nomepessoa = ? AND comissaodb.pessoa.idpessoa = comissao_pessoa.pessoa_idpessoa  AND comissao_idcomissao = comissaodb.comissao.idcomissao";


		$query = $this->db->query($sql, array($nome));
		if ($query->num_rows() == 0) {
			return null;
		}



		$dado = array();
		foreach ($query->result() as $r){
			
			$pesquisa = new Pesquisa();
			$pesquisa->setId($r->idpessoa);
			$pesquisa->setNome($r->nomepessoa);
			$pesquisa->setSiape($r->siapepessoa);
			$pesquisa->setCurso($r->cursosetorpessoa);
			$pesquisa->setCategoria($r->categoriapessoa);
			$pesquisa->setIdcomissao($r->idcomissao);
			$pesquisa->setNomecomissao($r->nomecomissao);
			$pesquisa->setHorascomissao($r->horascomissao);
			$pesquisa->setDescricaocomissao($r->descricaocomissao);

			array_push($dado, $pesquisa);



		}
		return array('pesquisa'=>$dado);


	}




}




