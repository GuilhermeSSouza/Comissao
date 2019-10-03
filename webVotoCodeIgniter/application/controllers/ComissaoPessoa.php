<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComissaoPessoa extends CI_Controller{

	public function verificaSession(){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
	}


	public function vizualizar($id){
		$this->verificaSession();

		$this->load->model('PessoaModel');
		
		$nomecomissao = $this->PessoaModel->buscarNomeComissao($id);
		$data['comissao'] = $nomecomissao['dadoscomissao'];
		
		$comissao = $this->PessoaModel->buscar($id);
		$pessoa = $this->PessoaModel->buscaPessoa();

		
		$data['pessoa'] = $comissao['dadospessoa'];
		$data['novomembro'] = $pessoa['dpessoa'];

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('dashboardpessoa',$data);
		$this->load->view('templates/footer');

	}

	public function novo(){
		$this->verificaSession();

		$this->load->model('PessoaModel');

		$nome = $this->input->post('nome');
		$siape= $this->input->post('siape');
		$curso = $this->input->post('curso');
		$categoria = $this->input->post('categoria');

		$add = $this->PessoaModel->adicionar($nome, $siape, $curso, $categoria);

		if($add == false){
			$data['sucesso'] = null;
			$data['erro'] = "Usuario não pode ser adicionado!!";
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('addpessoa', $data);
			$this->load->view('templates/footer');
		}
			$data['sucesso'] = "Cadastrado com sucesso!!" ;
			$data['erro'] = null;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('addpessoa', $data);
			$this->load->view('templates/footer');


		}

	public function adicionarMembro(){

		$this->verificaSession();

		$data['erro'] = null;
		$data['sucesso'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('addpessoa', $data);
		$this->load->view('templates/footer');
	}


public function adicionaComissao(){
		$this->verificaSession();

		$this->load->model('ComissaoModel');

		$nome = $this->input->post('nome');
		$data= $this->input->post('data');
		$hora = $this->input->post('hora');
		$descricao = $this->input->post('descricao');

		$add = $this->ComissaoModel->novo($nome, $data, $hora, $descricao);

		if($add == false){
			$dados['sucesso'] = null;
			$dados['erro'] = "A Comissão não pode ser adicionada!!";
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('addcomissao', $dados);
			$this->load->view('templates/footer');
			}

			$dados['sucesso'] = "Cadastrado com sucesso!!" ;
			$dados['erro'] = null;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('addcomissao', $dados);
			$this->load->view('templates/footer');


	}



	public function adicionarComissao(){

		$this->verificaSession();

		$data['erro'] = null;
		$data['sucesso'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('addcomissao', $data);
		$this->load->view('templates/footer');
	}



	public function novomembrocomissao($dado){


	}

}