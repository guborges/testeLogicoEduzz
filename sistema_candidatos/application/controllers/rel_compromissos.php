<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rel_compromissos extends CI_Controller {
    
    public function index(){
        
        $dados['nome_view'] = "v_rel_compromissos";
        $this->load->view('v_layout', $dados);
    }

}