<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Busca extends CI_Controller{

	public function verificaSession(){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
	}


	public function index(){

		$this->verificaSession();

		$data['erro'] = null;
		$data['sucesso'] = null;
		$data['result'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('membroPesquisa', $data);
		$this->load->view('templates/footer');
	}


	public function pesquisaMembro(){
		$this->verificaSession();


		$nome = $this->input->post('nome');
		$this->load->model('PesquisaModel');

		$query = $this->PesquisaModel->pesquisarMembro($nome);

		if (is_null($query)) {

		$data['erro'] = "Nenhuma informação encontrada!!!";
		$data['sucesso'] = null;
		$data['result'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('membroPesquisa', $data);
		$this->load->view('templates/footer');

		}else{

		$data['result'] = $query['pesquisa']; 


		$data['erro'] = null;
		$data['sucesso'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('membroPesquisa', $data);
		$this->load->view('templates/footer');
		}


		
		


	}



}













