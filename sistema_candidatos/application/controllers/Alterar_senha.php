<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alterar_senha extends CI_Controller {
    
    public function index(){
        
        $dados['nome_view'] = "v_usuario_alterar_senha";
        $this->load->view('v_layout', $dados);
    }

}