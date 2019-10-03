<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Notificacao extends CI_Controller{

	public function index(){
	
		$this->load->view('templates/header');
		$this->load->view('sse');
		$this->load->view('templates/footer');
		
	}

	public function sse(){
    header("Content-Type: text/event-stream");
    header("Cache-Control: no-cache");
    header("Connection: keep-alive");

		$this->load->model('SseModel');

    function send_message($id, $msg) {
        $d = array('id' => "$id", 'mensagem' => $msg);
        echo "id: $id" . PHP_EOL;
        echo "data: " . json_encode($d) . PHP_EOL;
        echo PHP_EOL;
        ob_flush();
        flush();
    }

		$resultado = $this->SseModel->notificacoes();
		
		foreach($resultado as $r){
			send_message($r['idItemPauta'],$r['mensagem']);
			sleep(1);
		}
    
	}

}
