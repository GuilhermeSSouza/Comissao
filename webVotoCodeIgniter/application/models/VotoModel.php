<?php


class VotoModel extends CI_Model
{

	public function inserirVoto($idOpcaoVoto, $idItemPauta, $idUsuario, $segundoTurno)
	{
		$dados = array(
			'idOpcaoVoto' => $idOpcaoVoto,
			'idItemPauta' => $idItemPauta,
			'idUsuario' => $idUsuario,
			'segundoTurno' => $segundoTurno,
		);

		$this->db->insert('voto', $dados);

	}

	public function jaVotou($idItemPauta, $segundoTurno, $idUsuario)
	{
		$sql = 'SELECT *
                FROM voto
                WHERE voto.idusuario = ? AND voto.segundoturno = ? AND voto.iditempauta =?';

		$query = $this->db->query($sql, array($idUsuario, $segundoTurno, $idItemPauta));

		if (sizeof($query->result()) == 0) {
			return false;
		}

		return true;
	}

	public function todosVotaram($idItempauta, $segundoTurno)
	{

		$sql = "SELECT idReuniao FROM itempauta WHERE id = ?";
		$query = $this->db->query($sql, array($idItempauta));
		$idReuniao = $query->row()->idReuniao;

		$sql = 'SELECT COUNT(*) as c FROM usuarioreuniao WHERE idReuniao = ? AND registrado = 1 ';
		$query = $this->db->query($sql, array($idReuniao));
		$registrados = $query->row()->c;

		$sql = 'SELECT COUNT(*) AS c FROM voto WHERE idItemPauta = ? AND segundoTurno = ? ';
		$query = $this->db->query($sql, array($idItempauta, $segundoTurno));
		$votaram = $query->row()->c;

		return $registrados == $votaram;
	}
}
