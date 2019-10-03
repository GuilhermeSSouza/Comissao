<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Votacao extends CI_Controller
{

    public function index($idItempauta)
    {
        $this->verificaSession();
        $this->load->model('MembroModel');
        $this->load->model('ItemPautaModel');
        $this->load->model('VotoModel');


        $itemPauta = $this->ItemPautaModel->selecionar($idItempauta);


        if (!isset($itemPauta)) {
            $this->session->set_flashdata('error', "Item de Pauta não existe!");
            redirect(base_url('login/home'));
            return;
        }

        $idReuniao = $this->MembroModel->verificarRegistrado($this->session->id);

        if (!isset($idReuniao)) {
            $this->session->set_flashdata('error', "Você não pode votar para este Item de Pauta!");
            redirect(base_url());
            return;
        }

        $data['itemPauta'] = $itemPauta;

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('votacao', $data);
        $this->load->view('templates/footer');
    }

    public function votar()
    {
        $this->verificaSession();
        $this->load->model('MembroModel');
        $this->load->model('ItemPautaModel');
        $this->load->model('VotoModel');
        $this->load->model('SseModel');
        $post = $this->input->post();

        $idReuniao = $this->MembroModel->verificarRegistrado($this->session->id);
        $itemPauta = $this->ItemPautaModel->selecionar($post['idItemPauta']);

        if (!isset($idReuniao)) {
            $this->session->set_flashdata('error', "Você não pode votar para este Item de Pauta!");
            redirect(base_url('login/home'));
            return;
        }

        if (!$itemPauta->getEstaEmVotacao()) {
            $this->session->set_flashdata('error', "O Item de Pauta não está em votação!");
        } else if ($this->VotoModel->jaVotou($itemPauta->getId(), $itemPauta->getEstaSegundoTurno(), $this->session->id)) {
            $this->session->set_flashdata('error', "Você já votou neste Item de Pauta");
        } else {
            $this->VotoModel->inserirVoto($post['opcao'], $itemPauta->getId(), $this->session->id, $itemPauta->getEstaSegundoTurno());
            $this->session->set_flashdata('success', "Voto registrado com sucesso!");

            if ($this->VotoModel->todosVotaram($itemPauta->getId(), $itemPauta->getEstaSegundoTurno())) {

								$this->SseModel->removeNotificacao( $itemPauta->getId() );
								
								$this->SseModel->insertNotificacao($itemPauta->getId(), "votacao_encerrada");

                $this->resultado($itemPauta->getId());
            }
            
        }
        redirect(base_url('reunioes/entrar/' . $idReuniao));

    }

    public function resultado($id)
    {
        $this->verificaSession();
        $this->load->model('ItemPautaModel');
		//$this->load->model('SseModel');
		//$this->SseModel->removeNotificacao($id);

        $data['itemPauta'] = $this->ItemPautaModel->selecionar($id);
        $data['votosMembros'] = $this->ItemPautaModel->getVotosMembros($id);
        $data['countVotos'] = $this->ItemPautaModel->getCountVotos($id);

        $vt = 0;
        $vencedora = "";
        foreach ($data['countVotos'] as $voto){
        	if($voto[1] >=$vt){
				$vt = $voto[1];
				$vencedora = $voto[0];
			}
		}

		$data['vencedora'] = $vencedora;

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('resultado', $data);
        $this->load->view('templates/footer');
    }

    public function verificaSession()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

}
