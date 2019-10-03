<?php


class ReuniaoModel extends CI_Model
{

    public function abrir($idReuniao){
        $sqlReuniao = "SELECT reuniao.id as reuniaoId, reuniao.nome as reuniaoNome, reuniao.datahora as reuniaoDataHora,
        reuniao.aberta as reuniaoAberta, tiporeuniao.id AS reuniaoTipo,
        comissao.nome as comissaoNome
        FROM reuniao
        INNER JOIN comissao
        ON comissao.id = reuniao.idComissao
        INNER JOIN tiporeuniao
        ON tiporeuniao.id = reuniao.idTipoReuniao
        WHERE reuniao.id = ?";

        $queryReuniao = $this->db->query($sqlReuniao, array($idReuniao));

        $sqlItemPauta = "SELECT	itempauta.id as itemPautaId, itempauta.descricao as itemPautaDescricao, itempauta.relator as itemPautaRelator
        FROM itempauta
        INNER JOIN reuniao
        ON itempauta.idReuniao = reuniao.id AND itempauta.votada =?
        WHERE reuniao.id = ?";

        $queryItemPauta = $this->db->query($sqlItemPauta, array(false, $idReuniao));

        if ($queryReuniao->num_rows() == 0) {
            return null;
        }

        $row = $queryReuniao->row(0);

        $reuniao = new Reuniao();
        $tipoReuniao = $row->reuniaoTipo;

        $comissao = new Comissao();
        $comissao->setNome($row->comissaoNome);

        $reuniao->setId($row->reuniaoId);
        $reuniao->setNome($row->reuniaoNome);
        $reuniao->setComissao($comissao);
        $reuniao->setAberta(true);
        $reuniao->setDataHora($row->reuniaoDataHora);

        if ($tipoReuniao == 1) {
            $reuniao->setTipo(Tipo_Reuniao::Ordianria);
        } else {
            $reuniao->setTipo(Tipo_Reuniao::Extraordinaria);
        }

        $itens = array();
        foreach ($queryItemPauta->result() as $r) {
            $item = new ItemPauta();
            $item->setId($r->itemPautaId);
            $item->setDescricao($r->itemPautaDescricao);
            $item->setRelator($r->itemPautaRelator);
            array_push($itens, $item);
        }

        $reuniao->setItensPauta($itens);


        $data = array("aberta" => true);
        $this->db->where("id", $idReuniao);
        $this->db->update("reuniao", $data);

        return $reuniao;
    }


		public function fechar($idReuniao){
			$this->db->set('aberta', 0);
			$this->db->where('id', $idReuniao);
			$this->db->update('reuniao');
		}
	
    public function getReuniao($idReuniao){
		$sqlReuniao = "SELECT reuniao.id as reuniaoId, reuniao.nome as reuniaoNome, reuniao.datahora as reuniaoDataHora,
        reuniao.aberta as reuniaoAberta, tiporeuniao.id AS reuniaoTipo,
        comissao.nome as comissaoNome
        FROM reuniao
        INNER JOIN comissao
        ON comissao.id = reuniao.idComissao
        INNER JOIN tiporeuniao
        ON tiporeuniao.id = reuniao.idTipoReuniao
        WHERE reuniao.id = ?";

		$queryReuniao = $this->db->query($sqlReuniao, array($idReuniao));

		$sqlItemPauta = "SELECT	itempauta.id as itemPautaId, itempauta.descricao as itemPautaDescricao, itempauta.relator as itemPautaRelator
        FROM itempauta
        INNER JOIN reuniao
        ON itempauta.idReuniao = reuniao.id AND itempauta.votada =?
        WHERE reuniao.id = ?";

		$queryItemPauta = $this->db->query($sqlItemPauta, array(false, $idReuniao));

		if ($queryReuniao->num_rows() == 0) {
			return null;
		}

		$row = $queryReuniao->row(0);

		$reuniao = new Reuniao();
		$tipoReuniao = $row->reuniaoTipo;

		$comissao = new Comissao();
		$comissao->setNome($row->comissaoNome);

		$reuniao->setId($row->reuniaoId);
		$reuniao->setNome($row->reuniaoNome);
		$reuniao->setComissao($comissao);
		$reuniao->setAberta($row->reuniaoAberta);
		$reuniao->setDataHora($row->reuniaoDataHora);

		if ($tipoReuniao == 1) {
			$reuniao->setTipo(Tipo_Reuniao::Ordianria);
		} else {
			$reuniao->setTipo(Tipo_Reuniao::Extraordinaria);
		}

		$itens = array();
		foreach ($queryItemPauta->result() as $r) {
			$item = new ItemPauta();
			$item->setId($r->itemPautaId);
			$item->setDescricao($r->itemPautaDescricao);
			$item->setRelator($r->itemPautaRelator);
			array_push($itens, $item);
		}

		$reuniao->setItensPauta($itens);

		return $reuniao;
	}
}
