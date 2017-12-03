<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dados_pessoais extends CI_Controller {
    
    public function index(){
        
        $dados['nome_view'] = "v_dados_pessoais";
        $this->load->view('v_layout', $dados);
    }

}