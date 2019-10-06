<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComissaoPessoa extends CI_Controller{

	public function verificaSession(){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
	}





	public function compare_id($a, $b){
		return ($a->getId() -  $b->getId());
	}






	public function vizualizar($id){

		$this->verificaSession();

		$this->load->model('PessoaModel');
		
		$nomecomissao = $this->PessoaModel->buscarNomeComissao($id);
		$data['comissao'] = $nomecomissao['dadoscomissao'];

		if($data['comissao'][0]->getAtiva()==='1'){

			$data['erro'] = null;
			$data['sucesso'] = null;
			$comissao = $this->PessoaModel->buscar($id);
			
			$pessoa = $this->PessoaModel->buscaPessoa();

				
			$data['pessoa'] = $comissao['dadospessoa'];
			if(is_null($comissao)){
				$data['novomembro'] = $pessoa['dpessoa'];
			}else{
				if(is_null($pessoa)){
					$data['novomembro'] = null;
				}else{
				$data['novomembro'] = array_udiff($pessoa['dpessoa'],$data['pessoa'], array('ComissaoPessoa', 'compare_id'));
				}
			}
				
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');	
		

		}else{
		
			

			$data['erro'] = null;
			$data['sucesso'] = null;
			$comissao = $this->PessoaModel->buscar($id);						
			$data['pessoa'] = $comissao['dadospessoa'];
			$data['novomembro'] = null;
			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');
	}

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
		$datafim = $this->input->post('datafim');

		$add = $this->ComissaoModel->novo($nome, $data, $hora, $descricao, $datafim);

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



	public function novomembrocomissao($idcomissao, $idpessoa){

		$this->verificaSession();
		$this->load->model('PessoaModel');
		
		$addsalve = $this->PessoaModel->addpessoacomissao($idcomissao, $idpessoa);


		$this->load->model('PessoaModel');
		
		$nomecomissao = $this->PessoaModel->buscarNomeComissao($idcomissao);
		$data['comissao'] = $nomecomissao['dadoscomissao'];

		if($data['comissao'][0]->getAtiva()==='1'){

			$data['erro'] = null;
			$data['sucesso'] = null;
			$comissao = $this->PessoaModel->buscar($idcomissao);
			$pessoa = $this->PessoaModel->buscaPessoa();

			$data['pessoa'] = $comissao['dadospessoa'];
			//$data['novomembro'] = $pessoa['dpessoa'];
			
			$data['novomembro'] = array_udiff($pessoa['dpessoa'],$data['pessoa'], array('ComissaoPessoa', 'compare_id'));
			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');

		}else{
		
			

			$data['erro'] = null;
			$data['sucesso'] = null;
			$comissao = $this->PessoaModel->buscar($idcomissao);						
			$data['pessoa'] = $comissao['dadospessoa'];
			$data['novomembro'] = null;
			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');
	} 

		


	}



	public function excluir($idcomissao, $idpessoa){

		$this->verificaSession();
		$this->load->model('ComissaoModel');
		$this->ComissaoModel->excluirPessoaComissao($idcomissao, $idpessoa);


		$this->load->model('PessoaModel');
		
		$nomecomissao = $this->PessoaModel->buscarNomeComissao($idcomissao);
		$data['comissao'] = $nomecomissao['dadoscomissao'];

		if($data['comissao'][0]->getAtiva()==='1'){

			$data['erro'] = null;
			$data['sucesso'] = null;
			$comissao = $this->PessoaModel->buscar($idcomissao);
			$pessoa = $this->PessoaModel->buscaPessoa();

			
			$data['pessoa'] = $comissao['dadospessoa'];
			if (is_null($comissao)) {
				$data['novomembro'] = $pessoa['dpessoa'];
				
			}else{
				$data['novomembro'] = array_udiff($pessoa['dpessoa'],$data['pessoa'], array('ComissaoPessoa', 'compare_id'));
			}
			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');

		}else{
		
			

			$data['erro'] = null;
			$data['sucesso'] = null;
			$comissao = $this->PessoaModel->buscar($idcomissao);						
			$data['pessoa'] = $comissao['dadospessoa'];
			$data['novomembro'] = null;
			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('dashboardpessoa',$data);
			$this->load->view('templates/footer');
	} 

	}

}