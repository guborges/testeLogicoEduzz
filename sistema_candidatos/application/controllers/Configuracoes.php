<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {
    
    public function index(){
        $this->load->model('m_configuracoes');
        
        $dados['configuracoes'] = $this->m_configuracoes->retorna_configuracoes()->row();
        $dados['nome_view'] = "v_configuracoes_gerais";
        $this->load->view('v_layout', $dados);
    }
    
    public function salvar_dados_pessoais(){
        $this->load->model('m_configuracoes', 'configuracoes');
        
        if($this->configuracoes->salvar_dados_pessoais()){
            redirect(base_url('configuracoes'));
        }
    }
    
    public function salvar(){
        
        $this->load->model('m_configuracoes', 'configuracoes');
        
        if($this->configuracoes->salvar()){
            $mensagem = "Configurações alteradas com sucesso";
        }else{
            $mensagem = "Erro nas configurações";
        }
        
        redirect(base_url("configuracoes"));
    }

}