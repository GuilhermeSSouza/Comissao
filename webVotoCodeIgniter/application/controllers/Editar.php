<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Editar extends CI_Controller
{

	public function verificaSession(){
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
	}


	public function editarMembro($idpessoa, $idcomissao){

		$this->verificaSession();
		$this->load->model('PessoaModel');

		$pessoa = $this->PessoaModel->editaDadosMembro($idpessoa);

		$data['pessoa'] = $pessoa['dadospessoa']; 
		$data['erro'] = null;
		$data['sucesso'] = null;
		$data['idback'] = $idcomissao;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('editarPessoa', $data);
		$this->load->view('templates/footer');
	}


	public function editarComissao($id){


		$this->verificaSession();
		$this->load->model('ComissaoModel');

		$comissao = $this->ComissaoModel->editarComissao($id);

		$data['comissao'] = $comissao['dadoscomissao'];
		$data['erro'] = null;
		$data['sucesso'] = null;
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('editarComissao', $data);
		$this->load->view('templates/footer');

	}


	public function salvar(){
		$this->verificaSession();
		$this->load->model('ComissaoModel');

		$idcomissao = $this->input->post('id');
		$nomecomissao = $this->input->post('nome');
		$horascomissao = $this->input->post('hora');
		$descricaocomissao = $this->input->post('descricao');
		$datacomissao = $this->input->post('data');
		$datafim = $this->input->post('datafim');

		$salve = $this->ComissaoModel->salvarEditado($idcomissao, $nomecomissao,$datacomissao , $descricaocomissao, $horascomissao, $datafim);

		if($salve){
			$data['erro'] = null;
			$data['sucesso'] = 'Salvo com sucesso!!';

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
			$data['erro'] = 'Não foi possivél salvar os dados!!!';
			$data['sucesso'] = null;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('editarComissao', $data);
			$this->load->view('templates/footer');

		}




	}


	public function salvaEditar(){
		$this->verificaSession();

		$this->load->model('PessoaModel');

		$idcomissao = $this->input->post('id');
		$idpessoa = $this->input->post('idpessoa');
		$nome = $this->input->post('nome');
		$siape = $this->input->post('siape');
		$curso = $this->input->post('curso');
		$categoria = $this->input->post('categoria');

		$salve = $this->PessoaModel->updatePessoa($idpessoa, $nome, $siape, $curso, $categoria);


		if($salve){
			$data['erro'] = null;
			$data['sucesso'] = 'Editado com sucesso!!';

			$nomecomissao = $this->PessoaModel->buscarNomeComissao($idcomissao);
			$data['comissao'] = $nomecomissao['dadoscomissao'];
			
			$comissao = $this->PessoaModel->buscar($idcomissao);
			$pessoa = $this->PessoaModel->buscaPessoa();

			
			$data['pessoa'] = $comissao['dadospessoa'];
			$data['novomembro'] = $pessoa['dpessoa'];
	
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');


		}else{
			$data['erro'] = 'Não foi possivél editar os dados!!';
			$data['sucesso'] = null;

			$nomecomissao = $this->PessoaModel->buscarNomeComissao($idcomissao);
			$data['comissao'] = $nomecomissao['dadoscomissao'];
			
			$comissao = $this->PessoaModel->buscar($idcomissao);
			$pessoa = $this->PessoaModel->buscaPessoa();

			
			$data['pessoa'] = $comissao['dadospessoa'];
			$data['novomembro'] = $pessoa['dpessoa'];
			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');

		}





	}





}