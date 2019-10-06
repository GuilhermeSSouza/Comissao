<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DeleteComissao extends CI_Controller{

	public function verificaSession(){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
	}


	public function delete($id){

		$this->verificaSession();
		$this->load->model('ComissaoModel');

		$comissao = $this->ComissaoModel->editarComissao($id);

		$data['comissao'] = $comissao['dadoscomissao'];
		$data['erro'] = null;
		$data['sucesso'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('deleta', $data);
		$this->load->view('templates/footer');




	}


	public function desative(){

		$this->verificaSession();
		$this->load->model('ComissaoModel');

		$idcomissao = $this->input->post('id');
		$nomecomissao = $this->input->post('nome');
		$horascomissao = $this->input->post('hora');
		$descricaocomissao = $this->input->post('descricao');
		$datacomissao = $this->input->post('data');
		$datafim = $this->input->post('datafim');

		$salve = $this->ComissaoModel->delete($idcomissao, $nomecomissao,$datacomissao , $descricaocomissao, $horascomissao, $datafim);

		if($salve){
			$data['erro'] = null;
			$data['sucesso'] = 'A Comissão foi desativada!!';

			$this->load->model('LoginModel');
			$comissao = $this->LoginModel->getComissao();
			$data['comissao'] = $comissao['dadoscomissao'];

			$comissaoinativa = $this->LoginModel->getComissaoInativa();
			$data['inativa'] = $comissaoinativa['dadoscomissao'];

			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboard', $data);
			$this->load->view('templates/footer');

		}else{

			$this->load->model('ComissaoModel');

			$comissao = $this->ComissaoModel->editarComissao($id);

			$data['comissao'] = $comissao['dadoscomissao'];
			$data['erro'] = 'Não foi possivél desativar a Comissão!!';
			$data['sucesso'] = null;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('editarComissao', $data);
			$this->load->view('templates/footer');

		}




	} 


	public function reativa($idcomissao){


		$this->verificaSession();


		$data['erro'] = null;
		$data['sucesso'] = null;

		$this->load->model('ComissaoModel');
		$this->ComissaoModel->reativa($idcomissao);

		$this->load->model('LoginModel');
		$comissao = $this->LoginModel->getComissao();
		$data['comissao'] = $comissao['dadoscomissao'];
		$comissaoinativa = $this->LoginModel->getComissaoInativa();
		$data['inativa'] = $comissaoinativa['dadoscomissao'];


		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');	


	}



}
