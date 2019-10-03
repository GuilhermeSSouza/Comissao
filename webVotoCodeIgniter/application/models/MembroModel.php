<?php

class MembroModel extends CI_Model
{

    public function verificarRegistrado($idUsuario)
    {
        $sql = 'SELECT usuarioreuniao.idreuniao as idReuniao
                FROM usuarioreuniao
                WHERE usuarioreuniao.idUsuario = ? AND usuarioreuniao.registrado = true AND usuarioreuniao.idTipoUsuario = 3';

        $query = $this->db->query($sql, array($idUsuario));

        if (sizeof($query->result()) == 0) {
            return null;
        }

        return $query->row(0)->idReuniao;
    }

    public function entrar($idReuniao, $idUsuario)
    {
        $this->load->model('ReuniaoModel');
        $this->db->where('idReuniao', $idReuniao);
        $this->db->where('idUsuario', $idUsuario);
        $this->db->where('idTipoUsuario', 3);

        $data = array(
            'registrado' => true
        );

        if (!$this->db->update('usuarioreuniao', $data)) {
            return null;
        }

        return $this->ReuniaoModel->getReuniao($idReuniao);
    }

    public function sairReuniao($idReuniao, $idUsuario)
    {
        $this->db->where('idReuniao', $idReuniao);
        $this->db->where('idUsuario', $idUsuario);
        $this->db->where('idTipoUsuario', 3);

        $data = array(
            'registrado' => false
        );

        return $this->db->update('usuarioreuniao', $data);

    }
}
