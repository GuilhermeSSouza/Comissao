<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {



	public function verificaSession(){
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
	}


	public function index() {

		if($this->session->logged_in){
			redirect(base_url('login/home'));
		}

		$data['erro'] = null;
		$this->load->view('templates/header');
		$this->load->view('login', $data);
		$this->load->view('templates/footer');
	}

	
	public function home(){

		$this->verificaSession();
		$this->load->model('LoginModel');
		

		$comissao = $this->LoginModel->getComissao();
		$data['comissao'] = $comissao['dadoscomissao'];
		$data['erro']= null;
		$data['sucesso']= null;

		$comissaoinativa = $this->LoginModel->getComissaoInativa();
		$data['inativa'] = $comissaoinativa['dadoscomissao'];

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');




	}
	
	public function logar() {
		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
		$this->load->model('LoginModel');
		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');

		if (!isset($usuario) && !isset($senha)) {
			redirect(base_url());
		}

		$data['usuario']  = $this->LoginModel->login($usuario,$senha);


		if(is_null($data['usuario'])){
			$data['erro'] = "Usuario não encontrado!";
			$this->load->view('templates/header');
			$this->load->view('login', $data);
			$this->load->view('templates/footer');
			return;
		}

		$session = array(
			"usuario" => $data['usuario']->getUsuario(),
			"nome" => $data['usuario']->getNome(),
			"id" => $data['usuario']->getId(),
			"logged_in" => true
		);

		$this->session->set_userdata($session);

		redirect(base_url('login/home'));
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}
