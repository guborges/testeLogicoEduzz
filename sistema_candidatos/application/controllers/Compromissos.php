<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compromissos extends CI_Controller {
    
    public function index(){
        $this->load->model('m_compromissos');
        
        $dados['nome_view'] = "v_compromissos";
        $dados['compromissos'] = $this->m_compromissos->retorna_compromissos();
        $this->load->view('v_layout', $dados);
    }
    
    public function salvar_compromisso(){
        $this->load->model('m_compromissos');
        
        if($this->m_compromissos->salvar_compromisso()){
            $this->index();
        }
    }
    /*
    public function editar_compromisso($id_compromisso){
        $this->load->model('m_compromissos');
        
        $compromisso = $this->m_compromissos->retorna_compromissos($id_compromisso)->row();
        
        $dados['nome_view'] = "v_compromissos";
        $dados['data_compromisso'] = $compromisso->compromissos_data_evento;
        
        list($hora,$minuto) = explode(":", $compromisso->compromissos_hora_evento);
        
        $dados['hora_compromisso_hora'] = $hora;
        $dados['hora_compromisso_minuto'] = $minuto;
        $dados['compromissos_descricao'] = nl2br($compromisso->compromissos_descricao);
        $dados['id_compromissos'] = $compromisso->compromissos_id;
        $dados['compromissos_numero'] = $compromisso->compromissos_numero;
        $dados['compromissos_unidade'] = $compromisso->compromissos_unidade;
        $dados['compromissos'] = $this->m_compromissos->retorna_compromissos();
        
        $this->load->view('v_layout', $dados);
    }
    */
    public function excluir_compromisso($id_compromisso){
        
        $this->load->model('m_compromissos');
        
        if($this->m_compromissos->excluir_compromisso($id_compromisso)){
            $this->index();
        }       
    }

}