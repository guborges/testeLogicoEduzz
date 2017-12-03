<?php

class M_configuracoes extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function retorna_dados_pessoais(){
        return $this->db->get('usuario');
    }
    
    function salvar_dados_pessoais(){
    
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');

        $dados = array(
                       'nome' => $nome,
                       'email' => $email
                );


        if($this->db->update('usuario', $dados)){
            return true;
        }else{
            return false;
        }
    
    }   
    
    function verifica_senha(){
        
        $senha_antiga = md5($this->input->post('senha_antiga'));
        $consulta = $this->db->get_where("usuarios", array("senha"=>$senha_antiga));
        
        if($consulta->num_rows() > 0){
            return $true;
        }else{
            return false;
        }
    }
    
    function salva_senha(){
        $nova_senha = $this->input->post("nova_senha");
        
        if($this->db->update("usuarios", array("senha"=>md5($nova_senha)))){
            return true;
        }else{
            return false;
        }
    }
    
    function retorna_configuracoes(){
        
        return $this->db->get('configuracoes');
    }
    
    function salvar(){
        
        $itens_por_pagina_candidatos = $this->input->post('itens_por_pagina_candidatos');
        
        if(empty($this->db->get('configuracoes')->row()->itens_por_pagina_candidatos)){
            $this->db->insert("configuracoes", array(
            
                "itens_por_pagina_candidatos" => 5
            ));
            
        }else{
        
            $query = $this->db->update("configuracoes", array(

                "itens_por_pagina_candidatos" => $itens_por_pagina_candidatos
            ));
        }
        if($query){
            return true;
        }else {
            return false;
        }
    }
}