<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index(){
            
                $dados['nome_view'] = "v_home";
				$this->load->view('v_layout', $dados);
                
	}

	public function lista_convidados(){

		$this->load->model("m_listaConvidados", "convidados");

		$dados['nome_view'] = 'v_listaConvidados';
		$dados['titulo_pagina'] = 'Lista de Convidados';
		$dados['tabela_convidados'] = $this->convidados->tabela_convidados();

		$this->load->view('v_layout', $dados);
	}

	public function cadastrar_convidado(){

		$nome = $this->input->post("nome");
		$familiaridade = $this->input->post("familiaridade");

		$dados = array(
						'nome' => $nome,
						'familiaridade' => $familiaridade
					  );

		$query = $this->db->insert("convidados", $dados);

		if($query == 1){
			redirect('/home/lista_convidados', 'refresh');
		}else {
			echo "não ok";
		}
	}
}
