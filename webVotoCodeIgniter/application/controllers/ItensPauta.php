<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ItensPauta extends CI_Controller
{

	public function index($id)
	{
	}

	public function verificaSession()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
	}

	public function editar($id)
	{
		$this->verificaSession();
		$data['idItemPauta'] = $id;

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('itemPauta', $data);
		$this->load->view('templates/footer');

	}

	public function encaminhar()
	{
		$this->verificaSession();
		$idItemPauta = $this->input->post('idItemPauta');
		$tipoVotacao = $this->input->post('tipoVotacao');
		$segundoTurno = $this->input->post('segundoTurno');
		$opcoes = explode(",", $this->input->post('opcoes'));
		$opVoto = array();

		$this->load->model("ItemPautaModel");
		$this->load->model("SseModel");


		foreach ($opcoes as $op) {
			$aux = new OpcaoVoto();
			$aux->setDescricao($op);
			array_push($opVoto,$aux);
		}

		$this->ItemPautaModel->encaminhar($idItemPauta, $opVoto, $tipoVotacao);

		$this->SseModel->insertNotificacao($idItemPauta,"votacao_aberta");

		echo "ok";
	}

	public function emvotacao($idItemPauta){
		$data['idItemPauta'] = $idItemPauta;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('emVotacao',$data);
		$this->load->view('templates/footer');
	}

}
