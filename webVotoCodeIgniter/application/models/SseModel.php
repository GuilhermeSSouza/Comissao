<?php

class SseModel extends CI_Model
{

    public function notificacoes()
    {
        $sql = 'SELECT * FROM `sseitempauta`';

        $query = $this->db->query($sql);
        
        $result = $query->result_array();

        if (sizeof($result) == 0) {
            return null;
        }

        return $result;
    }

    public function insertNotificacao($idItemPauta, $msg){
		$data = array(
			'mensagem' => $msg ,
			'idItemPauta' => $idItemPauta
		);

		$this->db->insert('sseitempauta',$data);
	}

	public function removeNotificacao($idItemPauta){
		$this->db->where('idItemPauta', $idItemPauta);
		$this->db->delete('sseitempauta');
	}

}
