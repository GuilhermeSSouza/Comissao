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





}
