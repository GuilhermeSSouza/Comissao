<?php

class LoginModel extends CI_Model
{

    public function login($usuario, $senha)
    {

        $sql = 'SELECT * 
  		    FROM usuario
  			WHERE usuario.loginusuario = ?
  			AND usuario.senhausuario = ?';

        $query = $this->db->query($sql, array($usuario, $senha));

        if ($query->num_rows() == 0) {
            return null;
        }

        foreach ($query->result() as $u) {
            $user = new Usuario();
            $user->setId($u->id);
            $user->setNome($u->nome);
            $user->setUsuario($u->usuario);
        }

        return $user;
    }



    public function getComissao(){

        $ativa = 1;
        $busca = array();

        $sql = 'SELECT*FROM comissaodb.comissao WHERE ativacomissao = ? ';
        $query = $this->db->query($sql, array($ativa));
        $result = $query->result();


        foreach ($result as $row) {
            $comissao = new Comissao();
            $comissao->setId($row->idcomissao);
            $comissao->setNome($row->nomecomissao);
            $comissao->setDescricao($row->descricaocomissao);
            $comissao->setHoras($row->horascomissao);
            $comissao->setAtiva($row->ativacomissao);
            $comissao->setDate($row->datacomissao);
            $comissao->setDatafim($row->datafimcomissao);
            array_push($busca, $comissao);
        }

        return array('dadoscomissao'=>$busca);

    }




    public function getComissaoInativa(){

        $ativa = 0;
        $busca = array();

        $sql = 'SELECT*FROM comissaodb.comissao WHERE ativacomissao = ? ';
        $query = $this->db->query($sql, array($ativa));
        $result = $query->result();


        foreach ($result as $row) {
            $comissao = new Comissao();
            $comissao->setId($row->idcomissao);
            $comissao->setNome($row->nomecomissao);
            $comissao->setDescricao($row->descricaocomissao);
            $comissao->setHoras($row->horascomissao);
            $comissao->setDate($row->datacomissao);
            $comissao->setDatafim($row->datafimcomissao);
            $comissao->setAtiva($row->ativacomissao);
            array_push($busca, $comissao);
        }

        return array('dadoscomissao'=>$busca);

    }
}
