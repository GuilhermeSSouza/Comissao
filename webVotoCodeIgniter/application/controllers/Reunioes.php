<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reunioes extends CI_Controller {


	public function verificaSession(){
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
	}

	public function abrir($id) {
		$this->verificaSession();
		$this->load->model('ReuniaoModel');
		$data['reuniao'] = $this->ReuniaoModel->abrir($id);
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('homeModerador',$data);
		$this->load->view('templates/footer');

	}
	
	public function fechar($id) {
		$this->verificaSession();
		$this->load->model('ReuniaoModel');
		
		$this->ReuniaoModel->fechar($id);
		
		redirect(base_url('login/home'));
	}

	public function entrar($id){
		$this->verificaSession();
		$this->load->model('MembroModel');

		$idReuniao = $this->MembroModel->verificarRegistrado($this->session->id);

		if(isset($idReuniao) && $idReuniao != $id){
            $this->session->set_flashdata('error', 'Você já está registrado em uma reunião!');
            redirect(base_url('login/home'));

        }else{
            $data['reuniao'] = $this->MembroModel->entrar($id,$this->session->id);
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('homeMembro',$data);
            $this->load->view('templates/footer');
        }


	}

	public function sairReuniao($id){
		$this->verificaSession();
		$this->load->model('MembroModel');

		if(!$this->MembroModel->sairReuniao($id,$this->session->id)){
			return null;
		}

        redirect(base_url('login/home'));
	}

}
