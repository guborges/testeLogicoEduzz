<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    
    public function index(){
    
        $this->envia_lembrete_compromissos();
    }
    
    public function envia_lembrete_compromissos(){
        
        $this->load->model("m_compromissos");
        
        $consulta_lembretes = $this->m_compromissos->retorna_compromissos_cron();
        
        echo date("H:i:s");
        if($consulta_lembretes == 0){
            echo "Nenhum registro encontrado";
        }
        
        foreach($consulta_lembretes as $linha){
            echo $linha->compromissos_descricao;
            echo "<br>";
        }
        
    }

}