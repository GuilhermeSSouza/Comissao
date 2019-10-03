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


        $busca = array();

        $sql = 'SELECT*FROM comissaodb.comissao';
        $query = $this->db->query($sql);
        $result = $query->result();


        foreach ($result as $row) {
            $comissao = new Comissao();
            $comissao->setId($row->idcomissao);
            $comissao->setNome($row->nomecomissao);
            $comissao->setDescricao($row->descricaocomissao);
            $comissao->setHoras($row->horascomissao);
            $comissao->setDate($row->datacomissao);
            array_push($busca, $comissao);
        }

        return array('dadoscomissao'=>$busca);

    }

    // public function getReunioes($usuario)
    // {

    //     $membro = array();
    //     $moderador = array();
    //     $secretario = array();

    //     $sql = 'SELECT Reuniao.id as reuniaoId, Reuniao.nome as reuniaoNome, Reuniao.datahora as reuniaoDataHora, Reuniao.aberta as reuniaoAberta, 
    //       UsuarioReuniao.registrado as usuarioRegistrado, TipoUsuario.id as tipoUsuario, Comissao.nome as comissaoNome,
    //       TipoReuniao.id as reuniaoTipo
    //       FROM reuniao AS Reuniao
    //       INNER JOIN usuarioreuniao AS UsuarioReuniao 
    //       ON Reuniao.id  = UsuarioReuniao.idReuniao AND UsuarioReuniao.idUsuario = ?
    //       INNER JOIN comissao AS Comissao
    //       ON Reuniao.idComissao = Comissao.id
    //       INNER JOIN tipousuario AS TipoUsuario
    //       ON TipoUsuario.id = UsuarioReuniao.idTipoUsuario
    //       INNER JOIN tiporeuniao AS TipoReuniao
    //       ON Reuniao.idTipoReuniao = TipoReuniao.id';
    //     $query = $this->db->query($sql, $usuario);
    //     $result = $query->result();

    //     $membroRegistrado = false;
    //     foreach ($result as $row) {
    //         $reuniao = new Reuniao();
    //         $tipoReuniao = $row->reuniaoTipo;

    //         $comissao = new Comissao();
    //         $comissao->setNome($row->comissaoNome);

    //         $reuniao->setId($row->reuniaoId);
    //         $reuniao->setNome($row->reuniaoNome);
    //         $reuniao->setComissao($comissao);
    //         $reuniao->setAberta($row->reuniaoAberta);
    //         $reuniao->setDataHora($row->reuniaoDataHora);

    //         if ($tipoReuniao == 1) {
    //             $reuniao->setTipo(Tipo_Reuniao::Ordianria);
    //         } else {
    //             $reuniao->setTipo(Tipo_Reuniao::Extraordinaria);
    //         }


    //         switch ($row->tipoUsuario) {
    //             case 1:
    //                 array_push($moderador, $reuniao);
    //                 break;
    //             case 2:
    //                 array_push($secretario, $reuniao);
    //                 break;
    //             case 3:
    //                 if(!$reuniao->getAberta()){
    //                     continue;
    //                 }

    //                 if (!$membroRegistrado && $row->usuarioRegistrado) {
    //                     $membro = array();
    //                     $membroRegistrado = true;
    //                     array_push($membro, $reuniao);
    //                 } else if (!$membroRegistrado && !$row->usuarioRegistrado ) {
    //                     array_push($membro, $reuniao);
    //                 }
    //                 break;
    //         }
    //     }

    //     return array('membro' => $membro, 'moderador' => $moderador, 'secretario' => $secretario);
    // }
}
