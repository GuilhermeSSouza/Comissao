<?php


class ItemPautaModel extends CI_Model
{

	public function encaminhar($idItemPauta, $opcoes, $tipoVotacao)
	{
		foreach ($opcoes as $op) {
			$this->db->insert("opcaodevoto", array(
				"descricao" => $op->getDescricao(),
				"idItemPauta" => $idItemPauta
			));
		}
		$this->db->where("id", $idItemPauta);
		$this->db->update("itempauta", array(
			"idTipoItemReuniao" => $tipoVotacao,
            "emVotacao" =>true,
		));

	}

	public function selecionar($id)
	{
		$itemPauta = new ItemPauta();
		$opcoesVoto = array();

		$sqlOpcoesVoto = "SELECT * FROM opcaodevoto
         WHERE opcaodevoto.idItemPauta = ?";

		$queryOpcoesVoto = $this->db->query($sqlOpcoesVoto, $id);

		if ($queryOpcoesVoto->num_rows() > 0) {
			foreach ($queryOpcoesVoto->result() as $row) {
				$opcaoVoto = new OpcaoVoto();

				$opcaoVoto->setId($row->id);
				$opcaoVoto->setDescricao($row->descricao);

				array_push($opcoesVoto, $opcaoVoto);
			}
		}


		$sqlItemPauta = "SELECT	*
        FROM itempauta
        WHERE itempauta.id = ?";

		$queryItemPauta = $this->db->query($sqlItemPauta, $id);

		if ($queryItemPauta->num_rows() == 0) {
			return null;
		}

		$row = $queryItemPauta->row(0);

		$itemPauta->setId($row->id);
		$itemPauta->setRelator($row->relator);
		$itemPauta->setDescricao($row->descricao);
		$itemPauta->setOpcoesVoto($opcoesVoto);
		$itemPauta->setPossuiDoisTurnos($row->segundoTurno);
		$itemPauta->setEstaSegundoTurno($row->emSegundoTurno);
		$itemPauta->setEstaEmVotacao($row->emVotacao);

		return $itemPauta;
	}

	public function iniciaSegundoTurno($idItemPauta)
	{
		$this->db->where("id", $idItemPauta);
		$this->db->update("itemPauta", array(
			"emSegundoTurno" => true
		));
	}

	public function getVotosMembros($idItemPauta)
	{
		$sql = 'SELECT opcaodevoto.descricao AS "voto", usuario.nome AS "membro" 
				FROM `voto` 
				INNER JOIN usuario ON 
  				voto.idUsuario = usuario.id 
				INNER JOIN opcaodevoto ON opcaodevoto.id = voto.idOpcaoVoto 
				WHERE voto.idItemPauta = ?';

		$queryVotos = $this->db->query($sql, $idItemPauta);

		if ($queryVotos->num_rows() == 0) {
			return null;
		}

		$votos = array();
		foreach ($queryVotos->result() as $r) {
			array_push($votos, array($r->membro, $r->voto));
		}

		return $votos;
	}

	public function getCountVotos($idItemPauta)
	{
		$sql = 'SELECT opcaodevoto.id, opcaodevoto.descricao FROM opcaodevoto WHERE opcaodevoto.idItemPauta = '.$idItemPauta;

		$queryOpVotos = $this->db->query($sql);

		if ($queryOpVotos->num_rows() == 0) {
			return null;
		}

		$votos = array();
		foreach ($queryOpVotos->result() as $voto) {
			$sql = 'SELECT COUNT(*) as numvoto FROM voto WHERE voto.idOpcaoVoto = '.$voto->id;

			$queryVotos = $this->db->query($sql);

			array_push($votos, array($voto->descricao, $queryVotos->row()->numvoto));
		}

		return $votos;
	}
}
